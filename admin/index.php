<?php
@session_start();
if ($_SESSION['manager_login'] == TRUE) {
	$connection = mysqli_connect('localhost', 'root', '', 'fish-firm');

	$sql = "SELECT * FROM manager ";
    $query = $connection->query($sql);
    $countManager = $query->num_rows;

    $sql = "SELECT * FROM staff ";
    $query = $connection->query($sql);
    $countStaff = $query->num_rows;

    $sql = "SELECT * FROM user";
    $query = $connection->query($sql);
    $countCustomer = $query->num_rows;

    $sql = "SELECT * FROM pond";
    $query = $connection->query($sql);
    $countPond = $query->num_rows;

    $sql = "SELECT * FROM sell_fish WHERE payment_status='Paid'";
	$query = $connection->query($sql);
	$TotalEarn = 0;
	while ($orderResult = $query->fetch_assoc()) {
		$TotalEarn += $orderResult['total'];
	}

	$sql = "SELECT * FROM sell_fish WHERE payment_status='Pending'";
	$query = $connection->query($sql);
	$TotalDue = 0;
	while ($orderResult = $query->fetch_assoc()) {
		$TotalDue += $orderResult['total'];
	}
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
							<a  href="index.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
						</li>
						<li >
							<a  href="pond.php"><i class="fas fa-align-center"></i>Pond</a>
						</li>
						<li>
							<a href="fish.php"><i class="fab fa-affiliatetheme"></i>Fish</a>
						</li>
						<li>
							<a href="season.php"><i class="fab fa-audible"></i>Season</a>
						</li>
						<li>
							<a href="staff.php"><i class="fas fa-user"></i>Staff</a>
						</li>
						<li>
							<a href="pond-details.php"><i class="fas fa-industry"></i>Pond Details</a>
						</li>
						<li>
						<a href="customer.php"><i class="fas fa-user"></i>Customer</a>
					</li>
					<li>
						<a href="blog.php"><i class="fas fa-user"></i>Blog Post</a>
					</li>
						<li class=" has-sub">
							<a class="js-arrow" href="#">
								<i class="fas fa-utensils"></i>Food Stock</a>
								<ul class="list-unstyled navbar__sub-list js-sub-list">
									<li>
										<a href="buy-food.php">Food</a>
									</li>
									<li>
										<a href="view-stock.php">View Stock</a>
									</li>
								</ul>
							</li>
							<li class=" has-sub">
								<a class="js-arrow" href="#">
									<i class="fas fa-dollar-sign"></i>Payment</a>
									<ul class="list-unstyled navbar__sub-list js-sub-list">
										<li>
											<a href="staff-payment.php">Staff Payment</a>
										</li>
										<li>
											<a href="manager-payment.php">My Payment</a>
										</li>
									</ul>
								</li>
								<li class=" has-sub">
									<a class="js-arrow" href="#">
										<i class="fas fa-th"></i>Bid Board</a>
										<ul class="list-unstyled navbar__sub-list js-sub-list">
											<li >
												<a href="bid-info.php">Bid Information</a>
											</li>
											<li >
												<a href="bid-board.php">Bid Board</a>
											</li>

										</ul>
									</li>
									<li class=" has-sub">
										<a class="js-arrow" href="#">
											<i class="fas fa-cart-arrow-down"></i>Sell Information</a>
											<ul class="list-unstyled navbar__sub-list js-sub-list">
												<li>
													<a href="sell.php">Sell Fish</a>
												</li>
												<li>
													<a href="sell-fish.php">Total Sell</a>
												</li>
											</ul>
										</li>
										<li class=" has-sub">
										<a class="js-arrow" href="#">
											<i class="fas fa-file-powerpoint"></i>Report</a>
											<ul class="list-unstyled navbar__sub-list js-sub-list">
												<li>
													<a href="total-earning.php">Total Earning</a>
												</li>
												<li>
													<a href="total-expense.php">Total Expense</a>
												</li>
												<li>
													<a href="income-summery.php">Income Summery</a>
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
											<div class="row m-t-25">
												<div class="col-sm-6 col-lg-3">
													<div class="overview-item overview-item--c1">
														<div class="overview__inner">
															<div class="overview-box clearfix">
																<div class="icon">
																	<i class="zmdi zmdi-account-o"></i>
																</div>
																<div class="text">
																	<h2><?php echo $countManager;?></h2>
																	<span>Total Manager </span>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-sm-6 col-lg-3">
													<div class="overview-item overview-item--c2">
														<div class="overview__inner">
															<div class="overview-box clearfix">
																<div class="icon">
																	<i class="zmdi zmdi-account-o"></i>
																</div>
																<div class="text">
																	<h2><?php echo $countStaff;?></h2>
																	<span>Total Staff</span>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-sm-6 col-lg-3">
													<div class="overview-item overview-item--c3">
														<div class="overview__inner">
															<div class="overview-box clearfix">
																<div class="icon">
																	<i class="zmdi zmdi-calendar-note"></i>
																</div>
																<div class="text">
																	<h2><?php echo $countPond;?></h2>
																	<span>Total Pond</span>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-sm-6 col-lg-3">
													<div class="overview-item overview-item--c2">
														<div class="overview__inner">
															<div class="overview-box clearfix">
																<div class="icon">
																	<i class="zmdi zmdi-account-o"></i>
																</div>
																<div class="text">
																	<h2><?php echo $countCustomer;?></h2>
																	<span>Total Customer</span>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-sm-6 col-lg-3">
													<div class="overview-item overview-item--c4">
														<div class="overview__inner">
															<div class="overview-box clearfix">
																<div class="icon">
																	<i class="zmdi zmdi-money"></i>
																</div>
																<div class="text">
																	<h2>TK <?php echo $TotalEarn;?></h2>
																	<span>Total Sell</span>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-sm-6 col-lg-3">
													<div class="overview-item overview-item--c1">
														<div class="overview__inner">
															<div class="overview-box clearfix">
																<div class="icon">
																	<i class="zmdi zmdi-money"></i>
																</div>
																<div class="text">
																	<h2>TK <?php echo $TotalDue;?></h2>
																	<span>Total Due </span>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>

										<!--Calender-->

											<div id='wrap'>

												<div id='calendar'></div>

												<div style='clear:both'></div>
											
											</div>
											<!--End Calender-->

									</div>
								</div>
								<!-- END MAIN CONTENT-->

							<?php include("include/footer.php");
						}else{
							header('location:login.php');
						}
						?>
