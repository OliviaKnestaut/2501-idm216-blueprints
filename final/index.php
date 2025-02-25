<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kim's Dragon | Login</title>
    <link rel="stylesheet" href="../css/final/main_styles.css">
    <link rel="stylesheet" href="../css/final/login_styles.css">
    <link rel="icon" href="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon"  type="image/png" href="../images/dragon-logo.png">
</head>

<body>

<?php
    // Keep track of which form is currently active
    $activeForm = isset($_GET['form']) ? $_GET['form'] : 'login'; // Default to 'login'
    ?>

    <?php
    // Initialize the session
    session_start();

    // Check if the user clicked "Continue as Guest"
    if (isset($_GET['continueAsGuest'])) {
        $_SESSION["loggedin"] = false;  // Set loggedin to false
        $_SESSION["guest"] = true;      // Set the guest flag to true
        header("location: welcome.php");  // Redirect to the welcome page
        exit;
    }

    // If the user is logged in, redirect to welcome.php
    if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        header("location: welcome.php");
        exit;
    }
    ?>
    
<!-- -------------------------- REGISTER TOGGLE -------------------------- --> 
    
    <img class="lantern-abs" src="../images/final/assets/lit-lantern.svg" alt="">
    <img class="lantern-abs" src="../images/final/assets/lit-lantern.svg" alt="">

    <h1>Kim's Dragon</h1>
    <h2>At Drexel University</h2>

    <div class="card">

        <div class="tabs">
            <button id="login" class="left <?= $activeForm === 'login' ? 'active' : '' ?>" onclick="toggleForm('login')">Sign In</button>
            <button id="signup" class="right <?= $activeForm === 'signup' ? 'active' : '' ?>" onclick="toggleForm('signup')">Sign Up</button>
        </div>

    <!-- -------------------------- CONTENT -------------------------- --> 
        <div id="login-form" class="form-container" style="<?= $activeForm === 'login' ? 'display:block;' : 'display:none;' ?>">
            <?php include 'includes/login.php'; ?>
        </div>

        <div id="signup-form" class="form-container" style="<?= $activeForm === 'signup' ? 'display:block;' : 'display:none;' ?>">
            <?php include 'includes/signup.php'; ?>
        </div>

    </div>
    <div class="below-card">
        <a class="link" href="index.php?continueAsGuest=true">Continue as Guest</a>

        <img class="lantern-abs" src="../images/final/assets/lit-lantern.svg" alt="">
        <img class="lantern-abs" src="../images/final/assets/lit-lantern.svg" alt="">
    </div>

    <script src="../js/final/final_script.js"></script>
    
</body>

</html>