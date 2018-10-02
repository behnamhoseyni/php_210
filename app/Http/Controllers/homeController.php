<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ManuFacture; 
<<<<<<< HEAD
use App\Models\slider; 

class homeController extends Controller
{

      protected $Category;
    protected $ManuFacture;
    protected $Product;
    protected $id;


    public function  __construct(Category $Category,ManuFacture $ManuFacture,Product $Product, slider $slider)
    {
        $this->Category=$Category;
        $this->ManuFacture=$ManuFacture;
        $this->Product=$Product;        
        $this->slider=$slider;        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Categories=$this->Category->all();
        $ManuFactures=$this->ManuFacture->all();
        $sliders=$this->slider->all();
        $Productes=$this->Product
        ->limit(6)
        ->get();
       return  view('pages.home',compact('ManuFactures', 'Categories','Productes', 'sliders'));
    }

    public function displayCategoryProducts($id)
    {
        // display all products inside special category 
        $Categories = $this->Category->all();
        $ManuFactures = $this->ManuFacture->all();
        $sliders = $this->slider->all();
        $category_published_products = $this->Product
        ->where('categories_id', $id)
        ->limit(9)
            ->get();
        return View('pages.display_category_products',compact('Categories', 'ManuFactures', 'sliders', 'category_published_products'));
    }
    public function displayManufactureProducts($id)
    {
        // display all products inside special manufacture

        $Categories = $this->Category->all();
        $ManuFactures = $this->ManuFacture->all();
        $sliders = $this->slider->all(); 
        $Manufacture_published_products = 
        $this->Product 
            ->where('manu_factures_id', $id)
            ->get()
            ->first();
        return View('pages.display_manufacture_products', compact('Categories', 'ManuFactures', 'sliders', 'Manufacture_published_products'));

    }

    public function displayProductDetails($id, $product_name)
    {
        $Categories = $this->Category->all();
        $ManuFactures = $this->ManuFacture->all();
        $recommended_products= $this->Product->all();
        $product_detailss = $this->Product
            ->where('id', $id)
            ->with('categories')
            ->with('manu_factures')
            ->get();

        return View('pages.display_product_details', compact('recommended_products','Categories', 'ManuFactures','product_detailss'));


=======

class homeController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Categories=$this->Category->all();
        $ManuFactures=$this->ManuFacture->all();
        $Productes=$this->Product
        ->limit(6)
        ->get();
       return  view('pages.home',compact('ManuFactures','Categories','Productes'));
>>>>>>> 888e1c0dfa0ed95ffd37ced857bda0f4ae3bf8fd
    }
}
   
