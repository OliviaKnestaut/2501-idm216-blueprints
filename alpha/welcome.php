<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/alpha_styles.css">
    <title>Kim's Dragon</title>
</head>
<body>
    <?php
    // Start the session
    session_start();

    // Check if the user is logged in; otherwise, redirect to login
    if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
        header("location: index.php");
        exit;
    }
    ?>
    

    <h1>Welcome, <?php echo htmlspecialchars($_SESSION["firstname"]); ?>!</h1>
    

    <form action="includes/logout.php" method="post">
        <input type="submit" value="Logout" class="btn btn-danger">
    </form>

</body>
</html>