<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Micro Admin</title>
    <link rel="shortcut icon" href="{{url('assets/frontend')}}/images/logo2.png" />
	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="{{url('assets/admin')}}/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="{{url('assets/admin')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="{{url('assets/admin')}}/css/bootstrap_limitless.min.css" rel="stylesheet" type="text/css">
	<link href="{{url('assets/admin')}}/css/layout.min.css" rel="stylesheet" type="text/css">
	<link href="{{url('assets/admin')}}/css/components2.min.css" rel="stylesheet" type="text/css">
	<link href="{{url('assets/admin')}}/css/components.min.css" rel="stylesheet" type="text/css">
	<link href="{{url('assets/admin')}}/css/colors.min.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script src="{{url('assets/admin')}}/js/main/jquery.min.js"></script>
	<script src="{{url('assets/admin')}}/js/main/bootstrap.bundle.min.js"></script>
	<script src="{{url('assets/admin')}}/js/plugins/loaders/blockui.min.js"></script>
	<script src="{{url('assets/admin')}}/js/plugins/ui/ripple.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script src="{{url('assets/admin')}}/js/plugins/forms/styling/switchery.min.js"></script>
	<script src="{{url('assets/admin')}}/js/plugins/notifications/noty.min.js"></script>
	<script src="{{url('assets/admin')}}/js/plugins/forms/validation/validate.min.js"></script>
	<script src="{{url('assets/admin')}}/js/plugins/forms/styling/uniform.min.js"></script>
	<script src="{{url('assets/admin')}}/js/plugins/ui/moment/moment.min.js"></script>
	<script src="{{url('assets/admin')}}/js/plugins/ui/prism.min.js"></script>
	<script src="{{url('assets/admin')}}/js/plugins/notifications/sweet_alert.min.js"></script>
	<script src="{{url('assets/admin')}}/js/app.js"></script>
	 
	<script src="{{url('assets/admin')}}/js/demo_pages/navbar_multiple.js"></script>

	<!-- /theme JS files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
	<script>
	var BaseUrl = '{{url('')}}/'; 
	</script>
	<script>
		var setCustomDefaults = function() {
            swal.setDefaults({
                buttonsStyling: false,
				allowOutsideClick: false,
				reverseButtons: true,
				background: '#fff url({{url("assets/admin")}}/images/backgrounds/seamless.png) repeat',
                confirmButtonClass: 'btn btn-primary',
                cancelButtonClass: 'btn btn-light'
            });
        }
        setCustomDefaults();
	
	
	</script>
	<style>
	.fixed-bg {
		/* The background image */
		/* background-image: url("{{url('assets/frontend/css/skins/bg-7.jpg')}}"); */
		/* Set a specified height, or the minimum height for the background image */
		min-height: 500px;
		/* Set background image to fixed (don't scroll along with the page) */
		background-attachment: fixed;
		/* Center the background image */
		background-position: center;
		/* Set the background image to no repeat */
		background-repeat: no-repeat;
		/* Scale the background image to be as large as possible */
		background-size: cover;
		
	}
	</style>
	<script>

		Noty.overrideDefaults({
				theme: 'limitless',
				layout: 'topRight',
				type: 'alert',
				timeout: 2500
			});
		 
		
		function e(type, text){
			 new Noty({
							text: text,
							type: type,
							modal: true
						}).show();
						signOut()
		}
	</script>
	
	<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="navbar-bottom" style="padding-right: 0 !important;">


	<div class="page-content fixed-bg">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center" ng-app="login">

				<!-- Login card -->
				<form class="login-form form-validate" ng-controller="LoginController" ng-submit="sendForm()">
					<div class="card mb-0 shadow-sm login-panel">
						<div class="card-body">
							<div class="text-center mb-3"><br>
								{{-- <img width="80%" src="{{$data['logo']}}" alt=""> --}}
								<h1 class="mb-0 text-primary-800">Dev<br></h1>
								<span class="d-block text-muted">Login to Your credentials</span>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" class="form-control" name="email" ng-model="data.email" placeholder="Email" required>
								<div class="form-control-feedback">
									<i class="icon-user text-primary-800"></i>
								</div>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" class="form-control" ng-model="data.password" name="password" placeholder="Password" required>
								<div class="form-control-feedback">
									<i class="icon-lock2 text-primary-800"></i>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn bg-primary-800 btn-block">Sign in <i class="icon-circle-right2 ml-2"></i></button>
							</div>

							
							<span class="form-text text-center text-muted">By continuing, you're confirming that you've read our <a href="">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
						<p class="text-center text-muted mt-2">© Copyright {{ date('Y') }}</p>
						</div>
					</div>
				</form>
				<!-- /login card -->

			</div>
			<!-- /content area -->
		</div>
		<!-- /main content -->

	</div>

	</div>
<!-- Footer -->
	<div class="navbar navbar-expand-md navbar-light mt-4 fixed-bottom">
		<div class="text-center d-md-none w-100">
			<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-third">
				<i class="icon-menu mr-2"></i>
				Menu
			</button>
		</div>

		{{-- <div class="navbar-collapse collapse" id="navbar-third">
			<span class="navbar-text">
				© 2019. <a href="#">Andrastuff V.3.1</a> member of <a href="http://microdataindonesia.co.id" target="_blank">Microdata Indonesia</a>
			</span>
		</div> --}}
	</div>
	<!-- /footer -->
		
</body>

<!-- Mirrored from demo.interface.club/limitless/demo/bs4/Template/layout_3/LTR/material/full/navbar_multiple_top_bottom.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Oct 2018 14:17:19 GMT -->
</html>
	
	<script src="{{url('/assets/admin')}}/core/angular.min.js"></script>
	<script>
	var app = angular.module('login', []);
	
	app.controller("LoginController", function($scope, $http) {
		
		 
    $scope.sendForm = function (){
      $http({
			method : "POST",
			data : $scope.data,
			url : BaseUrl+"api/auth/login"
		}).then(function mySuccess(response) {
			if(response.status == 200){
				document.cookie = "access_tokenku = "+response.data.access_token;
				window.location.replace(BaseUrl+'admin'); 
				// console.log(document.cookie);
				 new Noty({
						text: response.status,
						type: 'success',
						modal: true
					}).show();
			}else{
				window.location.reload();
			}
		}, function myError(response) {
			 e('info','401 server conection error');
		});
    };
	
	});
</script>
