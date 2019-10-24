<?php

    require_once './DBManager.php';
    $DBM = new DBManager();
    if(!isset($_GET['abc'])){
    	@$bid_id=$_POST['bid_id'];
    	$query = $DBM->Select($bid_id);
    	$select = mysqli_fetch_assoc($query);
    }else{
    	echo "not";
    }
    ?>


	<?php include("include/header.php"); ?>

	<!-- MAIN CONTENT-->
	<div class="main-content">
		<div class="section__content section__content--p30">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="panel-heading ">
							<h1 class="text-center"> Edit My Profile</h1>
						</div> <!-- /panel-heading --> 
							
     
						
							<div class="form-group">
								<label>Bid ID:</label>
								
								<form action="" method="post">
								<select type="text" class="form-control" name="bid_id"  required>
									<option value="">~~SELECT~~</option>
									<?php
									$connection = mysqli_connect('localhost', 'root', '', 'fish-firm');
									$sql = "SELECT bid_id from bid_board";
									$result = $connection->query($sql);

									while ($row = $result->fetch_array()) {
										echo "<option value='" . $row['bid_id'] . "'>" . $row['bid_id'] . "</option>";
			                                    } // while
			                                    
			                                    ?>
			                                </select>

			                                <button type="submit" name="abc" class="btn btn-primary ">Select</button>
			                            </div> 
			                        </form>

			                        <div class="test">
			                        	<form action="" method="post" enctype="multipart/form-data">
			                        		<input type="hidden" name="bid_id" value="<?php echo $select['bid_id']; ?>" class="form-control" >

			                        		

			                        		<div class="form-group row">
			                        			<label for="name" class="col-4 col-form-label">User Name</label> 
			                        			<div class="col-8">
			                        				<input name="user_name" class="form-control here " type="text"disabled  value="<?php echo @$select['user_name']; ?>">
			                        			</div>
			                        		</div>
			                        		<div class="form-group row">
			                        			<label for="name" class="col-4 col-form-label">Price</label> 
			                        			<div class="col-8">
			                        				<input name="user_name" class="form-control here " type="text"disabled  value="<?php echo @$select['price']; ?>">
			                        			</div>
			                        		</div>
			              

			                        		<button type="submit" name="button" class="btn btn-primary ">Update My Profile</button>
			                        		<a href="profile.php" class="btn btn-secondary pull-right">Cancel</a>
			                        	</form>

			                        </div>

			                    </div>
			                </div>
			            </div>
			        </div>
			    </div>
			    <?php include("include/footer.php"); ?>