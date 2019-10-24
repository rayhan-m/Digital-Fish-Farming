<?php
class DBManager {

    protected $connection;
    public function __construct() {
        $this->connection = mysqli_connect('localhost', 'root', '', 'fish-firm');
        if (!$this->connection) {
            die('Connection fail' . mysql_error($this->connection));
        }
    }

    //Pond//
        public function addPond($data) {
        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "upload/" . $name);
        $url = "upload/$name";
        
        $sql = "INSERT INTO pond (location,length,width, img)VALUES ('$data[location]','$data[length]','$data[width]','$url')";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Added Successflly';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function viewPond() {
        $sql = "SELECT * FROM pond ";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function deletePond($pond_id) {
        $sql = "DELETE FROM pond WHERE pond_id='$pond_id'";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Pond Delete Successfully';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function editPond($pond_id) {
        $sql = "SELECT * FROM pond WHERE pond_id='$pond_id'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function updatePond($data) {
        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "upload/" . $name);
        $url = "upload/$name";
        
        $sql = "UPDATE pond SET location = '$data[location]', length = '$data[length]', width = '$data[width]',img = '$url' WHERE pond_id='$data[pond_id]'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Update Successfully';
            header('location:pond.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    //end Pond//
    //Fish//
    public function addFish($data) {
        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "upload/" . $name);
        $url = "upload/$name";
        
        $sql = "INSERT INTO fish (fish_name, img)VALUES ('$data[fish_name]','$url')";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Added Successflly';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function viewFish() {
        $sql = "SELECT * FROM fish ";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function deleteFish($fish_id) {
        $sql = "DELETE FROM fish WHERE fish_id='$fish_id'";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Fish Delete Successfully';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function editFish($fish_id) {
        $sql = "SELECT * FROM fish WHERE fish_id='$fish_id'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function updateFish($data) {
        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "upload/" . $name);
        $url = "upload/$name";
        
        $sql = "UPDATE fish SET fish_name = '$data[fish_name]',img = '$url' WHERE fish_id='$data[fish_id]'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Update Successfully';
            header('location:fish.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    //End Fish//

    //Season//
    public function addSeason($data) {
        
        $sql = "INSERT INTO season (season_name, duration)VALUES ('$data[season_name]','$data[duration]')";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Added Successflly';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function viewSeason() {
        $sql = "SELECT * FROM season ";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function deleteSeason($season_id) {
        $sql = "DELETE FROM season WHERE season_id='$season_id'";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Season Delete Successfully';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function editSeason($season_id) {
        $sql = "SELECT * FROM season WHERE season_id='$season_id'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function updateSeason($data) {
        $sql = "UPDATE season SET season_name = '$data[season_name]',duration = '$data[duration]' WHERE season_id='$data[season_id]'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Update Successfully';
            header('location:season.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    //End Season//


    //Staff//
    public function addStaff($data) {
        
        $sql = "INSERT INTO staff (full_name,user_name,password,phn_no)VALUES ('$data[full_name]','$data[user_name]','$data[password]','$data[phn_no]')";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Added Successflly';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function viewStaff() {
        $sql = "SELECT * FROM staff ";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function deleteStaff($staff_id) {
        $sql = "DELETE FROM staff WHERE staff_id='$staff_id'";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Staff Delete Successfully';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    //end Staff//

    //Pond Details//
    public function addPondDetails($data) {
        $total_price=0;
        $total_price=($data['price'] * $data['quantity']);
        $sql = "INSERT INTO pond_details (pond_id, fish_name,price,quantity,total,season_name,staff_id)VALUES ('$data[pond_id]','$data[fish_name]','$data[price]','$data[quantity]','$total_price','$data[season_name]','$data[staff_id]')";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Added Successflly';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function viewPondDetails() {
        $sql = "SELECT * FROM pond_details ";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function deletePondDetails($pd_id) {
        $sql = "DELETE FROM pond_details WHERE pd_id='$pd_id'";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Delete Successfully';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function editPondDetails($pd_id) {
        $sql = "SELECT * FROM pond_details WHERE pd_id='$pd_id'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function updatePondDetails($data) {
        $total_price=0;
        $total_price=($data['price'] * $data['quantity']);
        $sql = "UPDATE pond_details SET pond_id = '$data[pond_id]',fish_name = '$data[fish_name]',price = '$data[price]',quantity = '$data[quantity]',total = '$total_price',season_name = '$data[season_name]',staff_id = '$data[staff_id]' WHERE pd_id='$data[pd_id]'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Update Successfully';
            header('location:pond-details.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    //Pond Details//

    //Food//
    public function addFood($data) {
        
        $sql = "INSERT INTO food (food_name)VALUES ('$data[food_name]')";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Added Successflly';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function viewFood() {
        $sql = "SELECT * FROM food ";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function deleteFood($food_id) {
        $sql = "DELETE FROM food WHERE food_id='$food_id'";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Delete Successfully';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function editFood($food_id) {
        $sql = "SELECT * FROM food WHERE food_id='$food_id'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function updateFood($data) {
        $sql = "UPDATE food SET food_name = '$data[food_name]' WHERE food_id='$data[food_id]'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Update Successfully';
            header('location:food.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    //End Food//

    //Buy Food//
    public function addBuyFood($data) {
        $total_price=0;
        $total_price=($data['price'] * $data['quantity']);
        $add_stock="Not Added";

        $sql = "INSERT INTO buy_food (food_name, price,quantity,total_price,in_date,add_stock)VALUES ('$data[food_name]','$data[price]','$data[quantity]','$total_price','$data[in_date]','$add_stock')";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Added Successflly';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }   
    }

    public function viewBuyFood() {
        $sql = "SELECT * FROM buy_food ";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function deleteBuyFood($buy_id) {
        $sql = "DELETE FROM buy_food WHERE buy_id='$buy_id'";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Delete Successfully';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function editBuyFood($buy_id) {
        $sql = "SELECT * FROM buy_food WHERE buy_id='$buy_id'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function updateBuyFood($data) {
    	$total_price=0;
        $total_price=($data['price'] * $data['quantity']);

        $sql = "UPDATE buy_food SET food_name = '$data[food_name]',price = '$data[price]',quantity = '$data[quantity]',total_price='$total_price',in_date = '$data[in_date]' WHERE buy_id='$data[buy_id]'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Update Successfully';
            header('location:buy-food.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    //End Buy Food//

    // Stock//

    public function viewStock() {
        $sql = "SELECT * FROM stock ";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    //End Stock//

    //Staff Payment//
    public function addStaffPayment($data) {
        date_default_timezone_set('Asia/Dhaka');
        $payment_date=date('m/d/Y');
        $sql = "INSERT INTO staff_payment (staff_id,payment_date,payment_month,salary,status) VALUES ('$data[staff_id]','$payment_date','$data[payment_month]','$data[salary]','$data[status]')";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Successflly Added';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function viewStaffPayment() {
        $sql = "SELECT * FROM staff_payment";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function editStaffPayment($sp_id) {
        $sql = "SELECT * FROM staff_payment WHERE sp_id='$sp_id'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function updateStaffPayment($data) {
        date_default_timezone_set('Asia/Dhaka');
        $payment_date=date('m/d/Y');

        $sql = "UPDATE staff_payment SET staff_id = '$data[staff_id]',payment_date = '$payment_date',payment_month = '$data[payment_month]',salary = '$data[salary]' ,status = '$data[status]' WHERE sp_id='$data[sp_id]'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Update Successfully';
            header('location:staff-payment.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    //End Staff Payment//

        //Manager Payment//
    public function addManagerPayment($data) {
        date_default_timezone_set('Asia/Dhaka');
        $payment_date=date('m/d/Y');
        $sql = "INSERT INTO manager_payment (manager_id,payment_date,payment_month,salary,status) VALUES ('$data[manager_id]','$payment_date','$data[payment_month]','$data[salary]','$data[status]')";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Successflly Added';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function viewManagerPayment() {
        $sql = "SELECT * FROM manager_payment";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function editManagerPayment($mp_id) {
        $sql = "SELECT * FROM manager_payment WHERE mp_id='$mp_id'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function updateManagerPayment($data) {
        date_default_timezone_set('Asia/Dhaka');
        $payment_date=date('m/d/Y');

        $sql = "UPDATE manager_payment SET manager_id = '$data[manager_id]',payment_date = '$payment_date',payment_month = '$data[payment_month]',salary = '$data[salary]' ,status = '$data[status]' WHERE mp_id='$data[mp_id]'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Update Successfully';
            header('location:manager-payment.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    //End Manager Payment//

        //Feed Food//
    public function addFeedFood($data) {
        date_default_timezone_set('Asia/Dhaka');
        $fdate=date('m/d/Y');
        $status="Undone";

        $sql = "INSERT INTO feed_food (staff_id, pond_id, fdate, psq, brq, fq, maq, bq, status)VALUES ('$data[staff_id]','$data[pond_id]','$fdate','$data[psq]','$data[brq]','$data[fq]','$data[maq]','$data[bq]','$status')";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Added Successflly';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }   
    }

    public function viewFeedFood() {
        $sql = "SELECT * FROM feed_food ";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function deleteFeedFood($ff_id) {
        $sql = "DELETE FROM feed_food WHERE ff_id='$ff_id'";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Delete Successfully';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function editFeedFood($ff_id) {
        $sql = "SELECT * FROM feed_food WHERE ff_id='$ff_id'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function updateFeedFood($data) {
        date_default_timezone_set('Asia/Dhaka');
        $fdate=date('m/d/Y');
        $sql = "UPDATE feed_food SET staff_id = '$data[staff_id]',pond_id = '$data[pond_id]',fdate = '$fdate',psq = '$data[psq]',brq = '$data[brq]',fq = '$data[fq]',maq = '$data[maq]',bq = '$data[bq]' WHERE ff_id='$data[ff_id]'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Update Successfully';
            header('location:feed-food.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    //End Feed Food//
    //Staff Profile//
    public function editProfile($staff_id) {
        $sql = "SELECT * FROM staff WHERE staff_id='$staff_id'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function updateProfile($data) {

    	$name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "images/" . $name);
        $url = "images/$name";

        $sql = "UPDATE staff SET full_name = '$data[full_name]',password = '$data[password]',phn_no = '$data[phn_no]',nid_no = '$data[nid_no]',address = '$data[address]',img = '$url' WHERE staff_id='$data[staff_id]'";
        if (mysqli_query($this->connection, $sql)) {
            header('location:user-profile.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
//End Staff Profile//

    //Bid//
    public function addBid($data) {
        date_default_timezone_set('Asia/Dhaka');
        $start_date=date('m/d/Y');
        $sql = "INSERT INTO bid_board (title, fish_name, start_date, end_date, start_price, quantity)VALUES ('$data[title]','$data[fish_name]','$start_date','$data[end_date]','$data[start_price]','$data[quantity]')";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Added Successflly';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }   
    }

    public function viewBid() {
        $sql = "SELECT * FROM bid_board ORDER BY bid_id DESC";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function viewIndBid($bid_id) {
        $sql = "SELECT * FROM bid_board WHERE bid_id='$bid_id' order by bid_id DESC";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function deleteBid($bid_id) {
        $sql = "DELETE FROM bid_board WHERE bid_id='$bid_id'";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Delete Successfully';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function editBid($bid_id) {
        $sql = "SELECT * FROM bid_board WHERE bid_id='$bid_id'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function updateBid($data) {
        $sql = "UPDATE bid_board SET title = '$data[title]',fish_name = '$data[fish_name]',start_date = '$data[start_date]',end_date = '$data[end_date]',start_price = '$data[start_price]',quantity = '$data[quantity]' WHERE bid_id='$data[bid_id]'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Update Successfully';
            header('location:bid-board.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    //End Bid//

    //Comments//
    public function addComments($data) {
        date_default_timezone_set('Asia/Dhaka');
        $date=date('m/d/Y');
        $time=date('h:i:s a');
        session_start();
        $user_name=$_SESSION['user_name'];
        $sql = "INSERT INTO comments (user_name, bid_id, price, date, time)VALUES ('$user_name','$data[bid_id]','$data[price]','$date','$time')";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Added Successflly';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }   
    }
    
    public function viewComments() {
        $sql = "SELECT bb.bid_id, price FROM bid_board as bb, comments as c WHERE bb.bid_id=c.bid_id";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    //End Comments//

    // User Register//
    public function addUser($data) {
        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "admin/upload/" . $name);
        $url = "admin/upload/$name";

        $sql = "INSERT INTO user (fname, lname, user_name, password, email, phn_no, address, img)VALUES ('$data[first_name]','$data[last_name]','$data[user_name]','$data[password]','$data[email]','$data[phn_no]','$data[address]','$url')";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Register Successfully';
            header('location:login.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }   
    }
    // End User Register//
        //User Profile//
    public function editUserProfile($user_id) {
        $sql = "SELECT * FROM user WHERE user_id='$user_id'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function updateUserProfile($data) {

        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "admin/upload/" . $name);
        $url = "admin/upload/$name";

        $sql = "UPDATE user SET fname = '$data[first_name]',lname = '$data[last_name]',password = '$data[password]',email = '$data[email]',phn_no = '$data[phn_no]',address = '$data[address]',img = '$url' WHERE user_id='$data[user_id]'";
        if (mysqli_query($this->connection, $sql)) {
            header('location:profile.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
//End User Profile//

        //Manager//
    public function addManager($data) {
        
        $sql = "INSERT INTO manager (full_name,user_name,password,phn_no)VALUES ('$data[full_name]','$data[user_name]','$data[password]','$data[phn_no]')";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Added Successflly';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function viewManager() {
        $sql = "SELECT * FROM manager ";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function deleteManager($manager_id) {
        $sql = "DELETE FROM manager WHERE manager_id='$manager_id'";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Manager Delete Successfully';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    //end Manager//
    //Manager Profile//
    public function editManagerProfile($manager_id) {
        $sql = "SELECT * FROM manager WHERE manager_id='$manager_id'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function updateManagerProfile($data) {

        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "upload/" . $name);
        $url = "upload/$name";

        $sql = "UPDATE manager SET full_name = '$data[full_name]',password = '$data[password]',email = '$data[email]',phn_no = '$data[phn_no]',address = '$data[address]',img = '$url' WHERE manager_id='$data[manager_id]'";
        if (mysqli_query($this->connection, $sql)) {
            header('location:profile.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
//End Manager Profile//
    //Owner Profile//
    public function editOwnerProfile($owner_id) {
        $sql = "SELECT * FROM owner WHERE owner_id='$owner_id'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function updateOwnerProfile($data) {

        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "upload/" . $name);
        $url = "upload/$name";

        $sql = "UPDATE owner SET full_name = '$data[full_name]',password = '$data[password]',img = '$url' WHERE owner_id='$data[owner_id]'";
        if (mysqli_query($this->connection, $sql)) {
            header('location:profile.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
//End Owner Profile//
// Customer//
    public function viewCustomer() {
        $sql = "SELECT * FROM user";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    //end customer

    //Select Sell//
    public function Select($data) {
        
        $sql = "SELECT * FROM comments as c, bid_board as bb WHERE price=(SELECT MAX(price) FROM comments WHERE bid_id='$data' AND c.bid_id=bb.bid_id)";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function sellFish($data) {
        date_default_timezone_set('Asia/Dhaka');
        $date=date('m/d/Y');
        $total1=0;
        $total1=($data['price'] * $data['quantity']);
        $payment_status="Pending";
        $sql = "INSERT INTO sell_fish (fish_name,price,quantity,total,sold_to,sold_by,date,payment_status)VALUES ('$data[fish_name]','$data[price]','$data[quantity]','$total1','$data[sold_to]','$data[sold_by]','$date','$payment_status')";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Added Successfully';
            header('location:sell-fish.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function viewSell() {
        $sql = "SELECT * FROM sell_fish ";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function deleteSell($sell_id) {
        $sql = "DELETE FROM sell_fish WHERE sell_id='$sell_id'";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Delete Successfully';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function editSell($sell_id) {
        $sql = "SELECT * FROM sell_fish WHERE sell_id='$sell_id'";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function updateSell($data) {
        $total=0;
        $total=($data['price'] * $data['quantity']);
        $sql = "UPDATE sell_fish SET quantity = '$data[quantity]', total='$total' WHERE sell_id='$data[sell_id]'";
        if (mysqli_query($this->connection, $sql)) {
            session_start();
            $_SESSION['message'] = 'Update Successfully';
            header('location:sell-fish.php');
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    //End Select Sell//

    //Blog //
        public function addPost($data) {
        date_default_timezone_set('Asia/Dhaka');
        $date=date('m/d/Y');
        $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
        $temp = $_FILES['fileToUpload'] ['tmp_name'];
        move_uploaded_file($temp, "upload/" . $name);
        $url = "upload/$name";
        $user_name=$_SESSION['user_name'];
        $sql = "INSERT INTO blog (img,date,user_name, title,description)VALUES ('$url','$date','$user_name','$data[title]','$data[description]')";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Posted Successflly';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }

    public function viewPost() {
        $sql = "SELECT * FROM blog ";
        if (mysqli_query($this->connection, $sql)) {
            $query = mysqli_query($this->connection, $sql);
            return $query;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    public function deletePost($blog_id) {
        $sql = "DELETE  FROM blog WHERE blog_id='$blog_id'";
        if (mysqli_query($this->connection, $sql)) {
            $message = 'Post Delete Successfully';
            return $message;
        } else {
            die('SQL Problem' . mysql_error($this->connection));
        }
    }
    // public function editPond($pond_id) {
    //     $sql = "SELECT * FROM pond WHERE pond_id='$pond_id'";
    //     if (mysqli_query($this->connection, $sql)) {
    //         $query = mysqli_query($this->connection, $sql);
    //         return $query;
    //     } else {
    //         die('SQL Problem' . mysql_error($this->connection));
    //     }
    // }
    // public function updatePond($data) {
    //     $name = str_replace(" ", "_", $_FILES['fileToUpload'] ['name']);
    //     $temp = $_FILES['fileToUpload'] ['tmp_name'];
    //     move_uploaded_file($temp, "upload/" . $name);
    //     $url = "upload/$name";
        
    //     $sql = "UPDATE pond SET location = '$data[location]', length = '$data[length]', width = '$data[width]',img = '$url' WHERE pond_id='$data[pond_id]'";
    //     if (mysqli_query($this->connection, $sql)) {
    //         session_start();
    //         $_SESSION['message'] = 'Update Successfully';
    //         header('location:pond.php');
    //     } else {
    //         die('SQL Problem' . mysql_error($this->connection));
    //     }
    // }
    //end Blog//
}