document.addEventListener("DOMContentLoaded", function () {
    const popup = document.getElementById("popup");
    const btn = document.querySelector(".btn");
    const closeBtn = document.querySelector(".close-btn");

    btn.addEventListener("click", function () {
        popup.style.display = "flex"; 
    });

    closeBtn.addEventListener("click", function () {
        popup.style.display = "none"; 
    });

    popup.addEventListener("click", function (event) {
        if (event.target === popup) {
            popup.style.display = "none";
        }
    });
});