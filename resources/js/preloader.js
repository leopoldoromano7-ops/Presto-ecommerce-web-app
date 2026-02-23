window.addEventListener("load", function () {
    let preloader = document.getElementById("preloader");

    if (!preloader) return;

    if (sessionStorage.getItem("preloaderSeen")) {
        preloader.remove();
        return;
    }

    sessionStorage.setItem("preloaderSeen", "true");

    setTimeout(function () {
        preloader.classList.add("hidden");

        setTimeout(function () {
            preloader.remove();
        }, 600);
    }, 1200);
});
