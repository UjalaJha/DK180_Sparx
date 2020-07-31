<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign up</title>
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
            <form class="login100-form validate-form" action="/company_register" method="post">
                @csrf
                <span class="login100-form-title p-b-49">
							Sign Up
						</span>


                <div class="wrap-input100 validate-input m-b-23" data-validate = "Name is required">
                    <span class="label-input100">Company Name</span>
                    <input class="input100" type="text" required name="company_name" placeholder="Company name">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-23" data-validate = "Website is required">
                    <span class="label-input100">Company Website</span>
                    <input class="input100" type="text" required name="company_website" placeholder="Company Website">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-23" data-validate = "Industry is required">
                    <span class="label-input100">Company Industry</span>
                    <input class="input100" type="text" required name="company_industry" placeholder="Company Industry">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-23" data-validate = "Size is required">
                    <span class="label-input100">Company Size</span>
                    <input class="input100" type="text" required name="company_size" placeholder="Company Size">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-23" data-validate = "Headquarters is required">
                    <span class="label-input100">Company Headquarters</span>
                    <input class="input100" type="text" required name="company_headquarters" placeholder="Company Headqaurters">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-23" data-validate = "Founded Year is required">
                    <span class="label-input100">Company Founded Year</span>
                    <input class="input100" type="text" required name="company_founded_year" placeholder="Company Founded Year">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-23" data-validate = "Company Linkedin is required">
                    <span class="label-input100">Company Linkedin Profile</span>
                    <input class="input100" type="text" required name="company_linkedin" placeholder="Company Linkedin Profile">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>


                <div class="wrap-input100 validate-input m-b-23" data-validate = "Email is required">
                    <span class="label-input100">Company Email</span>
                    <input class="input100" type="email" required name="company_email" placeholder="Type your email-id">
                    <span class="focus-input100" data-symbol="&#xf206;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <span class="label-input100">Company Password</span>
                    <input class="input100" type="password" required name="company_password" placeholder="Type your password">
                    <span class="focus-input100" data-symbol="&#xf190;"></span>
                </div>

                <div class="text-right p-t-8 p-b-31">

                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn" type="submit">
                            Register
                        </button>
                    </div>
                </div>

                <div class="txt1 text-center p-t-54 p-b-20">
							<span>
								Or Sign Up Using
							</span>
                </div>

                <div class="flex-c-m">
                    <a href="#" class="login100-social-item bg1">
                        <i class="fa fa-facebook"></i>
                    </a>

                    <a href="#" class="login100-social-item bg2">
                        <i class="fa fa-twitter"></i>
                    </a>

                    <a href="#" class="login100-social-item bg3">
                        <i class="fa fa-google"></i>
                    </a>
                </div>

                <div class="flex-col-c p-t-155">
							<span class="txt1 p-b-17">
								Already signed up?
							</span>

                    <a href="login.html" class="txt2">
                        Login
                    </a>
                </div>


                <div class="txt1 text-center p-t-54 p-b-20">

                    <a href="index.html" class="txt2">
                        Go back to Home
                    </a>
                </div>


            </form>
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