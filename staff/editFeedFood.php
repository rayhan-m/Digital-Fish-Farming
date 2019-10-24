<?php 
@session_start();
if ($_SESSION['staff_login'] == TRUE) {
require_once '../admin/DBManager.php';
$ff_id = $_GET['ff_id']; 
$DBM = new DBManager();
$editFeedFood = $DBM->editFeedFood($ff_id);
$feed_food = mysqli_fetch_assoc($editFeedFood);
if (isset($_POST['button'])) {
	$DBM->updateFeedFood($_POST);
}
?>
<?php include("include/header.php"); ?>
<?php include("include/menubar.php"); ?>
<script>
	$(function () {
		$("#datepicker").datepicker({minDate: "-100Y-1M -10D", maxDate: 0});
	});
</script>
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
				<div class="section__content section__content--p30">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<div class="panel-heading ">
									<h1 class="text-center"> Edit Feed Food</h1>
								</div> <!-- /panel-heading -->   
								<div class="test">
									<form action="" method="post" enctype="multipart/form-data">
										<input type="hidden" name="ff_id" value="<?php echo $feed_food['ff_id']; ?>" class="form-control" >

										<div class="form-group row">
                                            <label for="name" class="col-4 col-form-label">Staff ID</label> 
                                            <div class="col-8">
                                                <input name="staff_id" class="form-control here " type="text"readonly  value="<?php echo $feed_food['staff_id']; ?>">
                                            </div>
                                        </div>

                            <div class="form-group">
                            	<label>Pond ID:</label>
                            	<select type="number" class="form-control" name="pond_id" required>

                            		<?php
                            		$connection = mysqli_connect('localhost', 'root', '', 'fish-firm');
                            		$sql = "SELECT pond_id from pond";
                            		$result = $connection->query($sql);

                            		while ($row = $result->fetch_array()) {
                            			echo "<option value='" . $row['pond_id'] . "'>" . $row['pond_id'] . "</option>";
                                    } // while

                                    ?>
                                    <option value="<?php if($feed_food['pond_id'] == $row['pond_id'] ) echo "selected"; ?>"></option>
                                </select>
                            </div>

                            <div class="form-group">
                            	<label>Paddy shell:</label>
                            	<select type="number" class="form-control" name="psq" required>
                            		<option value="">~~SELECT~~</option>
                            		<option value="1"<?php if ($feed_food['psq'] == '1') echo "selected"; ?> >1 KG</option>
                            		<option value="2" <?php if ($feed_food['psq'] == '2') echo "selected"; ?> >2 KG</option>
                            		<option value="3" <?php if ($feed_food['psq'] == '3') echo "selected"; ?> >3 KG</option>
                            		<option value="4" <?php if ($feed_food['psq'] == '4') echo "selected"; ?> >4 KG</option>
                            		<option value="5" <?php if ($feed_food['psq'] == '5') echo "selected"; ?> >5 KG</option>
                            	</select>
                            </div>
                            <div class="form-group">
                            	<label>Boil rice:</label>
                            	<select type="number" class="form-control" name="brq" required>
                            		<option value="">~~SELECT~~</option>
                            		<option value="1"<?php if ($feed_food['psq'] == '1') echo "selected"; ?> >1 KG</option>
                            		<option value="2" <?php if ($feed_food['psq'] == '2') echo "selected"; ?> >2 KG</option>
                            		<option value="3" <?php if ($feed_food['psq'] == '3') echo "selected"; ?> >3 KG</option>
                            		<option value="4" <?php if ($feed_food['psq'] == '4') echo "selected"; ?> >4 KG</option>
                            		<option value="5" <?php if ($feed_food['psq'] == '5') echo "selected"; ?> >5 KG</option>
                            	</select>
                            </div>
                            <div class="form-group">
                            	<label>Flour:</label>
                            	<select type="number" class="form-control" name="fq" required>
                            		<option value="">~~SELECT~~</option>
                            		<option value="1"<?php if ($feed_food['psq'] == '1') echo "selected"; ?> >1 KG</option>
                            		<option value="2" <?php if ($feed_food['psq'] == '2') echo "selected"; ?> >2 KG</option>
                            		<option value="3" <?php if ($feed_food['psq'] == '3') echo "selected"; ?> >3 KG</option>
                            		<option value="4" <?php if ($feed_food['psq'] == '4') echo "selected"; ?> >4 KG</option>
                            		<option value="5" <?php if ($feed_food['psq'] == '5') echo "selected"; ?> >5 KG</option>
                            	</select>
                            </div>
                            <div class="form-group">
                            	<label>Megavit Aqua:</label>
                            	<select type="number" class="form-control" name="maq" required>
                            		<option value="">~~SELECT~~</option>
                            		<option value="1"<?php if ($feed_food['psq'] == '1') echo "selected"; ?> >1 KG</option>
                            		<option value="2" <?php if ($feed_food['psq'] == '2') echo "selected"; ?> >2 KG</option>
                            		<option value="3" <?php if ($feed_food['psq'] == '3') echo "selected"; ?> >3 KG</option>
                            		<option value="4" <?php if ($feed_food['psq'] == '4') echo "selected"; ?> >4 KG</option>
                            		<option value="5" <?php if ($feed_food['psq'] == '5') echo "selected"; ?> >5 KG</option>
                            	</select>
                            </div>
                            <div class="form-group">
                            	<label>Bargafat:</label>
                            	<select type="number" class="form-control" name="bq" required>
                            		<option value="">~~SELECT~~</option>
                            		<option value="1"<?php if ($feed_food['psq'] == '1') echo "selected"; ?> >1 KG</option>
                            		<option value="2" <?php if ($feed_food['psq'] == '2') echo "selected"; ?> >2 KG</option>
                            		<option value="3" <?php if ($feed_food['psq'] == '3') echo "selected"; ?> >3 KG</option>
                            		<option value="4" <?php if ($feed_food['psq'] == '4') echo "selected"; ?> >4 KG</option>
                            		<option value="5" <?php if ($feed_food['psq'] == '5') echo "selected"; ?> >5 KG</option>
                            	</select>
                            </div>                          
                            <button type="submit" name="button" class="btn btn-primary ">Update</button>
                            <a href="pond.php" class="btn btn-secondary pull-right">Cancel</a>
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