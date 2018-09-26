<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Cart;
class CartController extends Controller
{
   
    Protected $Product;
    public function __construct(Product $Product)
    {
        $this->Product=$Product;
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
    

}
