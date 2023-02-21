<?php 
    session_start();
    
    if(!isset($_SESSION['username']))
    {
        header("Location: login.php");
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
        <title>Overview</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
        <script src="https://cdn.tailwindcss.com"></script>  
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>
    </head>
    <style>
		/*Overrides for Tailwind CSS */

		/*Form fields*/
		.dataTables_wrapper select,
		.dataTables_wrapper .dataTables_filter input {
			color: #4a5568;
			/*text-gray-700*/
			padding-left: 1rem;
			/*pl-4*/
			padding-right: 1rem;
			/*pl-4*/
			padding-top: .5rem;
			/*pl-2*/
			padding-bottom: .5rem;
			/*pl-2*/
			line-height: 1.25;
			/*leading-tight*/
			border-width: 2px;
			/*border-2*/
			border-radius: .25rem;
			border-color: #edf2f7;
			/*border-gray-200*/
			background-color: #edf2f7;
			/*bg-gray-200*/
		}

		/*Row Hover*/
		table.dataTable.hover tbody tr:hover,
		table.dataTable.display tbody tr:hover {
			background-color: #ebf4ff;
			/*bg-indigo-100*/
		}

		/*Pagination Buttons*/
		.dataTables_wrapper .dataTables_paginate .paginate_button {
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Pagination Buttons - Current selected */
		.dataTables_wrapper .dataTables_paginate .paginate_button.current {
			color: #fff !important;
			/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
			/*shadow*/
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			background: #667eea !important;
			/*bg-indigo-500*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Pagination Buttons - Hover */
		.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
			color: #fff !important;
			/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
			/*shadow*/
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			background: #667eea !important;
			/*bg-indigo-500*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Add padding to bottom border */
		table.dataTable.no-footer {
			border-bottom: 1px solid #e2e8f0;
			/*border-b-1 border-gray-300*/
			margin-top: 0.75em;
			margin-bottom: 0.75em;
		}

		/*Change colour of responsive icon*/
		table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
		table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
			background-color: #667eea !important;
			/*bg-indigo-500*/
		}
	</style>
    <script src="app.js"></script>
    <body class=" overflow-x-hidden ">  
        <div class="loader-wrapper absolute bg-black w-full">
                <div class="loader-ring w-60 h-60">
                </div>
                <span class=" load block  text-white font-bold ">Loading...</span>
        </div>
        <section style="background-image: url('https://www.spts.ac.th/main/wp-content/uploads/2022/01/build_spt.png');" class="dark:bg-blend-overlay mix-blend-overlay absolute bg-no-repeat bg-bottom bg-contain min-h-screen min-w-full">  
        <div class="bg-gradient-to-t from-sky-300 h-full w-full absolute -z-10 dark:bg-gradient-to-t dark:from-red-600/80 mix-blend-overlay dark:to-black">
        </div>
        <div id="navigation" class="z-20">      
            <script>
                $.ajaxSetup({ cache: false });
                $.get("navibar.php", 
                function(data) { 
                    $("#navigation").replaceWith(data);
                }
                );
                $(document).ready( function () {
                    $('#table_id').DataTable();
                } );
            </script> 
        </div>
                <div class=" transition-all ease-linear duration-500 flex flex-col flex-wrap items-center px-6 py-12" id="hero-con">     
                    <div class="shadow-lg rounded-lg border dark:border backdrop-blur-[2.1px] bg-white/30  dark:bg-gray-800/30 dark:border-gray-700 p-6 space-y-4">
                    <h1 class=" font-['Kanit'] text-center text-2xl font-bold leading-tight tracking-tight text-spts dark:text-white">
                        ข้อมูลผู้ใช้งาน
                    </h1>
                    <div class="rounded-lg bg-white/20 backdrop-blur-md  p-5 border border-black shadow-2xl flex">
                        <table id="table_id" class="">
                            <thead>
                                <tr>
                                    <th class=" ">UID</th>
                                    <th class=" ">ชื่อ</th>
                                    <th class=" ">นามสกุล</th>
                                    <th class=" ">เลขประจำตัว</th>
                                    <th class=" ">โรงเรียน</th>
                                    <th class=" ">อีเมล</th>
                                    <th class=" ">วันที่เข้า</th>
                                    <th class="">เวลาที่เข้า</th>
                                    <th class="">จัดการข้อมูล</th>
                                </tr>
                            </thead>
                        <tbody>
                        <?php
                            require 'connect.php';
                            $con = Database::connect();
                            $sql = 'SELECT * FROM user_data ORDER BY pno ASC';
                            foreach ($con->query($sql) as $row) {
                                        echo '<tr class="">';
                                        echo '<td class="">'. $row['uid'] . '</td>';
                                        echo '<td class="">'. $row['first_name'] . '</td>';
                                        echo '<td class="">'. $row['last_name'] . '</td>';
                                        echo '<td class="">'. $row['pno'] . '</td>';
                                        echo '<td class="">'. $row['school'] . '</td>';
                                        echo '<td class="">'. $row['email'] . '</td>';
                                        echo '<td class="">'. $row['cur_date'] . '</td>';
                                        echo '<td class="">'. $row['cur_time'] . '</td>';
                                        echo '<td><div class=" flex justify-center place-content-center m-[0.1rem]"><div class="inline-flex"><a class=" mr-1 w-full bg-white hover:bg-gray-200 text-gray-600 font-bold px-3 py-3 lg:px-4 2xl:px-7 rounded" href="user data edit page.php?uid='. $row['uid'] .'">แก้ไข</a>';
                                        echo ' ';
                                        echo '<a class="bg-red-400 hover:bg-red-500 text-white font-bold px-5 py-3 lg:px-5 2xl:px-9 rounded" href="user data delete page.php?uid=' .$row['uid'] .'">ลบ</a></div></div>';
                                        echo '</tr>';
                            }
                            Database::disconnect();
                        ?>   
                        </tbody>
                    </table>
                    </div>
                </div>
                </div>
        </div>
        </section>
    </body>
</html>

