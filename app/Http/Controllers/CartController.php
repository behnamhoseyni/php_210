<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;
use Session;
use App\Models\shipping;
use App\Models\customer;
use App\Models\payment;
use App\Http\Requests\shippingRequest;
use Zarinpal\Zarinpal;

session_start();

class CartController extends Controller
{
   
    Protected $Product;
    protected $shipping;

    public function __construct(Product $Product, shipping $shipping, payment $payment, customer $customer)
    {
        $this->Product=$Product;
        $this->shipping = $shipping;
        $this->payment = $payment;
        $this->customer = $customer;


    }
    public function cart()
    {
        return View('pages.cart');
    }
    public function add(Request $request)
    {
        $Product_info=$this->Product
        ->where('id', $request->id)
        ->get()
        ->first();

        $qty=$request->qty;

        Cart::add([
            'id' => $Product_info->id,
            'name' => $Product_info->product_name,
            'qty' => $qty,
            'price' => $Product_info->product_price,
            'options' => ['image' => $Product_info->product_image]
        ]);


        return redirect('/cart');

    }
    public function delete($id)
    {
       Cart::update($id,0);
       return redirect('/cart');
    }


    public function increment($id)
    {
        $cart = Cart::get($id);
        $cart->qty = $cart->qty + 1;
        return Redirect('/cart');


    }
    public function decrement($id)
    {
        $cart = Cart::get($id);
        if ($cart->qty <= 1) {
            return Redirect('/cart');
        } else {
            $newQty = $cart->qty - 1;
            $cart->qty = $newQty;
            return Redirect('/cart');
        }


    }
    public function checkout()
    {
        if (session::get('customer_id')) {
            return View('pages.checkout');
        } else {
            return redirect('/customer/auth');
        }

    }
    public function save_shipping(shippingRequest $request)
    {
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_tel'] = $request->shipping_tel;

        $shipping_id = $this->shipping->insertGetId($data);

        session::put('id', $shipping_id);
        return redirect('cart/payment');


    }

    public function payment()
    {
        return View('pages.payment');
    }

    public function do_payment(Request $request)
    {
        $payment_method = $request->payment_method;
        switch ($payment_method) {
            case 'inhome':
                echo 'you must pay in your home';
                break;
            case 'zarinpal':
                $this->pay_by_zarinpal();
                break;
            default:
                return 'this payment method not supported right now ';
                break;
        }
    }
    public function pay_by_zarinpal()
    {
        $total_cart = (int)Cart::total(0, '', '', '');
        $name = session::get('customer_name');
        $email = session::get('customer_email');
        $zarinpal = new Zarinpal('aae0a368-021a-11e6-a1db-005056a205be');
        $zarinpal->enableSandbox(); // active sandbox mod for test env
        $zarinpal->isZarinGate(); // active zarinGate mode
        $results = $zarinpal->request(
            route('payment.zarinpal.callback'),          //required
            $total_cart,                                  //required
            $name,                             //required
            $email,                      //optional
            '09000000000',                         //optional
            json_encode([                          //optional
                "Wages" => [
                    "zp.1.1" => [
                        "Amount" => 120,
                        "Description" => "part 1"
                    ],
                    "zp.2.5" => [
                        "Amount" => 60,
                        "Description" => "part 2"
                    ]
                ]
            ])
        );

        echo json_encode($results);
        if (isset($results['Authority'])) {
            file_put_contents('Authority', $results['Authority']);
            $zarinpal->redirect();
        }
        //it will redirect to zarinpal to do the transaction or fail and just echo the errors.
        //$results['Authority'] must save somewhere to do the verification
    }

    public function zarinpalCallback()
    {
        $status = $_GET['Status'];
        if ($status == 'OK') {
            $this->finalStep('zarinpal');
            return redirect('cart/success');

        } else if ($status == 'NOK') {

                // wrong payment 
            echo 'your payment is not completed';
        }
    }


    public function finalStep($payment_method)
    {

        // ------------- payment table -----------
        $payment_data = array();
        $payment_data['payment_method'] = $payment_method;
        $payment_data['payment_status'] = 'pending';

        $payment_id = $this->payment
            ->insertGetId($payment_data);
        // ------------- END payment table -----------

        // ------------- order table -----------
        $order_data = array();
        $order_data['customer_id'] = session::get('customer_id');
        $order_data['shipping_id'] = session::get('shipping_id');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = (int)Cart::total(0, '', '', '');;
        $order_data['order_status'] = 'pending';

        $order_id = $this->orders
            ->insertGetId($order_data);
        // ------------- END order table -----------

        // -------------  order details table -----------
        // $od_data = array();
        // $od_data['order_id']= $order_id;
        $order_details_data = array();

        $cart_content = Cart::content();
        foreach ($cart_content as $content) {
            $order_details_data['order_id'] = $order_id;
            $order_details_data['product_id'] = $content->id;
            $order_details_data['product_name'] = $content->name;
            $order_details_data['product_price'] = $content->price;
            $order_details_data['product_sale_quantity'] = $content->qty;

            $this->order_details
                ->insert($order_details_data);
        }
        // ------------- END  order details table -----------



    }


    public function success()
    {
        return View('pages.cart_success');
    }

    

}
