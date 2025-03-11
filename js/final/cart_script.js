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
            let chiliOil = null;
            let crispyOnions = null;
            let note = document.getElementById("add-note").value.trim(); 
        
            if (this.getAttribute("data-category") === 'Entree'){
                chiliOil = document.getElementById("checkbox1").checked;
                crispyOnions = document.getElementById("checkbox2").checked;
            }

            const item = {
                id: this.getAttribute("data-id"),
                name: this.getAttribute("data-name"),
                price: this.getAttribute("data-price"),
                image: this.getAttribute("data-image"),
                quantity: this.getAttribute("data-quantity"),
                chiliOil: chiliOil,
                crispyOnions: crispyOnions,
                note: note
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

            //Customizations
            let customizationList = "";

            // Check if chili oil was added
            if (item.chiliOil !== null && item.chiliOil) {
                customizationList += "<li>Add Chili Oil</li>";
            }
            if (item.crispyOnions !== null && item.crispyOnions) {
                customizationList += "<li>Add Crispy Onions</li>";
            }
            if (item.note !== "") {
                customizationList += `<li>Note: <i>${item.note}</i></li>`;
            }


            cartItem.innerHTML = `
                <div class="menu-image" style="background-image: url('${item.image}');"></div>
                <div class="menu-details">
                    <h2>${item.name}</h2>
                    <h2 class="price">$${(item.price * item.quantity).toFixed(2)}</h2>
                    <ul class="customizations">
                        ${customizationList}  <!-- The customization list will be added here -->
                    </ul>
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

    if (window.location.pathname.includes("cart.php")){
        document.getElementById("pay-now-btn").addEventListener("click", function () {
            let cartError = document.getElementById("cart-error");
    
    
            if (cart.length === 0) {
                cartError.style.display = "block";
            } else {
                cartError.style.display = "none";
                window.location.href = "checkout.php";
            }
        });
    
        if (cart.length === 0) {
            console.log("No items in cart, skipping render.");
            return;
        }
        console.log(localStorage.getItem("cart"));
    }
    
    
});