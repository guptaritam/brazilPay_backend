<?php session_start();
include 'pdo_class_data.php';
include 'connection.php';
include 'add_notification_user.php';
include 'administrator/function.php';
$pdo = new PDO($dsn, $user, $pass, $opt);
  try {
      $stmt = $pdo->prepare('SELECT * FROM `pay_request` WHERE `id`='.base64_decode($_REQUEST['0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12Doplat']));
  } catch(PDOException $ex) {
      echo "An Error occured!"; 
      print_r($ex->getMessage());
  }
  $stmt->execute();
  $rayta = $stmt->fetch();
    
  //print_r($rayta);
  try {
      $stmt = $pdo->prepare('SELECT * FROM `users` WHERE `email`="'.$_REQUEST['datarra'].'"');
      //echo 'SELECT * FROM `users` WHERE `email`="'.$_REQUEST['datarra'].'"';
  } catch(PDOException $ex) {
      echo "An Error occured!"; 
      print_r($ex->getMessage());
  }
  $stmt->execute();
  $dataas = $stmt->fetch();
  $county = $stmt->rowCount();
  
    //print_r($dataas);
    if($county<1){
        header('Location:share_request.php?choice=error&value=Either the User Doesnot Exist or The User is Not Verified, Please Try Again Later&0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12Doplat='.$_REQUEST['0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12Doplat']);
        exit();
    }
    
    if($_REQUEST['password']==""){
        header('Location:share_request.php?choice=error&value=Please Enter Your Password&0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12Doplat='.$_REQUEST['0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12Doplat']);
        exit();
    }

     if($_REQUEST['password']!=$dataas['tx_pass']){
        header('Location:share_request.php?choice=error&value=Password Do not Match&0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12Doplat='.$_REQUEST['0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12Doplat']);
        exit();
    }

      $ratas = get_data_id("entrc_price");
      if($dataas['balance']<$_REQUEST['amount']){
        header('Location:share_request.php?choice=error&value=You dont have enough Funds to transfer&0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12Doplat='.$_REQUEST['0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12Doplat']);
        exit();
      }
    
      if($rayta['to_user']==""){
        header('Location:share_request.php?choice=error&value=Please Enter Transfer Wallet Address&0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12Doplat='.$_REQUEST['0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12Doplat']);
        exit();
      }
      
      if($rayta['from_user']==""){
        header('Location:share_request.php?choice=error&value=Please Enter your Transfer Wallet Address&0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12Doplat='.$_REQUEST['0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12Doplat']);
        exit();
      }
      
      
       if($_REQUEST['amount']>$dataas['tx_limit']){
        header('Location:share_request.php?choice=error&value=Amount of Token Must be Lower than transaction Limit i,e : '.$pdo_auth['tx_limit'].'&0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12Doplat='.$_REQUEST['0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12Doplat']);
        exit();
      }
    
      if($_REQUEST['amount']<=0){
        header('Location:share_request.php?choice=error&value=Amount of Token Must be Greater That Zero&0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12Doplat='.$_REQUEST['0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12Doplat']);
        exit();
      }
        

    $tx_hash = "0x".md5(date("U")).md5(date("Y"));
    $table = "transfer";
    $from_address = $dataas['tx_address'];
    $token_no = $rayta['amount'];
    

      $key_list = "`to`,`from`, `tx_address`, `tokens`, `status`, `process`, `remark`";
      $value_list = "'".$rayta['to_user']."',";
      $value_list.= "'".$rayta['from_user']."',";
      $value_list.="'".$tx_hash."',";
      $value_list.="'".$token_no."',";
      $value_list.="'Success',";
      $value_list.="'Sent Tokens',";
      $value_list.="'Amount Paid via Shared Link, Offline '";
     // echo "INSERT INTO `$table` ($key_list) VALUES ($value_list)";
      try {
          $stmt = $pdo->prepare("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
          //echo "INSERT INTO `$table` ($key_list) VALUES ($value_list)";
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
    
    
  $tx_hash = "0x".md5(date("U")).md5(date("Y"));
  $table = "sell_requests";
  $from_address = $rayta['tx_address'];


    $key_list = "`to_address`,`from_address`, `token`, `user_id`, `user_name`, `tx_hash`, `remark`";
   $value_list = "'".$rayta['to_user']."',";
      $value_list.= "'".$rayta['from_user']."',";
    $value_list.="'".$token_no."',";
    $value_list.="'".$dataas['id']."',";
    $value_list.="'".$dataas['name']."',";
    $value_list.="'".$tx_hash."',";   
    $value_list.="'Amount Paid via Shared Link, Offline'";

      try {
          $stmt = $pdo->prepare("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
     $stmt->execute();


    try {
         $stmt = $pdo->prepare("SELECT * FROM `users` WHERE `tx_address`='".$rayta['to_user']."'");
        } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $too_user = $stmt->fetch();
      //print_r($too_user);
      //echo $too_user['username']."bal : ".$too_user['balance'];;
      
      
      try {
         $stmt = $pdo->prepare("SELECT * FROM `users` WHERE `tx_address`='".$rayta['from_user']."'");
         //echo "SELECT * FROM `users` WHERE `tx_address`='".$rayta['from_user']."'";
        } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $froom_user = $stmt->fetch();
      //print_r($from_user);
      //echo $froom_user['username']."bal : ".$froom_user['balance'];
     
     
     //decrese from senders account
     // $total = $_REQUEST['balance']-$_REQUEST['token_no']-0.5;  
     $total = $froom_user['balance']+$_REQUEST['amount'];  
     
      try {
         $stmt = $pdo->prepare("UPDATE `users` SET `balance`= '".$total."' WHERE `tx_address`='".$rayta['from_user']."'");
        //echo "UPDATE `users` SET `balance`= '".$total."' WHERE `tx_address`='".$rayta['from_user']."'";
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
     // $user = $stmt->fetch();
     
     // add into recievers account
      try {
          $stmt = $pdo->prepare("SELECT id,balance FROM users WHERE tx_address LIKE '".$rayta['to_user']."'");
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->fetch();
      //print_r($user);
     // int_r($user);


      $total = $too_user['balance']-$_REQUEST['amount'];  
      //echo "total of buyer = ".$total;
      //echo $total;   
      try {
          $stmt = $pdo->prepare('UPDATE `users` SET `balance`= "'."".$total."".'" WHERE `tx_address`="'.$rayta['to_user'].'"');
          //echo 'UPDATE `users` SET `balance`= "'."".$total."".'" WHERE `tx_address`="'.$rayta['to_user'].'"';
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      //$user = $stmt->fetch();


    try {
          $stmt = $pdo->prepare('UPDATE `pay_request` SET `status`= "Available" WHERE id='.base64_decode($_REQUEST['0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12Doplat']));
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();


      //ends here m,onitoring Transfers
  
  add_notification_user("A Payment is done to requested user with ".$rayta['to_user'], "user", $dataas['id']);
  add_notification("A Payment is done to requested user with ".$rayta['to_user']." from User", "admin");
  header('Location:share_request.php?choice=success&value=Your Token to desired User has been sent Successfully&0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12Doplat='.$_REQUEST['0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12Doplat'].'&0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12Doplat='.$_REQUEST['0x6302f8774a817747d4a0b90f7cb2fcf46c3c5b12Doplat']);

?>