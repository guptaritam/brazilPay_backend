<?php session_start();
   include 'connection.php';
   include 'function.php';
   include '../add_notification_user.php';
   //$pdo_auth = 
   $pdo = new PDO($dsn, $user, $pass, $opt);
    $ratass = get_data_id("entrc_price");
      $table = "withdraw";
      try {
         $stmt = $pdo->prepare("SELECT * FROM $table WHERE id=".$_REQUEST['id']);
         //echo "SELECT * FROM $table WHERE id=".$_REQUEST['id'];
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->fetch();
      $mota = $user;

     try {
         $stmt = $pdo->prepare("SELECT * FROM `users` WHERE id=".$user['user_id']);
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->fetch();
      $user_data = $user;

      $username = $user_data['username'];
      $withdraw_amount = $mota['amount'];

      $curl = curl_init();
      $datas = "{\n  \"_userName\": \"$username\"\n}";
      $saz = strlen($datas);

      curl_setopt_array($curl, array(
        CURLOPT_PORT => "3001",
        CURLOPT_URL => "http://18.217.132.185:3001/api/dataManager/get/userWalletBalance",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $datas,
        CURLOPT_HTTPHEADER => array(
          "Accept: */*",
          "Accept-Encoding: gzip, deflate",
          "Cache-Control: no-cache",
          "Connection: keep-alive",
          "Content-Length: $saz",
          "Content-Type: application/json",
          "Cookie: connect.sid=s%3As9jhZR8iq-hQnNHcnyK3cDbquTrjhCFW.C0PHBIykD56y2P859rElDNkIt4N%2BMpyc0pCWpN642gc",
          "Host: 18.217.132.185:3001",
          "Postman-Token: 092f298c-1be2-4388-85a3-e3bc08a9efcf,fdc0f471-10d8-4213-b051-30aff73c50bf",
          "User-Agent: PostmanRuntime/7.16.3",
          "cache-control: no-cache"
        ),
      ));

      $rad = 0;
      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        echo "transaction Error #:" . $err;
      } else {
        //print_r($response);
        $rad = json_decode($response,true);
      }
     $balance_with_user =  $rad['walletBalance'];

     if($balance_with_user<$withdraw_amount){
     	header('Location:view_withdraw.php?choice=error&value=Withdraw amount cannot be greater than ballance');
     	exit();
     }


    $curl = curl_init();
    $datas = "{  \n   \"_withdrawerUserName\":\"$username\",\n   \"_amount\":\"$withdraw_amount\"\n}";
    //echo $datas;
    $saz = strlen($datas); 
    //echo $saz;

	curl_setopt_array($curl, array(
	  CURLOPT_PORT => "3001",
	  CURLOPT_URL => "http://18.217.132.185:3001/api/dataManager/approve/withdrawOrder",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => $datas,
	  CURLOPT_HTTPHEADER => array(
	    "Accept: */*",
	    "Accept-Encoding: gzip, deflate",
	    "Cache-Control: no-cache",
	    "Connection: keep-alive",
	    "Content-Length: $saz",
	    "Content-Type: application/json",
	    "Cookie: connect.sid=s%3As9jhZR8iq-hQnNHcnyK3cDbquTrjhCFW.C0PHBIykD56y2P859rElDNkIt4N%2BMpyc0pCWpN642gc",
	    "Host: 18.217.132.185:3001",
	    "Postman-Token: 9234a21c-7510-4dc1-82e2-2390122abf79,d3e98c74-2242-4cd8-a5dc-dad75707193d",
	    "User-Agent: PostmanRuntime/7.16.3",
	    "cache-control: no-cache"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	  echo "transaction Error #:" . $err;
	} else {
	  
      $result = $pdo->exec("UPDATE $table SET `status`='Approved'  WHERE id=".$_REQUEST['id']);
      $total = $user['balance']-$mota['amount']-$ratass['withdraw_transaction_fees'];  


      
       try {
        $stmt = $pdo->prepare("UPDATE users SET `balance`= '".$total."' WHERE id=".$user['id']);
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();


        // Starts Here monitoring the Transactions
        $tx_hash = "0x".md5(date("U")).md5(date("Y"));
        $table = "transfer";
        $from_address = $user['tx_address'];


          $key_list = "`to`,`from`, `tx_address`, `tokens`, `status`, `process`";
          $value_list = "'".$mota['withdraw_wallet_address']."',";
          $value_list.= "'".$from_address."',";
          $value_list.="'".$response."',";
          $value_list.="'".$mota['amount']."',";
          $value_list.="'Success',";
          $value_list.="'Withdraw Tokens'";   

          try {
              $stmt = $pdo->prepare("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
          } catch(PDOException $ex) {
              echo "An Error occured!"; 
              print_r($ex->getMessage());
          }
          
          $stmt->execute();
      add_notification("Withdraw Token Request Approved", "admin");
      add_notification_user("Your Withdraw Token Request Approved", "user", $_REQUEST['id']);
      
	}
      
    header('Location:view_withdraw.php?choice=success&value= Withdraw Token Request Approved');
?>