<body class="body">
    <div class="profile-container">
        <h1>Profile</h1>
        <img class="profile-img" src="../images/final/assets/profile-img.svg" alt="Profile Image">
        <p class="welcome-text">Welcome <i>Jane</i></p>
        <p class="points"><strong>198 points</strong></p>
        <form method="POST">
            <button type="submit" name="signout" class="btn">SIGN OUT</button>
        </form>

        <?php
        if (isset($_POST['signout'])) {
            session_start();
            session_unset();
            session_destroy();
            header("Location: index.php");
            exit;
        }
        ?>

        <div class="dragon-illustration">
            <img src="../images/final/assets/profile-dragon-img.svg" alt="Dragon Illustration">
        </div>
    </div>
        <div class="profile-menu">
            <a class="menu-item" href="#">
                Account Information 
                <img src="../images/final/assets/arrow-icon.svg" alt="Arrow">
            </a>
            <a class="menu-item" href="#">
                Payment Methods 
                <img src="../images/final/assets/arrow-icon.svg" alt="Arrow">
            </a>
            <a class="menu-item" href="#">
                Recent Orders 
                <img src="../images/final/assets/arrow-icon.svg" alt="Arrow">
            </a>
            <a class="menu-item" href="#">
                Favorite Orders 
                <img src="../images/final/assets/arrow-icon.svg" alt="Arrow">
            </a>
        </div>
</body>
