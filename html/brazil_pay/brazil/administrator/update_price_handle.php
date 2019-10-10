<?php session_start();
   include 'connection.php';
   include 'function.php';
   $pdo = new PDO($dsn, $user, $pass, $opt);

   $curl = curl_init();

      curl_setopt_array($curl, array(
      CURLOPT_PORT => "3001",
      CURLOPT_URL => "http://18.217.132.185:3001/api/dataManager/get/totalTokensSold",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "Postman-Token: 332c1323-ba10-4506-98f5-862ad38a8119",
        "cache-control: no-cache"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);
    $tokens_sold9 = "";
    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      $tokens_sold9 = json_decode($response,true);
      $tokens_sold9 = $tokens_sold9['totalTokensSold'];
    }

   // Add User Starts Here
    if(isset($_REQUEST['update_price'])){
     if($_REQUEST['total_supply']<$tokens_sold9['totalTokensSold']){
         header('Location:update_price.php?choice=error&value=Total Supply can never be less that Sold Tokens ie, '.$_REQUEST['total_sold']);
         exit();
     }    

     $curl = curl_init();
     $totalSupply = $_REQUEST['total_supply'];

      curl_setopt_array($curl, array(
      CURLOPT_PORT => "3001",
      CURLOPT_URL => "http://18.217.132.185:3001/api/dataManager/set/totalSupply",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{  \n   \"_totalSupply\":\"60000\"\n}",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "Postman-Token: 812dcfb1-a5c9-466b-9209-0702f0e585c0",
        "cache-control: no-cache"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "Transaction Error #:" . $err;
    } else {
      $table = "entrc_price";
      $result = $pdo->exec("UPDATE $table SET `price`='".$_REQUEST['price']."', `total_supply`='".$_REQUEST['total_supply']."', `user_transaction_limit`='".$_REQUEST['user_transaction_limit']."' , `withdraw_transaction_fees`='".$_REQUEST['withdraw_transaction_fees']."' , `sell_transaction_fees`='".$_REQUEST['sell_transaction_fees']."'");
      add_notification("Toekn Price Updated", "admin");
    }
    
      
      header('Location:update_price.php?choice=success&value=Token Price Updated');
      exit();
    }
?>