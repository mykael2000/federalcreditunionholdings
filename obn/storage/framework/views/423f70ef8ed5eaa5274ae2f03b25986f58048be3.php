<!DOCTYPE html>
<html lang="en">
<head>
<title> Federal First Capital Union  - ACCOUNT - CREATION</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="html.design">
<!-- description -->
<meta name="description" content="Wizard Form with Validation - Responsive">
<link rel="shortcut icon" href="<?php echo e(asset('img/158974683872702247.png')); ?>">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?php echo e(asset('dist/css/bootstrap.min.css')); ?>">
<!-- Fontawesome CSS -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css">
<!-- Fonts and icons -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700" rel="stylesheet">
<!-- Reset CSS -->
<link rel="stylesheet" href="<?php echo e(asset('dist/css/reset.css')); ?>">
<!-- Style CSS -->
<link rel="stylesheet" href="<?php echo e(asset('dist/css/style.css')); ?>">
<!-- Responsive  CSS -->
<link rel="stylesheet" href="<?php echo e(asset('dist/css/responsive.css')); ?>">
</head>
<body>

<div class="wizard-main">
	<div id="particles-js"></div>
	<div class="container">

		<div class="row">
			<div class="col-lg-6 banner-sec">
				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>

					</ol>
					<div class="carousel-inner" role="listbox">

						<div class="carousel-item active">
							<img class="d-block img-fluid" src="<?php echo e(asset('dist/images/slider-02.jpg')); ?>" alt="First slide">
							<div class="carousel-caption d-none d-md-block">
								<div class="banner-text">
									<h2>Get Started Today</h2>
									<p>Hurry and signup with us today! to enjoy all the awesome features our bank provides for you to save your money and run multiple successful bank transactions with ease</p>
								</div>
							</div>
						</div>
						<div class="carousel-item">
							<img class="d-block img-fluid" src="<?php echo e(asset('dist/images/slider-03.jpg')); ?>" alt="First slide">
							<div class="carousel-caption d-none d-md-block">
								<div class="banner-text">
									<h2>Join Our Family</h2>
									<p>We treat and respect everyone in our bank as family and not just as customers/clients. We appreciate and work on every suggestion or contributions from anyone using our bank. </p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 login-sec">
				<div class="login-sec-bg">
					<h2 class="text-center text-dark">Account Information</h2>
					<form method="post" id="example-advanced-form" action="<?php echo e(route('user.register')); ?>" style="display: none;">
                    <?php echo csrf_field(); ?>
						<h3>Account</h3>
						<fieldset class="form-input">

							<h4>Account Information</h4>


                            <div class="form-group">

                                <label for="accountType">Account Type *</label>
                                <select id="accountType" name="account_type" class="form-control required">
                                    <option value="">-- Choose --</option>
                                    <option>Savings Account</option>
                                    <option>Fixed Deposit Account</option>
                                    <option>Equity Account</option>
                                    <option>Offshore Account</option>
                                    <option>Checking Account</option>
                                    <option>Domiciliary Account</option>
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="userName">User name *</label>
							    <input id="userName" name="user_name" type="text" class="form-control required">
                            </div>

                            <div class="form-group">
                                <label for="password">Password *</label>
							    <input id="password" name="password" type="password" class="form-control required">
                            </div>

                            <div class="form-group">
                                <label for="confirm">Confirm Password *</label>
							    <input id="confirm" name="password_confirmation" type="password" class="form-control required">
                            </div>

							<p>(*) Mandatory</p>
						</fieldset>

						<h3>Profile</h3>
						<fieldset class="form-input" style="overflow: auto;">

							<h4>Profile Information</h4>

                            <label for="name">First name *</label>
                            <input id="name" name="first_name" type="text" class="form-control required">

                            <label for="surname">Last name *</label>
                            <input id="surname" name="last_name" type="text" class="form-control required">

                            <label for="email">Email *</label>
                            <input id="email" name="email" type="text" class="form-control required email">

                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control required">

                            <label for="address">Address</label>
                            <input id="address" name="address" type="text" class="form-control">

                            <label for="age">Age (The warning step will show up if age is less than 18) *</label>
                            <input id="age" name="age" type="text" class="form-control required number">

							<p>(*) Mandatory</p>

						</fieldset>

						<h3>Warning</h3>
						<fieldset class="form-input">
							<h4>You are to young</h4>

							<p>Please go away ;-)</p>
						</fieldset>

						<h3>Finish</h3>
						<fieldset class="form-input">
							<h4>Terms and Conditions</h4>

							<input id="acceptTerms-2" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
						</fieldset>
					</form>
				</div>
			</div>
		</div>

	</div>
</div>

