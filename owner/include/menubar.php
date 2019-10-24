
<?php session_start();?>
<!-- HEADER -->
<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                
                <div class="header-button ">
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
                                <?php
                                    $user_name=$_SESSION['user_name'];
                                    $connection = mysqli_connect('localhost', 'root', '', 'fish-firm');
                                    $sql = "SELECT * from owner WHERE user_name='$user_name'";
                                    $result = $connection->query($sql);
                                    $pro = mysqli_fetch_assoc($result);
                                ?>
                                <img src="<?php echo @$pro['img'];?>"  />
                                
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#"><?php echo @$pro['user_name'];?></a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <img src="<?php echo @$pro['img'];?>"/>
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#"><?php echo @$pro['user_name'];?></a>
                                        </h5>
                                        
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="profile.php">
                                            <i class="zmdi zmdi-account"></i>Profile</a>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <a href="editProfile.php?owner_id=<?php echo $pro['owner_id']; ?>"">
                                                <i class="fas fa-edit"></i>Edit Profile</a>                                  
                                            </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="../admin/logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
            <!-- END HEADER -->