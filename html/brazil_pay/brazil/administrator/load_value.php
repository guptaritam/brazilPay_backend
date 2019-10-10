<?php
   include 'connection.php';
   include 'function.php';
   $pdo = new PDO($dsn, $user, $pass, $opt);

    try {
          $stmt = $pdo->prepare('SELECT name,tx_address,balance,id  FROM `users` WHERE id='.$_REQUEST['user_id']);
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      $user = $stmt->fetch();
      $i=1;
      echo json_encode($user, 0);
?>