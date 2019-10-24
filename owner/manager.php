<?php
session_start();
if ($_SESSION['owner_login'] == TRUE) {
$message = "";
require_once '../admin/DBManager.php';
$DBM = new DBManager();
if (isset($_POST['button'])) {
	$message = $DBM->addManager($_POST);
}
if (isset($_SESSION['message'])) {
	$message = $_SESSION['message'];
	unset($_SESSION['message']);
}
if (isset($_GET['delete'])) {
	$manager_id = $_GET['delete'];
	$message = $DBM->deleteManager($manager_id);
}
$query = $DBM->viewManager();
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
										<div class="div-action pull pull-right" style="padding-bottom:20px;">
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
												Add New Manager
											</button>
										</div>
										<div class="col-md-12">
											<table id="MyDataTable" class="table table-striped table-bordered" style="width:100%">
												<thead>
													<tr>
														<th>ID</th>
														<th>FName</th>
														<th>UName</th>
														<th>Password</th>
														<th>Email</th>
														<th>Phn No</th>
														<th>Address</th>
														<th>Image</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													while ($viewManager = mysqli_fetch_assoc($query)) {
														?>
														<tr>
															<th><?php echo @$viewManager['manager_id']; ?></th>
															<th><?php echo @$viewManager['full_name']; ?></th>
															<th><?php echo @$viewManager['user_name']; ?></th>
															<th><?php echo @$viewManager['password']; ?></th>
															<th><?php echo @$viewManager['email']; ?></th>
															<th><?php echo @$viewManager['phn_no']; ?></th>
															<th><?php echo @$viewManager['address']; ?></th>
															<td class="text-center"><?php echo "<img src='". @$viewManager['img'] . "'height='70' width='120'>"; ?>
														</td>
														<td>
															<a href="?delete=<?php echo $viewManager['manager_id']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure To Delete!');" ><i class="fas fa-trash-alt"></i></a>
														</td>
													</tr>
												<?php } ?>
											</tbody>
											<tfoot>
												<tr>
													<th>ID</th>
													<th>FName</th>
													<th>UName</th>
													<th>Password</th>
													<th>Email</th>
													<th>Phn No</th>
													<th>Address</th>
													<th>Image</th>
													<th>Action</th>
												</tr>
											</tfoot>
										</table>
									</div>
								</div>
							</div>
						</div>
						<!-- END MAIN CONTENT-->
					<!-- Modal -->
					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h2 class="modal-title " id="exampleModalLabel">Manager Information</h2>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="" method="post" enctype="multipart/form-data">
										<div class="form-group">
											<label>Full Name:</label>
											<div>
												<input type="text" name="full_name"class="form-control" placeholder="Enter Full Name" required>
											</div>
										</div>
										<div class="form-group">
											<label>User Name:</label>
											<div>
												<input type="text" name="user_name"class="form-control" placeholder="Enter user Name" required>
											</div>
										</div>
										<div class="form-group">
											<label>Password:</label>
											<div>
												<input type="Password" name="password"class="form-control" placeholder="Enter Password" required>
											</div>
										</div>
										<div class="form-group">
											<label>Phone Number:</label>
											<div>
												<input type="text" name="phn_no"class="form-control" placeholder="Enter Phone Number" required>
											</div>
										</div>
										<button type="submit" name="button" class="btn btn-primary btn-block">Submit</button>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

								</div>
							</div>
						</div>
					</div>
					<?php include("include/footer.php"); 
}else{
	header('location:../admin/login.php');
}
?>
