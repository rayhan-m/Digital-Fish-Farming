<?php
session_start();
if ($_SESSION['owner_login'] == TRUE) {
$message = "";
require_once '../admin/DBManager.php';
$DBM = new DBManager();
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
						<a  href="index.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
					</li>
					
					<li>
						<a href="manager.php"><i class="fab fa-audible"></i>Manager</a>
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
					<li class=" has-sub">
						<a class="js-arrow" href="#">
							<i class="fas fa-utensils"></i>Food Stock</a>
							<ul class="list-unstyled navbar__sub-list js-sub-list">
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
										<a href="manager-payment.php">Manager Payment</a>
									</li>
								</ul>
							</li>
							<li class=" has-sub">
								<a class="js-arrow" href="#">
									<i class="fas fa-th"></i>Bid Board</a>
									<ul class="list-unstyled navbar__sub-list js-sub-list">
										<li>
											<a href="bid-board.php">Bid Board</a>
										</li>

									</ul>
								</li>
								<li class=" has-sub">
									<a class="js-arrow" href="#">
										<i class="fas fa-cart-arrow-down"></i>Sell Information</a>
										<ul class="list-unstyled navbar__sub-list js-sub-list">
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
				<div>
					<h4 class="text-center text-success remove-message"><?php echo $message ?></h4>
				</div>
				<div class="section__content section__content--p30">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-10 col-md-offset-1">
									<h1 class="text-success text-center profile">My Profile</h1>
									<div class="form-group row">
										<label class="col-4 col-form-label">Owner ID</label> 
										<div class="col-8">
											<input class="form-control here " disabled value="<?php echo $pro['owner_id'];?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-4 col-form-label">Full Name</label> 
										<div class="col-8">
											<input class="form-control here " disabled value="<?php echo $pro['full_name'];?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-4 col-form-label">User Name</label> 
										<div class="col-8">
											<input class="form-control here " disabled value="<?php echo $pro['user_name'];?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-4 col-form-label">Password</label> 
										<div class="col-8">
											<input class="form-control here " disabled value="<?php echo $pro['password'];?>">
										</div>
									</div>
									<div class="form-group row">
										<label class="col-4 col-form-label">Image</label> 
										<div class="col-8">
											<td class="text-center"><?php echo "<img src='". @$pro['img'] . "'height='250' width='180'>"; ?>
									</td>

										</div>
									</div>

									<div class="form-group row">
										<div class="offset-4 col-8">
											
											<a href="editProfile.php?owner_id=<?php echo $pro['owner_id']; ?>" class="btn btn-primary"   title="Edit" ><i class="fas fa-edit"></i>Edit Profile</a>
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
