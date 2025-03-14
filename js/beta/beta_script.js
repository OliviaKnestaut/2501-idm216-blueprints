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

function applyFilter(diet) {
    let category = "<?php echo $category); ?>"; // Get current category
    window.location.href = `main.php?category=${category}&diet=${diet}`;
}

//CART

document.addEventListener("DOMContentLoaded", function () {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    const cartContent = document.querySelector(".cart-content");

    function updateOrderDetails() {
        // Get the updated cart from localStorage
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        
        // Calculate Subtotal
        let subtotal = cart.reduce((total, item) => {
            return total + item.price * item.quantity;
        }, 0);
        
        // Assume a tax rate of 10% for now (adjust as needed)
        let taxRate = 0.06;
        let tax = subtotal * taxRate;
    
        // Calculate Total
        let total = subtotal + tax;
    
        // Update the DOM with the calculated values
        document.querySelector(".order-details .subtotal p:nth-child(2)").textContent = `$${subtotal.toFixed(2)}`;
        document.querySelector(".order-details .tax p:nth-child(2)").textContent = `$${tax.toFixed(2)}`;
        document.querySelector(".order-details .total p:nth-child(2)").textContent = `$${total.toFixed(2)}`;
    }

    if (window.location.pathname.includes("checkout.php")) {
        updateOrderDetails();
    }
    

    function saveCart() {
        localStorage.setItem("cart", JSON.stringify(cart));
        renderCart();
    }

    function addToCart(item) {
        console.log("addToCart called with:", item);

        console.log("Cart before update:", cart);

        // Check if the item already exists in the cart
        let existingItem = cart.find(cartItem => cartItem.id === item.id);

        if (existingItem) {

            const popupMessage = document.querySelector("#popup p");

            if (popupMessage) {
                popupMessage.textContent = "This item is already in your cart!";
            }
        } else {
            cart.push(item);
        }

        localStorage.setItem("cart", JSON.stringify(cart));

        renderCart();
    }

    document.querySelectorAll(".add-to-cart").forEach(button => {
        button.addEventListener("click", function () {
            const item = {
                id: this.getAttribute("data-id"),
                name: this.getAttribute("data-name"),
                price: this.getAttribute("data-price"),
                image: this.getAttribute("data-image"),
                quantity: this.getAttribute("data-quantity")
            };
            addToCart(item);
        });
    });

    function renderCart() {
        const cartContent = document.querySelector(".cart-content");
        if (!cartContent) {
            return;
        }

        cartContent.innerHTML = ""; // Clear previous items before re-rendering

        let cart = JSON.parse(localStorage.getItem("cart")) || [];

        if (cart.length === 0) {
            cartContent.innerHTML = "<p>Your cart is empty.</p>";
            updateOrderDetails(); // Make sure to update the totals when the cart is empty
            return;
        }


        cart.forEach(item => {
            const cartItem = document.createElement("div");
            cartItem.classList.add("menu-item");
            cartItem.innerHTML = `
                <div class="menu-image" style="background-image: url('${item.image}');"></div>
                <div class="menu-details">
                    <h2>${item.name}</h2>
                    <h2 class="price">$${(item.price * item.quantity).toFixed(2)}</h2>
                    <div class="item-settings">
                        <a href="#" class="remove-item" data-id="${item.id}">Remove</a>
                        <div class="quantity">
                            <button class="minus" aria-label="Decrease" data-id="${item.id}">&minus;</button>
                            <input type="number" class="input-box" value="${item.quantity}" min="1" max="10" data-id="${item.id}">
                            <button class="plus" aria-label="Increase" data-id="${item.id}">&plus;</button>
                        </div>
                    </div>
                </div>
            `;
            cartContent.appendChild(cartItem);

            // Add event listeners for quantity buttons and input changes
            const minusButton = cartItem.querySelector('.minus');
            const plusButton = cartItem.querySelector('.plus');
            const quantityInput = cartItem.querySelector('.input-box');

            minusButton.addEventListener('click', function () {
                let quantity = parseInt(quantityInput.value);
                if (quantity > 1) {
                    quantityInput.value = quantity - 1;
                    updateCartQuantity(item.id, quantityInput.value);
                }
            });

            plusButton.addEventListener('click', function () {
                let quantity = parseInt(quantityInput.value);
                if (quantity < 10) {
                    quantityInput.value = quantity + 1;
                    updateCartQuantity(item.id, quantityInput.value);
                }
            });

            quantityInput.addEventListener('change', function () {
                let newQuantity = parseInt(quantityInput.value);
                if (newQuantity >= 1 && newQuantity <= 10) {
                    updateCartQuantity(item.id, newQuantity);
                } else {
                    quantityInput.value = item.quantity;
                }
            });
            updateOrderDetails();
        });

        addCartListeners();
        updateOrderDetails();
        
    }

    function updateCartQuantity(itemId, newQuantity) {
        const cart = JSON.parse(localStorage.getItem("cart")) || [];
        const item = cart.find(i => i.id === itemId);
        if (item) {
            item.quantity = parseInt(newQuantity);
            localStorage.setItem("cart", JSON.stringify(cart));
            renderCart();
        }
    }

    function addCartListeners() {
        document.querySelectorAll(".remove-item").forEach(button => {
            button.addEventListener("click", function (e) {
                e.preventDefault();
                const itemId = this.getAttribute("data-id");
                const index = cart.findIndex(item => item.id === itemId);
                if (index !== -1) {
                    cart.splice(index, 1); // Remove item from cart
                    saveCart(); // Save and re-render the cart
                }
            });
        });
    }

    renderCart();

    if (cart.length === 0) {
        console.log("No items in cart, skipping render.");
        return;
    }
    console.log(localStorage.getItem("cart"));
    
});

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

if (window.location.pathname === "/~ojk25/idm216/beta/" || window.location.pathname.includes("index.php")) {
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
