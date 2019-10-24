
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
		<link rel="shortcut icon" href="img/logo.png"/>
        <title>Digital Fish Farming</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
		<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
		<script src="https://use.fontawesome.com/cdbafd109d.js"></script>
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" href="css/slicknav.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style_index.css">
        <link rel="stylesheet" href="css/responsive.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body>
		<div >
            <div class="logo"></div>
            <!--<div id="loader">
            </div>-->
        </div>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		
		
		<div class="header_area fix">
			<div class="container">
				<div class="row head_padding">
					<div class="col-md-2">
						<div class="offers">
							<p>Latest Offers</p>
						</div>
					</div>
					<div class="col-md-9">
						<div class="offers_text">
							<marquee scrollamount="3"><p>There is 10% discount!</p></marquee>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		<div id="sticker" class="mainmenu_area">
			<div class="container">
				<div class="row">
					<div class="col-md-2">
						<div class="logo">
							<a href="index.php"><img src="img/logo123.png" alt="Logo" /></a>
						</div>
					</div>
					<div class="col-md-10">
						<div class="mainmenu">
							<ul id="nav">
								<li><a href="index.php">Home</a></li>
								<li><a href="index.php">about us</a></li>
								<?php
								session_start();
									if (@$_SESSION['user_login'] == TRUE) {
								?>
								<li><a href="bid-board.php">Bid Board</a></li>
							<?php }?>
								<li><a href="#gellery">Gellary</a></li>
								<li><a href="#contact">contact Us</a></li>
								<li><a href="blog.php">Blogs</a></li>
								<?php
								if (@$_SESSION['user_login'] != TRUE) {
								?>
								<li><a href="login.php">Login</a></li>
								<li><a href="user-registration.php">Registration</a></li>
							<?php }else{?>
								<li><a href="logout.php">Logout</a></li>
							<?php }?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="slider_area">
			<div class="slider_list owl-carousel">
				<div class="single_slide single_slide_bg_1">
					
				</div>
				<div class="single_slide single_slide_bg_2">
					
				</div>
				<div class="single_slide single_slide_bg_3">
					
				</div>
				<div class="single_slide single_slide_bg_4">
					
				</div>
				<div class="single_slide single_slide_bg_5">
					
				</div>
			</div>
		</div>
		<div class="exclusive_cars_area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="page_title">
							<h2>Big Fish Collections</h2>
						</div>
					</div>
					<div class="exclusive_cars_list">
						<div class="col-md-4 single_exclusive_car">						
							<div class="exclusive_car">
								<div class="exclusive_car_bg exclusive_car_bg1"></div>
							</div>
							<div class="exclusive_car_content">
								<h2>Lorem Ipsum is not simply random text. </h2>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
							</div>
							<a href="" class="btn_detais">Details <i class="fa fa-angle-right"></i></a>
						</div>
						<div class="col-md-4 single_exclusive_car">						
							<div class="exclusive_car">
								<div class="exclusive_car_bg exclusive_car_bg2"></div>
							</div>
							<div class="exclusive_car_content">
								<h2>Lorem Ipsum is not simply random text. </h2>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
							</div>
							<a href="" class="btn_detais">Details <i class="fa fa-angle-right"></i></a>
						</div>
						<div class="col-md-4 single_exclusive_car">						
							<div class="exclusive_car">
								<div class="exclusive_car_bg exclusive_car_bg3"></div>
							</div>
							<div class="exclusive_car_content">
								<h2>Lorem Ipsum is not simply random text. </h2>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
							</div>
							<a href="" class="btn_detais">Details <i class="fa fa-angle-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="new_cars_area">
			<div class="container">
				<div class="row">
					<div class="page_title">
						<h2>Best Selling Fish</h2>
					</div>
					<div class="new_car_list owl-carousel">
						<div class="single_new_car ">
							<img src="img/img22.jpg" alt="New Car" class="image">
								<div class="overlay">
									<a href="" class="btn_view">View More <i class="fa fa-angle-right"></i></a>
								</div>
						</div>
						<div class="single_new_car">
							<img src="img/img25.jpeg" alt="New Car" class="image">
								<div class="overlay">
									<a href="" class="btn_view">View More <i class="fa fa-angle-right"></i></a>
								</div>
						</div>
						<div class="single_new_car">
							<img src="img/img26.jpg" alt="New Car" class="image">
								<div class="overlay">
									<a href="" class="btn_view">View More <i class="fa fa-angle-right"></i></a>
								</div>
						</div>
						<div class="single_new_car">
							<img src="img/img24.jpg" alt="New Car" class="image">
								<div class="overlay">
									<a href="" class="btn_view">View More <i class="fa fa-angle-right"></i></a>
								</div>
						</div>
						<div class="single_new_car">
							<img src="img/img23.jpg" alt="New Car" class="image">
								<div class="overlay">
									<a href="" class="btn_view">View More <i class="fa fa-angle-right"></i></a>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="gellary_area" id="gellery">
			<div class="container">
				<div class="row">
					<div class="page_title">
						<h2>Gellary</h2>
					</div>
					<div class="gellary_img eh">
						<div>
							<img src="img/img22.jpg" alt="" />
						</div>
						<div>
							<img src="img/img23.jpg" alt="" />
						</div>
						<div>
							<img src="img/img24.jpg" alt="" />
						</div><div>
							<img src="img/img25.jpeg" alt="" />
						</div>
						<div>
							<img src="img/img26.jpg" alt="" />
						</div>
						<div>
							<img src="img/img25.jpeg" alt="" />
						</div>
						<div>
							<img src="img/img22.jpg" alt="" />
						</div>
						<div>
							<img src="img/img26.jpg" alt="" />
						</div>
						<div>
							<img src="img/img24.jpg" alt="" />
						</div>
						<div>
							<img src="img/img23.jpg" alt="" />
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<div class="video_area">
			<div class="col-md-6 col-md-offset-3">
				<div class="youtube_video">
					<div class="embed-responsive embed-responsive-16by9">
						<iframe width="560" height="315" src="https://www.youtube.com/embed/Hn0QjLC7lJo" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
		<div class="contact_area section" id="contact">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12">
						<div class="page_title">
							<h2>Contact</h2>
						</div>
						<div class="horizontal-line">
							<div class="top"></div>
							<div class="bottom"></div>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 contact_content">
						<div >
							<div class="contact_title">
								<h1>Get in Touch</h1>
							</div>
							<p class="content"><i class="fa fa-map-marker contact_icon" aria-hidden="true"></i> 400/6, West Shewrapara, Mirpur-10</p>
							<p class="content"><i class="fa fa-phone contact_icon" aria-hidden="true"></i></i> +8801742857306</p>
							<p class="content"><i class="fa fa-envelope-o contact_icon" aria-hidden="true"></i></i></i> digitalfishfarm@gmail.com</p>
						</div>
					</div>
					<div class="col-md-6 col-sm-6">
						<form role="form" id="contact-form" class="contact-form">
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<input type="text" class="form-control" name="Name" autocomplete="off" id="Name" placeholder="Name">
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="form-group">
										<input type="email" class="form-control" name="email" autocomplete="off" id="email" placeholder="E-mail">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<div class="form-group">
										<textarea class="form-control textarea" rows="3" name="Message" id="Message" placeholder="Message"></textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 col-sm-12">
									<button type="submit" class="btn main-btn pull-right">Send a message</button>
								</div>
							</div>
						</form>
					</div>
					
				</div>
			</div>
		</div>
		<div class="maps_area">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1825.3959656676736!2d90.37448418462465!3d23.79042252751116!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c734c4abc47d%3A0xd696584909ddf06f!2sShewraPara+Bus+Stand!5e0!3m2!1sen!2sbd!4v1510465594907" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		<div class="footer_top_area">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="newsletter_text floatleft">
							<p>Newslatter</p>
							<h2>Latest Updates</h2>
							<div class="join_newsletter">
								<form action="">
									<input type="email" placeholder="Email" />
									<input type="submit" value="Join The Newsletter" />
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-4 section_padding">
						<div class="social_media">
							<h2>Follow Us</h2>
							<ul>
								<li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i>Facebook</a></li>
								<li><a href=""><i class="fa fa-twitter"></i>Twitter</a></li>
								<li><a href=""><i class="fa fa-google-plus"></i>Google-Plus</a></li>
								<li><a href=""><i class="fa fa-linkedin"></i>Linked In</a></li>
							</ul>	
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer_area">
			<div class="container">
				<div class="row">
					<div class="col-md-12 footer_text">
						<p>Copyright © 2018 Digital Fish Farming</p>
					</div>
				</div>
			</div>
		</div>
	
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
		<script type="text/javascript">
			$(document).ready(function(){
				var s=$("#sticker");
				var pos=s.position();
				$(window).scroll(function(){
					var windowpos=$(window).scrollTop();
					if(windowpos>=pos.top){
						s.addClass("stick");
					}else{
						s.removeClass("stick");
					}
				});
			});
		</script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/main3.js"></script>
    </body>
</html>
