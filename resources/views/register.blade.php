@extends('base')
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
	@section('content')
		<div class="limiter">
			<div class="container-login100">
				<div class="wrap-login100">
					<div class="login100-pic js-tilt" data-tilt>
						<img src="images/register.jpg" alt="IMG">
					</div>

					<form class="login100-form validate-form" method="post" action="register">
						<span class="login100-form-title">
							Member Registration
						</span>

						@csrf

						<div class="wrap-input100 validate-input" data-validate = "Field is required">
							<input class="input100" type="text" name="fname" placeholder="Firstname">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-user-circle" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Field is required">
							<input class="input100" type="text" name="lname" placeholder="Lastname">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-user-o" aria-hidden="true"></i>
							</span>
						</div>


						<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
							<input class="input100" type="text" name="email" placeholder="Email">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Password is required">
							<input class="input100" type="password" name="password" placeholder="Password">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
						</div>


						<div class="wrap-input100 validate-input" data-validate = "Password is required">
							<input class="input100" type="password" name="password_confirmation" placeholder="Re-Type Password">
							<span class="focus-input100"></span>
							<span class="symbol-input100">
								<i class="fa fa-lock" aria-hidden="true"></i>
							</span>
						</div>

						<div class="wrap-input100 validate-input" data-validate = "Field is required">
							<label>Account Type: </label>
							<select name="used_as">
								<option>---------------</option>
								<option value="teacher">Teacher</option>
								<option value="student">Student</option>
							</select>
							<span class="focus-input100"></span>
						</div>
						
						<div class="container-login100-form-btn">
							<button class="login100-form-btn" type="submit">
								Register
							</button>
						</div>

						<div class="text-center p-t-12">
							<span class="txt1">
								Forgot
							</span>
							<a class="txt2" href="#">
								Username / Password?
							</a>
						</div>

						<div class="text-center p-t-136">
							<a class="txt2" href="index.html">
								Already have Account
								<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	
	

	
<!--===============================================================================================-->	
	<script src="{{ URL::to('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::to('vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ URL::to('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ URL::to('vendor/select2/select2.min.js') }} "></script>
<!--===============================================================================================-->
	<script src="{{ URL::to('vendor/tilt/tilt.jquery.min.js') }}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
@stop
</body>
</html>