<?php
   include 'connection.php';
   include 'function.php';
   include '../add_notification_user.php';
   $pdo = new PDO($dsn, $user, $pass, $opt);
   
    
   
    $data = get_data_id("buy_token", $_REQUEST['id']);
    $user_id = $data['user_id'];
     
    $dara =  get_data_id("entrc_price");
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_PORT => "3001",
      CURLOPT_URL => "http://18.217.132.185:3001/api/dataManager/get/lifetimeTotalSupply",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        "Accept: */*",
        "Accept-Encoding: gzip, deflate",
        "Cache-Control: no-cache",
        "Connection: keep-alive",
        "Content-Type: application/json",
        "Cookie: connect.sid=s%3AFjJ-NIEm6_EPyKRgZgiGOfm-vy4Qw8QO.hZwQrlMxUDj0h2dFtI7DMv8tZqZqRIYifKEKh6ENzQ8",
        "Host: 18.217.132.185:3001",
        "Postman-Token: ee0ffcc6-59fc-4b9d-baf3-e00b0ce2a378,f95eb730-5397-4e8f-98a6-d2125d6caf4b",
        "User-Agent: PostmanRuntime/7.16.3",
        "cache-control: no-cache"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);
    $total_supply = 0;

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      $data22 = json_decode($response, true);
      $total_supply = $data22['lifetimeTotalSupply'];
    }

    if($total_supply<$data['no_of_tokens']){
      header('Location:buy_requests.php?choice=error&value= Cant be more than total Supply');
      exit();
    }

    $user_data = get_data_id("users", $user_id);

    $username = $user_data['username'];
    $required_amount = $data['no_of_tokens'];
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_PORT => "3001",
      CURLOPT_URL => "http://18.217.132.185:3001/api/dataManager/approve/buyOrder",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "{  \n   \"_receiverUserName\":\"$username\",\n   \"_amount\":\"$required_amount\"\n}",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "Postman-Token: e0bc449d-b7d1-4fa5-9d17-edd3ed8031b6",
        "cache-control: no-cache"
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);
    if ($err) {
      echo "Transaction Error #:" . $err;
    } else {
      $radas = json_decode($response,true);
      //echo $radas;
       // Add User Starts Here
       $table = "buy_token";
       $result = $pdo->exec("UPDATE $table SET `status`='Approved'  WHERE id=".$_REQUEST['id']);
       $balance = $user_data['balance'];
       $balance = $balance+$data['no_of_tokens'];
       $result = $pdo->exec("UPDATE `users` SET `balance`='".$balance."'  WHERE id=".$user_id);

        // Starts Here monitoring the Transactions
          $tx_hash = "0x".md5(date("U")).md5(date("Y"));
          $table = "transfer";
          $from_address = "0xAf55F3B7DC65c8f9577cf00C8C5CA7b6E8Cc4433 : SXT ADMIN";


            $key_list = "`to`,`from`, `tx_address`, `tokens`, `status`, `process`";
            $value_list = "'".$data['tx_address']."',";
            $value_list.= "'".$from_address."',";
            $value_list.="'".$radas."',";
            $value_list.="'".$data['no_of_tokens']."',";
            $value_list.="'Success',";
            $value_list.="'Buy Tokens'";   

            try {
                $stmt = $pdo->prepare("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
            } catch(PDOException $ex) {
                echo "An Error occured!"; 
                print_r($ex->getMessage());
            }
          
         $stmt->execute();
     // echo $response;
    }

      add_notification("Buy Token Request Approved", "admin");
      add_notification_user("Your Buy Token Request Approved, Balance Has Been Added To Your Wallet", "user",$user_id);
     header('Location:buy_requests.php?choice=success&value= Buy Token Request Approved');
?>