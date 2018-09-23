<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\ManuFacture; 
use App\Models\slider; 

class homeController extends Controller
{

      protected $Category;
    protected $ManuFacture;
    protected $Product;

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
       return  view('pages.home',compact('ManuFactures','Categories','Productes', 'sliders'));
    }
}
   
