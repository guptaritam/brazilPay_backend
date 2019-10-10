<?php session_start();
include 'pdo_class_data.php';
include 'connection.php';
include 'add_notification_user.php';
include 'administrator/function.php';
$pdo_auth = authenticate();
$pdo = new PDO($dsn, $user, $pass, $opt);

    try {
          $stmt = $pdo->prepare('UPDATE `pay_request` SET `status`= "Rejected" WHERE id='.$_REQUEST['id']);
      } catch(PDOException $ex) {
          echo "An Error occured!"; 
          print_r($ex->getMessage());
      }
      $stmt->execute();
      //ends here m,onitoring Transfers
  
  add_notification_user("A Payment is Rejected to requested user with $to_address", "user", $pdo_auth['id']);
  add_notification("A Payment is Rejected to requested user with $to_address from User", "admin");
  header('Location:view_pay_req.php?choice=success&value=Your Selected Payment Request Has been Rejected');
//}

?>