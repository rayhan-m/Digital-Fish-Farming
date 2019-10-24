<?php
@session_start();
if ($_SESSION['user_login'] == TRUE) {
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
						<a  href="index.php"><i class="fas fa-tachometer-alt"></i>Home</a>
					</li>
					<li >
						<a  href="bid-board.php"><i class="fas fa-align-center"></i>Bid board</a>
					</li>
					<li >
						<a  href="previous-history.php"><i class="fas fa-th"></i>Previous History</a>
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
														<th>Sell ID</th>
														<th>Fish Name</th>
														<th>Price</th>
														<th>Quantity</th>
														<th>Total Price</th>
														<th>Sold To</th>
														<th>Sold By</th>
														<th>Date</th>
														<th>Pay-Status</th>
													</tr>
												</thead>
												<tbody>
													<?php
										$user_name=$pro['user_name'];
										$connection = mysqli_connect('localhost', 'root', '', 'fish-firm');
                                    $sql = "SELECT * FROM sell_fish Where sold_to='$user_name'";

                                    $query = $connection->query($sql);
										while ($viewIndSell = mysqli_fetch_assoc($query)) {
											?>
														<tr>
															<th><?php echo @$viewIndSell['sell_id']; ?></th>
															<th><?php echo @$viewIndSell['fish_name']; ?></th>
															<th><?php echo @$viewIndSell['price']; ?></th>
															<th><?php echo @$viewIndSell['quantity']; ?></th>
															<th><?php echo @$viewIndSell['total']; ?></th>
															<th><?php echo @$viewIndSell['sold_to']; ?></th>
															<th><?php echo @$viewIndSell['sold_by']; ?></th>
															<th><?php echo @$viewIndSell['date']; ?></th>
															<th><?php echo @$viewIndSell['payment_status']; ?></th>
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
