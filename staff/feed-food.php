
<?php
session_start();
if ($_SESSION['staff_login'] == TRUE) {
$message = "";
    require_once '../admin/DBManager.php';
	$DBM = new DBManager();
    if (isset($_POST['button'])) {
        $message = $DBM->addFeedFood($_POST);
    }
    if (isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        unset($_SESSION['message']);
    }
    if (isset($_GET['delete'])) {
    $ff_id = $_GET['delete'];
    $message = $DBM->deleteFeedFood($ff_id);
	}
	if (isset($_GET['edit'])) {
    $ff_id = $_GET['edit'];
    $ff_id = $_GET['ff_id'];
    $editFeedFood = $DBM->editFeedFood($ff_id);
    $feed_food = mysqli_fetch_assoc($editFeedFood);
	}
    
    $query = $DBM->viewFeedFood();


    if (isset($_POST['btn'])) {

	$connection = mysqli_connect('localhost', 'root', '', 'fish-firm');

	$sql = "SELECT psq FROM feed_food WHERE status='Undone'";
	$query = $connection->query($sql);
	$PSQ = 0;
	while ($orderResult = $query->fetch_assoc()) {
		$PSQ += $orderResult['psq'];
	}

	$sql = "SELECT brq FROM feed_food WHERE status='Undone'";
	$query = $connection->query($sql);
	$BRQ = 0;
	while ($orderResult = $query->fetch_assoc()) {
		$BRQ += $orderResult['brq'];
	}

	$sql = "SELECT fq FROM feed_food WHERE status='Undone'";
	$query = $connection->query($sql);
	$FQ = 0;
	while ($orderResult = $query->fetch_assoc()) {
		$FQ += $orderResult['fq'];
	}

	$sql = "SELECT maq FROM feed_food WHERE status='Undone'";
	$query = $connection->query($sql);
	$MAQ = 0;
	while ($orderResult = $query->fetch_assoc()) {
		$MAQ += $orderResult['maq'];
	}

	$sql = "SELECT bq FROM feed_food WHERE status='Undone'";
	$query = $connection->query($sql);
	$BQ = 0;
	while ($orderResult = $query->fetch_assoc()) {
		$BQ += $orderResult['bq'];
	}

	$sql2 = "SELECT * FROM stock";
	$query = $connection->query($sql2);
	$stk = mysqli_fetch_assoc($query);
	$PSQ1= $stk['psq'] - $PSQ;
	$BRQ1= $stk['brq'] - $BRQ;
	$FQ1= $stk['fq'] - $FQ;
	$MAQ1= $stk['maq'] - $MAQ;
	$BQ1= $stk['bq'] - $BQ;

	if(($stk['psq'] <= $PSQ) || ($stk['brq'] <= $BRQ) || ($stk['fq'] <= $FQ) || ($stk['maq'] <= $MAQ) || ($stk['bq'] <= $BQ)){
		$message= "Stock Unavailable";
		$query = $DBM->viewFeedFood();	
	}else{

		$sql1 = "UPDATE stock SET psq ='$PSQ1', brq='$BRQ1',fq='$FQ1',maq='$MAQ1',bq='$BQ1' WHERE stock_id= 1";
		$query = $connection->query($sql1);

		$sql2 = "UPDATE feed_food SET status='Done'";
		$query = $connection->query($sql2);
		header('location:feed-food.php');
	}
	
}
?>



<?php include("include/header.php"); ?>
<?php include("include/menubar.php"); ?>
<script>
	$(function () {
	    $("#datepicker").datepicker({minDate: "-100Y-1M -10D", maxDate: 0});
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
						<a  href="staff-dashboard.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
					</li>
					<li>
						<a href="pond-details.php"><i class="fas fa-chart-bar"></i>Pond Details</a>
					</li>
					<li class="has-sub active">
						<a class="js-arrow" href="#">
							<i class="fas fa-tachometer-alt"></i>Food Stock</a>
							<ul class="list-unstyled navbar__sub-list js-sub-list">
								<li class="active">
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
		<div>
			<h4 class="text-center text-success remove-message"><?php echo $message ?></h4>
		</div>
		<div class="section__content section__content--p30">
			<div class="container-fluid">
				<div class="row">
					<div class="div-action pull pull-right" style="padding-bottom:20px;">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Feed Now
                            </button>
                        </div>
					<div class="col-md-12">
						<table id="MyDataTable" class="table table-striped table-bordered" style="width:100%">
							<thead>
								<tr>
									<th>ID</th>
									<th>Staff Name</th>
									<th>Pond ID</th>
									<th>Date</th>
									<th>Paddy</th>
									<th>Boil rice</th>
									<th>Flour</th>
									<th>Aqua</th>
									<th>Barga</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
	                            while ($viewFeedFood = mysqli_fetch_assoc($query)) {
	                            ?>
	                            <tr>
									<th><?php echo @$viewFeedFood['ff_id']; ?></th>
									<th><?php echo @$viewFeedFood['staff_id']; ?></th>
									<th><?php echo @$viewFeedFood['pond_id']; ?></th>
									<th><?php echo @$viewFeedFood['fdate']; ?></th>
									<th><?php echo @$viewFeedFood['psq']; ?> /KG</th>
									<th><?php echo @$viewFeedFood['brq']; ?> /KG</th>
									<th><?php echo @$viewFeedFood['fq']; ?> /KG</th>
									<th><?php echo @$viewFeedFood['maq']; ?> /KG</th>
									<th><?php echo @$viewFeedFood['bq']; ?> /KG</th>
									<th><?php echo @$viewFeedFood['status']; ?></th>
									<td>
										<a href="editFeedFood.php?ff_id=<?php echo $viewFeedFood['ff_id']; ?>" class="btn btn-success <?php if($viewFeedFood['status']=='Done'){?> disabled <?php }?>"   title="Edit" ><i class="fas fa-edit"></i></a> 
										<a href="?delete=<?php echo $viewFeedFood['ff_id']; ?>" class="btn btn-danger <?php if($viewFeedFood['status']=='Done'){?> disabled <?php }?>"  title="Delete" onclick="return confirm('Are You Sure To Delete!');" ><i class="fas fa-trash-alt"></i></a>
										<form action="" method="post">
											<button type="submit" name="btn" class="au-btn au-btn-icon au-btn--blue">Done</button>
										</form>
									</td>
								</tr>
								</tr>
								<?php } ?>
							</tbody>
							<tfoot>
								<tr>
									<th>ID</th>
									<th>Staff Name</th>
									<th>Pond ID</th>
									<th>Date</th>
									<th>Paddy</th>
									<th>Boil rice</th>
									<th>Flour</th>
									<th>Aqua</th>
									<th>Barga</th>
									<th>Status</th>
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
                        <h2 class="modal-title " id="exampleModalLabel">Feed Food</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                            	<?php
                                    $connection = mysqli_connect('localhost', 'root', '', 'fish-firm');
                                    $uName=$_SESSION['user_name'];
                                    $sql = "SELECT staff_id from staff WHERE user_name='$uName'";
                                    $result = $connection->query($sql);
                                    $viewStaff = mysqli_fetch_assoc($result); 
                                    ?>
                            	<input type="hidden" name="staff_id" value="<?php echo $viewStaff['staff_id']; ?>" class="form-control" >

                            </div>
                            <div class="form-group">
                                <label>Pond ID:</label>
                                <select type="number" class="form-control" name="pond_id" required>
                                    <option value="">~~SELECT~~</option>
                                    <?php
                                    $connection = mysqli_connect('localhost', 'root', '', 'fish-firm');
                                    $sql = "SELECT pond_id from pond";
                                    $result = $connection->query($sql);

                                    while ($row = $result->fetch_array()) {
                                        echo "<option value='" . $row['pond_id'] . "'>" . $row['pond_id'] . "</option>";
                                    } // while

                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Paddy shell:</label>
                                <select type="number" class="form-control" name="psq" required>
                                    <option value="">~~SELECT~~</option>
                                    <option value="1">1 KG</option>
                                    <option value="2">2 KG</option>
                                    <option value="3">3 KG</option>
                                    <option value="4">4 KG</option>
                                    <option value="5">5 KG</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Boil rice:</label>
                                <select type="number" class="form-control" name="brq" required>
                                    <option value="">~~SELECT~~</option>
                                    <option value="1">1 KG</option>
                                    <option value="2">2 KG</option>
                                    <option value="3">3 KG</option>
                                    <option value="4">4 KG</option>
                                    <option value="5">5 KG</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Flour:</label>
                                <select type="number" class="form-control" name="fq" required>
                                    <option value="">~~SELECT~~</option>
                                    <option value="1">1 KG</option>
                                    <option value="2">2 KG</option>
                                    <option value="3">3 KG</option>
                                    <option value="4">4 KG</option>
                                    <option value="5">5 KG</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Fmegavit Aqua:</label>
                                <select type="number" class="form-control" name="maq" required>
                                    <option value="">~~SELECT~~</option>
                                    <option value="1">1 KG</option>
                                    <option value="2">2 KG</option>
                                    <option value="3">3 KG</option>
                                    <option value="4">4 KG</option>
                                    <option value="5">5 KG</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Bargafat:</label>
                                <select type="number" class="form-control" name="bq" required>
                                    <option value="">~~SELECT~~</option>
                                    <option value="1">1 KG</option>
                                    <option value="2">2 KG</option>
                                    <option value="3">3 KG</option>
                                    <option value="4">4 KG</option>
                                    <option value="5">5 KG</option>
                                </select>
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
	header('location:../admin/login.php');
}
?>
