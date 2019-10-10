<?php include 'connection.php';
	  include 'add_notification_user.php';
	  include 'administrator/function.php';
	  $pdo = new PDO($dsn, $user, $pass, $opt);
	  //print_r($_REQUEST);
	  
	  try {
	      $stmt = $pdo->prepare('SELECT * FROM `users` WHERE `id`='.$_REQUEST['id']);
	     //echo 'SELECT * FROM `users` WHERE `id`="'.$_REQUEST['id'];
	  } catch(PDOException $ex) {
	      echo "An Error occured!"; 
	      print_r($ex->getMessage());
	  }
	  $stmt->execute();
  	  $user = $stmt->fetchAll();
  	  $row_count = $stmt->rowCount();
  	  $piyush="";
  	  
  	  //echo $row_count;
  	  
  	  
  	  
        // $stmt = $pdo->prepare('SELECT * FROM `tx_addresses` WHERE `status`="Pending" LIMIT 1');
        //  $stmt->execute();
        //  $fata = $stmt->fetch();  
        //  //print_r($fata);
    
        //   $table = "tx_addresses";
        //   $result = $pdo->exec("UPDATE $table SET `status`='Used', `email`='".$email."'  WHERE id=".$fata['id']);
        //   $tx_address = $fata['tx_address'];



			$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_PORT => "3001",
			  CURLOPT_URL => "http://18.217.132.185:3001/api/dataManager/generate/userAddress",
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "POST",
			  CURLOPT_POSTFIELDS => "{  \n   \"_password\":\"pass\"\n}",
			  CURLOPT_HTTPHEADER => array(
			    "Content-Type: application/json",
			    "Postman-Token: 2ab78b2e-d3b9-4173-adda-f3fa5d6b7f6e",
			    "cache-control: no-cache"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);
          $data = "";

          if ($err) {
            echo "cURL Error #:" . $err;
          } else {
             $data = json_decode($response, true);
          }
          $tx_address = $data['userAddress'];

  	  
	 if($row_count>0){	 	
	  	  try {
		      $stmt = $pdo->prepare('UPDATE users SET `verified`="Yes", `password` = "pass", `tx_address`="'.$tx_address.'" WHERE `id`='.$_REQUEST['id']);
		  } catch(PDOException $ex) {
		      echo "An Error occured!"; 
		      print_r($ex->getMessage());
		  }
		  $stmt->execute();
		  header('Location:users.php?choice=success&value=Verification success!');
		  exit();
	 }
	 else{
	 	$piyush = '<div style="padding:10px;color:#fff;background-color:red;">Verification Failled, Try Registering Again</div>';
	 }
  ?>