//Order Appears
document.addEventListener("DOMContentLoaded", function () {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    let recentOrder = JSON.parse(localStorage.getItem("recent-order")) || [];

    const orderContent = document.querySelector(".order-content");

    if (window.location.pathname.includes("order-progress-1.php")) {

        localStorage.removeItem("recent-order");
        localStorage.removeItem("order-number");
        localStorage.removeItem("order-time");

        let orderNumber = generateOrderNumber();
        localStorage.setItem("order-number", orderNumber);

        let pickUpTime = generatePickUpTime();
        localStorage.setItem("pickup-time", pickUpTime);
        
        placeOrder();
    }

    if (window.location.pathname.includes("order-progress-2.php")) {
        document.querySelector(".order-number").textContent = `#${localStorage.getItem("order-number")}`;
        document.querySelector(".pickup-time").textContent = `Your order will be ready at: ${localStorage.getItem("pickup-time")}`;
        renderOrder();
        showSummary();
        localStorage.removeItem("cart");
    }

    function generateOrderNumber() {
        return Math.floor(100 + Math.random() * 900);
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
    
    function placeOrder() {
        let recentOrder = [];

        console.log("Placing Order");

        cart.forEach(item => {
            recentOrder.push(item);
        });

        localStorage.setItem("recent-order", JSON.stringify(recentOrder));
        
    }

    function renderOrder() {
        const orderContent = document.querySelector(".order-content");
        if (!orderContent) {
            return;
        }

        orderContent.innerHTML = ""; // Clear previous items before re-rendering

        let recentOrder = JSON.parse(localStorage.getItem("recent-order")) || [];

        if (recentOrder.length === 0) {
            orderContent.innerHTML = "<p>Your order is empty.</p>";
            return;
        }

        recentOrder.forEach(item => {
            const orderItem = document.createElement("div");
            orderItem.classList.add("menu-item");
            orderItem.innerHTML = `
                <div class="menu-image" style="background-image: url('${item.image}');"></div>
                <div class="menu-details-order">
                    <div class="order-item">
                        <h2>${item.name}</h2>
                        <h2 class="price">$${(item.price * item.quantity).toFixed(2)}</h2>
                    </div>
                    
                    <div class="item-settings">
                        <div class="quantity">
                        <h2>&times;${item.quantity}</h2>
                        </div>
                    </div>
                </div>
            `;
            orderContent.appendChild(orderItem);

        });        
    }

    function showSummary() {
        // Get the updated cart from localStorage
        let recentOrder = JSON.parse(localStorage.getItem("recent-order")) || [];
        
        // Calculate Subtotal
        let subtotal = recentOrder.reduce((total, item) => {
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

    renderOrder();

    if (recentOrder.length === 0) {
        console.log("No items in order, skipping render.");
        return;
    }


    if (window.location.pathname.includes("welcome.php") && recentOrder) {
        
        console.log("Recent Order Exists!");

        document.querySelector(".recent-order").style.visibility = "visible";
        document.querySelector(".recent-buffer").style.display = "block";
    
        document.querySelector(".order-number2").textContent = `Recent Order: #${localStorage.getItem("order-number")}`;
        document.querySelector(".pickup-time2").textContent = `Ready at ${localStorage.getItem("pickup-time")}`;
    }

});

