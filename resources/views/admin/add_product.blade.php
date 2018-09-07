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
					<a href="{{URL::to('/admin/product/add')}}">افزودن محصول</a>
				</li>
			</ul>

				<?php 
						// Alert for success add new Product
							if (Session::get('msg')) {
								echo '<p class="alert alert-success">';
								echo Session::get('msg');
								echo '</p>';

								Session::put('msg',null);
							}
						?>
						
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>افزودن محصول جدید</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					
					<div class="box-content">
						<form class="form-horizontal" action="{{URL::to('/admin/product/save')}}" method="POST" enctype="multipart/form-data" >
							{{csrf_field()}}
						  <fieldset>

							<div class="control-group">
							  <label class="control-label" for="product_name">نام محصول</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" id="product_name" name="product_name">
							  </div>
							</div>
   
							<div class="control-group hidden-phone">
							  <label class="control-label" for="product_long_description">توضیحات کامل </label>
							  <div class="controls">
								<textarea class="cleditor" id="product_long_description" name="product_long_description" rows="3"></textarea>
							  </div>
							</div>

							<div class="control-group hidden-phone">
							  <label class="control-label" for="product_short_description">توضیحات کوتاه </label>
							  <div class="controls">
								<textarea class="cleditor" id="product_short_description" name="product_short_description" rows="3"></textarea>
							  </div>
							</div>


							<div class="control-group">
								<label class="control-label" for="brand_name">نام برند</label>
								<div class="controls">
								  <select id="brand_name" name="brand_name" data-rel="chosen">
									@foreach($ManuFacture as $manufacture)
                   					 @if($manufacture->publication_status)
									<option value="{{$manufacture->manufacture_id}}">{{$manufacture->manufacture_name}}</option>
									@endif
									@endforeach
								  </select>
								</div>
							  </div>

							<div class="control-group">
								<label class="control-label" for="category_name">نام دسته بندی</label>
								<div class="controls">
								  <select id="category_name" name="category_name" data-rel="chosen">
								  	@foreach($Category as $category)
                   					 @if($category->publication_status)
									<option value="{{$category->category_id}}">{{$category->category_name}}</option>
									@endif
									@endforeach
								  </select>
								</div>
							  </div>

							<div class="control-group">
								<label class="control-label" for="product_price">قیمت</label>
								<div class="controls">
								  <div class="input-append">
									<input id="product_price" name="product_price" size="16" type="text"><span class="add-on">.00</span>
								  </div>
								  <span class="help-inline">تومان</span>
								</div>
							  </div>

							<div class="control-group">
								<label class="control-label">تصویر محصول</label>
								<div class="controls">
								  <input type="file" name="product_image" id="product_image">
								</div>
							  </div>

							<div class="control-group">
							  <label class="control-label" for="product_colors">رنگبندیها</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" id="product_colors" name="product_colors">
							  </div>
							</div>


							<div class="control-group hidden-phone">
							  <label class="control-label" for="category_publish">وضعیت انتشار</label>
							  <div class="controls">
								<input type="checkbox" class="cleditor" id="publication_status" name="publication_status" checked />
							  </div>
							</div>


							<div class="form-actions">
							  <button type="submit" class="btn btn-success">افزودن محصول </button>
							  <button type="reset" class="btn">انصراف</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

			
    
@endsection