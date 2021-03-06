@extends('admin.layout')
@section('admin_area')


			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{URL::to('/admin/dashboard')}}">پیشخوان</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="{{URL::to('/admin/category/add')}}"> افزودن دسته بندی</a>
				</li>
			</ul>
						
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>افزودن دسته بندی جدید</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					        @if($errors->count())
                     <ul>
                           @foreach($errors->all() as $error)
                              '<p class="alert alert-success">{{ $error }}</p>
                           @endforeach
                     </ul>
                     @endif
					
					<div class="box-content">
						<form class="form-horizontal" action="{{route('Category.save_category')}}" method="POST" >
							@csrf
						  <fieldset>

							<div class="control-group">
							  <label class="control-label"  for="category_name">نام دسته  </label>
							  <div class="controls">
								<input type="text" class="input-xlarge" id="category_name" name="category_name">
							  </div>
							</div>
   
							<div class="control-group hidden-phone">
							  <label class="control-label" for="category_description">توضیحات دسته  </label>
							  <div class="controls">
								<textarea class="cleditor" id="category_description" name="category_description" rows="3"></textarea>
							  </div>
							</div>


							<div class="control-group hidden-phone">
							  <label class="control-label" for="category_publish">وضعیت انتشار </label>
							  <div class="controls">
								<input type="checkbox" class="cleditor" id="publication_status" name="publication_status" checked />
							  </div>
							</div>


							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">افزودن دسته بندی</button>
							  <button type="reset" class="btn">انصراف</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

			
    
@endsection