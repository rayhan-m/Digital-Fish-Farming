<?php
session_start();
if ($_SESSION['owner_login'] == TRUE) {
require_once '../admin/DBManager.php';
$DBM = new DBManager();
$query = $DBM->viewCustomer();
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
							<div class="section__content section__content--p30">
								<div class="container-fluid">
									<div class="row">
										
										<div class="col-md-12">
											<table id="MyDataTable" class="table table-striped table-bordered" style="width:100%">
												<thead>
													<tr>
														<th>ID</th>
														<th>FName</th>
														<th>LName</th>
														<th>UName</th>
														<th>Password</th>
														<th>Email</th>
														<th>Phn No</th>
														<th>Address</th>
													</tr>
												</thead>
												<tbody>
													<?php
													while ($viewCustomer = mysqli_fetch_assoc($query)) {
														?>
														<tr>
															<th><?php echo @$viewCustomer['user_id']; ?></th>
															<th><?php echo @$viewCustomer['fname']; ?></th>
															<th><?php echo @$viewCustomer['lname']; ?></th>
															<th><?php echo @$viewCustomer['user_name']; ?></th>
															<th><?php echo @$viewCustomer['password']; ?></th>
															<th><?php echo @$viewCustomer['email']; ?></th>
															<th><?php echo @$viewCustomer['phn_no']; ?></th>
															
															<th><?php echo @$viewCustomer['address']; ?></th>
														</tr>
													<?php } ?>
												</tbody>
												<tfoot>
													<tr>
														<th>ID</th>
														<th>FName</th>
														<th>LName</th>
														<th>UName</th>
														<th>Password</th>
														<th>Email</th>
														<th>Phn No</th>
														<th>Address</th>
													</tr>
												</tfoot>
											</table>
										</div>
										
									</div>
								</div>
							</div>
						<?php include("include/footer.php"); 
	}else{
	header('location:../admin/login.php');
}
?>
