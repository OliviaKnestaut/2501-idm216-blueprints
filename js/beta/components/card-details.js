// STORE CARD NUMBER

document.getElementById("saveCardDetails").addEventListener("click", function(event) {
    event.preventDefault(); // Prevent default behavior (e.g., if it were a form submission)

    // Retrieve input values
    let cardName = document.getElementById("name").value.trim();
    let cardNumber = document.getElementById("cardnumber").value.trim();
    let expirationDate = document.getElementById("expirationdate").value.trim();
    let securityCode = document.getElementById("securitycode").value.trim();
    let error = document.getElementById("card-error")


    // Validate card number length
    if (cardName.length < 1){
        error.style.display = "block";
        error.textContent = "Invalid Cardholder Name";
        return;
    } else if (cardNumber.length < 19){
        error.style.display = "block";
        error.textContent = "Invalid Card Number";
        return;
    } else if (expirationDate.length < 5){
        error.style.display = "block";
        error.textContent = "Invalid Expiration Date";
        return;
    } else if (securityCode.length < 3 || securityCode.length > 4 ){
        error.style.display = "block";
        error.textContent = "Invalid Security Code";
        return;
    } else {
        error.style.display = "none";
    }

    // Save to localStorage
    localStorage.setItem("card-number", cardNumber);

    // Redirect to checkout page
    window.location.href = "checkout.php";
});