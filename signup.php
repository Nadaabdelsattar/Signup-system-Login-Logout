<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"  href="loginsystem.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <div class="log-in">
        <form action="includes/signup.inc.php"  method="POST">
            <h1> Signup </h1>
            
            <div class="input-box">
                <input type="text" name="uid" placeholder="Username">
                <i class='bx bxs-user'></i>
            </div>


            <div class="input-box">
                <input type="text" name="email" placeholder="Email adress">
                <i class='bx bxs-user'></i>
            </div>


            <div class="input-box">
                <input type="password" name="pwd" placeholder="Password">
                <i class='bx bxs-lock-alt' ></i>
            </div>

            <div class="input-box">
                <input type="password" name="re-pwd" placeholder="Repeated Password">
                <i class='bx bxs-lock-alt' ></i>
            </div>


            <button type="submit" name="signup-submit" class="btn"> Signup </button>


            <div class="regsister-link">
                <p>
                    Already have an account ?
                    <a href="login.php"> Login </a>
                </p>
            </div>

            <?php 
    
    if (isset($_GET['error'])) {

        if ($_GET['error'] == "emptyfields") {
            echo '<p class="signuperror">Fill in all fields</p>';
        }

        else if ($_GET['error'] == "invalidemailandusername") {
            echo '<p class="signuperror">Invalid username and email</p>';
        }

        else if ($_GET['error'] == "invalidemail") {
            echo '<p class="signuperror">Invalid email</p>';
        }

        else if ($_GET['error'] == "invalidusername") {
            echo '<p class="signuperror">Invalid username</p>';
        }

        else if ($_GET['error'] == "passwordcheck") {
            echo '<p class="signuperror">Your password dose not match</p>';
        }

        else if ($_GET['error'] == "usertaken") {
            echo '<p class="signuperror">Username is already taken</p>';
        }
    }

    if (isset($_GET['signup']) && ($_GET['signup'] == "success")) {
        echo '<p class="signupsuccess">Signup Successfully</p>';
    }

?>
        </form>
    </div>


    
</body>
</html>