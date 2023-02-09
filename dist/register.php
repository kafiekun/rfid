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
            <div class="flex flex-col items-center justify-center px-6 py-16 mx-auto md:h-screen lg:py-0">
                <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-center text-2xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            บันทึกเวลา  
                        </h1>
                        <form class="space-y-4 md:space-y-6" action="process.php" method="POST">
                            <div>
                                <label for="rfid" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">UID</label>
                                <input type="text" name="rfid" id="rfid" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Please Scan your Card" required=""></input>
                            </div>
                            <div>
                                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ชื่อจริง : First Name</label>
                                <input type="text" name="first_name" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="ชื่อจริง" required=""></input>
                            </div>
                            <div>
                                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">นามสกุล : Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="นามสกุล" required=""></input>
                            </div>
                            <div>
                                <label for="pno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">เลขประจำตัว : No.</label>
                                <input type="text" name="pno" id="pno" minlength="5" maxlength="5" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="*****" required=""></input>
                            </div>
                            <div>
                                <label for="cur_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">วันที่ : Date</label>
                                <input type="date" name="cur_date" id="cur_date" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required=""></input>
                            </div>
                            <div>
                                <label for="cur_time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">เวลา : Time</label>
                                <input type="time" name="cur_time" id="cur_time" step="1" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required=""></input>
                            </div>
                            <button type="submit" class="w-full text-white bg-sky-600 hover:bg-sky-700 focus:ring-4 focus:outline-none focus:ring-sky-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:ring-sky-800">Submit</button>                            
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </body>

    <script type="text/javascript">
        let curDate = new Date();

        var time = curDate.toLocaleTimeString([], {
            hourCycle: 'h24',
            hour: '2-digit',
            minute: '2-digit',
            second: '2-digit'
        });

        var date = curDate.toLocaleDateString('sv');

        document.getElementById('cur_time').value = time;
        document.getElementById('cur_date').value = date;
    </script>
</html>