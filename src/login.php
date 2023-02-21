<?php
    session_start();
    include('connect.php'); 
    if(isset($_SESSION['username']))
    {
        header("Location: user_data.php");
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
        <title>Login</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
        <script src="https://cdn.tailwindcss.com"></script>   
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
            <div class="flex flex-col items-center justify-center px-6 py-16 mx-auto md:h-screen lg:py-0">
                    <div class="w-full min-h-fit backdrop-blur-sm bg-white/70 rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800/30 dark:border-gray-700">
                    <div class="p-6 space-y-4 md:space-y- sm:p-8">
                        <img class=" h-20 lg:h-22 m-auto pr-5" src="https://www.spts.ac.th/main/wp-content/uploads/2022/08/logohead.png">
                        <h1 class="text-6xl p-4 text-center font-bold tracking-tighter leading-tight from-purple-600 via-pink-600 to-blue-600 bg-gradient-to-r bg-clip-text text-transparent">
                            Login
                        </h1>
                        <form class="space-y-4 md:space-y-6 mt-3" action="login process.php" method="POST">
                            <div>
                                <label for="username" class="block mb-2 text-sm font-bold text-spts dark:text-white">Username</label>
                                <input type="username" name="username" id="username" class=" bg-transparent border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" autofocus placeholder="Username"></input>
                            </div>
                            <div>
                                <label for="password" class="block mb-2 text-sm font-bold text-spts dark:text-white">Password</label>
                                <input type="password" name="password" id="password" class=" bg-transparent border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-red-600 focus:border-red-600 block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-red-500 dark:focus:border-red-500" placeholder="****************" ></input>
                            </div>
                            <div class="flex justify-center">
                                <button type="submit" name="login_user" class="  w-6/12 h-12 text-white rounded-full from-rose-400 via-fuchsia-500 to-indigo-500 bg-gradient-to-r">
                                    <span class=" flex m-[0.1em] place-items-center h-11 justify-center rounded-full bg-white ">
                                        <p class="text-black font-bold ">Submit<p>
                                    </span>
                                </button> 
                            </div>
                        </form>
                        <?php if (isset($_SESSION['error'])) : ?>
                            <div class="error">
                                                                      <h3 class=" text-red-800 text-center font-bold">
                                    <?php 
                                        echo $_SESSION['error'];
                                        unset($_SESSION['error']);
                                    ?>
                                    </h3>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>