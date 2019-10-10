<?php session_start();
include 'pdo_class_data.php';
include 'connection.php';
include 'add_notification_user.php';
include 'administrator/function.php';
$pdo_auth = authenticate();
$pdo = new PDO($dsn, $user, $pass, $opt);

extract($_REQUEST);


    $county = count_data_in_table("users",$to_address );
    //print_r($county);
    if($county<1){
        header('Location:sell.php?choice=error&value=Either the User Doesnot Exist or The User is Not Verified, Please Try Again Later');
        exit();
    }
    
    if($_REQUEST['pass']==""){
        header('Location:sell.php?choice=error&value=Please Enter Your Password');
        exit();
    }

     if($_REQUEST['pass']!=$pdo_auth['tx_pass']){
        header('Location:sell.php?choice=error&value=Password Do not Match');
        exit();
    }

    $ratas = get_data_id("entrc_price");
    $curl = curl_init();
        $username = $pdo_auth['username'];
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
       $walletBalance =  $rad['walletBalance']; 
      if($walletBalance<$_REQUEST['token_no']){
        header('Location:sell.php?choice=error&value=You dont have enough Funds to transfer');
        exit();
      }
    
      if($_REQUEST['to_address']==""){
        header('Location:sell.php?choice=error&value=Please Enter Transfer Wallet Address');
        exit();
      }
      
       if($_REQUEST['token_no']>$pdo_auth['tx_limit']){
        header('Location:sell.php?choice=error&value=Amount of Token Must be Lower than transaction Limit i,e : '.$pdo_auth['tx_limit']);
        exit();
      }
    
      if($_REQUEST['token_no']<=0){
        header('Location:sell.php?choice=error&value=Amount of Token Must be Greater That Zero');
        exit();
      }
            // Starts Here monitoring the Transactions
        $tx_hash = "0x".md5(date("U")).md5(date("Y"));
        $table = "transfer";
        $from_address = $pdo_auth['tx_address'];

        $curl = curl_init();
        $receiverUserName = $_REQUEST['username'];
        $amount_to_transfer = $token_no;
        $remarks = $_REQUEST['remarks'];

        curl_setopt_array($curl, array(
          CURLOPT_PORT => "3001",
          CURLOPT_URL => "http://18.217.132.185:3001/api/dataManager/sendTokens",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "{  \n   \"_receiverUserName\":\"$receiverUserName\",\n   \"_senderUserName\":\"$username\",\n   \"_amount\":\"$amount_to_transfer\",\n   \"_remarks\":\"$remarks\"\n}",
          CURLOPT_HTTPHEADER => array(
            "Content-Type: application/json",
            "Postman-Token: 9caf675c-5020-4ae6-888b-33de3e814472",
            "cache-control: no-cache"
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          echo "Transaction Error #:" . $err;
        } else {
          $key_list = "`to`,`from`, `tx_address`, `tokens`, `status`, `process`, `remark`";
          $value_list = "'".$to_address."',";
          $value_list.= "'".$from_address."',";
          $value_list.="'".$response."',";
          $value_list.="'".$token_no."',";
          $value_list.="'Success',";
          $value_list.="'Sent Tokens',";
          $value_list.="'".$_REQUEST['remarks']."'";
          //echo "INSERT INTO `$table` ($key_list) VALUES ($value_list)";
          try {
              $stmt = $pdo->prepare("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
          } catch(PDOException $ex) {
              echo "An Error occured!"; 
              print_r($ex->getMessage());
          }
          $stmt->execute();

          $tx_hash = "0x".md5(date("U")).md5(date("Y"));
          $table = "sell_requests";
          $from_address = $pdo_auth['tx_address'];


            $key_list = "`to_address`,`from_address`, `token`, `user_id`, `user_name`, `tx_hash`, `remark`";
            $value_list = "'".$to_address."',";
            $value_list.= "'".$from_address."',";
            $value_list.="'".$token_no."',";
            $value_list.="'".$pdo_auth['id']."',";
            $value_list.="'".$pdo_auth['name']."',";
            $value_list.="'".$response."',";   
            $value_list.="'".$_REQUEST['remarks']."'";

              try {
                  $stmt = $pdo->prepare("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
              } catch(PDOException $ex) {
                  echo "An Error occured!"; 
                  print_r($ex->getMessage());
              }
             $stmt->execute();
        }
      
  add_notification_user("A Send Request Executed to $to_address", "user", $pdo_auth['id']);
  add_notification("A Send Request Exected from $from_address to $to_address from User", "admin");
  header('Location:sent_tokens.php?choice=success&value=Your Token Has been Transferred to Desired Address');
//}

?>