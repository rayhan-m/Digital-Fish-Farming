<?php
@session_start();
if ($_SESSION['staff_login'] == TRUE) {

?>
	<?php include("include/header.php"); ?>
	<?php include("include/menubar.php"); ?>
	<!-- PAGE CONTAINER-->
	<div class="page-container">
		<!-- MENU SIDEBAR-->
		<aside class="menu-sidebar d-none d-lg-block">
			<div class="logo">
				<a href="#">
					<img src="images/icon/logo.png" alt="Cool Admin" />
				</a>
			</div>
			<div class="menu-sidebar__content js-scrollbar1">
				<nav class="navbar-sidebar">
					<ul class="list-unstyled navbar__list">
					<li class="active">
						<a  href="staff-dashboard.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
					</li>
					<li  >
						<a href="pond-details.php"><i class="fas fa-chart-bar"></i>Pond Details</a>
					</li>
					<li class="has-sub">
						<a class="js-arrow" href="#">
							<i class="fas fa-tachometer-alt"></i>Food Stock</a>
							<ul class="list-unstyled navbar__sub-list js-sub-list">
								<li>
									<a href="feed-food.php">Feed Food</a>
								</li>
								<li>
									<a href="view-stock.php">View Stock</a>
								</li>
							</ul>
						</li>
						<li class="has-sub">
							<a class="js-arrow" href="#">
								<i class="fas fa-tachometer-alt"></i>Payment</a>
								<ul class="list-unstyled navbar__sub-list js-sub-list">
									<li>
										<a href="payment.php">View Payment Info</a>
									</li>
								</ul>
							</li>
						</ul>
									</nav>
								</div>
							</aside>
							<!-- END MENU SIDEBAR-->
							<!-- MAIN CONTENT-->
							<div class="main-content">
								<div class="section__content section__content--p30">
									<div class="container-fluid">
										<div class="row">
											<!--Calender-->

											<div id='wrap'>

												<div id='calendar'></div>

												<div style='clear:both'></div>
											
											</div>
											<!--End Calender-->
										</div>
									</div>
								</div>
								<!-- END MAIN CONTENT-->

							<?php include("include/footer.php");
						}else{
							header('location:../admin/login.php');
						}
						?>
