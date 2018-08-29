@extends('layout')
@section('feature-items')


	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>وارد شوید</h2>

						<form action="{{URL::to('/customer/login')}}" method="post">
							{{csrf_field()}}
							<input type="text" placeholder="ایمیل یا نام کاربری" id="customer_email" name="customer_email" />
							<input type="password" placeholder="رمز" id="customer_password" name="customer_password"  />
							<span>
								<input type="checkbox" class="checkbox"> 
								من را بخاطر بسپار
							</span>
							<button type="submit" class="btn btn-default">ورود</button>
						</form>

					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">یا</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>ثبت نام مشتری جدید ! </h2>

						<form action="{{URL::to('/customer/register')}}" method="post">
							{{csrf_field()}}
							<input type="text" placeholder="نام و نام خانوادگی" id="customer_name" name="customer_name" />
							<input type="email" placeholder="ایمیل" id="customer_email" name="customer_email" />
							<input type="number" placeholder="شماره تماس " id="customer_tel" name="customer_tel" />
							<input type="password" placeholder="رمز" id="customer_password" name="customer_password" />
							<button type="submit" class="btn btn-default">ثبت نام</button>
						</form>

					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
	
@endsection