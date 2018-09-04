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
					<a href="{{URL::to('/admin/add_category')}}">بروزرسانی دسته بندی </a>
				</li>
			</ul>
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span> بروزرسانی دسته بندی</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>

					<div class="box-content">
						<form class="form-horizontal" action="
						{{ route('Category.update',['id'=>$Category->id]) }}
							" method="POST" >
							{{csrf_field()}}
						  <fieldset>

							<div class="control-group">
							  <label class="control-label" for="category_name">نام</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" id="category_name" name="category_name" value="{{$Category->category_name}}">
							  </div>
							</div>
   
							<div class="control-group hidden-phone">
							  <label class="control-label" for="category_description">توضیحات</label>
							  <div class="controls">
								<textarea class="cleditor" id="category_description" name="category_description" rows="3">
									{{$Category->category_description}}
								</textarea>
							  </div>
							</div>


							<div class="control-group hidden-phone">
							  <label class="control-label" for="category_publish">وضعیت</label>
							  <div class="controls">

								<input type="checkbox" class="cleditor" id="publication_status" name="publication_status"
								@if($Category->publication_status)
								checked 
								@endif  
								/>

							  </div>
							</div>


							<div class="form-actions">
							  <button type="submit" class="btn btn-success">بروزرسانی</button>
							  <a href="#" class="btn">انصراف</a>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->


@endsection