<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Gudangbaja') }}</title>

	<!-- google font -->
	<link href="{{ asset('assets/fonts.googleapis.com/cssbc32.css?family=Open+Sans:400,300,600,700&amp;subset=all') }}" rel="stylesheet" type="text/css" />
	<!-- icons -->
	<link href="{{ asset('assets/fonts/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{ asset('assets/plugins/iconic/css/material-design-iconic-font.min.css') }}">
	<!-- bootstrap -->
	<link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
	<!-- style -->
	<link href="{{ asset('assets/css/pages/theme_style.css') }}" id="rt_style_components" type="text/css" rel="stylesheet" />
	<link href="{{ asset('assets/css/pages/login.css') }}" rel="stylesheet"/>
	<!-- favicon -->
	{{-- <link rel="shortcut icon" href="{{ asset('admin/img/favicon.ico') }}"> /> --}}
</head>

<body>
    <div class="main">
		<!-- Sing in  Form -->
		<section class="sign-in">
			<div class="container">
				<div class="signin-content">
					<div class="signin-image">
						<figure>
                            <img src="{{ asset('assets/img/forgot.jpg') }}" alt="sing up image">
                        </figure>
					</div>
					<div class="signup-form">
						<h2 class="form-title">Kasir Login</h2>
						<form action="{{ route('login.kasir') }}" method="POST" class="register-form" id="register-form">
                            @csrf
							<div class="form-group">
								<div class="">
									<input name="username" type="text" placeholder="User Name" class="form-control input-height" />
								</div>
							</div>
							<div class="form-group">
								<div class="">
									<input name="password" type="password" placeholder="Password" class="form-control input-height" /> 
								</div>
							</div>
							<div class="form-group form-button">
								<button type="submit" class="btn btn-round btn-primary" name="signup" id="register">Login</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</div>
	<!-- start js include path -->
	<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
	<!-- bootstrap -->
	<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/pages/extra-pages/pages.js') }}"></script>
	<!-- end js include path -->
</body>

</html>