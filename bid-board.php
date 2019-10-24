<?php
session_start();
if ($_SESSION['user_login'] == TRUE) {
    require_once './admin/DBManager.php';
    $DBM = new DBManager();
    $query = $DBM->viewBid();
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
							<thead class="text-center">
								<tr>
									<th>Bid ID</th>
									<th>Title</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody class="text-center">
								<?php
	                            while ($viewBid = mysqli_fetch_assoc($query)) {
	                            ?>
								<tr>
									<th><?php echo @$viewBid['bid_id']; ?></th>
									<th><?php echo @$viewBid['title']; ?></th>
									<td class="text-center">
										<a href="bidding.php?bid_id=<?php echo $viewBid['bid_id']; ?>" class="btn btn-success"   title="View Details" ><i class="fas fa-eye"></i> View Details</a>
										<?php
										date_default_timezone_set('Asia/Dhaka');
										$current_date=date('m/d/Y');
										if($viewBid['end_date']>$current_date){
										?>
										<p>Active</p> 
									<?php }else{?>
										<p>Expaired</p> 
									<?php }?>
									</td>
								</tr>
								<?php } ?>
							</tbody>
							<tfoot class="text-center">
								<tr>
									<th>Bid ID</th>
									<th>Title</th>
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
