<?php
    require 'connect.php';
	session_start();
	$school_selector = "";
    if(!isset($_SESSION['username']))
    {
        header("Location: login.php");
    }
    $uid = null;
    if ( !empty($_GET['uid'])) {
        $uid = $_REQUEST['uid'];
    }
    
    $pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM user_data where uid = ?";
	$q = $pdo->prepare($sql);
	$q->execute(array($uid));
	$data = $q->fetch(PDO::FETCH_ASSOC);
	switch ($data['school']) {
		case "โรงเรียนเซนต์ปีเตอร์ ธนบุรี":
			$school_selector = "SPT";
			break;
		case "โรงเรียนพระแม่สกลสงเคราะห์":
			$school_selector = "PMS";
			break;		
		case "โรงเรียนเซนต์แมรี่":
			$school_selector = "SM";
			break;		
		case "โรงเรียนแม่พระประจักษ์":
			$school_selector = "MP";
			break;	
		case "โรงเรียนซางตาครู้สศึกษา":
			$school_selector = "SC";
			break;	
		case "โรงเรียนคาเบรียลอุปถัมภ์":
			$school_selector = "GU";
			break;	
	}
	Database::disconnect();
?>

<!DOCTYPE html>
<html lang="en">
<html>
	<head>
		<link rel="icon" type="image/x-icon" href="../favicon.ico">
		<link rel="stylesheet" href="../dist/output.css" />
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
        <script src="https://cdn.tailwindcss.com"></script>   
        <title>Edit Data</title>
    </head>
	<script src="app.js"></script>
    <body class="">

	<div class="loader-wrapper absolute bg-black w-full">
			<div class="loader-ring w-60 h-60">
			</div>
			<span class=" load block  text-white font-bold ">Loading...</span>
	</div>
    <section style="background-image: url('https://www.spts.ac.th/main/wp-content/uploads/2022/01/build_spt.png');" class="dark:bg-blend-overlay mix-blend-overlay absolute bg-no-repeat bg-bottom bg-contain min-h-screen w-full">  
        <div class="bg-gradient-to-t from-sky-300 h-full w-full absolute -z-10 dark:bg-gradient-to-t dark:from-red-600/80 dark:to-black mix-blend-overlay">
            </div>
            <div id="navigation" class=" z-20">      
            </div>
                <script>
                    $.ajaxSetup({ cache: false });
                    $.get("navibar.php", 
                    function(data) { 
                        $("#navigation").replaceWith(data);
                    }
                    );
                </script> 
            <div class="flex flex-col items-center justify-center px-6 py-16 mx-auto md:h-screen lg:py-0">
			<div class="w-full backdrop-blur-[2.1px] bg-white/60 rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800/30 dark:border-gray-700">
			<div class="p-6 space-y-4 md:space-y-6 sm:p-8">
				<h1 class="text-center text-2xl font-bold leading-tight tracking-tight text-spts md:text-2xl dark:text-white">
					แก้ไขข้อมูล 
				</h1>
				<form class="space-y-4 md:space-y-6" action="edit process.php?id=<?php echo $uid?>" method="post">
					<div>
						<label for="uid" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UID</label>
						<input type="text" name="uid" id="uid"class=" bg-transparent border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" value="<?php echo $data['uid']?>" readonly></input>
					</div>
					<div>
						<label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ชื่อจริง : First Name</label>
						<input type="text" name="first_name" id="first_name" class=" bg-transparent border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" value="<?php echo $data['first_name'];?>" required=""></input>
					</div>
					<div>
						<label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">นามสกุล : Last Name</label>
						<input type="text" name="last_name" id="last_name" class=" bg-transparent border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" value="<?php echo $data['last_name'];?>" required=""></input>
					</div>
					<div>
						<label for="pno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">เลขประจำตัว : No.</label>
						<input type="text" name="pno" id="pno" minlength="5" maxlength="5" class=" bg-transparent border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" value="<?php echo $data['pno'];?>" required=""></input>
					</div>
					<div>
					<label for="school" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">โรงเรียน : School</label>
						<select id="school" name="school" class="bg-transparent border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-gray-600 focus:border-gray-600 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" required value="<?php echo $data['school'];?>">
							<option value="">โปรดเลือกโรงเรียน</option>
							<option value="SPT" <?php if($school_selector==='SPT') echo 'selected="selected"';?>>โรงเรียนเซนต์ปีเตอร์ ธนบุรี</option>
							<option value="PMS" <?php if($school_selector==='PMS') echo 'selected="selected"';?>>โรงเรียนพระแม่สกลสงเคราะห์</option>
							<option value="SM" <?php if($school_selector==='SM') echo 'selected="selected"';?>>โรงเรียนเซนต์แมรี่</option>
							<option value="MP" <?php if($school_selector==='MP') echo 'selected="selected"';?>>โรงเรียนแม่พระประจักษ์</option>
							<option value="SC" <?php if($school_selector==='SC') echo 'selected="selected"';?>>โรงเรียนซางตาครู้สศึกษา</option>
							<option value="GU" <?php if($school_selector==='GU') echo 'selected="selected"';?>>โรงเรียนคาเบรียลอุปถัมภ์</option>
						</select>
					</div>
					<div>
						<label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">อีเมล : Email</label>
						<input type="text" name="email" id="email" class=" bg-transparent border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" value="<?php echo $data['email'];?>" required=""></input>
					</div>
					<div>
						<label for="cur_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">วันที่ : Date</label>
						<input type="date" name="cur_date" id="cur_date" class=" bg-transparent border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" value="<?php echo $data['cur_date'];?>" required=""></input>
					</div>
					<div>
						<label for="cur_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">เวลา : Time</label>
						<input type="time" name="cur_time" id="cur_time" step="1" class=" bg-transparent border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" value="<?php echo $data['cur_time'];?>" required=""></input>
					</div>
					<button type="submit" class="w-full hover:animate-bounce border-2 border-green-400 rounded-lg px-12 py-2 cursor-pointer bg-green-400 text-white font-bold leading-tight">Update</button>                            
				</form>
			</div>
			</div>
		</div>     
	</section>
	</body>
</html>