<?php

namespace App\Http\Controllers;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Session;
use App\Models\Product;
use App\Models\Category;
use App\Models\ManuFacture; 

session_start();



class ProductController extends Controller
{
    
    protected $Category;
    protected $ManuFacture;
    protected $Product;

    public function  __construct(Category $Category,ManuFacture $ManuFacture,Product $Product)
    {
        $this->Category=$Category;
        $this->ManuFacture=$ManuFacture;
        $this->Product=$Product;        
    }

    public function add()
    {
       $Category= $this->Category->all();
       $ManuFacture= $this->ManuFacture->all();
       return View('admin.add_product',compact('Category','ManuFacture'));
    }


    public function save(Request $request)
    {
        if($request->publication_status=='on'){
            $publication_status=1;
        }else{
            $publication_status=0;
        }

      $image = $request->file('product_image');
        if ($image) {
            $image_name = date('mdYHis');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.".".$ext;
            $upload_url = 'images/';
            $image_url = $upload_url.$image_full_name;
            $isUploaded = $image->move($upload_url,$image_full_name);
        }
        
       $Product= new Product();
       $Product-> product_name =$request->get('product_name');
       $Product-> product_long_description =$request->get('product_long_description');
       $Product-> product_short_description =$request->get('product_short_description');
       $Product-> manufacture_id =$request->get('brand_name');
       $Product-> category_id =$request->get('category_name');
       $Product-> product_price =$request->get('product_price');
       $Product-> product_color =$request->get('product_colors');
       $Product-> product_image = $image_url;
       $Product-> publication_status = $publication_status;
	   $Product->save();


		if($Product->save())
        {
                session::put('msg','product saved ! ');
                //return Redirect::to('/admin/product/all'); 
        }else

        {
                session::put('msg','product not saved!');
                //return Redirect::to('/admin/product/all'); 
        }

    }
