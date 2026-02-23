document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll(".dropdown-submenu > a").forEach(function(el) {
        el.addEventListener("click", function(e) {
            e.preventDefault();
            e.stopPropagation();
            this.parentElement.classList.toggle("open");
        });
    });

});
