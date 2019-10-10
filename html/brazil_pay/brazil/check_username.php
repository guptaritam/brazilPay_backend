<?php session_start();
    include 'pdo_class_data.php';
    include 'connection.php';
    include 'administrator/function.php';
    $pdo_auth = authenticate();
    $pdo = new PDO($dsn, $user, $pass, $opt); 
   try {
	      $stmt = $pdo->prepare('SELECT `username` FROM `users` WHERE `username`="'.$_REQUEST['username'].'"');
	      //echo 'SELECT `username` FROM `users` WHERE `username`='.$_REQUEST['username'];
	     
	  } catch(PDOException $ex) {
	      echo "An Error occured!"; 
	      print_r($ex->getMessage());
	  }
	  $stmt->execute();
  	  $user = $stmt->fetch();
  	  $rowc = $stmt->rowCount();
  	  if($rowc>0){
  	      echo "1";
  	  }
  	  else{
  	      echo "0";
  	  }
  	  
  	 // print_r($user);
?>