<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Session;
use App\Http\Controllers\SuperAdminController;
use app\Http\Middleware\Admin\AdminMiddlware;

class CategoryController extends Controller
{
    protected $Category;
    protected $request; 
    protected $id; 
    public function  __construct(Category $Category)
 {
         $this->Category=$Category;
 }

    public function save_category(CategoryRequest $request)
    {   

      SuperAdminController::AdminAuthCheck();  
     //  $this->Category->create($request->only([
       //      'category_name','category_description','publication_status'
         // ]));
    	if($request->publication_status=='on'){
    		$publication_status=1;
    	}else{
    		$publication_status=0;
    	}
      
       $Category= new Category();
       $Category-> category_name =$request->get('category_name');
       $Category-> category_description =$request->get('category_description');
       $Category-> publication_status =$publication_status;
       $Category->save();

          return redirect('/admin/category/add');
    }

    public function add()
    {
      SuperAdminController::AdminAuthCheck();
    return view('admin.addCategory');       
    }

    

    public function all_categories()
    {
      SuperAdminController::AdminAuthCheck();
       $Category= $this->Category->all();
       return view('admin.allCategory',compact('Category'));
    }

    public function Active($id)
    {
      SuperAdminController::AdminAuthCheck();
       $Category= $this->Category->find($id);
       $Category-> publication_status =1;
       $Category->save();
                return redirect('/admin/category/all');
    }

    public function Diactive($id)
    {
      SuperAdminController::AdminAuthCheck();
       $Category= $this->Category->find($id);
       $Category-> publication_status =0;
       $Category->save();
                return redirect('/admin/category/all');
    }

    public function edit($id)
    { 
      SuperAdminController::AdminAuthCheck();
    $Category= $this->Category->find($id);
    return view('admin.edit_category',compact('Category'));

    }

    public function delete($id)
    {
      SuperAdminController::AdminAuthCheck();
      $category=$this->Category->find($id);
      $category->delete();
              return redirect('/admin/category/all');

    }

    public function update(CategoryRequest $request,$id )
    {
      SuperAdminController::AdminAuthCheck();
      if($request->publication_status=='on'){
        $publication_status=1;
      }else{
        $publication_status=0;
      }

       $Category= $this->Category->find($id);
       $Category-> category_name =$request->get('category_name');
       $Category-> category_description =$request->get('category_description');
       $Category-> publication_status =$publication_status;
       $Category->update();
       if($Category)
       {
        session::put('msg','Category Update Successfully');
                return redirect('/admin/category/all');
       }
       else{

        session::put('msg','Category Update Not Success');
                return redirect('/admin/category/all');

       }
     }
}
