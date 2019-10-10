<?php session_start();
    include 'pdo_class_data.php';
    include 'connection.php';
    include 'administrator/function.php';
    $pdo_auth = authenticate();
    $pdo = new PDO($dsn, $user, $pass, $opt); 
    $query = $_SERVER['PHP_SELF'];
    $path = pathinfo( $query );
    $what_you_want = $path['basename'];
   	// echo $what_you_want;
   	if($what_you_want!="kyc.php"){
   		if($pdo_auth['kyc_approved']=="Pending"){
		      header('Location:kyc.php?choice=error&value=Please Submit Your KYC Details, Once They Are Approved You will be able to Navigate');
		      exit();
		    }
   	}
   

     $result = $pdo->exec("UPDATE `users` SET `tutorial_taken`='Yes' WHERE `id`=".$pdo_auth['id']."");  
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="icon" type="image/png" sizes="32x32" href="brazil.png">
   
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- App title -->
    <title><?php include 'title.php'; ?></title>


    <!-- Switchery css -->
    <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" />

    

