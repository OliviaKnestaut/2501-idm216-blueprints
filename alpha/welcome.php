<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/alpha/main_styles.css">
    <link rel="stylesheet" href="../css/alpha/login_styles.css">
    <title>Kim's Dragon</title>
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
    

    <h1>Welcome!</h1>
    

    <form action="includes/logout.php" method="post">
        <input type="submit" value="Logout" class="btn btn-danger">
    </form>

</body>
</html>