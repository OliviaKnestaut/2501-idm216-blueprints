<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kim's Dragon | Checkout</title>
    <link rel="stylesheet" href="../css/beta/main_styles.css">
    <link rel="stylesheet" href="../css/beta/checkout.css">
    <link rel="icon"  type="image/png" href="../images/dragon-logo.png">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <div class="checkout-container">
        <h1>Checkout</h1>
        <div class="payment-box">
            <div class="payment-title">Payment</div>
            <div class="payment-methods">
                <a href="new-card-payment.php">
                    <button class="payment-method add-payment">
                        <img src="../images/beta/assets/card-icon.svg" alt="Card">
                        <h3 class="payment-name">Add New Card Payment</h3>
                        <img src="../images/beta/assets/add-payment-icon.svg" alt="Add">
                    </button>
                </a>
                <button class="payment-method">
                    <img src="../images/beta/assets/paypal-icon.svg" alt="Paypal">
                    <h3 class="payment-name">PayPal</h3>
                </button>
                <button class="payment-method">
                    <img src="../images/beta/assets/venmo-icon.svg" alt="Venmo">
                    <h3 class="payment-name">Venmo</h3>
                </button>
                <button class="payment-method">
                    <img src="../images/beta/assets/apple-pay-icon.svg" alt="Apple Pay">
                    <h3 class="payment-name">Apple Pay</h3>
                </button>
            </div>
        </div>
    </div>



        <div class="payment-box pickup-box">
            <div class="payment-title">Pickup Information</div>
            <div class="payment-methods">
                <div class="pickup-details">
                    <h3 class="pickup-label">Pickup At</h3>
                    <p class="pickup-location">Kims Dragon Food Truck</p>
                    <p class="pickup-address">3101-3141 Ludlow St</p>
                    <h3 class="pickup-label">Food Ready By</h3>
                    <p class="pickup-time">12:45pm</p>
                </div>
            </div>
        </div>

        <div class="order-details">
            <h3>Total Summary</h3>
            <div class="subtotal">
                <p>Subtotal</p>
                <p>$0.00</p>
            </div>
            <div class="tax">
                <p>Tax</p>
                <p>$0.00</p>
            </div>
            <div class="total">
                <p><strong>Total</strong></p>
                <p><strong>$0.00</strong></p>
            </div>
        </div>
        
    
    <a href="order-progress-1.php" class="btn">Submit Order</a>

    <script src="../js/beta/beta_script.js"></script>


</body>
</html>