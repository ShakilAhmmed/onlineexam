<?php
include '../Config/Config.php';
include '../Database/Database.php';
include '../Format/Format.php';
spl_autoload_register(function($class){
	include '../Classes/'.$class.".php";
});
$setup=new Setup;
$value=$setup->setup_data();
if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['login']))
{
	$login_data=new Login;
	$login_data->user_login($_POST);
}
?>
<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
<title>Online Examination</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8">
<meta name="keywords" content="Graduation a Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

<!-- default-css-files -->
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<!-- default-css-files -->

<!-- gallery css file-->
<link rel="stylesheet" href="css/lightGallery.css" type="text/css" media="all" />
<!-- //gallery css file-->

<!-- Online fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Titillium+Web:200,200i,300,300i,400,400i,600,600i,700,700i,900" rel="stylesheet">
<!-- //Online fonts -->

<!-- style.css-file -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- //style.css-file -->

<!-- Script-for-nav-scrolling -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script> 
<!-- //Script-for-nav-scrolling -->

<!-- Default-JavaScript-File -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //Default-JavaScript-File -->
</head>
<!-- Head -->
<body>

<!-- banner section -->
<!-- popup for sign in form -->
<div class="modal video-modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModal1">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div id="small-dialog1" class="mfp-hide book-form">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3>Sign In </h3>
					<form action="" method="post">
						<input type="email" name="email" class="email" placeholder="Email" required=""/>
						<input type="password" name="Password" class="password" placeholder="Password" required=""/>	
						<ul>
						<li>
							<input type="checkbox" id="brand1" value="">
							<label for="brand1"><span></span>Remember me</label>
						</li>
						</ul>
						<a href="#">Forgot Password?</a><br>
						<div class="clearfix"></div>
							<input type="submit" name="login" value="Sign In">
					</form>
			</div>
		</div>
	</div>
</div>
<!-- //popup for sign in form -->

<!-- popup for sign up form -->
<div class="modal video-modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModal2">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div id="small-dialog2" class="mfp-hide book-form">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3>Sign Up</h3>
					<form action="" method="post">
					   <span id="msg3"></span>
						<input type="text" name="Name" placeholder="Your Name" id="name" required=""/>
						<input type="email" name="Email" class="email" id="email" placeholder="Email" required=""/>
						<input type="password" name="Password" id="password" class="password" placeholder="Password" required=""/>	
						<span id="msg"></span>
						<input type="password" name="Password" id="confirm_password" class="password" placeholder="Confirm Password" required=""/>
						<span id="msg2"></span>
						<br/>
						<input type="button" class="btn btn-success" value="Sign Up" id="submit">
					</form>
			</div>
		</div>
	</div>
</div>
<!-- //popup for sign up form -->

<!-- TOP HEADER -->
<div class="top">
	<div class="container">
		<div class="col-md-4 top-left">
			<p><i class="fa fa-map-marker" aria-hidden="true"></i><?=$value['school_address']?></p>
		</div>
<!-- 		<div class="col-md-4 top-middle">
			<ul>
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
				<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
				<li><a href="#"><i class="fa fa-vimeo"></i></a></li>
			</ul>
		</div> -->
		<div class="col-md-4 top-right">
			<a href="#" data-toggle="modal" data-target="#myModal1"><span></span> Sign In</a>
			<a href="#" data-toggle="modal" data-target="#myModal2"><span></span> Sign Up</a>
		</div>
		<div class="clearfix"></div>
	</div> 
</div> 
	
<!-- //TOP HEADER -->

		<div class="navigation">
			<div class="container">
				<nav class="navbar navbar-default">
					<div class="navbar-header navbar-left">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
					</div>
					<div class="logo">
						<h1><a class="navber-brand" href="index.php"><img src="../Admin_panel/<?=$value['school_logo']?>" height="97px"/><?=$value['school_name']?></a></h1>
					</div>
				</nav>
			</div>
			<div class="clearfix"></div>
		</div>
