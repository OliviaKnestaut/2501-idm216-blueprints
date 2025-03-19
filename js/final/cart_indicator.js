// Function to update the red dot on the cart icon
document.addEventListener("DOMContentLoaded", function () {
    function updateCartIndicator() {
        const cartDot = document.getElementById("cart-dot");
        const cart = JSON.parse(localStorage.getItem("cart")) || [];

        if (cart.length > 0) {
            cartDot.style.display = "block"; 
        } else {
            cartDot.style.display = "none";  
        }
    }

    updateCartIndicator();

    function addToCart(item) {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        let existingItem = cart.find(cartItem => cartItem.id === item.id);

        if (existingItem) {
            existingItem.quantity += item.quantity; 
        } else {
            cart.push(item);
        }

        localStorage.setItem("cart", JSON.stringify(cart));

        updateCartIndicator();
    }
});