<?php 
session_start();
if ($_SESSION['owner_login'] == TRUE) {
require_once '../admin/DBManager.php';
$mp_id = $_GET['mp_id']; 
$DBM = new DBManager();
$editManagerPayment = $DBM->editManagerPayment($mp_id);
$manager_payment = mysqli_fetch_assoc($editManagerPayment);
if (isset($_POST['button'])) {
    $DBM->updateManagerPayment($_POST);
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
                    
                    <li>
                        <a href="manager.php"><i class="fab fa-audible"></i>Manager</a>
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
                    <li class=" has-sub">
                        <a class="js-arrow" href="#">
                            <i class="fas fa-utensils"></i>Food Stock</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
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
                                        <a href="manager-payment.php">Manager Payment</a>
                                    </li>
                                </ul>
                            </li>
                            <li class=" has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-th"></i>Bid Board</a>
                                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                                        <li>
                                            <a href="bid-board.php">Bid Board</a>
                                        </li>

                                    </ul>
                                </li>
                                <li class=" has-sub">
                                    <a class="js-arrow" href="#">
                                        <i class="fas fa-cart-arrow-down"></i>Sell Information</a>
                                        <ul class="list-unstyled navbar__sub-list js-sub-list">
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
                                                <h1 class="text-center"> Edit Manager Payment Info</h1>
                                            </div> <!-- /panel-heading -->   
                                            <div class="test">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="mp_id" value="<?php echo $manager_payment['mp_id']; ?>" class="form-control">
                                                    <div class="form-group">
                                                      <label>Manager ID:</label>
                                                      <select type="number" class="form-control" name="manager_id" required>

                                                         <?php
                                                         $connection = mysqli_connect('localhost', 'root', '', 'fish-firm');
                                                         $sql = "SELECT manager_id from manager";
                                                         $result = $connection->query($sql);

                                                         while ($row = $result->fetch_array()) {
                                                            echo "<option value='" . $row['manager_id'] . "'>" . $row['manager_id'] . "</option>";
	                                    } // while
	                                    ?>
	                                    <option value="<?php if($manager_payment['manager_id'] == $row['manager_id'] ) echo "selected"; ?>"></option>
	                                </select>
	                            </div>   

                                <div class="form-group">
                                    <label>Payment Month</label>
                                    <div>
                                        <select class="form-control" name="payment_month" required>
                                            <option value="">~~SELECT~~</option>
                                            <option value="January" <?php if ($manager_payment['payment_month'] == 'January') echo "selected"; ?> >January</option>
                                            <option value="February" <?php if ($manager_payment['payment_month'] == 'February') echo "selected"; ?> >February</option>
                                            <option value="March" <?php if ($manager_payment['payment_month'] == 'March') echo "selected"; ?> >March</option>
                                            <option value="April" <?php if ($manager_payment['payment_month'] == 'April') echo "selected"; ?>>April</option>
                                            <option value="May" <?php if ($manager_payment['payment_month'] == 'May') echo "selected"; ?>>May</option>
                                            <option value="June" <?php if ($manager_payment['payment_month'] == 'June') echo "selected"; ?>>June</option>
                                            <option value="July" <?php if ($manager_payment['payment_month'] == 'July') echo "selected"; ?>>July</option>
                                            <option value="August" <?php if ($manager_payment['payment_month'] == 'August') echo "selected"; ?>>August</option>
                                            <option value="September" <?php if ($manager_payment['payment_month'] == 'September') echo "selected"; ?>>September</option>
                                            <option value="October" <?php if ($manager_payment['payment_month'] == 'October') echo "selected"; ?>>October</option>
                                            <option value="November" <?php if ($manager_payment['payment_month'] == 'November') echo "selected"; ?>>November</option>
                                            <option value="December" <?php if ($manager_payment['payment_month'] == 'December') echo "selected"; ?>>December</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Salary:</label>
                                    <input type="number" value="<?php echo $manager_payment['salary']; ?>" name="salary" class="form-control" placeholder="Salary" required>
                                </div> 
                                <div class="form-group">
                                    <label>Payment Status</label>
                                    <div>
                                        <select class="form-control" name="status" required>
                                            <option value="">~~SELECT~~</option>
                                            <option value="Pending" <?php if ($manager_payment['status'] == 'Pending') echo "selected"; ?>>Pending</option>
                                            <option value="Confirm" <?php if ($manager_payment['status'] == 'Confirm') echo "selected"; ?>>Confirm</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" name="button" class="btn btn-primary ">Update</button>
                                <a href="staff-payment.php" class="btn btn-secondary pull-right">Cancel</a>
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