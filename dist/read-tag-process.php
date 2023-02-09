<?php
    require 'connect.php';
    $id = $_POST['rfid'];
    $pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM user_data where uid = ?";
	$q = $pdo->prepare($sql);
	$q->execute(array($id));
	$data = $q->fetch(PDO::FETCH_ASSOC);
	Database::disconnect();

	$msg = null;
	if (empty($data['first_name'])) {
		$msg = "ไม่พบข้อมูลในระบบ!!";
		$data['rfid']=$id;
		$data['first_name']="--------";
		$data['last_name']="--------";
		$data['pno']="--------";
		$data['cur_date']="--------";
        $data['cur_time']="--------";
	} else {
		$msg = null;
        $data['rfid']=$id;
	}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="output.css">
    </head>
    <body>
        <section class="bg-gray-50 dark:bg-gray-900 h-screen">
            <p id="getUID" hidden></p>
            <div class="flex flex-col items-center justify-center px-6 py-16 mx-auto md:h-screen lg:py-0" name="show_user_data">
                <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-center text-2xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            แสดงข้อมูล  
                        </h1>
                        <form class="space-y-4 md:space-y-6" action="process.php" method="POST">
                            <div>
                                <label for="rfid" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UID</label>
                                <p name="rfid" id="rfid" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php echo $data['rfid'];?></input>
                            </div>
                            <div>
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ชื่อจริง : First Name</label>
                                <p type="text" name="first_name" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php echo $data['first_name'];?></input>
                            </div>
                            <div>
                                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">นามสกุล : Last Name</label>
                                <p type="text" name="last_name" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php echo $data['last_name'];?></input>
                            </div>
                            <div>
                                <label for="pno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">เลขประจำตัว : No.</label>
                                <p type="text" name="pno" id="pno" minlength="5" maxlength="5" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php echo $data['pno'];?></input>
                            </div>
                            <div>
                                <label for="cur_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">วันที่เข้าใช้งาน : Date</label>
                                <p type="date" name="cur_date" id="cur_date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php echo $data['cur_date'];?></input>
                            </div>
                            <div>
                                <label for="cur_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">เวลาที่เข้าใช้งาน : Time</label>
                                <p type="time" name="cur_time" id="cur_time" step="1" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php echo $data['cur_time'];?></input>
                            </div>                   
                        </form>
                        <div class="text-xl flex justify-center">
                            <p style="color:red;"><?php echo $msg;?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>

    <script>
	</script>
</html>