<script src="js/jquery.vide.min.js"></script>
	<div data-vide-bg="video/srix">
			
			<div class="w3ls_banner_info">
				<div class="container">
				<div class="w3l-banner-grids">
						<div class="slider">
							<div class="callbacks_container">
								<ul class="rslides" id="slider4">
									<li>
										<div class="w3ls-text">
											<h3>Helping our students</h3>
							                <h3>Fulfill the right potential</h3>
											<p>Cras ultrices lorem a hendrerit condim<i class="fa fa-trophy" aria-hidden="true"></i></p>
										</div>
									</li>
									<li>
										<div class="w3ls-text">
											<h3>Providing safe and</h3>
							                <h3>Educational environment</h3>
											<p>Proin convallis leo vitae ligula portti<i class="fa fa-trophy" aria-hidden="true"></i></p>
										</div>
									</li>
									<li>
										<div class="w3ls-text">
											<h3>Providing our students</h3>
							                <h3>Scholarships and more</h3>
											<p>Cras ultrices lorem a hendrerit condim<i class="fa fa-trophy" aria-hidden="true"></i></p>
										</div>
									</li>
									<li>
										<div class="w3ls-text">
											<h3>Providing Hostel facility</h3>
							                <h3>with  clean & Green</h3>
											<p>Cras ultrices lorem a hendrerit condim<i class="fa fa-trophy" aria-hidden="true"></i></p>
										</div>
									</li>
								</ul>
							</div>
							<script src="js/responsiveslides.min.js"></script>
							<script>
								// You can also use "$(window).load(function() {"
								$(function () {
								  // Slideshow 4
								  $("#slider4").responsiveSlides({
									auto: true,
									pager:true,
									nav:false,
									speed: 500,
									namespace: "callbacks",
									before: function () {
									  $('.events').append("<li>before event fired.</li>");
									},
									after: function () {
									  $('.events').append("<li>after event fired.</li>");
									}
								  });
							
								});
							 </script>
							<!--banner Slider starts Here-->
						</div>
			<div class="clearfix"> </div>
				</div>
					<!--modal-video-->
					<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									Education
									<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
								</div>
									<div class="modal-body">
										<img src="images/12.jpg" alt=" " class="img-responsive" />
										<p>Ut enim ad minima veniam, quis nostrum 
											exercitationem ullam corporis suscipit laboriosam, 
											nisi ut aliquid ex ea commodi consequatur? Quis autem 
											vel eum iure reprehenderit qui in ea voluptate velit 
											esse quam nihil molestiae consequatur, vel illum qui 
											dolorem eum fugiat quo voluptas nulla pariatur.
											<i>" Quis autem vel eum iure reprehenderit qui in ea voluptate velit 
												esse quam nihil molestiae consequatur.</i></p>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
	<!-- //footer --> 

<!-- start-smooth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>	
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
			
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
<!-- //end-smooth-scrolling -->	

<!-- smooth-scrolling-of-move-up -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
<!-- //smooth-scrolling-of-move-up -->   

<!-- For Gallery js files -->
<script src="js/lightGallery.js"></script>
	<script>
    	 $(document).ready(function() {
			$("#lightGallery").lightGallery({
				mode:"fade",
				speed:800,
				caption:true,
				desc:true,
				mobileSrc:true
			});

			$("#password").unbind().keyup(function(){
                  var password=$("#password").val().length;
				if(password>=9)
				{
                  $("#msg").html("<font style=\"color:green;\">Password Strong</font>");
				}
				else
				{
				  $("#msg").html("<font style=\"color:red;\">Password Weak</font>");
				}
			});

			$("#confirm_password").unbind().keyup(function(){
                  var password=$("#password").val();
				  var confirm_password=$("#confirm_password").val();
				if(password==confirm_password)
				{
                  $("#msg2").html("<font style=\"color:green;\">Password Match</font>");
				}else
				{
					$("#msg2").html("<font style=\"color:red;\">Password Not Match</font>");
				}
			});

			$("#submit").unbind().click(function(){
				var name=$("#name").val();
				var email=$("#email").val();
				var password=$("#password").val();
				var confirm_password=$("#confirm_password").val();
				//alert(name+email+password+confirm_password);
				$.ajax({
                    'url':'../Admin_panel/report.php',
                    'type':'post',
                    data:{'name':name,'email':email,'password':password,'confirm_password':confirm_password},
                    success:function(data){
                        //console.log(data);
                        $("#msg3").html(data);
                    }
				});
				
			});
		});
    </script>
<!-- //For Gallery js files -->



	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>