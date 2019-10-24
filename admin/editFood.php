<?php 
session_start();
if ($_SESSION['manager_login'] == TRUE) {
require_once './DBManager.php';
$food_id = $_GET['food_id']; 
$DBM = new DBManager();
$editFood = $DBM->editFood($food_id);
$food = mysqli_fetch_assoc($editFood);
if (isset($_POST['button'])) {
    $DBM->updateFood($_POST);
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
                    <li class="Active has-sub">
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
                            <li class="  has-sub">
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
                                                <h1 class="text-center"> Edit Food Info</h1>
                                            </div> <!-- /panel-heading -->   
                                            <div class="test">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="form-group">
                                                        <input type="hidden" name="food_id" value="<?php echo $food['food_id']; ?>" class="form-control" >
                                                        <label>Food Name:</label>
                                                        <div>
                                                            <input type="text" name="food_name"class="form-control" placeholder="Enter Food Name" value="<?php echo $food['food_name']; ?>" required>
                                                        </div>
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
    header('location:login.php');
}
?>