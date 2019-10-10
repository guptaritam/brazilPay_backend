<?php

   include '../add_notification_user.php';
   include 'connection.php';
   include 'function.php';
   $pdo = new PDO($dsn, $user, $pass, $opt);

   //print_r($_REQUEST);
   // Add User Starts Here
    if(isset($_REQUEST['add_balance'])){

      $tx_hash = "0x".md5(date("U")).md5(date("Y"));

     //  print_r($_REQUEST);
      $table = "balance";
      $key_list = "`user_id`, `username`, `tx_address`, `tx_hash`, `value`";
      $value_list = "'".$_REQUEST['user_id']."',";
      $value_list.="'".$_REQUEST['user_name']."',";
      $value_list.="'".$_REQUEST['tx_address']."',";
      $value_list.="'".$tx_hash."',";
      $value_list.="'".$_REQUEST['value']."'";
      $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");

      $total = $_REQUEST['balance']+$_REQUEST['value'];
      //echo $total;

      // Update in users Account
       try {
          $stmt = $pdo->prepare('UPDATE users SET `balance`= "'."".$total."".'" WHERE id='.$_REQUEST['user_id']);
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      //$user = $stmt->fetch();


      add_notification("Amount has been Added to users Account", "admin");
      add_notification_user("Amount has been Added to Your Account", "user", $_REQUEST['user_id']);
      header('Location:user_wallet.php?choice=success&value=Added News');
    }

?>