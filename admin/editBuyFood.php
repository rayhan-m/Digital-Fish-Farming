<?php 
session_start();
if ($_SESSION['manager_login'] == TRUE) {
require_once './DBManager.php';
$buy_id = $_GET['buy_id']; 
$DBM = new DBManager();
$editBuyFood = $DBM->editBuyFood($buy_id);
$buy_food = mysqli_fetch_assoc($editBuyFood);
if (isset($_POST['button'])) {
    $DBM->updateBuyFood($_POST);
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
                    <li class="active has-sub">
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
                                        <li >
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
                                                <h1 class="text-center"> Edit Pond Info</h1>
                                            </div> <!-- /panel-heading -->   
                                            <div class="test">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                   <input type="hidden" name="buy_id" value="<?php echo $buy_food['buy_id']; ?>" class="form-control" >
                                                   <div class="form-group">
                                                    <label>Food Name:</label>
                                                    <select type="text" class="form-control" name="food_name" required>
                                                        <option value="">~~SELECT~~</option>
                                                        <option value="Paddy shell" <?php if ($buy_food['food_name'] == 'Paddy shell') echo "selected"; ?> >Paddy shell</option>
                                                        <option value="Boil rice" <?php if ($buy_food['food_name'] == 'Boil rice') echo "selected"; ?>>Boil rice</option>
                                                        <option value="Flour" <?php if ($buy_food['food_name'] == 'Flour') echo "selected"; ?>>Flour</option>
                                                        <option value="Megavit Aqua" <?php if ($buy_food['food_name'] == 'Megavit Aqua') echo "selected"; ?>>Megavit Aqua</option>
                                                        <option value="Bargafat" <?php if ($buy_food['food_name'] == 'Bargafat') echo "selected"; ?>>Bargafat</option>
                                                        
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label>Price/KG:</label>
                                                    <input type="number" name="price"class="form-control" placeholder="Enter Price/KG" value="<?php echo $buy_food['price']; ?>" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>quantity:</label>
                                                    <input type="number" name="quantity" class="form-control" placeholder="Enter quantity" value="<?php echo $buy_food['quantity']; ?>" required>
                                                </div>                           
                                                <div class="form-group">
                                                    <label for="Food_In Date">Food In Date:</label>
                                                    <input type="text" class="form-control" id="datepicker" name="in_date"placeholder="Food In Date" value="<?php echo $buy_food['in_date']; ?>" required/>
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