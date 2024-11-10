<?php 
    session_start();
?>

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
        <form  action="includes/login.inc.php"  method="POST">
            <h1> Login </h1>
            
            <div class="input-box">
                <input type="text"  name="uid" placeholder="Username"  required>
                <i class='bx bxs-user'></i>
            </div>


            <div class="input-box">
                <input type="password" name="pwd" placeholder="Password"  required>
                <i class='bx bxs-lock-alt' ></i>
            </div>


            <div class="remember-forgot">
                <label> <input type="checkbox"> Remember me</label>
                <a href="#"> Forgot Password? </a>
            </div>

            <button type="submit" name="login-submit" class="btn"> Login </button>


            <div class="regsister-link">
                <p>
                    Don't have an account ?
                    <a href="signup.php"> Regsister </a>
                </p>
            </div>
        </form>
    </div>
</body>
</html>