<!-- jquery latest version -->
<script src="<?php echo e(asset('dist/js/jquery.min.js')); ?>"></script>
<!-- popper.min.js -->
<script src="<?php echo e(asset('dist/js/popper.min.js')); ?>"></script>
<!-- bootstrap js -->
<script src="<?php echo e(asset('dist/js/bootstrap.min.js')); ?>"></script>
<!-- jquery.steps js -->
<script src='https://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js'></script>
<script src="<?php echo e(asset('dist/js/jquery.steps.js')); ?>"></script>
<!-- particles js -->
<script src="<?php echo e(asset('dist/js/particles.js')); ?>"></script>
<script type="text/javascript">
	$(document).ready(function() {
		particlesJS("particles-js",
			{
			  "particles": {
				"number": {
				  "value": 160,
				  "density": {
					"enable": true,
					"value_area": 800
				  }
				},
				"color": {
				  "value": "#ffffff"
				},
				"shape": {
				  "type": "circle",
				  "stroke": {
					"width": 0,
					"color": "#000000"
				  },
				  "polygon": {
					"nb_sides": 5
				  },
				  "image": {
					"src": "img/github.svg",
					"width": 100,
					"height": 100
				  }
				},
				"opacity": {
				  "value": 1,
				  "random": true,
				  "anim": {
					"enable": true,
					"speed": 1,
					"opacity_min": 0,
					"sync": false
				  }
				},
				"size": {
				  "value": 3,
				  "random": true,
				  "anim": {
					"enable": false,
					"speed": 4,
					"size_min": 0.3,
					"sync": false
				  }
				},
				"line_linked": {
				  "enable": false,
				  "distance": 150,
				  "color": "#ffffff",
				  "opacity": 0.4,
				  "width": 1
				},
				"move": {
				  "enable": true,
				  "speed": 1,
				  "direction": "none",
				  "random": true,
				  "straight": false,
				  "out_mode": "out",
				  "bounce": false,
				  "attract": {
					"enable": false,
					"rotateX": 600,
					"rotateY": 600
				  }
				}
			  },
			  "interactivity": {
				"detect_on": "canvas",
				"events": {
				  "onhover": {
					"enable": true,
					"mode": "bubble"
				  },
				  "onclick": {
					"enable": true,
					"mode": "repulse"
				  },
				  "resize": true
				},
				"modes": {
				  "grab": {
					"distance": 400,
					"line_linked": {
					  "opacity": 1
					}
				  },
				  "bubble": {
					"distance": 250,
					"size": 0,
					"duration": 2,
					"opacity": 0,
					"speed": 3
				  },
				  "repulse": {
					"distance": 400,
					"duration": 0.4
				  },
				  "push": {
					"particles_nb": 4
				  },
				  "remove": {
					"particles_nb": 2
				  }
				}
			  },
			  "retina_detect": true
			}
    	);
	});
</script>

<script>
	var form = $("#example-advanced-form").show();

	form.steps({
		headerTag: "h3",
		bodyTag: "fieldset",
		transitionEffect: "slideLeft",
		onStepChanging: function (event, currentIndex, newIndex)
		{
			// Allways allow previous action even if the current form is not valid!
			if (currentIndex > newIndex)
			{
				return true;
			}
			// Forbid next action on "Warning" step if the user is to young
			if (newIndex === 3 && Number($("#age").val()) < 5)
			{
				return false;
			}
			// Needed in some cases if the user went back (clean up)
			if (currentIndex < newIndex)
			{
				// To remove error styles
				form.find(".body:eq(" + newIndex + ") label.error").remove();
				form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
			}
			form.validate().settings.ignore = ":disabled,:hidden";
			return form.valid();
		},
		onStepChanged: function (event, currentIndex, priorIndex)
		{
			// Used to skip the "Warning" step if the user is old enough.
			if (currentIndex === 2 && Number($("#age").val()) >= 5)
			{
				form.steps("next");
			}
			// Used to skip the "Warning" step if the user is old enough and wants to the previous step.
			// if (currentIndex === 2 && priorIndex === 3)
			// {
			// 	form.steps("previous");
			// }
		},
		onFinishing: function (event, currentIndex)
		{
			form.validate().settings.ignore = ":disabled";
			return form.valid();
		},
		onFinished: function (event, currentIndex)
		{
			form.submit();
		}
	}).validate({
		errorPlacement: function errorPlacement(error, element) { element.before(error); },
		rules: {
			confirm: {
				equalTo: "#password"
			}
		}
	});
</script>

</body>
</html>
<?php /**PATH /home/decoinex/federalfirstcapitalunion.com/obn/resources/views/auth/register.blade.php ENDPATH**/ ?>