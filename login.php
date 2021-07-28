<?php
require_once("includes/config.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Account.php");
require_once("includes/classes/Constants.php");
$account = new Account($con);

    if(isset($_POST["submitButton"])) {
        $userName = FormSanitizer::sanatizeFormUsername($_POST["username"]);
        $password = FormSanitizer::sanatizeFormPassword($_POST["password"]);


        $success = $account->login($userName, $password);
        if($success) {
            echo "Log in success";
            // Store session
            $_SESSION["userLoggedIn"] = $userName;
            // Redirect To
            header("Location: index.php");
        }
    }
    function getInputValue($name){
        if(isset($_POST[$name])) {
            echo $_POST[$name];
        }
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Welcome To Brokeflix</title>
        <link rel="stylesheet" type="text/css" href="assets/style/style.css"/>
    </head>
    <body>
        <div class="signInContainer">
            
            <div class="column">
                <div class="header">
                    <img src="assets/Images/Brokeflix.png" title="Logo" alt="Site Logo">
                    <h3> Sign In </h3>
                    <span>to continue to Brokeflix</span>
                    

                </div>
                <form method="POST">
                    <?php echo $account->getError(Constants::$loginFailed);?>
                    <input type="text" name="username" placeholder="User Name" value="<?php getInputValue("username")?>" required>
                    <!-- <input type="email" name="email" placeholder="Email" required>
                    <input type="email" name="email2" placeholder="Confirm Email" required>  -->
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="submit" name="submitButton" value="SUBMIT">

                </form>
                <a href="register.php" class="signInMessage">Need an account?Sign up here!</a>
            </div>
        </div>
    </body>
</html>