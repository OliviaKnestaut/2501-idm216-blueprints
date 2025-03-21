document.addEventListener("DOMContentLoaded", function() {
    let progressBar = document.getElementById("progress-bar");
    let steps = document.querySelectorAll(".step");
    let stepCount = steps.length;
    let stepWidth = 95 / (stepCount - 1);
    
    steps.forEach((step, index) => {
        setTimeout(() => {
            progressBar.style.width = (index * stepWidth) + "%";

            setTimeout(() => {
                step.classList.add("active");
                
                if (index === stepCount - 1) {
                    setTimeout(() => {
                        window.location.href = "../final/order-progress-2.php";
                    }, 500); 
                }
            }, 1200); 
        }, index * 1400);
    });
});
