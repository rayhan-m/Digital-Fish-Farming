<?php
session_start();
if ($_SESSION['manager_login'] == TRUE) {
$message = "";
require_once './DBManager.php';
$DBM = new DBManager();
if (isset($_POST['button'])) {
	$message = $DBM->addBid($_POST);
}
if (isset($_SESSION['message'])) {
	$message = $_SESSION['message'];
	unset($_SESSION['message']);
}
if (isset($_GET['delete'])) {
	$bid_id = $_GET['delete'];
	$message = $DBM->deleteBid($bid_id);
}
if (isset($_GET['edit'])) {
	$bid_id = $_GET['edit'];
	$bid_id = $_GET['bid_id'];
	$editBid = $DBM->editBid($bid_id);
	$bid = mysqli_fetch_assoc($editBid);
}

$query = $DBM->viewBid();

?>

  <script>
    function myFunction1() {
        var x = document.getElementById("start_price");
        if(x.value <=0){
          x.value="";
        } 
    }
    function myFunction() {
        var x = document.getElementById("quantity");
        if(x.value <=0){
          x.value="";
        } 
    }

    function myFunction2() {
    	var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth()+1; //January is 0!
		var yyyy = today.getFullYear();

		if(dd<10) {
		    dd = '0'+dd
		} 

		if(mm<10) {
		    mm = '0'+mm
		} 

		today = mm + '/' + dd + '/' + yyyy;
    	
        var date = document.getElementById("datepicker1");
        if(date.value < today){
        	alert("End Date Must be Gretter then Start Date..!");
          date.value="";          
        } 
    }
  </script>

<?php include("include/header.php"); ?>
<?php include("include/menubar.php"); ?>
<script>
	$(function () {
		$("#datepicker").datepicker({minDate: "-100Y-1M -10D", maxDate: 0});
	});
</script>
<script>
	$(function () {
		$("#datepicker1").datepicker({minDate: "-100Y-1M -10D", maxDate: 0});
	});
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
							<li class=" active has-sub">
								<a class="js-arrow" href="#">
									<i class="fas fa-th"></i>Bid Board</a>
									<ul class="list-unstyled navbar__sub-list js-sub-list">
										<li class="active">
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
													Create New Bid 
												</button>
											</div>

											<div class="col-md-12">
												<table id="MyDataTable" class="table table-striped table-bordered" style="width:100%">
													<thead>
														<tr>
															<th>Bid ID</th>
															<th>Title</th>
															<th>Fish Name</th>
															<th>Start Date</th>
															<th>End Date</th>
															<th>Start Price</th>
															<th>Quantity</th>
															<th>Action</th>
														</tr>
													</thead>
													<tbody>
														<?php
														while ($viewBid = mysqli_fetch_assoc($query)) {
															?>
															<tr>
																<th><?php echo @$viewBid['bid_id']; ?></th>
																<th><?php echo @$viewBid['title']; ?></th>
																<th><?php echo @$viewBid['fish_name']; ?></th>
																<th><?php echo @$viewBid['start_date']; ?></th>
																<th><?php echo @$viewBid['end_date']; ?></th>
																<th><?php echo @$viewBid['start_price']; ?></th>
																<th><?php echo @$viewBid['quantity']; ?></th>
																<td>

																	<?php 
																		date_default_timezone_set('Asia/Dhaka');
																	$current_date=date('m/d/Y');
																	
																	?>
																	<a href="editBid.php?bid_id=<?php echo $viewBid['bid_id']; ?>" class="btn btn-success <?php if($viewBid['end_date'] < $current_date){?> disabled <?php } ?>"   title="Edit"  ><i class="fas fa-edit "></i></a> 
																	<a href="?delete=<?php echo $viewBid['bid_id']; ?>" class="btn btn-danger <?php if($viewBid['end_date'] < $current_date){?> disabled <?php } ?>"  title="Delete" onclick="return confirm('Are You Sure To Delete!');"><i class="fas fa-trash-alt"></i></a>
																</td>
															</tr>
														<?php } ?>
													</tbody>
													<tfoot>
														<tr>
															<th>Bid ID</th>
															<th>Title</th>
															<th>Fish Name</th>
															<th>Start Date</th>
															<th>End Date</th>
															<th>Start Price</th>
															<th>Quantity</th>
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
										<h2 class="modal-title " id="exampleModalLabel">Bid Information</h2>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										<form action="" method="post" enctype="multipart/form-data">
											<div class="form-group">
												<label>Title:</label>
												<input type="text" name="title"class="form-control" placeholder="Title" required>
											</div>
											<div class="form-group">
												<label>Fish  Name:</label>
												<select type="text" class="form-control" name="fish_name" required>
													<option value="">~~SELECT~~</option>
													<?php
													$connection = mysqli_connect('localhost', 'root', '', 'fish-firm');
													$sql = "SELECT fish_name from fish";
													$result = $connection->query($sql);

													while ($row = $result->fetch_array()) {
														echo "<option value='" . $row['fish_name'] . "'>" . $row['fish_name'] . "</option>";
                                    } // while
                                    
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                            	<label>End Date:</label>
                            	<input type="text" class="form-control" id="datepicker1" name="end_date"  onblur="myFunction2()"  placeholder="End Date" required/>
                            </div>
                            <div class="form-group">
                            	<label>Start Price/KG:</label>
                            	<input type="number" name="start_price" id="start_price" onblur="myFunction1()" class="form-control" placeholder="Enter Price" required>
                            </div>
                            <div class="form-group">
                            	<label>Quantity:</label>
                            	<input type="number" name="quantity" id="quantity" onblur="myFunction()" class="form-control" placeholder="Enter Quantity" required>
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
