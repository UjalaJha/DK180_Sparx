<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../landingassets/static/images/icons/favicon.ico"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../landingassets/static/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../landingassets/static/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../landingassets/static/fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../landingassets/static/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../landingassets/static/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../landingassets/static/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../landingassets/static/vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../landingassets/static/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../landingassets/static/css/util.css">
	<link rel="stylesheet" type="text/css" href="../landingassets/static/css/main.css">
	<!--===============================================================================================-->
</head>
<body>

<div class="limiter">
	<div class="container-login100" style="background-image: url('../landingassets/static/images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
			<!-- <form class="login100-form validate-form"> -->
			<span class="login100-form-title p-b-49">
						Admin Login
					</span>
			<form method="post" action="/admin_login">
				@csrf

				<div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
					<span class="label-input100">Username/Email</span>
					<input class="input100" type="email" required name="admin_email" value="admin@hireconnect.com" placeholder="Type your email">
					<span class="focus-input100" data-symbol="&#xf206;"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate="Password is required">
					<span class="label-input100">Password</span>
					<input class="input100" type="password" required name="admin_password" value="abc123" placeholder="Type your password">
					<span class="focus-input100" data-symbol="&#xf190;"></span>
				</div>

				<div class="text-right p-t-8 p-b-31">
					<a href="#">
						Forgot password?
					</a>
				</div>

				<div class="container-login100-form-btn">
					<div class="wrap-login100-form-btn">
						<div class="login100-form-bgbtn"></div>

						<button class="login100-form-btn" type="submit">
							Login
						</button>
						

					</div>
				</div><br>

			</form>

				
			<!-- </form> -->
		</div>
	</div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="static/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="static/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="static/vendor/bootstrap/js/popper.js"></script>
<script src="static/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="static/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="static/vendor/daterangepicker/moment.min.js"></script>
<script src="static/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="static/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="static/js/main.js"></script>

</body>
</html>