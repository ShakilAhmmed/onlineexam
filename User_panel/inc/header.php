<?php
include '../Config/Config.php';
include '../Database/Database.php';
include '../Format/Format.php';
include '../Session/Session.php';
Session::checkSession();
spl_autoload_register(function($class){
    include '../Classes/'.$class.".php";
});
if(isset($_GET['action']))
{
	Session::destroy();
}
$setup=new Setup;
$setup_data=$setup->setup_data();
$user=new User;
$email=Session::get("email");
$value=$user->log_user_data($email);
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
<!-- //popup for sign in form -->

<!-- popup for sign up form -->
<div class="modal video-modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModal2">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div id="small-dialog2" class="mfp-hide book-form">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h3>My Profile</h3>
					<form action="#" method="post">
						<input type="text" name="Name" value="<?=$value['name']?>" required=""/>
						<input type="email" name="Email" class="email" value="<?=$value['email']?>" required=""/>
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
			<p><i class="fa fa-map-marker" aria-hidden="true"></i><?=$setup_data['school_address']?></p>
			
		</div>
		<div class="col-md-4 top-middle">
		  <span style="color:green;">Welcome!<?php echo Session::get("name");?></span>
		</div>
		<div class="col-md-4 top-right">
			<a href="index.php?action=logout"><span></span> Logout</a>
			<a href="#" data-toggle="modal" data-target="#myModal2"><span></span> My Profile</a>
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
						<h1><a class="navber-brand" href="index.html"><img src="../Admin_panel/<?=$setup_data['school_logo']?>" height="97px"/><?=$setup_data['school_name']?></a></h1>
					</div>
					<div class="collapse navbar-collapse navbar-right navigation-right" id="bs-example-navbar-collapse-1">
						<nav class="link-effect-3" id="link-effect-3">
							<ul class="nav1 navbar-nav nav nav-wil">
								<li class="active"><a data-hover="Home" href="index.php">Home</a></li>
								<li><a data-hover="Exam" href="#exam" class="scroll">Exam</a>
								<li><a data-hover="Contact" href="#contact" class="scroll">Contact</a></li>
							</ul>
						</nav>
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