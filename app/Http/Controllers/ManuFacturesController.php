<?php

namespace App\Http\Controllers;
use App\Models\ManuFacture;

use Illuminate\Http\Request;

class ManuFacturesController extends Controller
{
    protected $ManuFacture;
    protected $request; 
    public function  __construct(ManuFacture $ManuFacture)
 {
         $this->ManuFacture=$ManuFacture;
 }

    public function save(Request $request)
    {   
      SuperAdminController::AdminAuthCheck();
     	if($request->publication_status=='on'){
    		$publication_status=1;
    	}else{
    		$publication_status=0;
    	}
      
       $ManuFacture= new ManuFacture();
       $ManuFacture-> manufacture_name =$request->get('manufacture_name');
       $ManuFacture-> manufacture_description =$request->get('manufacture_description');
       $ManuFacture-> publication_status =$publication_status;
       $ManuFacture->save();

          return redirect('/admin/manufacture/add');
    }

    public function add()
    {
      
   SuperAdminController::AdminAuthCheck();
    return view('admin.add_manufacture'); 
          
    }

    


    public function all()
    {
      SuperAdminController::AdminAuthCheck();
       $ManuFacture= $this->ManuFacture->all();
       return view('admin.all_manufactures',compact('ManuFacture'));
    }

    public function Active($id)
    {
      SuperAdminController::AdminAuthCheck();
       $ManuFacture= $this->ManuFacture->find($id);
       $ManuFacture-> publication_status =1;
       $ManuFacture->save();
                return redirect('/admin/manufacture/all');
    }

    public function unactive($id)
    {
      SuperAdminController::AdminAuthCheck();
       $ManuFacture= $this->ManuFacture->find($id);
       $ManuFacture-> publication_status =0;
       $ManuFacture->save();
                return redirect('/admin/manufacture/all');
    }

    public function update($id)
    {          
      SuperAdminController::AdminAuthCheck();
    $ManuFacture= $this->ManuFacture->find($id);
    return view('admin.edit_manufacture',compact('ManuFacture'));

    }

    public function delete($id)
    {
      SuperAdminController::AdminAuthCheck();
      $ManuFacture=$this->ManuFacture->find($id);
      $ManuFacture->delete();
              return redirect('/admin/manufacture/all');

    }

    public function update_done(Request $request,$id )
    {
      SuperAdminController::AdminAuthCheck();
      if($request->publication_status=='on'){
        $publication_status=1;
      }else{
        $publication_status=0;
      }

      $ManuFacture= $this->ManuFacture->find($id);
       $ManuFacture-> manufacture_name =$request->get('manufacture_name');
       $ManuFacture-> manufacture_description =$request->get('manufacture_description');
       $ManuFacture-> publication_status =$publication_status;
       $ManuFacture->update();
       if($ManuFacture)
       {
        session::put('msg','Category Update Successfully');
                return redirect('/admin/manufacture/all');
       }
       else{

        session::put('msg','Category Update Not Success');
                return redirect('/admin/manufacture/all');

       }
     }
}
