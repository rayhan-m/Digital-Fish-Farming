<?php
session_start();
if ($_SESSION['manager_login'] == TRUE) {
$message = "";
require_once './DBManager.php';
$DBM = new DBManager();
if (isset($_POST['button'])) {
    $message = $DBM->addPondDetails($_POST);
}
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}
if (isset($_GET['delete'])) {
    $pd_id = $_GET['delete'];
    $message = $DBM->deletePondDetails($pd_id);
}
if (isset($_GET['edit'])) {
    $pd_id = $_GET['edit'];
    $pd_id = $_GET['pd_id'];
    $editPondDetails = $DBM->editPondDetails($pd_id);
    $pd = mysqli_fetch_assoc($editPondDetails);
}

$query = $DBM->viewPondDetails();
?>
  <script>
    function myFunction1() {
        var x = document.getElementById("price");
        if(x.value <=0){
          x.value="";
        } 
    }

  </script>
    <script>
    function myFunction() {
        var x = document.getElementById("quantity");
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
                    <li class="active">
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
                          <div>
                             <h4 class="text-center text-success remove-message"><?php echo $message ?></h4>
                         </div>
                         <div class="section__content section__content--p30">
                             <div class="container-fluid">
                                <div class="row">
                                   <div class="div-action pull pull-right" style="padding-bottom:20px;">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Assign New Pond
                                    </button>
                                </div>
                                <div class="col-md-12">
                                  <table id="MyDataTable" class="table table-striped table-bordered" style="width:100%">
                                     <thead>
                                        <tr>
                                           <th>ID</th>
                                           <th>Pond ID</th>
                                           <th>Fish Name</th>
                                           <th>Price</th>
                                           <th>Quantity</th>
                                           <th>Total</th>
                                           <th>Season Name</th>
                                           <th>Staff ID</th>
                                           <th>Action</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                    <?php
                                    while ($viewPondDetails = mysqli_fetch_assoc($query)) {
                                       ?>
                                       <tr>
                                           <th><?php echo @$viewPondDetails['pd_id']; ?></th>
                                           <th><?php echo @$viewPondDetails['pond_id']; ?></th>
                                           <th><?php echo @$viewPondDetails['fish_name']; ?></th>
                                           <th><?php echo @$viewPondDetails['price']; ?></th>
                                           <th><?php echo @$viewPondDetails['quantity']; ?></th>
                                           <th><?php echo @$viewPondDetails['total']; ?></th>
                                           <th><?php echo @$viewPondDetails['season_name']; ?></th>
                                           <th><?php echo @$viewPondDetails['staff_id']; ?></th>
                                           <td>
                                              <a href="editPondDetails.php?pd_id=<?php echo $viewPondDetails['pd_id']; ?>" class="btn btn-success"   title="Edit" ><i class="fas fa-edit"></i></a> 
                                              <a href="?delete=<?php echo $viewPondDetails['pd_id']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure To Delete!');" ><i class="fas fa-trash-alt"></i></a>
                                          </td>
                                      </tr>
                                  <?php } ?>
                              </tbody>
                              <tfoot>
                                <tr>
                                   <th>ID</th>
                                   <th>Pond ID</th>
                                   <th>Fish Name</th>
                                   <th>Price</th>
                                   <th>Quantity</th>
                                   <th>Total</th>
                                   <th>Season Name</th>
                                   <th>Staff ID</th>
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
                <h2 class="modal-title " id="exampleModalLabel">Assign New Pond</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
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
                              <label>Price/KG:</label>
                              <input type="number" name="price" id="price" onblur="myFunction1()" class="form-control" placeholder="Price/KG" required>
                            </div>
                            <div class="form-group">
                              <label>Quantity:</label>
                              <input type="number" name="quantity" id="quantity" onblur="myFunction()" class="form-control" placeholder="Enter Quantity" required>
                            </div>
                            <div class="form-group">
                                <label>Season Name:</label>
                                <select type="text" class="form-control" name="season_name" required>
                                    <option value="">~~SELECT~~</option>
                                    <?php
                                    $connection = mysqli_connect('localhost', 'root', '', 'fish-firm');
                                    $sql = "SELECT season_name from season";
                                    $result = $connection->query($sql);

                                    while ($row = $result->fetch_array()) {
                                        echo "<option value='" . $row['season_name'] . "'>" . $row['season_name'] . "</option>";
                                    } // while
                                    
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Staff ID:</label>
                                <select type="number" class="form-control" name="staff_id" required>
                                    <option value="">~~SELECT~~</option>
                                    <?php
                                    $connection = mysqli_connect('localhost', 'root', '', 'fish-firm');
                                    $sql = "SELECT staff_id from staff";
                                    $result = $connection->query($sql);

                                    while ($row = $result->fetch_array()) {
                                        echo "<option value='" . $row['staff_id'] . "'>" . $row['staff_id'] . "</option>";
                                    } // while
                                    
                                    ?>
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
    header('location:login.php');
}
?>