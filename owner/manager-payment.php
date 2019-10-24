<?php
session_start();
if ($_SESSION['owner_login'] == TRUE) {
$message = "";
require_once '../admin/DBManager.php';
$DBM = new DBManager();
if (isset($_POST['button'])) {
    $message = $DBM->addManagerPayment($_POST);
}
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}
if (isset($_GET['delete'])) {
    $payment_id = $_GET['delete'];
    $message = $DBM->deleteManagerPayment($payment_id);
}
if (isset($_GET['edit'])) {
    $payment_id = $_GET['edit'];
    $payment_id = $_GET['payment_id'];
    $editManagerPayment = $DBM->editManagerPayment($payment_id);
    $manager_payment = mysqli_fetch_assoc($editManagerPayment);
}

$query = $DBM->viewManagerPayment();
?>

<script>
    function myFunction() {
        var x = document.getElementById("salary");
        if(x.value <=0){
          x.value="";
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
                          <div>
                             <h4 class="text-center text-success remove-message"><?php echo $message ?></h4>
                         </div>
                         <div class="section__content section__content--p30">
                             <div class="container-fluid">
                                <div class="row">
                                   <div class="div-action pull pull-right" style="padding-bottom:20px;">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                        Add New Payment
                                    </button>
                                </div>
                                <div class="col-md-12">
                                  <table id="MyDataTable" class="table table-striped table-bordered" style="width:100%">
                                     <thead>
                                        <tr>
                                           <th>Payment ID</th>
                                           <th>Manager ID</th>
                                           <th>Payment Date</th>
                                           <th>Payment Month</th>
                                           <th>Salary</th>
                                           <th>Status</th>
                                           <th>Action</th>
                                       </tr>
                                   </thead>

                                   <tbody >
                                    <?php
                                    while ($viewManagerPayment = mysqli_fetch_assoc($query)) {
                                       ?>
                                       <tr>
                                           <td><?php echo @$viewManagerPayment['mp_id']; ?></td>
                                           <td><?php echo @$viewManagerPayment['manager_id']; ?></td>
                                           <td><?php echo @$viewManagerPayment['payment_date']; ?></td>
                                           <td><?php echo @$viewManagerPayment['payment_month']; ?></td>
                                           <td><?php echo @$viewManagerPayment['salary']; ?> TK</td>
                                           <td><?php echo @$viewManagerPayment['status']; ?></td>
                                           <td>
                                              <a href="editManagerPayment.php?mp_id=<?php echo $viewManagerPayment['mp_id']; ?>" class="btn btn-success"   title="Edit" ><i class="fas fa-edit"></i></a> 
                                              <a href="?delete=<?php echo $viewManagerPayment['mp_id']; ?>" class="btn btn-danger" title="Delete" onclick="return confirm('Are You Sure To Delete!');" ><i class="fas fa-trash-alt"></i></a>
                                          </td>
                                      </tr>
                                  <?php } ?>
                              </tbody>

                              <tfoot>
                                <tr>
                                   <th>Payment ID</th>
                                   <th>Manager ID</th>
                                   <th>Payment Date</th>
                                   <th>Payment Month</th>
                                   <th>Salary</th>
                                   <th>Status</th>
                                   <th>Action</th>
                               </tr>
                           </tfoot>
                       </table>
                   </div>					
               </div>
           </div>
       </div>
       <div class="row">
         <div class="col-md-12">
            <div class="copyright">
               <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
           </div>
       </div>
   </div>
   <!-- END MAIN CONTENT-->

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title " id="exampleModalLabel">Manager Payment</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                   <div class="form-group">
                    <label>Manager ID:</label>
                    <select type="number" class="form-control" name="manager_id" required>
                        <option value="">~~SELECT~~</option>
                        <?php
                        $connection = mysqli_connect('localhost', 'root', '', 'fish-firm');
                        $sql = "SELECT manager_id from manager";
                        $result = $connection->query($sql);

                        while ($row = $result->fetch_array()) {
                            echo "<option value='" . $row['manager_id'] . "'>" . $row['manager_id'] . "</option>";
                                    } // while
                                    
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Payment Month</label>
                                <div>
                                    <select class="form-control" name="payment_month" required>
                                        <option value="">~~SELECT~~</option>
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Salary</label>
                                <input type="number" name="salary" id="salary" onblur="myFunction()"  class="form-control" placeholder="Salary" required>
                            </div> 
                            <div class="form-group">
                                <label>Payment Status</label>
                                <div>
                                    <select class="form-control" name="status" required>
                                        <option value="">~~SELECT~~</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Confirm">Confirm</option>
                                    </select>
                                </div>
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
