<?php
session_start();
if ($_SESSION['manager_login'] == TRUE) {
$message = "";
require_once './DBManager.php';
$DBM = new DBManager();
if (isset($_POST['button'])) {
	$message = $DBM->addSeason($_POST);
}
if (isset($_SESSION['message'])) {
	$message = $_SESSION['message'];
	unset($_SESSION['message']);
}
if (isset($_GET['delete'])) {
	$season_id = $_GET['delete'];
	$message = $DBM->deleteSeason($season_id);
}
if (isset($_GET['edit'])) {
	$season_id = $_GET['edit'];
	$season_id = $_GET['season_id'];
	$editSeason = $DBM->editSeason($season_id);
	$season = mysqli_fetch_assoc($editSeason);
}

$query = $DBM->viewSeason();
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
					<li >
						<a  href="pond.php"><i class="fas fa-align-center"></i>Pond</a>
					</li>
					<li>
						<a href="fish.php"><i class="fab fa-affiliatetheme"></i>Fish</a>
					</li>
					<li class="active">
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
							<li class="  has-sub">
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
							<div>
								<h4 class="text-center text-success remove-message"><?php echo $message ?></h4>
							</div>
							<div class="section__content section__content--p30">
								<div class="container-fluid">
									<div class="row">
										<div class="div-action pull pull-right" style="padding-bottom:20px;">
											<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
												Add New Season
											</button>
										</div>
										<div class="col-md-12">
											<table id="MyDataTable" class="table table-striped table-bordered" style="width:100%">
												<thead>
													<tr>
														<th>Season ID</th>
														<th>Season Name</th>
														<th>Duration</th>								
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													while ($viewSeason = mysqli_fetch_assoc($query)) {
														?>
														<tr>
															<th><?php echo @$viewSeason['season_id']; ?></th>
															<th><?php echo @$viewSeason['season_name']; ?></th>
															<th><?php echo @$viewSeason['duration']; ?></th>								
															<td>
																<a href="editSeason.php?season_id=<?php echo $viewSeason['season_id']; ?>" class="btn btn-success"   title="Edit" ><i class="fas fa-edit"></i></a> 
																<a href="?delete=<?php echo $viewSeason['season_id']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure To Delete!');" ><i class="fas fa-trash-alt"></i></a>
															</td>
														</tr>
													<?php } ?>
												</tbody>
												<tfoot>
													<tr>
														<th>Season ID</th>
														<th>Season Name</th>
														<th>Duration</th>							
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
										<h2 class="modal-title " id="exampleModalLabel">Season Information</h2>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="" method="post" enctype="multipart/form-data">
											<div class="form-group">
												<label>Season Name:</label>
												<div>
													<input type="text" name="season_name"class="form-control" placeholder="Enter Season Name" required>
												</div>
											</div>
											<div class="form-group">
												<label class="col-sm-3 control-label">Durations </label>
												<label class="col-sm-1 control-label">: </label>
												<select class="form-control" name="duration" required>
													<option value="">~~SELECT~~</option>
													<option value="January - April">January - April</option>
													<option value="May - August">May - August</option>
													<option value="September - December">September - December</option>
												</select>
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
	header('location:login.php');
}
?>
