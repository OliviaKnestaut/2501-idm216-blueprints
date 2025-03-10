<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rewards</title>
    <link rel="stylesheet" href="../css/final/main_styles.css">
    <link rel="stylesheet" href="../css/final/components/nav-bar.css">
    <link rel="stylesheet" href="../css/final/components/main_components.css">
    <link rel="stylesheet" href="../css/final/welcome_styles.css">
    <link rel="stylesheet" href="../css/final/menu_styles.css">
    <link rel="stylesheet" href="../css/final/rewards-login.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <h1>Rewards</h1>
        <div class="rewards-display">
            <h1 class="points-section">198 points</h1>
            <p class="white-text">You're close to 1000 points!<br>Don't forget to redeem them </p>
        </div>
        <button class="btn scan-btn"><a>Scan to Earn Points</a><img src="../images/final/assets/Scan_Icon.svg"></button>
    <h1>Rewards Menu</h1>
        <div class="rewards-menu">
            <div class="menu-item">
                <div class="menu-image" style="background-image: url('../images/menu-items/24_FriedDumplings.png')"></div>
                <div class="menu-details">
                    <h2>Fried Dumplings</h2>
                    <p>Six pork dumplings served in a tray...</p>
                    <h2>40 Points</h2>
                </div>
            </div>

            <div class="menu-item">
                <div class="menu-image" style="background-image: url('../images/menu-items/30_Wonton Soup.png')"></div>
                <div class="menu-details">
                    <h2>Wonton Soup</h2>
                    <p>Shredded pork with egg noodle...</p>
                    <h2>40 Points</h2>
                </div>
            </div>

            <div class="menu-item locked">
                <div class="menu-image" style="background-image: url('../images/menu-items/03_SesameChicken.png')"></div>
                <div class="menu-details">
                    <div class="locked-menu"><h2>Sesame Chicken</h2> <img src="../images/final/assets/locked_icon.svg"></div>
                    <p>Crispy chicken glazed with a sweet sesame...</p>
                    <h2>200 Points</h2>
                </div>
            </div>
            <button class="btn menu-btn"><a>VIEW MENU</a></button>
        </div>

        <?php include 'includes/nav-bar.php'; ?>
    
</body>
</html>