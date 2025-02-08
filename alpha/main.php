<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/components/menu-bar.css">
    <link rel="stylesheet" href="../css/components/nav-bar.css">
    <link rel="stylesheet" href="../css/alpha/main_styles.css">
    <link rel="stylesheet" href="../css/alpha/menu_styles.css">

    <title>Kim's Dragon | Menu</title>
</head>
<body>

    <?php require_once 'includes/db.php';

    $category = $_GET['category'] ?? 'Entree';

    $allowed_categories = ['Entree', 'Sides', 'Soups', 'Drinks'];
    if (!in_array($category, $allowed_categories)) {
        $category = 'Entree'; // Default fallback
        }

    $sql_query = "SELECT * FROM `idm-216_menu`";
    $result = mysqli_query($connection, $sql_query);
    
    $menu_items = []; // Array to store all items
    $filtered_items = []; // Array to store only the selected category's items
    
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $menu_items[] = $row;
    
            // Filter items by category
            if ($row['category'] === $category) {
                $filtered_items[] = $row;
            }
        }
    }


    ?>
    
    <?php include 'includes/header.php'; ?>

    <div class="menu-header">
        <h1>Menu</h1>
        <a class="btn sml-btn" href="main.php">Filters <img src="../images/alpha/assets/filter-icon.svg" alt=""></a>
    </div>

    <div class="menu-content">
        <?php include 'includes/menu-bar.php'; ?>

    <?php foreach ($filtered_items as $item) { ?>
        <div class="menu-item">

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
        </div>
    <?php } ?>

    </div>
    

    <?php include 'includes/nav-bar.php'; ?>
    
</body>
</html>