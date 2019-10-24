<?php 
session_start();
if ($_SESSION['staff_login'] == TRUE) {
require_once '../admin/DBManager.php';
$staff_id = $_GET['staff_id']; 
$DBM = new DBManager();
$editProfile = $DBM->editProfile($staff_id);
$profile = mysqli_fetch_assoc($editProfile);
if (isset($_POST['button'])) {
	$DBM->updateProfile($_POST);
}
?>
<?php include("include/header.php"); ?>
<?php include("include/menubar.php"); ?>
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
					<li>
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
						<li class="has-sub">
							<a class="js-arrow" href="#">
								<i class="fas fa-tachometer-alt"></i>Payment</a>
								<ul class="list-unstyled navbar__sub-list js-sub-list">
									<li>
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
							<div class="col-md-8 col-md-offset-2">
								<div class="panel-heading ">
									<h1 class="text-center"> Edit My Profile</h1>
								</div> <!-- /panel-heading -->   
								<div class="test">
									<form action="" method="post" enctype="multipart/form-data">
										<input type="hidden" name="staff_id" value="<?php echo $profile['staff_id']; ?>" class="form-control" >


										<div class="form-group row">
											<label  class="col-4 col-form-label">Full Name</label> 
											<div class="col-8">
												<input  name="full_name" placeholder="Full name" class="form-control here" required="required" type="text" value="<?php echo $profile['full_name']; ?>">
											</div>
										</div>
										<div class="form-group row">
											<label for="name" class="col-4 col-form-label">User Name</label> 
											<div class="col-8">
												<input name="user_name" class="form-control here " type="text"disabled  value="<?php echo $profile['user_name']; ?>">
											</div>
										</div>
										<div class="form-group row">
											<label  class="col-4 col-form-label">New Password</label> 
											<div class="col-8">
												<input  name="password" placeholder="Password" class="form-control here" type="password" value="<?php echo $profile['password']; ?>">
											</div>
										</div>
										<div class="form-group row">
											<label  class="col-4 col-form-label">Phone No</label> 
											<div class="col-8">
												<input  name="phn_no" placeholder="Phone No" class="form-control here" required="required" type="number" value="<?php echo $profile['phn_no']; ?>">
											</div>
										</div>
										
										<div class="form-group row">
											<label class="col-4 col-form-label">NID No</label> 
											<div class="col-8">
												<input name="nid_no" placeholder="NID No" class="form-control here" required="required" type="number" value="<?php echo $profile['nid_no']; ?>">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-4 col-form-label">Address</label> 
											<div class="col-8">
												<input  name="address" placeholder="Address" class="form-control here" type="text" value="<?php echo $profile['address']; ?>">
											</div>
										</div>
										<div class="form-group row">
											<label class="col-4 col-form-label">Upload Image</label>
											<div class="col-8">
												<input type="file" name="fileToUpload" id="fileToUpload"  required>
												<?php echo "<img src='". $profile['img'] . "'height='70' width='120'>"; ?>
											</div>
										</div>

										<button type="submit" name="button" class="btn btn-primary ">Update My Profile</button>
										<a href="user-profile.php" class="btn btn-secondary pull-right">Cancel</a>
									</form>

								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include("include/footer.php"); 
}else{
	header('location:../admin/login.php');
}
?>