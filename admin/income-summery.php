<?php
session_start();
if ($_SESSION['manager_login'] == TRUE) {
	$connection = mysqli_connect('localhost', 'root', '', 'fish-firm');
    $sql = "SELECT total FROM sell_fish";
	$query = $connection->query($sql);
	$TotalSell = 0;
	while ($orderResult = $query->fetch_assoc()) {
		$TotalSell += $orderResult['total'];
	}

	$sql = "SELECT total FROM sell_fish WHERE payment_status='Pending'";
	$query = $connection->query($sql);
	$TotalDue = 0;
	while ($orderResult = $query->fetch_assoc()) {
		$TotalDue += $orderResult['total'];
	}

    $sql = "SELECT total FROM pond_details";
	$query = $connection->query($sql);
	$TotalBuyFish = 0;
	while ($orderResult = $query->fetch_assoc()) {
		$TotalBuyFish += $orderResult['total'];
	}

	$sql = "SELECT total_price FROM buy_food";
	$query = $connection->query($sql);
	$TotalBuyFood = 0;
	while ($orderResult = $query->fetch_assoc()) {
		$TotalBuyFood += $orderResult['total_price'];
	}

	$sql = "SELECT salary FROM staff_payment";
	$query = $connection->query($sql);
	$TotalStaffSalary = 0;
	while ($orderResult = $query->fetch_assoc()) {
		$TotalStaffSalary += $orderResult['salary'];
	}

	$sql = "SELECT salary FROM manager_payment";
	$query = $connection->query($sql);
	$TotalManagerSalary = 0;
	while ($orderResult = $query->fetch_assoc()) {
		$TotalManagerSalary += $orderResult['salary'];
	}
	$TotalExpense = 0;
	$TotalExpense=$TotalBuyFish + $TotalBuyFood + $TotalStaffSalary + $TotalManagerSalary ;


	$NetIncome=0;
	$NetIncome= $TotalSell - $TotalExpense;

	date_default_timezone_set('Asia/Dhaka');
        $current_date=date('m/d/Y');
        $time=date('h:i:s A');
  if(isset($_POST["generate_pdf"]))  
 {  
      require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Total Expense");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 11);  
      $obj_pdf->AddPage();  
      $content = ''; 
      	
      $content .= '  
      <img src="images/icon/logo123.png" height="60px" width="100px" style="margin-left:50%"/>

      <h4 align="center">Total Expense Report</h4> 
      <h4 align="center">'.$current_date.' | ' .$time. '</h4><br /> 
      <table border="1" cellspacing="0" cellpadding="3" align="center" >  
           <thead>
		      <tr>
		        <th width="10%">SL No</th>
		        <th width="60%">Title of Account</th>
		        <th width="30%">Total Cost</th>
		      </tr>
		    </thead>
		    <tbody>
	    	<tr class="success">
		        <td width="10%">1</td>
		        <td width="60%">Total Revenue</td>
		        <td width="30%">'. $TotalSell.' TK</td>
		      </tr>
		      <tr class="success">
		        <td width="10%">2</td>
		        <td width="60%">Total Due</td>
		        <td width="30%">'.$TotalDue.' TK</td>
		      </tr>
		      <tr>
		        <td width="10%">3</td>
		        <td width="60%">Total Expense</td>
		        <td width="30%">'.$TotalExpense.' TK</td>
		      </tr>
		      <tr>
		        <td width="10%">4</td>
		        <td width="60%">Net Income</td>
		        <td width="30%">'.$NetIncome.' TK</td>
		      </tr>
		      
		    </tbody>
      ';    
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('file.pdf', 'I');  
 }
?>


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
									<li class="active has-sub">
										<a class="js-arrow" href="#">
											<i class="fas fa-file-powerpoint"></i>Report</a>
											<ul class="list-unstyled navbar__sub-list js-sub-list">
												<li>
													<a href="total-earning.php">Total Earning</a>
												</li>
												<li>
													<a href="total-expense.php">Total Expense</a>
												</li>
												<li class="active">
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
										<div class="col-md-8  text-center">
											<h2>Total Expense</h2>
										</div>
										<div class="col-md-4">
											<form method="post">  
						                          <input type="submit" name="generate_pdf" class="btn btn-success" value="Download Report" />  
						                     </form>  
					                     </div>         
										  <table class="table table-bordered table-hover">
										    <thead>
										      <tr>
										        <th>SL No</th>
										        <th>Title of Account</th>
										        <th>Total Cost</th>
										      </tr>
										    </thead>
										    <tbody>
									    	<tr class="success">
										        <td>1</td>
										        <td>Total Revenue</td>
										        <td><?php echo $TotalSell;?> TK</td>
										      </tr>
										      <tr class="success">
										        <td>2</td>
										        <td>Total Due</td>
										        <td><?php echo $TotalDue;?> TK</td>
										      </tr>
										      <tr>
										        <td>3</td>
										        <td>Total Expense</td>
										        <td><?php echo $TotalExpense;?> TK</td>
										      </tr>
										      <tr>
										        <td>4</td>
										        <td>Net Income</td>
										        <td><?php echo $NetIncome;?> TK</td>
										      </tr>
										      
										    </tbody>
										  </table>

									</div>
								</div>
							</div>
						</div>
						<?php include("include/footer.php");
}else{
	header('location:login.php');
}
?>
