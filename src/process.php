<?php
     
    require 'connect.php';
 
    if ( !empty($_POST)) {
        $first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$pno = $_POST['pno'];
        $cur_date = $_POST['cur_date'];
        $cur_time = $_POST['cur_time'];
        $uid = $_POST['rfid'];
		$school_select = $_POST['school'];
		$email = $_POST['email'];
		$school = NULL;

		switch ($school_select) {
			case "SPT":
				$school = "โรงเรียนเซนต์ปีเตอร์ ธนบุรี";
				break;
			case "PMS":
				$school = "โรงเรียนพระแม่สกลสงเคราะห์";
				break;		
			case "SM":
				$school = "โรงเรียนเซนต์แมรี่";
				break;		
			case "MP":
				$school = "โรงเรียนแม่พระประจักษ์";
				break;	
			case "SC":
				$school = "โรงเรียนซางตาครู้สศึกษา";
				break;	
			case "GU":
				$school = "โรงเรียนคาเบรียลอุปถัมภ์";
				break;	
		}
        
		// insert data
        $pdo = Database::connect();
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "INSERT INTO user_data (first_name, last_name, pno, school, email, cur_date, cur_time, uid) values(?, ?, ?, ?, ?, ?, ?, ?)";
		$q = $pdo->prepare($sql);
		$q->execute(array($first_name,$last_name,$pno,$school,$email,$cur_date,$cur_time,$uid));
		Database::disconnect();

		header("Location: register.php");
    }
?>