@extends('admin.layout')
@section('admin_area')

		<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="{{URL::to('/admin/dashboard')}}">پیشخوان</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="{{URL::to('/admin/product/all')}}">همه ی محصولات</a></li>
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
						<h2><i class="halflings-icon user"></i><span class="break"></span>همه ی محصولات</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>

							  	  <th>آیدی</th>
								  <th> نام</th>
								  <td> قیمت</td>
								  <td> دسته</td>
								  <td> برند</td>
								  <th> وضعیت</th>
								  <td> تصویر</td>
								  <th>عملیات</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($Products as $product)
							<tr>
								<td>{{ $product->id}}</td>
								<td class="center">{{ $product->product_name}}</td>
								<td class="center">{{ $product->product_price}}</td>
								<td class="center">{{ $product->categories->category_name}}</td>
								<td class="center">{{ $product->manu_factures->manufacture_name}}</td>
								<td class="center">
									@if($product->publication_status)
									<span class="label label-success">فعال</span>
									@else
									<span class="label label-unsuccess">غیرفعال</span>
									@endif 


								</td>
								<td class="center">
									<img style="height: 100px;width: 100px" src="{{URL::to($product->product_image)}}">
								</td>
								<td class="center">
									
									@if($product->publication_status)
									<a class="btn btn-unsuccess" href="{{URL::to('/admin/product/'.$product->id.'/unactive')}}">
										<i class="halflings-icon white remove"></i>  
									</a>
									@else
									<a class="btn btn-success" href="{{URL::to('/admin/product/'.$product->id.'/active')}}">
										<i class="halflings-icon white ok"></i>  
									</a>
									@endif
									


									<a class="btn btn-info" href="{{URL::to('/admin/category/'.$product->id.'/edit')}}">
										<i class="halflings-icon white edit"></i>  
									</a>

									<a 
									class="btn btn-danger" 
									href="{{URL::to('/admin/product/'.$product->id.'/delete')}}"
									onclick="return confirm('آیا مطمئن هستید ؟  ')"
									>
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							@endforeach
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
@endsection