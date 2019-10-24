<?php
session_start();
if ($_SESSION['user_login'] == TRUE) {
$message = "";
require_once 'admin/DBManager.php';
$DBM = new DBManager();
if (isset($_SESSION['message'])) {
	$message = $_SESSION['message'];
	unset($_SESSION['message']);
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
		<div>
			<h4 class="text-center text-success remove-message"><?php echo $message ?></h4>
		</div>
		<div class="section__content section__content--p30">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<h1 class="text-success text-center profile">My Profile</h1>
						<div class="form-group row">
							<label class="col-4 col-form-label">User ID</label> 
							<div class="col-8">
								<input class="form-control here " disabled value="<?php echo $pro['user_id'];?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-4 col-form-label">First Name</label> 
							<div class="col-8">
								<input class="form-control here " disabled value="<?php echo $pro['fname'];?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-4 col-form-label">Last Name</label> 
							<div class="col-8">
								<input class="form-control here " disabled value="<?php echo $pro['lname'];?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-4 col-form-label">User Name</label> 
							<div class="col-8">
								<input class="form-control here " disabled value="<?php echo $pro['user_name'];?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-4 col-form-label">Password</label> 
							<div class="col-8">
								<input class="form-control here " disabled value="<?php echo $pro['password'];?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-4 col-form-label">Email</label> 
							<div class="col-8">
								<input class="form-control here " disabled value="<?php echo $pro['email'];?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-4 col-form-label">Phone No</label> 
							<div class="col-8">
								<input class="form-control here " disabled value="<?php echo $pro['phn_no'];?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-4 col-form-label">Address</label> 
							<div class="col-8">
								<input class="form-control here " disabled value="<?php echo $pro['address'];?>">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-4 col-form-label">Image</label> 
							<div class="col-8">
								<td class="text-center"><?php echo "<img src='". @$pro['img'] . "'height='250' width='180'>"; ?>
							</td>

						</div>
					</div>

					<div class="form-group row">
						<div class="offset-4 col-8">
							
							<a href="editUserProfile.php?user_id=<?php echo $pro['user_id']; ?>" class="btn btn-primary"   title="Edit" ><i class="fas fa-edit"></i>Edit Profile</a>
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
