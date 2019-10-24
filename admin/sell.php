<?php
session_start();
$message="";
if ($_SESSION['manager_login'] == TRUE) {
	require_once './DBManager.php';
	$DBM = new DBManager();
	if(!isset($_GET['abc'])){
		@$bid_id=$_POST['bid_id'];
		$query = $DBM->Select($bid_id);
		$select = mysqli_fetch_assoc($query);
	}else{
		echo "not";
	}

	if (isset($_POST['button'])) {
		$DBM->sellFish($_POST);
	}
	?>

	
	<?php include("include/header.php"); ?>
	<?php include("include/menubar.php"); ?>
	<script>
		function myFunction() {
		    var x = document.getElementById("quantity");
		    if(x.value <=0){
		    	x.value="";
		    } 
		}

	</script>
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
												<li  class="active">
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
									<div class="section__content section__content--p30">
										<div class="container-fluid">
											<div class="row">
												<p><?php echo $message;?></p>
												<div class="col-md-10 col-md-offset-1">
													<h1 class="text-success text-center profile">Sell Fish</h1>

													<div class="form-group row">
														<label class="col-4 col-form-label">Bid ID:</label>
														<div class="col-8">
															<form action="" method="post">

																<select type="text" class="form-control here" name="bid_id"  required>
																	<option value="">~~SELECT~~</option>


																	<?php
																	$connection = mysqli_connect('localhost', 'root', '', 'fish-firm');
																	date_default_timezone_set('Asia/Dhaka');
																	$current_date=date('m/d/Y');
																	$sql = "SELECT bid_id from bid_board WHERE end_date<'$current_date'";
																	$result = $connection->query($sql);

																	while ($row = $result->fetch_array()) {
																		echo "<option value='" . $row['bid_id'] . "'>" . $row['bid_id'] . "</option>";
    } // while
    
    ?>
</select>


<button type="submit" name="abc" class="btn btn-primary ">Select</button>
</form>
</div>
</div> 

<form action="" method="post">   
	<div class="form-group row">
		<label class="col-4 col-form-label">Fish Name</label> 
		<div class="col-8">
			<input class="form-control here " name="fish_name" readonly value="<?php echo $select['fish_name'];?>">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-4 col-form-label">Price/Kg</label> 
		<div class="col-8">
			<input class="form-control here " name="price" readonly value="<?php echo $select['price'];?>">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-4 col-form-label">Quantity</label> 
		<div class="col-8">
			<input type="number" name="quantity" id="quantity" onblur="myFunction()" class="form-control here" placeholder="Enter Quantity" required>
		</div>
	</div>
	<div class="form-group row">
		<label class="col-4 col-form-label">Sold To</label> 
		<div class="col-8">
			<input class="form-control here" 
			name="sold_to" readonly value="<?php echo $select['user_name'];?>">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-4 col-form-label">Sold By</label> 
		<div class="col-8">
			<input class="form-control here " 
			name="sold_by"	readonly value="<?php echo $pro['user_name'];?>">
		</div>
	</div>
	<div class="form-group row">
		<label class="col-4 col-form-label"></label>
		<div class="col-8">
			<button type="submit" name="button" class="btn btn-primary ">Confirm Sell</button>
			<a href="sell-fish.php" class="btn btn-secondary pull-right">Cancel</a>
		</div>
	</div>
</form>
</div>
</div>
</div>
<!-- END MAIN CONTENT-->
<?php include("include/footer.php"); 
}else{
	header('location:login.php');
}
?>
