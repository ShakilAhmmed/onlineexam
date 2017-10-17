<?php

 include 'inc/header.php';
?>
<!-- //banner section -->
<!-- services -->
<!-- Admission form -->

    <div class="admission" id="exam">
	   <div class="container">
	   <div class="heading">
			<h3>Attend Exam</h3>
		</div>
			<p>Terms And Condition</p>
				<div class="col-md-6 admission_left">
                    
                  <div class="clearfix"> </div>
            </div>
            <div class="col-md-6 admission_right">
            <a href="exam.php">
	            <button class="course-submit">Start Exam</button>	
	   	   </div>	                            
	   	   </div>
	   	</div>
	 <div class="clearfix"> </div>	
<!-- //Admission form -->



<!-- subscribe section -->
<div class="subscribe"> 
	<div class="container"> 
		<div class="heading">
			<h3>Subscribe</h3>
			<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
		<form action="#" method="post"> 
			<input type="email" name="email" placeholder="Enter your email..." required="">
			<input type="submit" value="Subscribe">
		</form>
	</div>
</div>
<!-- //subscribe section -->

<!-- contact section -->
<div class="contact" id="contact"> 
	<div class="container"> 
		<div class="heading">
			<h3>Contact</h3>
			<h5>Need Help<span>?</span>   Make a call</h5>
			<h4>+010 32190765</h4>
		</div>
			<form action="#" method="post">
                <div class="col-lg-4 col-md-4 col-sm-4">
					<div class="control-group form-group">
						<div class="controls">
                            <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name." placeholder="Your Name*"><i class="fa fa-user" aria-hidden="true"></i>
                            <p class="help-block"></p>
                        </div>
                    </div>
                </div>
				<div class="col-lg-4 col-md-4 col-sm-4">	
                    <div class="control-group form-group">
                        <div class="controls">
                            <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address." placeholder="Email*"><i class="fa fa-envelope" aria-hidden="true"></i>
                        </div>
                    </div>
				</div>
                <div class="col-lg-4 col-md-4 col-sm-4">
					<div class="control-group form-group">
						<div class="controls">
                            <input type="text" class="form-control" id="name1" required data-validation-required-message="Please enter your phone number." placeholder="Phone number*"><i class="fa fa-phone" aria-hidden="true"></i>
                            <p class="help-block"></p>
                        </div>
                    </div>
                </div>
				<div class="clearfix"></div>
				<div class="col-lg-12 col-md-12 col-sm-12">	
                    <div class="control-group form-group">
                        <div class="controls">
                            <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none" placeholder="Message*"></textarea>
                        </div>
                    </div>
				</div>	
                <div id="success"></div>
                <!-- For success/fail messages -->
                <div class="col-lg-12 col-md-12 col-sm-12 center">    
					<button type="submit" class="btn btn-primary">Send Message</button>
				</div>
				<div class="clearfix"></div>	
            </form>
	</div>
</div>
<!-- //contact section -->

<!-- map -->
<div class="map">
	<iframe class="googlemaps" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d380510.6741687111!2d-88.01234121699822!3d41.83390417061058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1455598377120" style="border:0" allowfullscreen></iframe>
</div>
<!-- /map -->

<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="footer-left">
				<p>© 2017 Graduation . All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
			</div>
			<div class="footer-right"> 
				<div class="wthree-icon">
					<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
					<a href="#" class="facebook"><i class="fa fa-facebook"></i></a> 
					<a href="#" class="google"><i class="fa fa-google-plus"></i></a> 
				</div>  
			</div>
			<div class="clearfix"> </div>
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
		});
    </script>
<!-- //For Gallery js files -->



	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>