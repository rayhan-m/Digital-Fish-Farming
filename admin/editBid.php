<?php 
session_start();
if ($_SESSION['manager_login'] == TRUE) {
require_once './DBManager.php';
$bid_id = $_GET['bid_id']; 
$DBM = new DBManager();
$editBid = $DBM->editBid($bid_id);
$bid = mysqli_fetch_assoc($editBid);
if (isset($_POST['button'])) {
    $DBM->updateBid($_POST);
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
                                        <li>
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
                            <div class="section__content section__content--p30">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="panel-heading ">
                                                <h1 class="text-center"> Edit Bid Info</h1>
                                            </div> <!-- /panel-heading -->   
                                            <div class="test">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                   <input type="hidden" name="bid_id" value="<?php echo $bid['bid_id']; ?>" class="form-control" >
                                                   <div class="form-group">
                                                    <label>Title:</label>
                                                    <input type="text" name="title"class="form-control" placeholder="Enter Title" value="<?php echo $bid['title']; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                   <label>Fish Name:</label>
                                                   <select type="text" class="form-control" name="fish_name" required>
                                                      
                                                      <?php
                                                      $connection = mysqli_connect('localhost', 'root', '', 'fish-firm');
                                                      $sql = "SELECT fish_name from fish";
                                                      $result = $connection->query($sql);

                                                      while ($row = $result->fetch_array()) {
                                                         echo "<option value='" . $row['fish_name'] . "'>" . $row['fish_name'] . "</option>";
                                    } // while
                                    ?>
                                    <option value="<?php if($bid['fish_name'] == $row['fish_name'] ) echo "selected"; ?>"></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Start Date:</label>
                                <input type="text" class="form-control" id="datepicker" name="start_date"placeholder="Start Date" value="<?php echo $bid['start_date']; ?>" required/>
                            </div>
                            <div class="form-group">
                                <label>End Date:</label>
                                <input type="text" class="form-control" id="datepicker" name="end_date"placeholder="End Date" value="<?php echo $bid['end_date']; ?>" required/>
                            </div>
                            <div class="form-group">
                                <label>Start Price/KG:</label>
                                <input type="number" name="start_price"class="form-control" placeholder="Enter Price/KG" value="<?php echo $bid['start_price']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label>Quantity:</label>
                                <input type="number" name="quantity" class="form-control" placeholder="Enter quantity" value="<?php echo $bid['quantity']; ?>" required>
                            </div>                           
                            
                            <button type="submit" name="button" class="btn btn-primary ">Update</button>
                            <a href="bid-info.php" class="btn btn-secondary pull-right">Cancel</a>
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