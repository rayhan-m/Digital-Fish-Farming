<?php
session_start();
if ($_SESSION['manager_login'] == TRUE) {
$message = "";
require_once './DBManager.php';
$DBM = new DBManager();
if (isset($_SESSION['message'])) {
	$message = $_SESSION['message'];
	unset($_SESSION['message']);
}
if (isset($_GET['delete'])) {
	$sell_id = $_GET['delete'];
	$message = $DBM->deleteSell($sell_id);
}
if (isset($_GET['edit'])) {
	$sell_id = $_GET['edit'];
	$sell_id = $_GET['sell_id'];
	$editBuyFood = $DBM->editSell($sell_id);
	$sell = mysqli_fetch_assoc($editSell);
}

if (isset($_POST['btn'])) {

	$connection = mysqli_connect('localhost', 'root', '', 'fish-firm');
	$sell_id = $_POST['sell_id'];
	$sql = "UPDATE sell_fish SET payment_status='Paid' WHERE sell_id='$sell_id'";
	$query = $connection->query($sql);
		// $update = mysqli_fetch_assoc($query);
	header('location:sell-fish.php');
}

$query = $DBM->viewSell();

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
								<li >
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
										<li>
											<a href="bid-info.php">Bid Information</a>
										</li>
										<li >
											<a href="bid-board.php">Bid Board</a>
										</li>
										
									</ul>
								</li>
								<li class="active has-sub">
									<a class="js-arrow" href="#">
										<i class="fas fa-cart-arrow-down"></i>Sell Information</a>
										<ul class="list-unstyled navbar__sub-list js-sub-list">
											<li>
												<a href="sell.php">Sell Fish</a>
											</li>
											<li  class="active">
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
										<div class="col-md-12">
											<table id="MyDataTable" class="table table-striped table-bordered" style="width:100%">
												<thead>
													<tr>
														<th>Sell ID</th>
														<th>Fish Name</th>
														<th>Price</th>
														<th>Quantity</th>
														<th>Total Price</th>
														<th>Sold To</th>
														<th>Sold By</th>
														<th>Date</th>
														<th>Pay-Status</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
													while ($viewSell = mysqli_fetch_assoc($query)) {
														?>
														<tr>
															<th><?php echo @$viewSell['sell_id']; ?></th>
															<th><?php echo @$viewSell['fish_name']; ?></th>
															<th><?php echo @$viewSell['price']; ?></th>
															<th><?php echo @$viewSell['quantity']; ?></th>
															<th><?php echo @$viewSell['total']; ?></th>
															<th><?php echo @$viewSell['sold_to']; ?></th>
															<th><?php echo @$viewSell['sold_by']; ?></th>
															<th><?php echo @$viewSell['date']; ?></th>
															<th><?php echo @$viewSell['payment_status']; ?></th>
															<td>
																<a href="editSell.php?sell_id=<?php echo $viewSell['sell_id']; ?>" class="btn btn-success <?php if($viewSell['payment_status']=='Paid'){?> disabled <?php }?>"   title="Edit" ><i class="fas fa-edit"></i></a> 
																<a href="?delete=<?php echo $viewSell['sell_id']; ?>" class="btn btn-danger <?php if($viewSell['payment_status']=='Paid'){?> disabled <?php }?>"  title="Delete" onclick="return confirm('Are You Sure To Delete!');" ><i class="fas fa-trash-alt"></i></a>
																<form action="" method="post">
																	<input type="hidden" name="sell_id" value="<?php echo $viewSell['sell_id']; ?>" class="form-control" >
																	<button type="submit" name="btn" class="au-btn au-btn-icon au-btn--blue">Done</button>
																</form>
															</td>
														</tr>
													<?php } ?>
												</tbody>
												<tfoot>
													<tr>
														<th>Sell ID</th>
														<th>Fish Name</th>
														<th>Price</th>
														<th>Quantity</th>
														<th>Total Price</th>
														<th>Sold To</th>
														<th>Sold By</th>
														<th>Date</th>
														<th>Pay-Status</th>
														<th>Action</th>
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
	header('location:login.php');
}
?>
