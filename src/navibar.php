<?php
    session_start();
    $logged = false;

    if (isset($_GET['logout'])) {
      session_destroy();
      unset($_SESSION['username']);
      header('location: login.php');
    }

    if(!isset($_SESSION['username']))
    {
        $logged = false;
    } else {
      $logged = true;
    }
?>
            <?php if($logged) : ?>
<nav id="navbarSection" class="sticky z-20 top-0 p-5 md:pl-3 lg:pl-8 xl:pl-64 bg-white/80 dark:bg-black/40 xl:pr-60 backdrop-blur-[1.5px] min-w-full shadow-lg md:flex md:items-center md:justify-between transition-all ease-linear duration-500 ">
  <div class="flex justify-between items-center  md:opacity-100 top-[-400px] transition-all ease-in duration-500">
      <span class="text-xl font-[Poppins] cursor-pointer">
          <a href="https://www.spts.ac.th/main/" class="h-14 lg:h-16 inline pr-5">
              <img class="h-14 lg:h-16 inline pr-5" src="https://www.spts.ac.th/main/wp-content/uploads/2022/08/logohead.png">
          </a>
      </span>
      <span class="text-3xl cursor-pointer mx-2 md:hidden block">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 dark:fill-white" onclick="Menu(this)">
          <path fill-rule="evenodd" d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z" clip-rule="evenodd" />
        </svg>  
      </span>
  </div>

  <ul class="font-['Libre_Baskerville'] md:flex md:items-center z-[-1] md:z-auto md:static absolute bg-white/80 dark:bg-transparent backdrop-blur-[1.5px] w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400px] transition-all ease-linear duration-500">
    <li class="mx-4 my-6 md:my-0">
      <a href="user_data.php" class="text-lg lg:text-xl font-bold text-spts dark:text-white dark:hover:text-rose-700 hover:text-amber-400 transition-all ease-in duration-500" id="data">OVERVIEW</a>
    </li>
    <li class="mx-4 my-6 md:my-0">
      <a href="register.php" class="text-lg lg:text-xl font-bold text-spts dark:text-white dark:hover:text-rose-700 hover:text-amber-400 transition-all ease-in duration-500" id="register">REGISTRATION</a>
    </li>
    <li class="mx-4 my-6 md:my-0">
      <a href="read tag.php" class="text-lg lg:text-xl font-bold text-spts dark:text-white dark:hover:text-rose-700 hover:text-amber-400 transition-all ease-in duration-500" id="tag">ATTENDANCE</a>
    </li>
    <li class="mx-4 my-6 md:mx-12 md:my-0 text-n">
      <a href="navibar.php?logout='1'" class="text-lg lg:text-xl font-bold text-spts dark:text-white dark:hover:text-rose-700 hover:text-amber-400 transition-all ease-in duration-500" id="tag">Logout </a>
    </li>
  </ul>
</nav>

<script>
    function Menu(e) {
        let list = document.querySelector('ul');
        e.name === 'menu' ? (e.name = "close",list.classList.add('top-[96px]') , list.classList.add('opacity-100')) :( e.name = "menu" ,list.classList.remove('top-[96px]'),list.classList.remove('opacity-100'))
    }

    var data = document.getElementById("data");
    var register = document.getElementById("register");
    var tag = document.getElementById("tag");
    var nav = document.getElementById("navbarSection");
    var path = window.location.pathname;
    var page = path.split("/").pop();

    switch(page) {
      case "user_data.php" :
        console.log("overview");
          if (window.matchMedia) {
            if(window.matchMedia('(prefers-color-scheme: dark)').matches){
              data.classList.remove("dark:text-white"); 
              data.classList.add("dark:text-rose-700");
              data.classList.add("text-amber-400");
            } else {
            data.classList.remove("text-spts");
            data.classList.add("text-amber-400");
            data.classList.add("dark:text-rose-700");
          }
        }
       break;
       case "user%20data%20delete%20page.php" :
        console.log("overview");
          if (window.matchMedia) {
            if(window.matchMedia('(prefers-color-scheme: dark)').matches){
              data.classList.remove("dark:text-white");
              data.classList.add("dark:text-rose-700");
              data.classList.add("text-amber-400");
            } else {
            data.classList.remove("text-spts");
            data.classList.add("text-amber-400");
            data.classList.add("dark:text-rose-700");
          }
        }
       break;
       case "user%20data%20edit%20page.php" :
        console.log("overview");
          if (window.matchMedia) {
            if(window.matchMedia('(prefers-color-scheme: dark)').matches){
              data.classList.remove("dark:text-white");
              data.classList.add("dark:text-rose-700");
              data.classList.add("text-amber-400");
            } else {
            data.classList.remove("text-spts");
            data.classList.add("text-amber-400");
            data.classList.add("dark:text-rose-700");
          }
        }
       break;
       case "register.php" :
          console.log("register");
          if (window.matchMedia) {
            if(window.matchMedia('(prefers-color-scheme: dark)').matches){
              register.classList.remove("dark:text-white");
              register.classList.add("dark:text-rose-700");
              register.classList.add("text-amber-400");
            } else {
            register.classList.remove("text-spts");
            register.classList.add("text-amber-400");
            register.classList.add("dark:text-rose-700");
          }
        }
       break;
        case "read%20tag.php" :
          console.log("tag");
          nav.classList.remove("sticky");
          if (window.matchMedia) {
            if(window.matchMedia('(prefers-color-scheme: dark)').matches){
              tag.classList.remove("dark:text-white");
              tag.classList.add("dark:text-rose-700");
              tag.classList.add("text-amber-400");
            } else {
            tag.classList.remove("text-spts");
            tag.classList.add("text-amber-400");
            tag.classList.add("dark:text-rose-700");
          }
        }
       break;
      }
</script>
<?php endif; ?>