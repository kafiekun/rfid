<?php
    require 'connect.php';
    session_start();
    
    if(!isset($_SESSION['username']))
    {
        header("Location: login.php");
    }
    $uid = 0;
     
    if ( !empty($_GET['uid'])) {
        $uid = $_REQUEST['uid'];
    }
     
    if ( !empty($_POST)) {
        // keep track post values
        $uid = $_POST['uid'];
         
        // delete data
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $pdo->prepare("DELETE FROM user_data WHERE uid = :uidd");
        $q->execute(array(':uidd' => $uid));     
        Database::disconnect();
        header("Location: user_data.php");
         
    }
?>
 
<!DOCTYPE html>
    <html lang="en">
    <head>
        <link rel="icon" type="image/x-icon" href="../favicon.ico">
        <link rel="stylesheet" href="../dist/output.css" />
        <meta charset="utf-8">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
        <script src="https://cdn.tailwindcss.com"></script>   
        <title>Delete Data</title>
    </head>
    <script src="app.js"></script>
    <body class=" scroll-smooth">  
        <div class="loader-wrapper absolute bg-black w-full">
                <div class="loader-ring w-60 h-60">
                </div>
                <span class=" load block  text-white font-bold ">Loading...</span>
        </div>
        <section style="background-image: url('https://www.spts.ac.th/main/wp-content/uploads/2022/01/build_spt.png');" class="dark:bg-blend-overlay mix-blend-overlay absolute bg-no-repeat bg-bottom bg-contain h-full min-w-full">  
        <div class="bg-gradient-to-t from-sky-300 h-full w-full absolute -z-10 dark:bg-gradient-to-t dark:from-red-600/80 dark:to-black mix-blend-overlay">
        </div>
        <div id="navigation" class="">      
        </div>
            <script>
                $.ajaxSetup({ cache: false });
                $.get("navibar.php", 
                function(data) { 
                    $("#navigation").replaceWith(data);
                }
                );
            </script>           
            <div class="flex items-center md:items-start md:mt-7 justify-center px-6 py-16 md:h-screen lg:py-0">
                <div class="w-full min-h-fit backdrop-blur-lg bg-white/50 rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800/30 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y- sm:p-8">
                        <form class="form-horizontal" action="user data delete page.php" method="post">
                            <input type="hidden" name="uid" value="<?php echo $uid;?>"/>
                            <div class=" flex flex-col justify-between">
                                <p class=" text-center text-red-600 font-bold tracking-tighter leading-tight mb-6">Are you sure to delete this data?</p>
                                <button type="submit" class=" hover:animate-bounce border-2 border-red-600 rounded-lg px-12 py-2 text-red-400 cursor-pointer hover:border-red-400 hover:bg-red-400 hover:text-white">Remove</button>
                                <a class=" mt-5 text-center border-2 border-gray-700 rounded-lg px-12 py-2 text-spts cursor-pointer hover:bg-gray-700 hover:text-gray-200" href="user_data.php">Cancel</a>
                            </div>
                        </form>
                    </div> 
                </div> 
            </div> 
        </div> 
    </body>
</html>