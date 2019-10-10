<?php session_start();
include 'pdo_class_data.php';
include 'connection.php';
include 'add_notification_user.php';
include 'administrator/function.php';
$pdo_auth = authenticate();
$pdo = new PDO($dsn, $user, $pass, $opt);

extract($_REQUEST);
    // echo $to_address;
    // print_r($_REQUEST);

    $county = count_data_in_table("users",$to_address );
    //print_r($county);
    if($county<1){
        header('Location:add_pay.php?choice=error&value=Either the User Doesnot Exist or The User is Not Verified, Please Try Again Later');
        exit();
    }
    
    if($_REQUEST['pass']==""){
        header('Location:add_pay.php?choice=error&value=Please Enter Your Password');
        exit();
    }

     if($_REQUEST['pass']!=$pdo_auth['tx_pass']){
        header('Location:add_pay.php?choice=error&value=Password Do not Match');
        exit();
    }

    $ratas = get_data_id("entrc_price");
     
      if($_REQUEST['to_address']==""){
        header('Location:add_pay.php?choice=error&value=Please Enter Transfer Wallet Address');
        exit();
      }
    
      if($_REQUEST['token_no']<=0){
        header('Location:add_pay.php?choice=error&value=Amount of Token Must be Greater That Zero');
        exit();
      }
            // Starts Here monitoring the Transactions
        $tx_hash = "0x".md5(date("U")).md5(date("Y"));
        $table = "pay_request";
        $from_address = $pdo_auth['tx_address'];


      $key_list = "`to_user`, `from_user`, `amount`, `status`,`tx_address`, `remark`";
      $value_list = "'".$to_address."',";
      $value_list.= "'".$from_address."',";
      $value_list.="'".$token_no."',";
      $value_list.="'Pending',";
      $value_list.="'".$tx_hash."', ";
       $value_list.="'".$remarks."'";
      //echo "INSERT INTO `$table` ($key_list) VALUES ($value_list)";
      try {
          $stmt = $pdo->prepare("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();


  
  add_notification_user("A Payment Request $to_address has been initiated", "user", $pdo_auth['id']);
  add_notification("A Send Request Exected from $from_address to $to_address from User", "admin");
  header('Location:add_pay.php?choice=success&value=Your Token Has been requested to Desired Address');
//}

?>