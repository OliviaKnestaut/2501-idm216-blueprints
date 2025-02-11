<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/alpha/components/menu-bar.css">
    <link rel="stylesheet" href="../css/alpha/components/nav-bar.css">
    <link rel="stylesheet" href="../css/alpha/main_styles.css">
    <link rel="stylesheet" href="../css/alpha/menu_styles.css">

    <title>Kim's Dragon | Menu</title>
</head>
<body>

    <?php require_once 'includes/db.php';

    $category = $_GET['category'] ?? 'Entree';
    $diet = $_GET['diet'] ?? '';

    $allowed_categories = ['Entree', 'Sides', 'Soups', 'Drinks'];
    if (!in_array($category, $allowed_categories)) {
        $category = 'Entree'; // Default fallback
        }

    $sql_query = "SELECT * FROM `idm-216_menu` WHERE category = ?";

    // If a diet filter is applied, modify query to check within the comma-separated diet column
    if (!empty($diet)) {
        $sql_query .= " AND diet LIKE ?";
    }
    
    $stmt = mysqli_prepare($connection, $sql_query);
    if (!empty($diet)) {
        $diet_param = "%{$diet}%"; // Allow partial match within the comma-separated values
        mysqli_stmt_bind_param($stmt, "ss", $category, $diet_param);
    } else {
        mysqli_stmt_bind_param($stmt, "s", $category);
    }
    
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    $filtered_items = [];
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $filtered_items[] = $row;
        }
    }

    ?>
    
    <?php include 'includes/header.php'; ?>

    <div class="menu-header">
        <h1>Menu</h1>
        <div class="btn sml-btn filter-btn" onclick="openFilterPopup()" id="filter-btn">Filters 
            <img src="../images/alpha/assets/filter-icon.svg" alt="">
        </div>
        <div id="filter-popup" class="filter-popup">
            <div class="filter-popup-content">
                <div class="filter-options">
                    <h3 onclick="applyFilter('')">All</h3>
                    <h3 onclick="applyFilter('Gluten Free')">Gluten Free</h3>
                    <h3 onclick="applyFilter('Vegetarian')">Vegetarian</h3>
                    <h3 onclick="applyFilter('Vegan')">Vegan</h3>
                    <h3 onclick="applyFilter('Pescatarian')">Pescatarian</h3>
                </div>
            </div>
        </div>

        
    </div>

    

    <div class="menu-content">
        <?php include 'includes/menu-bar.php'; ?>

    <?php foreach ($filtered_items as $item) { ?>
        <a class="menu-item" href="item_card.html">

            <?php
                $image_folder = "../images/menu-items/";
                $id = str_pad($item['id'], 2, "0", STR_PAD_LEFT);

                // Scan the directory for a matching image file
                $image_file = "";
                $files = glob($image_folder . $id . "_*");

                if (!empty($files)) {
                    $image_file = $files[0]; // Use the first matching file
                }
            ?>

            <div class="menu-image" style="background-image: url('<?php echo htmlspecialchars($image_file); ?>') !important"></div>

            <div class="menu-details">
                <h2><?php echo htmlspecialchars($item['name']) ?></h2>
                <p><?php echo htmlspecialchars($item['description']) ?></p>
                <h2>$<?php echo htmlspecialchars($item['price']) ?></h2>
            </div>
        </a>
    <?php } ?>


    </div>
    

 

    <?php include 'includes/nav-bar.php'; ?>
    <script src="../js/alpha_script.js"></script>
    
</body>
</html>