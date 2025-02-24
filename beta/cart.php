<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kim's Dragon | My Cart</title>
    <link rel="stylesheet" href="../css/beta/components/plus-minus-btn.css">
    <link rel="stylesheet" href="../css/beta/components/main_components.css">
    <link rel="stylesheet" href="../css/beta/main_styles.css">
    <link rel="stylesheet" href="../css/beta/menu_styles.css">
    <link rel="stylesheet" href="../css/beta/cart_styles.css">
    <link rel="stylesheet" href="../css/beta/components/nav-bar.css">
    <link rel="icon"  type="image/png" href="../images/dragon-logo.png">
</head>
<body>
<?php include 'includes/header.php'; ?>

    <div class="menu-header">
        <h1>Cart</h1>
    </div>
    <div class="cart-content">
        <div class="menu-item">
            <div class="menu-image" style="background-image: url('../images/menu-items/01_generaltsochicken.png') !important"></div>
            <div class="menu-details">
                <h2>General Tso's Chicken</h2>
                <h2 class="price">$9.00</h2>
                <div class="item-settings">
                    <a href="">Remove</a>
                    <div class="quantity">
                        <button class="minus" aria-label="Decrease">&minus;</button>
                        <input type="number" class="input-box" value="1" min="1" max="10">
                        <button class="plus" aria-label="Increase">&plus;</button>
                    </div>
                </div>
            </div>
        </div>
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
    
    <a href="checkout.php" class="btn fixed-btn">Pay Now</a>
    <div class="buffer"></div>
    <?php include 'includes/nav-bar.php'; ?>
    <script src="../js/beta/components/plus-minus-btn.js"></script>
    <script src="../js/beta/beta_script.js"></script>

</body>
</html>