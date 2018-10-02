@extends('layout')
@section('feature-items')

		<div class="">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">صفحه اصلی</a></li>
				  <li class="active">اطلاعات ارسال</li>
				</ol>
			</div><!--/breadcrums-->
			<div class="register-req">
				<p>فرم زیر را با اطلاعات پستی خود پر کنید</p>
			</div><!--/register-req-->
			@if($errors->count())
					<ul>
								@foreach($errors->all() as $error)
									 <p class="alert alert-success">{{ $error }}</p>
								@endforeach
					</ul>
					@endif

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-3">
						<div class="shopper-info">
							<p>اطلاعات ارسال : </p>

							<form action="{{URL::to('/cart/shipping/save')}}" method="post">

								{{csrf_field()}}
								
								<input type="text" placeholder="نام گیرنده " id="shipping_name"
								name="shipping_name">
								<input type="text" placeholder="آدرس پستی " id="shipping_address" name="shipping_address">
								<input type="text" placeholder="شماره تماس " id="shipping_tel" name="shipping_tel">
								<input type="email" placeholder="ایمیل" id="shipping_email" name="shipping_email">
								<input type="submit" value="انجام" class="btn btn-default" />
							</form>
							
						</div>
					</div>	
				</div>
			</div>

			<div class="review-payment">
				<h2>Review & Payment</h2>
			</div>

			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					@foreach(Cart::content() as $cart)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to($cart->options->image)}}" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$cart->name}}</a></h4>
							</td>
							<td class="cart_price">
								<p>{{$cart->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="

									{{URL::to('/cart/'.$cart->rowId.'/increment')}}
									"> + </a>
									<input disabled="disabled" class="cart_quantity_input" type="text" name="quantity" value="{{$cart->qty}}" autocomplete="off" size="2">
									<a class="cart_quantity_down" href="
									{{URL::to('/cart/'.$cart->rowId.'/decrement')}}
									"> - </a>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$cart->price}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<div class="payment-options">
					<span>
						<label><input type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input type="checkbox"> Check Payment</label>
					</span>
					<span>
						<label><input type="checkbox"> Paypal</label>
					</span>
				</div>
		</div>

@endsection