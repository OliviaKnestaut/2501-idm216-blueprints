/* ============================
Heart icon
============================= */
const heartIcon = document.getElementById("heart-icon");
if(heartIcon){
    heartIcon.addEventListener("click", function() {
        var heartIcon = document.getElementById("heart-icon");
        if (heartIcon.src.includes("heart-icon.svg")) {
            heartIcon.src = "../images/beta/assets/heart-icon-filled.svg"; 
        } else {
            heartIcon.src = "../images/beta/assets/heart-icon.svg"; 
        }
    });
}