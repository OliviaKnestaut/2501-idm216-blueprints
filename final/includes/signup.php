<?php
// ---------------------------- SIGNUP ----------------------------
    
    require_once 'db.php';

    // Reset the errors if the reset button was clicked
    if (isset($_GET['reset'])) {
        $username_err = $password_err = $confirm_password_err = $name_err = '';
        $firstname = $lastname = $username = $password = $confirm_password = '';
    }

    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        header("location: welcome.php");
        exit;
    }

    $username = $password = $confirm_password = "";
    $username_err = $password_err = $confirm_password_err = "";
    $firstname = $lastname = $name_err = "";

    // Processing form data when form is submitted
    if($_SERVER["REQUEST_METHOD"] == "POST"){

        // Validate first name
        if (isset($_POST["firstname"]) && empty(trim($_POST["firstname"]))) {
            $name_err = "Please enter your first name";
        } elseif (isset($_POST["firstname"]) && !preg_match("/^[a-zA-Z-' ]*$/", trim($_POST["firstname"]))) {
            $name_err = "First name can only contain letters, spaces, and hyphens";
        } else {
            $firstname = isset($_POST["firstname"]) ? trim($_POST["firstname"]) : '';
        }

        // Validate last name
        if (isset($_POST["lastname"]) && empty(trim($_POST["lastname"]))) {
            $name_err = "Please enter your last name";
        } elseif (isset($_POST["lastname"]) && !preg_match("/^[a-zA-Z-' ]*$/", trim($_POST["lastname"]))) {
            $name_err = "Last name can only contain letters, spaces, and hyphens";
        } else {
            $lastname = isset($_POST["lastname"]) ? trim($_POST["lastname"]) : '';
        }

        // Check if both first and last name are empty
        if (empty(trim($firstname)) && empty(trim($lastname))) {
            $name_err = "Please enter your first and last name";
        }

        // Validate username
        if (empty(trim($_POST["username"]))) {
            $username_err = "Please enter your email.";
        } elseif (!filter_var(trim($_POST["username"]), FILTER_VALIDATE_EMAIL)) {
            $username_err = "Please enter a valid email address";
        } else {
            $sql = "SELECT id FROM `idm-216_users` WHERE username = ?";
            
            if($stmt = mysqli_prepare($connection, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                
                $param_username = trim($_POST["username"]);
                
                if(mysqli_stmt_execute($stmt)){

                    mysqli_stmt_store_result($stmt);
                    
                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $username_err = "This email is already registered";
                    } else{
                        $username = trim($_POST["username"]);
                    }
                } else{
                    echo "Oops! Something went wrong, Please try again later";
                }

                mysqli_stmt_close($stmt);
            }
        }
    
        // Validate password
        if(empty(trim($_POST["password"]))){
            $password_err = "Please enter a password";     
        } elseif(strlen(trim($_POST["password"])) < 6){
            $password_err = "Password must have at least 6 characters";
        } else{
            $password = trim($_POST["password"]);
        }
        
        // Validate confirm password
        if (isset($_POST["confirm_password"]) && empty(trim($_POST["confirm_password"]))) {
            $confirm_password_err = "Please confirm password";     
        } elseif (isset($_POST["confirm_password"])) {
            $confirm_password = trim($_POST["confirm_password"]);
            if (empty($password_err) && ($password != $confirm_password)) {
                $confirm_password_err = "Passwords do not match";
            }
        }
    
        // Check input errors before inserting in database
        if(empty($name_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err)){
            
            $sql = "INSERT INTO `idm-216_users` (firstname, lastname, username, password) VALUES ( ?, ?, ?, ?)";
            
            if($stmt = mysqli_prepare($connection, $sql)){
                mysqli_stmt_bind_param($stmt, "ssss", $param_firstname, $param_lastname, $param_username, $param_password);
                
                $param_firstname = $firstname;
                $param_lastname = $lastname;
                $param_username = $username;
                $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
                
                if(mysqli_stmt_execute($stmt)){
                    session_start();

                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["firstname"] = $firstname;

                            header("location: welcome.php");
                            exit;
                } else{
                    echo "Oops! Something went wrong, Please try again later";
                }
                mysqli_stmt_close($stmt);
            }
        }
    } 

    mysqli_close($connection);

?>

    <div class="form-wrapper">
        <form action="index.php?form=signup" method="post">
            <div class="form-group form-horiz">
                <input class="name" type="text" name="firstname" placeholder="First Name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $firstname; ?>">
                <input class="name" type="text" name="lastname" placeholder="Last Name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $lastname; ?>">
            </div>  
            <span class="invalid-feedback"><?php echo $name_err; ?></span>

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
                <input type="password" name="confirm_password" placeholder="Confirm Password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
            </div>
            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>

            <div class="form-group form-horiz">
                <input type="submit" class="btn" value="Submit">
                <input type="reset" class="btn" value="Reset" onclick="window.location='index.php?form=signup&reset=true';">
            </div>
        </form>
    </div>  