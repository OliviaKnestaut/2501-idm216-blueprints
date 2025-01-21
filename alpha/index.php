<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kim's Dragon</title>
    <link rel="stylesheet" href="../css/alpha_styles.css">
    <link rel="icon" href="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

<!-- -------------------------- REGISTER TOGGLE -------------------------- --> 
    
    <?php
    // Keep track of which form is currently active
    $activeForm = isset($_GET['form']) ? $_GET['form'] : 'login'; // Default to 'login'
    ?>

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

    <script src="../js/alpha_script.js"></script>
</body>

</html>