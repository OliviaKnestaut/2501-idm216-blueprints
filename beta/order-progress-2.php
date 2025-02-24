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
        <a class="left" href="main.php">
            <img class="header-icon home" src="../images/nav-bar/home.svg" alt="">
        </a>
        <img class="header-icon" src="../images/beta/assets/cart-icon.svg" alt="">
    </header>
    <div class="progress-header">
        <img class="dragon-logo-clouds" src="../images/beta/assets/dragon-logo-clouds.svg" alt="">
        <h1 class="progress-title">Thank You For Your Order!</h1>
        <div class="centered-text">
            <p>Your order will be ready at: 12:45pm</p>
        </div>
        <div class="centered-text">
            <h1 class="order-number">#420</h1>
        </div>
        <div class="centered-text">
            <p>show at truck</p>
        </div>
    </div>


    <div class="progress-wrapper">
        <div class="order-info">
            <h3 class="order-title">Order Ready for pickup ... <br>
                Head to Kims Dragon to recieve your food</h3>
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