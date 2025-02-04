<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/alpha/main_styles.css">
    <link rel="stylesheet" href="../css/alpha/welcome_styles.css">
    <link rel="stylesheet" href="../css/components/nav-bar.css">
    <title>Kim's Dragon | Welcome</title>
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
    <img class="lantern-abs" src="../images/alpha/assets/lit-lantern.svg" alt="">
    <img class="lantern-abs" src="../images/alpha/assets/lit-lantern.svg" alt="">

    <?php include 'includes/header.php'; ?>

    <div class="welcome-header">
        <img class="welcome-dragon" src="../images/alpha/assets/dragon-logo.png" alt="">
        <h1>Welcome!</h1>
        <p>Authentic Flavors, On the Go!</p>
        <a class="btn" href="main.php">View Menu</a>
    </div>

    <div class="welcome-content">

    </div>

    <?php include 'includes/nav-bar.php'; ?>

    



    
    
<!-- 
    <form action="includes/logout.php" method="post">
        <input type="submit" value="Logout" class="btn btn-danger">
    </form>
-->

    

</body>
</html>