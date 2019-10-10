<?php 
  include 'connection.php';
  include 'add_notification_user.php';
  include 'administrator/function.php';
  $pdo = new PDO($dsn, $user, $pass, $opt);
  
  
  if($_REQUEST['username']==""){
      echo "Sorry Invalid Address, Or Blank Address";
      exit();
  }
  
   try {
          $stmt = $pdo->prepare('SELECT * FROM `users` WHERE `username`="'.$_REQUEST['username'].'"');
          //echo 'SELECT * FROM `users` WHERE `tx_address`="'.$_REQUEST['username'].'"';
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
  $user = $stmt->fetch();
  echo $user['tx_address'];
?>