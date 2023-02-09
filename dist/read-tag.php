
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
                        <form class="space-y-4 md:space-y-6" action="read-tag-process.php" method="POST">
                            <div>
                                <label for="rfid" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UID</label>
                                <input type="text" name="rfid" id="rfid" oninput="if (this.value.length === 10) showHint(this.value)" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Please Scan your Card" required=""></input>
                            </div>
                            <div>
                            </div>
                            <div>
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ชื่อจริง : First Name</label>
                                <p type="text" name="first_name" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">------------</input>
                            </div>
                            <div>
                                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">นามสกุล : Last Name</label>
                                <p type="text" name="last_name" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">-------------</input>
                            </div>
                            <div>
                                <label for="pno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">เลขประจำตัว : No.</label>
                                <p type="text" name="pno" id="pno" minlength="5" maxlength="5" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">-------------</input>
                            </div>
                            <div>
                                <label for="cur_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">วันที่ : Date</label>
                                <p type="date" name="cur_date" id="cur_date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">-------------</input>
                            </div>
                            <div>
                                <label for="cur_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">เวลา : Time</label>
                                <p type="time" name="cur_time" id="cur_time" step="1" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"><span id="cur_time">-------------</span></input>
                            </div>                   
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </body>

    <script>
function showHint(id) {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", "read-tag-process.php?id=" + id, true);
  xhr.onreadystatechange = function() {
    if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
      const response = JSON.parse(this.responseText);
      if (response.msg === null) {
        document.getElementById("first_name").value = response.first_name;
        document.getElementById("last_name").value = response.last_name;
      } else {
        alert(response.msg);
      }
    }
  };
  xhr.send();
}
	</script>
</html>