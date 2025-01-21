<?php

// ---------------------------- LOGIN ----------------------------

    require_once 'db.php';

    // Initialize the session
    session_start();

    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: welcome.php");
        exit;
    }

    // Define variables and initialize with empty values
    $username = $password = "";
    $username_err = $password_err = $login_err = "";

    // Processing form data when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate username (email)
        if (empty(trim($_POST["username"]))) {
            $username_err = "Please enter your email";
        } elseif (!filter_var(trim($_POST["username"]), FILTER_VALIDATE_EMAIL)) {
            $username_err = "Please enter a valid email address";
        } else {
            $username = trim($_POST["username"]);
        }

        // Check if password is empty
        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter your password";
        } else {
            $password = trim($_POST["password"]);
        }

        // Validate credentials if there are no errors
        if (empty($login_err)) {
            // Prepare a select statement
            $sql = "SELECT id, firstname, username, password FROM `idm-216_users` WHERE username = ?";

            if ($stmt = mysqli_prepare($connection, $sql)) {
                // Bind variables to the prepared statement
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                // Set parameters
                $param_username = $username;

                // Execute the prepared statement
                if (mysqli_stmt_execute($stmt)) {
                    // Store result
                    mysqli_stmt_store_result($stmt);

                    // Check if the username exists, then verify the password
                    if (mysqli_stmt_num_rows($stmt) == 1) {
                        // Bind result variables
                        mysqli_stmt_bind_result($stmt, $id, $firstname, $username, $hashed_password);

                        if (mysqli_stmt_fetch($stmt)) {
                            // Check if password is correct
                            if (password_verify($password, $hashed_password)) {
                                // Password is correct, start a session
                                session_start();

                                // Store session variables
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["firstname"] = $firstname;

                                // Redirect to welcome page
                                header("location: welcome.php");
                                exit;
                            } else {
                                $login_err = "Invalid username or password";
                            }
                        }
                    } else {
                        $login_err = "Invalid username or password";
                    }
                } else {
                    $login_err = "Oops! Something went wrong, Please try again later";
                }

                // Close statement
                mysqli_stmt_close($stmt);
            }
        }

    }

?>

    <div class="form-wrapper">
        <form action="index.php?form=login" method="post">
            <div class="form-group">
                <input type="text" name="username" placeholder="Email" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
            </div> 
            <span class="invalid-feedback"><?php echo $username_err; ?></span> 
        
            <div class="form-group password-group">
                <input type="password" name="password" placeholder="Password" class="form-control password <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <button type="button" class="hide-pass togglePassword">
                    <i class="fa fa-eye"></i>
                </button>
            </div>
            <span class="invalid-feedback"><?php echo $password_err; ?></span>

            <div class="form-group">
                <input type="submit" class="btn" value="Login">
            </div>
        </form>
    </div>