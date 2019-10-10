<?php session_start();
    include 'connection.php';
	$pdo = new PDO($dsn, $user, $pass, $opt);

	try {
		    $stmt = $pdo->prepare('DELETE FROM `pay_request` WHERE `id` ='.$_REQUEST['id']);
		   } catch(PDOException $ex) {
		    echo "An Error occured!"; 
		    print_r($ex->getMessage());
		}
		$stmt->execute();
	    header('Location:view_pay.php?choice=success&value=Payment request Deleted');
	    exit();

?>