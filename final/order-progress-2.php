<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kim's Dragon | Order Progress</title>
    <link rel="stylesheet" href="../css/final/order_progress.css">
    <link rel="stylesheet" href="../css/final/components/nav-bar.css">
    <link rel="stylesheet" href="../css/final/components/plus-minus-btn.css">
    <link rel="stylesheet" href="../css/final/components/main_components.css">
    <link rel="stylesheet" href="../css/final/menu_styles.css">
    <link rel="stylesheet" href="../css/final/cart_styles.css">
    <link rel="stylesheet" href="../css/final/main_styles.css">

    <link rel="icon"  type="image/png" href="../images/dragon-logo.png">

</head>
<body>
    <header>
        <a href="cart.php">
            <img class="header-icon" src="../images/final/assets/cart-icon.svg" alt="">
        </a>
    </header>

    <div class="progress-header">
        <img class="dragon-logo-clouds" src="../images/final/assets/dragon-logo-clouds.svg" alt="">
        <h1 class="progress-title">Thank You For Your Order!</h1>
        <div class="centered-text">
            <p class="pickup-time">Your order will be ready at: 12:45pm</p>
        </div>
        <div class="centered-text">
            <h1 class="order-number"></h1>
        </div>
        <div class="centered-text">
            <p>show at truck</p>
        </div>
    </div>


    <div class="progress-wrapper">
        <div class="order-info">
            <h3 class="order-title">Head to the Kim's Dragon truck to pick up your food</h3>
        </div>
    </div>

    <div class="google-maps-wrapper">
        <div class="google-maps">
            <img src="../images/final/assets/google-maps.svg" alt="">
        </div>
        <button class="go-to-maps-btn">
            <h3 class="order-title">Go to Maps to find 3101-3141 Ludlow St</h3>
        </button>
    </div>

    <h1>My Order</h1>
    <div class="order-content">
    </div>
    <div class="order-details">
        <h3>Order Summary</h3>
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


    <?php include 'includes/nav-bar.php'; ?>


    <script src="../js/final/components/loading-bar.js"></script>
    <script src="../js/final/final_script.js"></script>
    <script src="../js/final/order-placed.js"></script>


</body>
</html>