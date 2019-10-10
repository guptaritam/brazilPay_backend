<?php session_start();
    include 'pdo_class_data.php';
    include 'connection.php';
    include 'add_notification_user.php';
    include 'administrator/function.php';
    $pdo_auth = authenticate();
    $pdo = new PDO($dsn, $user, $pass, $opt);
    
     try {
          $stmt = $pdo->prepare('UPDATE `users` SET `tx_pass`="'.$_REQUEST['tx_password'].'" WHERE `id`="'.$pdo_auth['id'].'"');
         // echo 'UPDATE `users` SET `tx_pass`="'.$tx_password.'" WHERE `id`="'.$pdo_auth['id'].'"';
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
  
  $stmt->execute();
  add_notification_user("Your Transaction Password has been Updated", "user", $pdo_auth['id']);
  add_notification("Transaction Password of a user has been Updated : ".$pdo_auth['username'], "admin");
  header('Location:update_transaction_password.php?choice=success&value=Your Transaction Password has been Updated.');
  exit();
?>