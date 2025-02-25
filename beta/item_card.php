<!DOCTYPE html>
<html lang="en">

<?php
require_once 'includes/db.php';

// Get item ID from URL, default to 1 if not provided
$item_id = $_GET['id'] ?? 0;

// Fetch item details from database
$sql = "SELECT * FROM `idm-216_menu` WHERE id = ?";
$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, "i", $item_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$item = mysqli_fetch_assoc($result);

if (!$item) {
    die("Item not found.");
}

// Determine image file dynamically
$image_folder = "../images/menu-items/";
$id_padded = str_pad($item['id'], 2, "0", STR_PAD_LEFT);
$files = glob($image_folder . $id_padded . "_*");
$image_file = $files[0];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kim's Dragon | <?php echo htmlspecialchars($item['name']); ?></title>
    <link rel="stylesheet" href="../css/beta/main_styles.css">
    <link rel="stylesheet" href="../css/beta/item_card_styles.css">
    <link rel="stylesheet" href="../css/beta/components/plus-minus-btn.css">
    <link rel="stylesheet" href="../css/beta/components/main_components.css">
    <link rel="stylesheet" href="../css/beta/components/nav-bar.css">
    <link rel="icon"  type="image/png" href="../images/dragon-logo.png">
</head>
<body>



<?php include 'includes/header.php'; ?>

        
    <div class="item-image" style="background-image: url('<?php echo htmlspecialchars($image_file); ?>') !important"></div>

    <div class="item-description">
        <h3><?php echo htmlspecialchars($item['name']); ?></h3>
        <img id="heart-icon" src="../images/beta/assets/heart-icon.svg" alt="heart icon">
        <p>Earn +20 rewards points upon purchase</p>
        <p><?php echo htmlspecialchars($item['description']); ?></p> 
    </div>
    <div class="additional-selectors">
        <h4>Customization</h4>
        <form action="#"> 
            <div class="form-group">
                <input type="checkbox" id="checkbox1">
                <label for="checkbox1">Add Chili Oil</label>
            </div>
            <div class="form-group">
                <input type="checkbox" id="checkbox2">
                <label for="checkbox2">Add Crispy Onions</label>
            </div>
        </form>
        <div class="extra-input">
            <input type="text" id="add-note" name="Name" placeholder="add a note...">
        </div>
    </div>

    <div class="checkout-selection">

        <div class="quantity">
            <button class="minus" aria-label="Decrease">&minus;</button>
            <input type="number" class="input-box" value="1" min="1" max="10">
            <button class="plus" aria-label="Increase">&plus;</button>
        </div>
        <h3 id="total-price" data-price="<?php echo $item['price']; ?>">
            $<?php echo number_format($item['price'], 2); ?>
        </h3>
    </div>
    <button id="addToCartButton" class="add-to-cart btn fixed-btn" 
        data-id="<?php echo $item['id']; ?>" 
        data-name="<?php echo htmlspecialchars($item['name']); ?>" 
        data-price="<?php echo $item['price']; ?>" 
        data-image="<?php echo htmlspecialchars($image_file); ?>"
        data-quantity="1">
        Add to Cart
    </button>
    <div class="buffer"></div>
    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close-btn"><img class="header-icon" src="../images/beta/assets/x-icon.svg" alt=""></span>
            <img src="../images/beta/assets/dragon-logo.png" alt="dragon logo">
            <p>Your <?php echo htmlspecialchars($item['name']); ?> has been added to cart!</p>
            <a href="cart.php" class="btn">Go to Cart</a>
        </div>
    </div>
    <?php include 'includes/nav-bar.php'; ?>
    <script src="../js/beta/components/plus-minus-btn.js"></script>
    <script src="../js/beta/components/item-card-popup.js"></script>
    <script src="../js/beta/components/heart-icon.js"></script>
    <script src="../js/beta/beta_script.js"></script>

</body>
</html>