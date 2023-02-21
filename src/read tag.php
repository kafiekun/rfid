
<?php
    require 'connect.php';
    $rfid = null;
    if ( !empty($_GET['rfid'])) {
        $rfid = $_REQUEST['rfid'];
    }
     

    $pdo = Database::connect();
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$sql = "SELECT * FROM user_data where uid = ?";
	$q = $pdo->prepare($sql);
	$q->execute(array($rfid));
	$data = $q->fetch(PDO::FETCH_ASSOC);
	Database::disconnect();

	$msg = null;
	if (empty($data['first_name'])) {
		$msg = "ไม่พบข้อมูลในระบบ!!";
		$data['rfid']=$rfid;
		$data['first_name']="--------";
		$data['last_name']="--------";
		$data['pno']="--------";
        $data['school']="--------";
        $data['email']="--------";
		$data['cur_date']="--------";
        $data['cur_time']="--------";
	} else {
		$msg = null;
        $data['rfid']=$rfid;
	}
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
    <head>
        <link rel="icon" type="image/x-icon" href="../favicon.ico">
        <link rel="stylesheet" href="../dist/output.css" />
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Attendance Check</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
        <script src="https://cdn.tailwindcss.com"></script> 
    </head>
    <script>
        window.onload = function() {
            var el = document.getElementById('target');
            el.scrollIntoView(true);
        }
    </script>
    <body class="">
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
            <div class="flex flex-col items-center justify-center px-6 py-16 mx-auto md:h-screen lg:py-0" name="show_user_data" id="target">
                <div class="w-full backdrop-blur-sm bg-white/70 rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800/30 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-center text-2xl font-bold leading-tight tracking-tight text-spts md:text-2xl dark:text-white">
                            แสดงข้อมูล  
                        </h1>
                        <form class="space-y-4 md:space-y-6" method="GET">
                            <div>
                                <label for="rfid" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UID</label>
                                <input name="rfid" id="rfid" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" autofocus maxlength="10" onfocus="this.value=''" value="<?php echo $data['rfid'];?>"></input>
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
                                <label for="school" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">โรงเรียน : School</label>
                                <p type="text" name="school" id="school" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php echo $data['school'];?></input>
                            </div>
                            <div>
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">อีเมล : Email</label>
                                <p type="text" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><?php echo $data['email'];?></input>
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
                            <?php echo '<p class=" text-red-600 font-extrabold">'. $msg . '</p>';?></p>
                        </div>                
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>