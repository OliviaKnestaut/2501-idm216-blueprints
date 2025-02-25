<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/final/main_styles.css">
    <link rel="stylesheet" href="../css/final/components/nav-bar.css">
    <link rel="stylesheet" href="../css/final/welcome_styles.css">
    <link rel="stylesheet" href="../css/final/menu_styles.css">

    <title>Kim's Dragon | Welcome</title>
    <link rel="icon"  type="image/png" href="../images/dragon-logo.png">

</head>
<body>

    <?php
    // Initialize the session
    session_start();

    // Check if the user is logged in or a guest
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        $userStatus = "Welcome, logged-in user!";
    } elseif (isset($_SESSION["guest"]) && $_SESSION["guest"] === true) {
        $userStatus = "Welcome, guest!";
    } 
    ?>
    <img class="lantern-abs" src="../images/final/assets/lit-lantern.svg" alt="">
    <img class="lantern-abs" src="../images/final/assets/lit-lantern.svg" alt="">

    <?php include 'includes/header.php'; ?>

    <?php require_once 'includes/db.php'; 

    $sql_query = "SELECT * FROM `idm-216_menu`";
    $result = mysqli_query($connection, $sql_query);
    
    $menu_items = []; // Array to store all items
    $filtered_items = []; // Array to store only the selected category's items
    
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $menu_items[] = $row;
    
            // Filter items by community favorite
            if ($row['community'] === "Y") {
                $filtered_items[] = $row;
            }
        }
    }

    ?>

    <div class="welcome-header">
        <img class="welcome-dragon" src="../images/final/assets/dragon-logo.png" alt="">
        <h1>Welcome!</h1>
        <p>Authentic Flavors, On the Go!</p>
        <a class="btn" href="main.php">View Menu</a>
    </div>

    <div class="welcome-content">
        <a class="category-text">
            <h3>Community Favorites</h3>
            <span class="arrow">></span>
        </a>
        
        <div class="favorites">

        <?php foreach ($filtered_items as $item) { ?>
            <a class="fav-item" href="item_card.php?id=<?php echo $item['id']; ?>">
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

                <div class="fav-image" style="background-image: url('<?php echo htmlspecialchars($image_file); ?>') !important"></div>
                <h2><?php echo htmlspecialchars($item['name']) ?></h2>
            </a>

        <?php } ?>

        </div>
        <a class="category-text">
            <h3>Get with Points</h3>
            <span class="arrow">></span>
        </a>
        <div class="points">
            <div class="menu-item">
                <span class="point-num"><h2>40</h2></span>
                <div class="menu-image" style="background-image: url('../images/menu-items/24_FriedDumplings.png') !important"></div>
                <div class="menu-details">
                    <h2>Fried Dumplings</h2>
                    <p>Six pork dumplings served in a tray</p>
                    <h2>$3.50</h2>
                </div>
            </div>

            <div class="menu-item">
                <span class="point-num"><h2>200</h2></span>
                <div class="menu-image" style="background-image: url('../images/menu-items/03_SesameChicken.png') !important"></div>
                <div class="menu-details">
                    <h2>Sesame Chicken</h2>
                    <p>Crispy chicken glazed with a sweet sesame sauce and topped with seeds</p>
                    <h2>$9.00</h2>
                </div>
            </div>

            <div class="menu-item">
                <span class="point-num"><h2>40</h2></span>
                <div class="menu-image" style="background-image: url('../images/menu-items/30_Wonton Soup.png') !important"></div>
                <div class="menu-details">
                    <h2>Wonton Soup</h2>
                    <p>Shredded pork with egg noodle</p>
                    <h2>$3.50</h2>
                </div>
            </div>
            
        </div>

        <a class="category-text">
            <h3>Specials</h3>
            <span class="arrow">></span>
        </a>

        <div class="specials">
            <div class="menu-item">
                <span class="point-num"><h2>-25%</h2></span>
                <div class="menu-image" style="background-image: url('../images/menu-items/36_House Special Soup.png') !important"></div>
                <div class="menu-details">
                    <h2>House Special Soup</h2>
                    <p>Chicken, beef, and shrimp with vegetables in a rich broth</p>
                    <h2><span>$9.00</span> | $6.75</h2>
                </div>
            </div>

            <div class="menu-item">
                <span class="point-num"><h2>-10%</h2></span>
                <div class="menu-image" style="background-image: url('../images/menu-items/24_FriedDumplings.png') !important"></div>
                <div class="menu-details">
                    <h2>Fried Dumplings</h2>
                    <p>Six pork dumplings served in a tray</p>
                    <h2><span>$3.50</span> | $3.15</h2>
                </div>
            </div>

            <div class="menu-item">
                <span class="point-num"><h2>-15%</h2></span>
                <div class="menu-image" style="background-image: url('../images/menu-items/40_Thai Coffee.png') !important"></div>
                <div class="menu-details">
                    <h2>Thai Coffee</h2>
                    <p>Freshly brewed coffee served hot or cold</p>
                    <h2><span>$4.00</span> | $3.40</h2>
                </div>
            </div>
            
        </div>
    </div>
    <a class="recent-order" href="order-progress-2.php">
        <img class="recent-lantern" src="../images/nav-bar/recent-order-lantern.svg" alt="">
        <div>
            <h2 class="order-number2">Recent Order: #333</h2>
            <p class="pickup-time2">Ready at 12:45pm</p>
        </div>
        <span class="recent-arrow">></span>
    </a>

    <div class="recent-buffer"></div>

    <?php include 'includes/nav-bar.php'; ?>
    <script src="../js/final/order-placed.js"></script>


</body>
</html>