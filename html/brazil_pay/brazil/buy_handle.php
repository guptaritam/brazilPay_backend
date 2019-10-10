<?php session_start();
    include 'pdo_class_data.php';
    include 'connection.php';
    include 'administrator/function.php';
    include 'add_notification_user.php';
    $pdo_auth = authenticate();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    if($_REQUEST['amount']==""){
      redirectTo("buy.php","error","Amount or Tokens cant be Less than Zero");
      exit();
    }
    
    try {
            $stmt = $pdo->prepare('SELECT SUM(balance) as total_sold FROM `users` ');
        } catch(PDOException $ex) {
            echo "An Error occured!"; 
            print_r($ex->getMessage());
        }
        $stmt->execute();
        $bhushan = $stmt->fetch();
                                
                                
     $rata = get_data_id("entrc_price");
     $remain =$rata['total_supply']-$bhushan['total_sold'];

     if($_REQUEST['bbt']==""){
      redirectTo("buy.php","error","Amount or Tokens cant be Less than Zero");
      exit();
    }

     if($_REQUEST['tx_idd']==""){
      redirectTo("buy.php","error","Please Enter a Valid Transaction Id");
      exit();
    }
    
    if($_REQUEST['amount']>$remain){
      redirectTo("buy.php","error","You Cant Buy More that whatsa available, Max you can buy is : ".$remain." Tokens ");
      exit();
    }

    if($_REQUEST['amount']<=0){
      redirectTo("buy.php","error","Amount or Tokens cant be Less than Zero");
      exit();
    }
    
     if($_REQUEST['amount']<=0){
      redirectTo("buy.php","error","Amount or Tokens cant be Less than Zero");
      exit();
    }

    if($_REQUEST['bbt']<=0){
      redirectTo("buy.php","error","You cant Buy SX Tokens Less than Zero Value");
      exit();
    }
    
    $dara =  get_data_id("entrc_price");
    if($dara['total_supply']<$_REQUEST['bbt']){
      redirectTo("buy.php","error","You cant Buy Tokens More than Total Limit.");
      exit();
    }
    
    if($_REQUEST['bbt']>$dara['user_transaction_limit']){
      redirectTo("buy.php","error","You cant Buy Tokens More than Your Transaction Limit, Your Transaction Limit is : ".$dara['user_transaction_limit']);
      exit();
    }

   $table = "buy_token";
	  $key_list = "`user_id`,`user_name`, `email`, `tx_address`, `amount`, `no_of_tokens`, `buy_tx_id`, `currency`";
	  $value_list = "'".$pdo_auth['id']."',";
	  $value_list.= "'".$pdo_auth['name']."',";
	  $value_list.="'".$pdo_auth['email']."',";
	  $value_list.="'".$pdo_auth['tx_address']."',";
	  $value_list.="'".$_REQUEST['amount']."',";
      $value_list.="'".$_REQUEST['bbt']."',";
      $value_list.="'".$_REQUEST['tx_idd']."',";
	  $value_list.="'".$_REQUEST['currency']."'";
	  
	 $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
     add_notification_user("A Buy Request has Been Initiated", "user", $pdo_auth['id']);
     add_notification("A Buy Request has been Initiated", "admin");
     header('Location:buy.php?choice=success&value=Your Buy Request has Been Initiated');
     exit();
?>