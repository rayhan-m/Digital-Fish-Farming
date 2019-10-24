<?php 
session_start();
if ($_SESSION['user_login'] == TRUE) {
require_once 'admin/DBManager.php';
$user_id = $_GET['user_id']; 
$DBM = new DBManager();
$editUserProfile = $DBM->editUserProfile($user_id);
$profile = mysqli_fetch_assoc($editUserProfile);
if (isset($_POST['button'])) {
	$DBM->updateUserProfile($_POST);
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
					<div class="col-md-8 col-md-offset-2">
						<div class="panel-heading ">
							<h1 class="text-center"> Edit My Profile</h1>
						</div> <!-- /panel-heading -->   
						<div class="test">
							<form action="" method="post" enctype="multipart/form-data">
								<input type="hidden" name="user_id" value="<?php echo $profile['user_id']; ?>" class="form-control" >

								<div class="form-group row">
									<label  class="col-4 col-form-label">First Name</label> 
									<div class="col-8">
										<input  name="first_name" placeholder="First name" class="form-control here" required="required" type="text" value="<?php echo $profile['fname']; ?>">
									</div>
								</div>
								<div class="form-group row">
									<label  class="col-4 col-form-label">Last Name</label> 
									<div class="col-8">
										<input  name="last_name" placeholder="Last name" class="form-control here" required="required" type="text" value="<?php echo $profile['lname']; ?>">
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
									<label  class="col-4 col-form-label">Email</label> 
									<div class="col-8">
										<input  name="email" placeholder="Email" class="form-control here" type="email" value="<?php echo $profile['email']; ?>">
									</div>
								</div>
								<div class="form-group row">
									<label  class="col-4 col-form-label">Phone No</label> 
									<div class="col-8">
										<input  name="phn_no" placeholder="Phone No" class="form-control here" required="required" type="number" value="<?php echo $profile['phn_no']; ?>">
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
								<a href="profile.php" class="btn btn-secondary pull-right">Cancel</a>
							</form>

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include("include/footer.php"); 
}else{
    header('location:login.php');
}
?>