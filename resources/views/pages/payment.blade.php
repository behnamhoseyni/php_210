@extends('layout')
@section('feature-items')

<div class="row" style="
border: 1px solid #ccc;
 width: 100%;
 margin: auto;
 padding: 10px;
 text-align: center;
">
	<form method="post" action="{{URL::to('/cart/payment/do')}}">
			{{csrf_field()}}
		<div class="cc-selector">
			<div class="row">
				<div class="col-sm-12 alert alert-success">
				روش پرداخت خود را انتخاب کنید و پرداحت را کلیک کنید
				</div>
			</div>
			<div class='col-sm-3' style="padding: 5px">
	        <input checked="checked" id="zarinpal" type="radio" name="payment_method" value="zarinpal" />
	        <label class="drinkcard-cc zarinpal" for="zarinpal"></label>
			</div>

			<div class='col-sm-3'  style="padding: 5px">
				     <input checked="checked" id="saman" type="radio" name="payment_method" value="saman" />
	        <label class="drinkcard-cc saman" for="saman"></label>
			</div>

			<div class='col-sm-3'  style="padding: 5px">
				  <input checked="checked" id="mellat" type="radio" name="payment_method" value="mellat" />
	        		<label class="drinkcard-cc mellat" for="mellat"></label>
			</div>
			<div class='col-sm-3'  style="padding: 5px">
				  <input checked="checked" id="inhome" type="radio" name="payment_method" value="inhome" />
	        		<label class="drinkcard-cc inhome" for="inhome"></label>
			</div>

			<div class="row">
				<div class="col-sm-12">
				<br>
					<input class="btn btn-success" type="submit" value="پرداخت ">
				</div>
			</div>
		</div>
	</form>
</div>


<section id="cart_items">
		<div class="">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">صفحه ی اصلی</a></li>
				  <li class="active">آیتم سبد خرید : </li>
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
<div class="row">
				<div class="col-sm-5">
					<div class="total_area">
						<ul>
							<li>جمع سبد خرید :{{Cart::subtotal()}}</li>
							<li>مالیات  :{{Cart::tax()}}</li>
							<li>هزینه ی ارسال <span>رایگان</span></li>
							<li>جمع کل  : {{Cart::total()}} </li>
						</ul>
					</div>
				</div>
			</div>
	
@endsection

<style type="text/css">

.cc-selector input{
    margin:0;padding:0;
    -webkit-appearance:none;
       -moz-appearance:none;
            appearance:none;
}

.cc-selector-2 input{
    position:absolute;
    z-index:999;
}

.zarinpal
{
	background-image: url({{asset('/images/banks/zarinpal.jpg')}});
}
.saman
{
	background-image: url({{asset('/images/banks/saman.jpg')}});
}
.mellat
{
	background-image: url({{asset('/images/banks/mellat.jpg')}});
}
.inhome
{
	background-image: url({{asset('/images/banks/cash.png')}});
}
.cc-selector-2 input:active +.drinkcard-cc, .cc-selector input:active +.drinkcard-cc{opacity: .9;}
.cc-selector-2 input:checked +.drinkcard-cc, .cc-selector input:checked +.drinkcard-cc{
    -webkit-filter: none;
       -moz-filter: none;
            filter: none;
}
.drinkcard-cc{
    cursor:pointer;
    background-size:contain;
    background-repeat:no-repeat;
    display:inline-block;
    width:100px;height:70px;
    -webkit-transition: all 100ms ease-in;
       -moz-transition: all 100ms ease-in;
            transition: all 100ms ease-in;
    -webkit-filter: brightness(1.8) grayscale(1) opacity(.7);
       -moz-filter: brightness(1.8) grayscale(1) opacity(.7);
            filter: brightness(1.8) grayscale(1) opacity(.7);
}
.drinkcard-cc:hover{
    -webkit-filter: brightness(1.2) grayscale(.5) opacity(.9);
       -moz-filter: brightness(1.2) grayscale(.5) opacity(.9);
            filter: brightness(1.2) grayscale(.5) opacity(.9);
}

/* Extras */
a:visited{color:#888}
a{color:#444;text-decoration:none;}
p{margin-bottom:.3em;}
* { font-family:Vazir; }
.cc-selector-2 input{ margin: 5px 0 0 12px; }
.cc-selector-2 label{ margin-left: 7px; }
span.cc{ color:#6d84b4 }
</style>