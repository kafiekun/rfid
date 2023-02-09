<?php
     
    require 'connect.php';
 
    if ( !empty($_POST)) {
        $first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$pno = $_POST['pno'];
        $cur_date = $_POST['cur_date'];
        $cur_time = $_POST['cur_time'];
        $uid = $_POST['rfid'];
        
		// insert data
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO user_data (first_name, last_name, pno, cur_date, cur_time, uid) values(?, ?, ?, ?, ?, ?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($first_name,$last_name,$pno,$cur_date,$cur_time,$uid));
		Database::disconnect();
		header("Location: register.php");
    }
?>