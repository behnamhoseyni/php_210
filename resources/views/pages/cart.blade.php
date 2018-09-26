@extends('layout')

@section('feature-items')
	<section id="cart_items">
		<div class="">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">صفحه  اصلی </a></li>
				  <li class="active">سبد خرید</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">تصویر </td>
							<td class="image">نام </td>
							<td class="price">قیمت</td>
							<td class="quantity">تعداد</td>
							<td class="total">جمع</td>
							<td class="actions"> عملیات</td>
						</tr>
					</thead>
					<tbody>

						@foreach(Cart::content() as $cart)

						<tr>
							<td class="cart_image">
								<a href=""><img
									style="height: 100px;width: 100px;"
								 src="{{URL::to($cart->options->image)}}" alt=""></a>
							</td>
							<td class="cart_name">
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
								<p class="cart_total_price">{{$cart->total}}</p>
							</td>
							<td class="cart_delete" style="
							transform: translateY(+100%);
							text-align: center;
							">
								<a class="cart_quantity_delete"
								style="background-color: #cc4f59;" 
								href="{{URL::to('/cart/delete/item/'.$cart->rowId)}}"
								onclick="return confirm('آیا مطمئن هستید ؟  ')"
								 >
									<i class="fa fa-times"></i></a>
							</td>
						</tr>

						@endforeach

					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>مجموع سبد خرید</h3>
				<p>اینجا میتوانید مجموع سبد خود را ببینید:</p>
			</div>
			<div class="row">
				<div class="col-sm-5">
					<div class="total_area">
						<ul>
							<li>مجموع سبد :{{Cart::subtotal()}}</li>
							<li>مالیات :{{Cart::tax()}}</li>
							<li>هزینه ی ارسال <span>رایگان</span></li>
							<li>جمع کل سبد خرید : {{Cart::total()}} </li>
						</ul>
							<a class="btn btn-default check_out" href="{{URL::to('/cart/checkout')}}">مرحله ی بعدی خرید</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
@endsection