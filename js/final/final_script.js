// Toggle between Sign In and Sign Up
function toggleForm(form) {
    document.getElementById('login-form').style.display = 'none';
    document.getElementById('signup-form').style.display = 'none';
    
    // Show the selected form
    if (form === 'login') {
        document.getElementById('login-form').style.display = 'block';
    } else if (form === 'signup') {
        document.getElementById('signup-form').style.display = 'block';
    }

    document.querySelectorAll('.tabs button').forEach(btn => btn.classList.remove('active'));
    document.getElementById(form).classList.add('active');

    // Update URL
    window.history.pushState({}, '', '?form=' + form);
}

//Toggle Password Visibility
const togglePasswordButtons = document.querySelectorAll('.togglePassword');

togglePasswordButtons.forEach((button) => {
    button.addEventListener('click', function () {
        const passwordInput = button.previousElementSibling;
        const togglePasswordIcon = button.querySelector('i');

        // Toggle password visibility
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text'; // Show the password
            togglePasswordIcon.classList.remove('fa-eye'); // Change to eye-slash
            togglePasswordIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password'; // Hide the password
            togglePasswordIcon.classList.remove('fa-eye-slash'); // Change to eye
            togglePasswordIcon.classList.add('fa-eye');
        }
    });
});

//Continue as Guest
function continueAsGuest() {
    localStorage.setItem('guestSession', 'true');
    window.location.href = 'welcome.php';
}

    let filter = "closed"
    function openFilterPopup() {

        if (filter == 'closed'){
            filter = 'open';
            document.getElementById("filter-popup").style.visibility = "visible";
            document.getElementsByClassName("filter-btn")[0].style.width = "250px";
        }
        else{
            document.getElementById("filter-popup").style.visibility = "hidden";
            document.getElementsByClassName("filter-btn")[0].style.width = "140px";
            filter = 'closed';
        }
        
    }


    function applyFilter(element) {
        let category = element.getAttribute("data-category");
        let diet = element.getAttribute("data-diet");
        const params = new URLSearchParams(window.location.search);
        const activeDiet = params.get("diet"); // Get 'diet' from URL

        if(diet === activeDiet){
            element.classList.remove("active-filter");
            window.location.href = `main.php?category=${category}&diet=`;
        } else{
            window.location.href = `main.php?category=${category}&diet=${diet}`;
        }
    }

    document.addEventListener("DOMContentLoaded", function () {
        const params = new URLSearchParams(window.location.search);
        const activeDiet = params.get("diet"); // Get 'diet' from URL
        const filterButtons = document.querySelectorAll(".filter-options h3");
    
        filterButtons.forEach(button => {
            let buttonDiet = button.getAttribute("data-diet");
    
            if (buttonDiet === activeDiet) {
                button.classList.add("active-filter");
            } else {
                button.classList.remove("active-filter");
            }
        });
    });


//Checkout

if (window.location.pathname.includes("checkout.php")) {
    let cardNumber = localStorage.getItem("card-number");
    let paymentMethods = document.querySelectorAll(".payment-method");
    let submitButton = document.getElementById("submit-order"); // Select the submit button
    let paymentError = document.getElementById("payment-error");

    paymentMethods.forEach(method => {
        method.addEventListener("click", function () {
            if (this.classList.contains("selected")) {
                this.classList.remove("selected");
                return;
            }

            paymentMethods.forEach(m => m.classList.remove("selected"));

            // Add "selected" class to the clicked payment method
            this.classList.add("selected");
        });
    });

    submitButton.addEventListener("click", function (event) {
        let selectedMethod = document.querySelector(".payment-method.selected");
        
        
        if (!selectedMethod) {
            event.preventDefault();
            paymentError.style.display = "block";
            return;
        } else{
            error.style.display = "none";
        }
    });

    

    let pickUpTime = generatePickUpTime();
    localStorage.setItem("pickup-time", pickUpTime);

    document.querySelector(".pickup-time").textContent = `${localStorage.getItem("pickup-time")}`;

    if (cardNumber) { // Ensure cardNumber exists
        let lastFourDigits = cardNumber.slice(-4);
        document.getElementById("card-payment").textContent = `Card ${lastFourDigits}`;

        paymentMethods.forEach(m => m.classList.remove("selected"));
        document.getElementById("card-payment-btn").classList.add("selected");
    }

    console.log(cardNumber);
}

if (window.location.pathname === "/~ojk25/idm216/final/" || window.location.pathname.includes("index.php")) {
    localStorage.clear();
    console.log("Local Storage cleared");
}

function generatePickUpTime() {
    let now = new Date(); // Get the current date and time
    now.setMinutes(now.getMinutes() + 20); // Add 20 minutes

    // Format the time as HH:MM AM/PM
    let hours = now.getHours();
    let minutes = now.getMinutes();
    let ampm = hours >= 12 ? "PM" : "AM";

    hours = hours % 12 || 12; // Convert 24-hour time to 12-hour format
    minutes = minutes.toString().padStart(2, "0"); // Ensure two-digit minutes

    return `${hours}:${minutes} ${ampm}`;
}
