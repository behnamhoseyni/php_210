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
					<a href="{{URL::to('/admin/slider/add')}}">افزودن اسلایدر</a>
				</li>
			</ul>

				<?php 
						// Alert for success add new Category
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
						<h2><i class="halflings-icon edit"></i><span class="break"></span>افزودن اسلایدر جدید</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					
					<div class="box-content">
						<form class="form-horizontal" action="{{URL::to('/admin/slider/save')}}" method="POST"  enctype="multipart/form-data">
							{{csrf_field()}}
						  <fieldset>

						  	<div class="control-group">
								<label class="control-label" for="slider_title">عنوان </label>
								<div class="controls">
								  <input type="text" name="slider_title" id="slider_title">
								</div>
							</div>

						  	<div class="control-group">
								<label class="control-label" for="slider_link">لینک دکمه  </label>
								<div class="controls">
								  <input type="text" name="slider_link" id="slider_link">
								</div>
							</div>


						  	<div class="control-group">
								<label class="control-label" for="slider_button_lable">برچسب دکمه </label>
								<div class="controls">
								  <input type="text" name="slider_button_lable" id="slider_button_lable">
								</div>
							</div>

					  		<div class="control-group">
							  <label class="control-label" for="slider_description">توضیحات  </label>
							  <div class="controls">
								<textarea class="cleditor" id="slider_description" name="slider_description" rows="3"></textarea>
							  </div>
							</div>

							<div class="control-group">
								<label class="control-label" for="slider_image">تصویر اسلایدر </label>
								<div class="controls">
								  <input type="file" name="slider_image" id="slider_image">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="slider_off_image">تصویر تخفیف اسلایدر </label>
								<div class="controls">
								  <input type="file" name="slider_off_image" id="slider_off_image">
								</div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="publication_status">وضعیت انتشار</label>
							  <div class="controls">
								<input type="checkbox" class="cleditor" id="publication_status" name="publication_status" checked />
							  </div>
							</div>

							
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">افزودن اسلایدر</button>
							  <button type="reset" class="btn">انصراف</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

			
    
@endsection