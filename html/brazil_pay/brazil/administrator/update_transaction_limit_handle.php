<?php session_start();
   include 'connection.php';
   include 'function.php';
   include '../add_notification_user.php';
   $pdo = new PDO($dsn, $user, $pass, $opt);

  $table = "users";
  $result = $pdo->exec("UPDATE $table SET `tx_limit`='".$_REQUEST['tx_limit']."' WHERE id=".$_REQUEST['idd']);

  add_notification("Transaction Limit of a User has been Updated", "admin");
  add_notification_user("Your Transaction Limit has been Updated ", "user",$_REQUEST['idd']);
  header('Location:users.php?choice=success&value=Transaction Limit of User has been Updated');
  exit();
?>