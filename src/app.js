  window.addEventListener("load", () => {
    const preload = document.querySelector(".loader-wrapper");
    preload.classList.add("loader-finish");
    setInterval(myTimer, 300);
    function myTimer() {
        if (preload.classList.contains("loader-finish")) {
            preload.classList.add("hidden");
        }
    }
});   

