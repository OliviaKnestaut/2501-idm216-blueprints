<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kim's Dragon | Order Progress</title>
    <link rel="stylesheet" href="../css/beta/main_styles.css">
    <link rel="stylesheet" href="../css/beta/order_progress.css">
    <link rel="stylesheet" href="../css/beta/components/nav-bar.css">
</head>
<body>
    <header>
        <img class="header-icon" src="../images/beta/assets/cart-icon.svg" alt="">
    </header>
    <div class="progress-header">
        <img class="dragon-logo-clouds" src="../images/beta/assets/dragon-logo-clouds.svg" alt="">
        <h1 class="progress-title">Thank You For Your Order!</h1>
    </div>

    <div class="progress-wrapper">
        <div class="progress-container">
            <div class="progress-track"></div>
            <div class="progress-bar" id="progress-bar"></div>
            <div class="steps-container">
                <div class="step" id="step1"><img src="../images/loading-bar/ordered-icon.svg" alt="Ordered"></div>
                <div class="step" id="step2"><img src="../images/loading-bar/cooking-icon.svg" alt="Cooking"></div>
                <div class="step" id="step3"><img src="../images/loading-bar/almost-done-icon.svg" alt="Almost Done"></div>
                <div class="step" id="step4"><img src="../images/loading-bar/complete-icon.svg" alt="Complete"></div>
            </div>
        </div>
    </div>
    <div class="progress-wrapper">
        <div class="order-info">
            <h3 class="order-title">Order Received ... <br>Sending to Truck</h3>
        </div>
    </div>

    <div class="google-maps-wrapper">
        <div class="google-maps">
            <img src="../images/beta/assets/google-maps.svg" alt="">
        </div>
        <button class="go-to-maps-btn">
            <h3 class="order-title">Go to Maps to find 3101-3141 Ludlow St</h3>
        </button>
    </div>
    <?php include 'includes/nav-bar.php'; ?>

    <script src="../js/beta/components/loading-bar.js"></script>
    
</body>
</html>