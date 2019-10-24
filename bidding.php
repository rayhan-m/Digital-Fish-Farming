<?php
@session_start();
if ($_SESSION['user_login'] == TRUE) {
$message = "";
require_once './admin/DBManager.php';
$DBM = new DBManager();
$bid_id = $_GET['bid_id'];
$query = $DBM->viewIndBid($bid_id);
$bid = mysqli_fetch_assoc($query);

if (isset($_POST['button'])) {
	$message = $DBM->addComments($_POST);
}

// $query = $DBM->viewComments();

?>
  <script>
    function myFunction() {
        var x = document.getElementById("price");
        if(x.value <=0){
          x.value="";
        } 
    }

  </script>
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
						<h4>Bid ID: <span><?php echo $bid['bid_id'];?> </span></h4><h4> Title: <span><?php echo $bid['title']; ?></span> || Fish Name:<span> <?php echo $bid['fish_name'];?> </span></h4><h4> Start Date: <span><?php echo $bid['start_date'];?></span> || End Date:<span><?php echo $bid['end_date'];?></span></h4><h4>Start Price:<span><?php echo $bid['start_price'];?></span> || Quantity:<span><?php echo $bid['quantity'];?></span></h4>
					</div>
					<div class="col-md-12">
						<h4 class="text-center text-success "><?php echo $message; ?></h4>
					</div>
					<div class="col-md-12">
						<h3 class="text-center text-success">
							<?php

							$connection = mysqli_connect('localhost', 'root', '', 'fish-firm');
							$sql = "SELECT user_name, price FROM comments WHERE price=(SELECT MAX(price) FROM comments WHERE bid_id='$bid_id')";
							$result = $connection->query($sql);
							$viewWinBid = mysqli_fetch_assoc($result);

							date_default_timezone_set('Asia/Dhaka');
							$current_date=date('m/d/Y');
							if($bid['end_date'] < $current_date){
								echo "(" .$viewWinBid['user_name']. ") Win The Bid : ";
								echo  $viewWinBid['price']; 
							}
							?>
						</h3>
					</div>
					<div class="col-md-12">
						<h1 class="text-center">Bit High Price To Win</h1>
					</div>
					<div class="col-md-12">
						<div class="col-md-12"><h4>Current Highest Bid: <span class="badge bg-success">
							<?php

							$connection = mysqli_connect('localhost', 'root', '', 'fish-firm');
						// $sql = "SELECT MAX(price) FROM comments WHERE bid_id='$bid_id'";
							$sql = "SELECT MAX(price) FROM comments WHERE bid_id='$bid_id'";
							$result = $connection->query($sql);
							$viewHighestBid = mysqli_fetch_assoc($result);

							echo $viewHighestBid['MAX(price)']; ?>
						</span class="badge bg-primary">TK/KG</h4>
					</div>
					<div class="col-md-12"><h4>Total Bid: <span class="badge bg-success">
						<?php

						$connection = mysqli_connect('localhost', 'root', '', 'fish-firm');
						$sql = "SELECT count(comment_id) FROM comments WHERE bid_id='$bid_id'";
						$result = $connection->query($sql);
						$viewTotalBid = mysqli_fetch_assoc($result);

						echo $viewTotalBid['count(comment_id)']; ?></span></h4>
					</div>
					<div class="col-md-6 offset-md-3 col-sm-6 offset-sm-3 col-12 comments-main pb-4 rounded">


						<form action="" method="post" class="row comment-box-main p-3 rounded-bottom">
							<input type="hidden" name="bid_id" value="<?php echo $bid['bid_id']; ?>" class="form-control" >
							<div class="col-md-9 col-sm-9 col-9 pr-0 comment-box">
								<input type="number" name="price" id="price" onblur="myFunction()" class="form-control" placeholder="Enter Bid Price" />
							</div>
							<div class="col-md-2 col-sm-2 col-2 pl-0 text-center send-btn">
								<button class="btn btn-info" name="button" <?php
								date_default_timezone_set('Asia/Dhaka');
								$current_date=date('m/d/Y');
								if($bid['end_date'] < $current_date){?> disabled <?php } ?>/>BID</button>
							</div>
						</form>


						<ul class="p-0">
							<?php
							$connection = mysqli_connect('localhost', 'root', '', 'fish-firm');
							$sql = "SELECT * FROM comments WHERE bid_id='$bid_id'";
							$result = $connection->query($sql);
							while ($viewComments = mysqli_fetch_assoc($result)) {
								?>
								<li>
									<div class="row comments mb-2">
										<div class="col-md-2 col-sm-2 col-3 text-center user-img">

											<?php
								$uName=$viewComments['user_name'];
								$sql1 = "SELECT img FROM user WHERE user_name='$uName'";
								$result1 = $connection->query($sql1);
								$viewImg = mysqli_fetch_assoc($result1);
								?>

											<img id="profile-photo" src="<?php echo @$viewImg['img'];?>" class="rounded-circle" />
										</div>
										<div class="col-md-9 col-sm-9 col-9 comment rounded mb-2">
											<h4 class="m-0">
												<!-- <?php 
												
        										$user_name=$_SESSION['user_name'];
        										echo $user_name;
        										?> -->
        										<?php echo $viewComments['user_name']; ?>
        									</h4>
        									<time class="text-white ml-3"><?php echo $viewComments['date']; ?> <?php echo $viewComments['time']; ?></time>
        									<like></like>
        									<p class="mb-0 text-white"><?php echo $viewComments['price']; ?></p>
        								</div>
        							</div>

        						</li>
        					<?php } ?>
							<!-- <ul class="p-0">
								<li>
									<div class="row comments mb-2">
										<div class="col-md-2 offset-md-2 col-sm-2 offset-sm-2 col-3 offset-1 text-center user-img">
											<img id="profile-photo" src="http://nicesnippets.com/demo/man02.png" class="rounded-circle" />
										</div>
										<div class="col-md-7 col-sm-7 col-8 comment rounded mb-2">
											<h4 class="m-0"><a href="#">Steve Alex</a></h4>
											<time class="text-white ml-3">1 week ago</time>
											<like></like>
											<p class="mb-0 text-white">Thank you for visiting all the way from NYC.</p>
										</div>
									</div>
								</li>
							</ul> -->
						</ul>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT-->
	<?php include("include/footer.php"); 
}else{
    header('location:login.php');
}
?>
