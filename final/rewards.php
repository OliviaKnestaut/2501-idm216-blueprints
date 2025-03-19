<!DOCTYPE html>
<html lang="en">

<?php session_start();

if (!isset($_SESSION["loggedin"]) && !isset($_SESSION["guest"])) {
    $_SESSION["guest"] = true;
    $_SESSION["loggedin"] = false;
}

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kim's Dragon | Rewards</title>
    <link rel="stylesheet" href="../css/final/main_styles.css">
    <link rel="stylesheet" href="../css/final/components/nav-bar.css">
    <link rel="stylesheet" href="../css/final/components/main_components.css">
    <link rel="stylesheet" href="../css/final/welcome_styles.css">
    <link rel="stylesheet" href="../css/final/menu_styles.css">
    <link rel="icon"  type="image/png" href="../images/dragon-logo.png">

    <?php 
    if ($_SESSION["loggedin"]){ ?>
        <link rel="stylesheet" href="../css/final/rewards-login.css">
    <?php } else if ($_SESSION["guest"]){ ?>
        <link rel="stylesheet" href="../css/final/rewards-loggedout.css">
    <?php } else { ?>
        <link rel="stylesheet" href="../css/final/rewards-loggedout.css">
    <?php } ?>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <?php 
    if ($_SESSION["loggedin"]){
        include 'includes/rewards-login.php';
    } else if ($_SESSION["guest"]){
        include 'includes/rewards-loggedout.php';
    } ?>

    <?php include 'includes/nav-bar.php'; ?>
    
    <script src="../js/final/final_script.js"></script>
</body>
</html>