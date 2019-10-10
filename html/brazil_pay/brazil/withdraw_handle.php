<?php session_start();
    include 'pdo_class_data.php';
    include 'connection.php';
    include 'add_notification_user.php';
    include 'administrator/function.php';

    $pdo_auth = authenticate();
    $pdo = new PDO($dsn, $user, $pass, $opt); 
  
     if($_REQUEST['pass']==""){
        header('Location:add_pay.php?choice=error&value=Please Enter Your Password');
        exit();
    }

     if($_REQUEST['pass']!=$pdo_auth['tx_pass']){
        header('Location:add_pay.php?choice=error&value=Password Do not Match');
        exit();
    }


    if($pdo_auth['balance']<$_REQUEST['token_no']){
      header('Location:withdraw_tokens.php?choice=error&value=You dont have enough Funds to Withdraw');
      exit();
    }

    
    if($_REQUEST['withdraw_wallet_address']==""){
      header('Location:withdraw_tokens.php?choice=error&value=Please Enter Transfer Wallet Address');
      exit();
    }


    if($_REQUEST['token_no']<=0){
      header('Location:withdraw_tokens.php?choice=error&value=Amount of Token Must be Greater That Zero');
      exit();
    }

  
      $table = "withdraw";
      $key_list = "`amount`, `user_id`, `user_name`, `withdraw_wallet_address`, `transfer_to`";
      $value_list = "'".strip_comma($_REQUEST['token_no'])."',";
      $value_list .="'".$pdo_auth['id']."',";
      $value_list.="'".strip_comma($pdo_auth['name'])."',";
      $value_list.="'".strip_comma($_REQUEST['withdraw_wallet_address'])."',";
      $value_list.="'".strip_comma($_REQUEST['transfer_to'])."'";

     //echo "INSERT INTO `$table` ($key_list) VALUES ($value_list)";
      $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");

      


      add_notification("Withdraw Requests has been made From A User", "admin");
      add_notification_user("You raised Withdraw Request of ".$_REQUEST['token_no'], "user", $pdo_auth['id']);
      header('Location:view_withdraw.php?choice=success&value=Withdraw Request has been Made.');
     // header('Location:withdraw_tokens.php?choice=success&value=Withdraw Request has been Made.');
?>