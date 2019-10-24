<?php
@session_start();
if ($_SESSION['manager_login'] == TRUE) {
$message = "";
require_once './DBManager.php';
$DBM = new DBManager();
$query = $DBM->viewStock();
$stock = mysqli_fetch_assoc($query);
if (isset($_SESSION['message'])) {
	$message = $_SESSION['message'];
	unset($_SESSION['message']);
}

//Check//
$connection = mysqli_connect('localhost', 'root', '', 'fish-firm');

$sql = "SELECT * FROM buy_food WHERE add_stock='Not Added'";
$result=mysqli_query($connection, $sql);
$num=mysqli_num_rows($result);
if($num != 0){
	$message= "Please Update Stock";
}

//check//
if (isset($_POST['btn'])) {

	$connection = mysqli_connect('localhost', 'root', '', 'fish-firm');

	$sql = "SELECT * FROM buy_food WHERE food_name='Paddy Shell' and add_stock='Not Added'";
	$query = $connection->query($sql);
	$PSQ = 0;
	while ($orderResult = $query->fetch_assoc()) {
		$PSQ += $orderResult['quantity'];
	}

	$sql = "SELECT * FROM buy_food WHERE food_name='Boil Rice'  and add_stock='Not Added'";
	$query = $connection->query($sql);
	$BRQ = 0;
	while ($orderResult = $query->fetch_assoc()) {
		$BRQ += $orderResult['quantity'];
	}

	$sql = "SELECT * FROM buy_food WHERE food_name='Flour'  and add_stock='Not Added'";
	$query = $connection->query($sql);
	$FQ = 0;
	while ($orderResult = $query->fetch_assoc()) {
		$FQ += $orderResult['quantity'];
	}

	$sql = "SELECT * FROM buy_food WHERE food_name='Megavit Aqua'  and add_stock='Not Added'";
	$query = $connection->query($sql);
	$MAQ = 0;
	while ($orderResult = $query->fetch_assoc()) {
		$MAQ += $orderResult['quantity'];
	}

	$sql = "SELECT * FROM buy_food WHERE food_name='Bargafat'  and add_stock='Not Added'";
	$query = $connection->query($sql);
	$BQ = 0;
	while ($orderResult = $query->fetch_assoc()) {
		$BQ += $orderResult['quantity'];
	}

	$sql2 = "SELECT * FROM stock";
	$query = $connection->query($sql2);
	$stk = mysqli_fetch_assoc($query);
	$PSQ1= $stk['psq'] + $PSQ;
	$BRQ1= $stk['brq'] + $BRQ;
	$FQ1= $stk['fq'] + $FQ;
	$MAQ1= $stk['maq'] + $MAQ;
	$BQ1= $stk['bq'] + $BQ;
	$sql1 = "UPDATE stock SET psq ='$PSQ1', brq='$BRQ1',fq='$FQ1',maq='$MAQ1',bq='$BQ1' WHERE stock_id= 1";
	$query = $connection->query($sql1);

	$sql2 = "UPDATE buy_food SET add_stock='Done'";
	$query = $connection->query($sql2);
	header('location:view-stock.php');
	session_start();
	$_SESSION['message'] = 'Stock Updated';
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
					<li class="Active has-sub">
						<a class="js-arrow" href="#">
							<i class="fas fa-utensils"></i>Food Stock</a>
							<ul class="list-unstyled navbar__sub-list js-sub-list">
								<li>
									<a href="buy-food.php">Food</a>
								</li>
								<li class="active">
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
							<div>
								<h4 class="text-center text-success remove-message"><?php echo $message ?></h4>
							</div>
							<div class="section__content section__content--p30">
								<div class="container-fluid">
									<div class="row">
										<div class="col-md-12">
											<div class="overview-wrap">
												<h1 class="title-1">Food Stock Information</h1>
												<form action="" method="post">
													<button type="submit" name="btn" class="au-btn au-btn-icon au-btn--blue">Update Stock </button>
												</form>
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
	header('location:login.php');
}
?>