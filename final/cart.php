<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kim's Dragon | My Cart</title>
    <link rel="stylesheet" href="../css/final/components/plus-minus-btn.css">
    <link rel="stylesheet" href="../css/final/components/main_components.css">
    <link rel="stylesheet" href="../css/final/main_styles.css">
    <link rel="stylesheet" href="../css/final/menu_styles.css">
    <link rel="stylesheet" href="../css/final/cart_styles.css">
    <link rel="stylesheet" href="../css/final/components/nav-bar.css">
    <link rel="icon"  type="image/png" href="../images/dragon-logo.png">
</head>
<body>
<?php include 'includes/header.php'; ?>

    <div class="menu-header">
    <h1>Cart</h1>
    </div>
    <div class="cart-content">
        
    </div>

    <a class="btn2 sml-btn" href="main.php">Add More Items</a>

    <div class="also-bought">
        <h2>People Also Bought...</h2>
        <div>
            <a href="item_card.php?id=41">
                <span style="background-image: url('../images/menu-items/41_Thai Iced Tea.png') !important"></span>
                <p>Thai Iced Tea</p>
            </a>
            <a href="item_card.php?id=29">
                <span style="background-image: url('../images/menu-items/29_Chicken Noodle Soup.png') !important"></span>
                <p>Chicken Noodle Soup</p>
            </a>
            <a href="item_card.php?id=03">
                <span style="background-image: url('../images/menu-items/03_SesameChicken.png') !important"></span>
                <p>Sesame Chicken</p>
            </a>
        </div>
    </div>

    <p id="cart-error">Your cart is empty. Please add items to your cart before proceeding to checkout.</p>

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

    <button id="pay-now-btn" class="btn fixed-btn">Pay Now</button>
    <div class="buffer"></div>
    <?php include 'includes/nav-bar.php'; ?>
    <script src="../js/final/components/plus-minus-btn.js"></script>
    <script src="../js/final/final_script.js"></script>
    <script src="../js/final/cart_script.js"></script>
    <script src="../js/final/cart_indicator.js"></script>

</body>
</html>