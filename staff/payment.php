<?php
session_start();
if ($_SESSION['staff_login'] == TRUE) {
require_once '../admin/DBManager.php';
$DBM = new DBManager();

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
					<li>
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
						<li class="has-sub active">
							<a class="js-arrow" href="#">
								<i class="fas fa-tachometer-alt"></i>Payment</a>
								<ul class="list-unstyled navbar__sub-list js-sub-list">
									<li class="active">
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
							<div class="div-action pull pull-right" style="padding-bottom:20px;">

							</div>
							<div class="col-md-12">
								<table id="MyDataTable" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th>Payment ID</th>
											<th>Staff ID</th>
											<th>Payment Date</th>
											<th>Payment Month</th>
											<th>Salary</th>
											<th>Status</th>

										</tr>
									</thead>

									<tbody >
										<?php
										$staff_id=$pro['staff_id'];
                                    $sql = "SELECT * FROM staff_payment Where staff_id='$staff_id'";

                                    $query = $connection->query($sql);
										while ($viewIndStaffPayment = mysqli_fetch_assoc($query)) {
											?>
											<tr>
												<td><?php echo @$viewIndStaffPayment['sp_id']; ?></td>
												<td><?php echo @$viewIndStaffPayment['staff_id']; ?></td>
												<td><?php echo @$viewIndStaffPayment['payment_date']; ?></td>
												<td><?php echo @$viewIndStaffPayment['payment_month']; ?></td>
												<td><?php echo @$viewIndStaffPayment['salary']; ?> TK</td>
												<td><?php echo @$viewIndStaffPayment['status']; ?></td>

											</tr>
										<?php } ?>
									</tbody>

									<tfoot>
										<tr>
											<th>Payment ID</th>
											<th>Staff ID</th>
											<th>Payment Date</th>
											<th>Payment Month</th>
											<th>Salary</th>
											<th>Status</th>
										</tr>
									</tfoot>
								</table>
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
