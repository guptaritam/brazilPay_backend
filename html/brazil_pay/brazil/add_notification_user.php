<?php 
function add_notification_user($notification, $for, $id){
        $host = '127.0.0.1';
        $db   = 'brazil_pay';
        $user = 'root';
        $pass = 'pass';
        $charset = 'utf8';


        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, $user, $pass, $opt);
        $table = "notification";
        $key_list = "`notification`, `for`, `user_id`";
        $value_list = "'".$notification."', '".$for."', '".$id."'";
        $result = $pdo->exec("INSERT INTO `$table` ($key_list) VALUES ($value_list)");
    }
 ?>