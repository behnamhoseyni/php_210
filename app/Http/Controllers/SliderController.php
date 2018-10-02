<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Models\slider;
<<<<<<< HEAD
use App\Http\Requests\sliderRequest;

=======
>>>>>>> 888e1c0dfa0ed95ffd37ced857bda0f4ae3bf8fd


class SliderController extends Controller
{
    protected $slider;

    public function  __construct(slider $slider)
    {
        $this->slider=$slider;       
    }
    public function all()
    {
        SuperAdminController::AdminAuthCheck();
    	$sliders = $this->slider->all();
        return View('admin.all_sliders',compact('sliders'));
  
    }
    public function add()
    {
        SuperAdminController::AdminAuthCheck();
   		return View('admin.add_slider'); 	
    }

<<<<<<< HEAD
    public function save(sliderRequest $request)
=======
    public function save(Request $request)
>>>>>>> 888e1c0dfa0ed95ffd37ced857bda0f4ae3bf8fd
    {
        SuperAdminController::AdminAuthCheck();

        if($request->publication_status=='on'){
            $publication_status=1;
        }else{
            $publication_status=0;
        }

      $image = $request->file('slider_image');
        if ($image) {
            $image_name = date('mdYHis');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.".".$ext;
            $upload_url = 'images/mSlider/';
            $image_url = $upload_url.$image_full_name;
            $isUploaded = $image->move($upload_url,$image_full_name);
        }
        if ($isUploaded) {
            $data['slider_image']=$image_url;
        }else
        {
            $data['slider_image']=null;
        }    

        $image_off = $request->file('slider_off_image');
        if ($image) {
            $image_name = date('mdYHis');
            $ext = strtolower($image_off->getClientOriginalExtension());
            $image_full_name = $image_name.".".$ext;
            $upload_url = 'images/mSlider/';
            $image_url_off = $upload_url.$image_full_name;
            $isUploaded = $image_off->move($upload_url,$image_full_name);
        }
        if ($isUploaded) {
            $data['slider_off_image']=$image_url;
        }else
        {
            $data['slider_off_image']=null;
        }    
     
        
       $slider= new slider();
       $slider->slider_title = $request->get('slider_title');
       $slider->slider_description = $request->get('slider_description');
       $slider->publication_status = $publication_status;
       $slider->slider_off_image = $request->get('slider_off_image');
       $slider->slider_button_lable= $request->get('slider_button_lable');
       $slider->slider_image = $image_url;
       $slider->slider_off_image = $image_url_off;
       $slider->slider_link= $request->get('slider_link');
	   $slider->save();


		if($slider->save())
        {
                session::put('msg','slider saved ! ');
                return redirect('/admin/slider/add'); 
        }else

        {
                session::put('msg','slider not saved!');
                return redirect('/admin/slider/add'); 
        }

    }


  public function unactive($id)
    {
        SuperAdminController::AdminAuthCheck();
      $slider= $this->slider->find($id);
       $slider-> publication_status =0;
       $slider->save();
                return redirect('/admin/slider/all');
    }

    public function active($id)
    {
        SuperAdminController::AdminAuthCheck();
        $slider= $this->slider->find($id);
        $slider-> publication_status =1;
        $slider->save();
                 return redirect('/admin/slider/all');
    }

    public function delete($id)
    {
      SuperAdminController::AdminAuthCheck();
      $slider=$this->slider->find($id);
      $slider->delete();
              return redirect('/admin/slider/all');


            if ($slider->delete()) {
                session::put('msg','Slider Deleted successfully');
                return Redirect::to('/admin/slider/all'); 
            }else
            {
                session::put('msg','Slider Could Not Be Deleted');
                return Redirect::to('/admin/slider/all');    
            }
    }

}
