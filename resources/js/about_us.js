window.toggleInfo = function(btn) {
    let cardBody = btn.parentElement;
    let info = cardBody.querySelector(".extra-info");

    info.classList.toggle("show");

    btn.innerText = info.classList.contains("show") 
        ? "Nascondi" 
        : "Scopri di più";
}
