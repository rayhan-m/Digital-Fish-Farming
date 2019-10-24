<?php
@session_start();
if ($_SESSION['staff_login'] == TRUE) {
$message = "";
require_once '../admin/DBManager.php';
$DBM = new DBManager();
$query = $DBM->viewStock();
$stock = mysqli_fetch_assoc($query);
if (isset($_SESSION['message'])) {
	$message = $_SESSION['message'];
	unset($_SESSION['message']);
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
					<li >
						<a  href="staff-dashboard.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
					</li>
					<li >
						<a href="pond-details.php"><i class="fas fa-chart-bar"></i>Pond Details</a>
					</li>
					<li class="has-sub active">
						<a class="js-arrow" href="#">
							<i class="fas fa-tachometer-alt"></i>Food Stock</a>
							<ul class="list-unstyled navbar__sub-list js-sub-list">
								<li>
									<a href="feed-food.php">Feed Food</a>
								</li>
								<li  class="active">
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
			<div>
				<h4 class="text-center text-success remove-message"><?php echo $message ?></h4>
			</div>
			<div class="section__content section__content--p30">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="overview-wrap">
								<h1 class="title-1">Food Stock Information</h1>
							</div>

						</div>

						<div class="col-md-3 dgn">
							<div class="card decora text-white bg-primary o-hidden h-100 ">
								<div class="card-body">
									<?php
									if(@$stock['psq'] <= '10' ){
										?>
										<div class="des">Paddy Shell :<span class="badge bg-danger"><?php echo @$stock['psq']; ?> KG</span></div>
										<p >Low Stock, please add food.</p>
										<?php
									}else{
										?>
										<div class="des">Paddy Shell :<span class="badge bg-success"><?php echo @$stock['psq']; ?> KG</span></div>
									<?php } ?>								
								</div>
							</div>
						</div>
						<div class="col-md-3 dgn">
							<div class="card decora text-white bg-primary o-hidden h-100 ">
								<div class="card-body">
									<?php
									if(@$stock['brq'] <= '10' ){
										?>
										<div class="des">Boil Rice : <span class="badge bg-danger"><?php echo @$stock['brq']; ?> KG</span></div>
										<p >Low Stock, please add food.</p>
										<?php
									}else{
										?>
										<div class="des">Boil Rice : <span class="badge bg-success"><?php echo @$stock['brq']; ?> KG</span></div>
									<?php } ?>								
								</div>
							</div>
						</div>
						<div class="col-md-3 dgn">
							<div class="card decora text-white bg-primary o-hidden h-100 ">
								<div class="card-body">
									<?php
									if(@$stock['fq'] <= '10' ){
										?>
										<div class="des"> Flour  :  <span class="badge bg-danger"><?php echo  @$stock['fq']; ?> KG</span></div>
										<p >Low Stock, please add food.</p>
										<?php
									}else{
										?>
										<div class="des"> Flour  :  <span class="badge bg-success"><?php echo  @$stock['fq']; ?> KG</span></div>
									<?php } ?>								
								</div>

							</div>
						</div>
						<div class="col-md-3 dgn">
							<div class="card decora text-white bg-primary o-hidden h-100 ">
								<div class="card-body">
									<?php
									if(@$stock['maq'] <= '10' ){
										?>
										<div class="des">Megavit Aqua : <span class="badge bg-danger"><?php echo @$stock['maq']; ?> KG</span></div>
										<p >Low Stock, please add food.</p>
										<?php
									}else{
										?>
										<div class="des">Megavit Aqua : <span class="badge bg-success"><?php echo @$stock['maq']; ?> KG</span></div>
									<?php } ?>								
								</div>

							</div>
						</div>
						<div class="col-md-3 dgn">
							<div class="card decora text-white bg-primary o-hidden h-100 ">
								<div class="card-body">
									<?php
									if(@$stock['bq'] <= '10' ){
										?>
										<div class="des">Bargafat : <span class="badge bg-danger"><?php echo @$stock['bq']; ?> KG</span></div>
										<p >Low Stock, please add food.</p>
										<?php
									}else{
										?>
										<div class="des">Bargafat : <span class="badge bg-success"><?php echo @$stock['bq']; ?> KG</span></div>
									<?php } ?>								
								</div>
							</div>
						</div>
						
					</div>
				</div>

			</div>
			<!-- END MAIN CONTENT-->
		<?php include("include/footer.php"); 
}else{
	header('location:../admin/login.php');
}
?>