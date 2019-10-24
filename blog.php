
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
		<div>
			<img src="img/img5.jpg" class="blog">
		</div>
		<div class="">
			<div class="container">
				<div class="row">
					<div class="page_title">
						<h2>Blog Post</h2>
					</div>
						<?php
						$con=mysqli_connect("localhost","root","","fish-firm");
							$query = "SELECT * FROM `blog`";
							$result=mysqli_query($con,$query);
							if(!$result) echo mysqli_error($con);

							while($viewPost=mysqli_fetch_array($result, MYSQLI_ASSOC)){
						?>	
						<div class="col-md-4 decor">
							<article class="article-entry">
								<!--<a href="blog.html" class="blog-img" style="background-image: url(images/blog-1.jpg);"></a>-->
								<img style="width:100%; height: 210px;" src="admin/<?=$viewPost['img']?>" >
								<div class="desc">
									<p class="meta"><span class="day"><?=$viewPost['date']?></span>
									<p class="admin"><span>Posted by:</span> <span><?=$viewPost['user_name']?></span></p>
									<h3 class="text-center bg-success"><?=$viewPost['title']?></h3>
									<p style="text-align: justify;"><?=$viewPost['description']?></p>
								</div>
							</article>
							<a class="btn btn-primary" href="">View Details</a>
						</div>
						<?php }?>
					</div>
				</div>
			</div>
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
