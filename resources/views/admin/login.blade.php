<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- start: Meta -->
	<meta charset="utf-8">
	<title>ورود ادمین</title>
	<meta name="description" content="Bootstrap Metro Dashboard">
	<meta name="author" content="Dennis Ji">
	<meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
	<!-- end: Meta -->
	
	<!-- start: Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- end: Mobile Specific -->
	
	<!-- start: CSS -->
	<link id="bootstrap-style" href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('backend/css/bootstrap-responsive.min.css')}}" rel="stylesheet">
	<link id="base-style" href="{{asset('backend/css/style.css')}}" rel="stylesheet">
	<link id="base-style-responsive" href="{{asset('backend/css/style-responsive.css')}}" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
	<!-- end: CSS -->
	

	<!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<link id="ie-style" href="{{asset('backend/css/ie.css')}}" rel="stylesheet">
	<![endif]-->
	
	<!--[if IE 9]>
		<link id="ie9style" href="{{asset('backend/css/ie9.css')}}" rel="stylesheet">
	<![endif]-->
		
	<!-- start: Favicon -->
	<link rel="shortcut icon" href="{{asset('backend/img/favicon.ico')}}">
	<!-- end: Favicon -->
	
			<style type="text/css">
			body { background: url({{asset('backend/img/bg-login.jpg')}}) !important; }
		</style>
		
		
		
</head>

<body>
		<div class="container-fluid-full">
		<div class="row-fluid">
					
			<div class="row-fluid">
				<div class="login-box">
					<div class="icons">
						<a href="{{URL::to('/')}}"><i class="halflings-icon home"></i></a>
						<a href="#"><i class="halflings-icon cog"></i></a>
					</div>
					<p class="alert-danger" style="text-align: center">
					<?php 
					$msg = Session::get('msg');
						if ($msg) {
							echo $msg;
						}
						Session::put('msg',null);
					?>
					</p>
					<h2>فرم ورود</h2>
					<form class="form-horizontal" action="{{route('admins.dashboard')}}" method="post">

						{{csrf_field()}}
						<fieldset>
							
							<div class="input-prepend" title="Username">
								<span class="add-on"><i class="halflings-icon user"></i></span>
								<input class="input-large span10" name="admin_email" id="admin_email" type="text" placeholder=" نام کاربری یا ایمیل"/>
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Password">
								<span class="add-on"><i class="halflings-icon lock"></i></span>
								<input class="input-large span10" name="admin_password" id="admin_password" type="password" placeholder="رمز"/>
							</div>
							<div class="clearfix"></div>
							
							<label class="remember" for="remember"><input type="checkbox" id="remember" />مرا به خاطر بسپار</label>

							<div class="button-login">	
								<button type="submit" class="btn btn-primary">ورود</button>
							</div>
							<div class="clearfix"></div>
					</form>
					<hr>
					<h3>فراموشی رمز ؟ </h3>
					<p>
						مشکلی نیست ! , <a href="#">کلیک کنید</a>تا رمزتان را بازیابی کنید.
					</p>	
				</div><!--/span-->
			</div><!--/row-->
			

	</div><!--/.fluid-container-->
	
		</div><!--/fluid-row-->
	
	<!-- start: JavaScript-->

		<script src="{{asset('backend/js/jquery-1.9.1.min.js')}}"></script>
	<script src="{{asset('backend/js/jquery-migrate-1.0.0.min.js')}}"></script>
	
		<script src="{{asset('backend/js/jquery-ui-1.10.0.custom.min.js')}}"></script>
	
		<script src="{{asset('backend/js/jquery.ui.touch-punch.js')}}"></script>
	
		<script src="{{asset('backend/js/modernizr.js')}}"></script>
	
		<script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
	
		<script src="{{asset('backend/js/jquery.cookie.js')}}"></script>
	
		<script src="{{asset('backend/js/fullcalendar.min.js')}}" ></script>
	
		<script src="{{asset('backend/js/jquery.dataTables.min.js')}}" ></script>

		<script src="{{asset('backend/js/excanvas.js')}}"></script>
	<script src="{{asset('backend/js/jquery.flot.js')}}"></script>
	<script src="{{asset('backend/js/jquery.flot.pie.js')}}"></script>
	<script src="{{asset('backend/js/jquery.flot.stack.js')}}"></script>
	<script src="{{asset('backend/js/jquery.flot.resize.min.js')}}"></script>
	
		<script src="{{asset('backend/js/jquery.chosen.min.js')}}"></script>
	
		<script src="{{asset('backend/js/jquery.uniform.min.js')}}"></script>
		
		<script src="{{asset('backend/js/jquery.cleditor.min.js')}}"></script>
	
		<script src="{{asset('backend/js/jquery.noty.js')}}"></script>
	
		<script src="{{asset('backend/js/jquery.elfinder.min.js')}}"></script>
	
		<script src="{{asset('backend/js/jquery.raty.min.js')}}"></script>
	
		<script src="{{asset('backend/js/jquery.iphone.toggle.js')}}"></script>
	
		<script src="{{asset('backend/js/jquery.uploadify-3.1.min.js')}}"></script>
	
		<script src="{{asset('backend/js/jquery.gritter.min.js')}}"></script>
	
		<script src="{{asset('backend/js/jquery.imagesloaded.js')}}"></script>
	
		<script src="{{asset('backend/js/jquery.masonry.min.js')}}"></script>
	
		<script src="{{asset('backend/js/jquery.knob.modified.js')}}"></script>
	
		<script src="{{asset('backend/js/jquery.sparkline.min.js')}}"></script>
	
		<script src="{{asset('backend/js/counter.js')}}"></script>
	
		<script src="{{asset('backend/js/retina.js')}}"></script>

		<script src="{{asset('backend/js/custom.js')}}"></script>
	<!-- end: JavaScript-->
	
</body>
</html>
