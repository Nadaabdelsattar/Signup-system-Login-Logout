<?php 

if (isset($_POST['signup-submit'])){

    require 'dbh.inc.php';

    $Username = $_POST['uid'];
    $email = $_POST['email'];
    $password = $_POST['pwd'];
    $repeatedPassword = $_POST['re-pwd'];


    if (empty($Username) || empty($email) || empty($password) || empty($repeatedPassword)) {

        header("Location: ../signup.php?error=emptyfields&uid=".$Username."&email=".$email);
        exit();
    }

    else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match('/^[a-zA-z0-9]*$/', $Username)) {

        header("Location: ../signup.php?error=invalidemailandusername");
        exit();
    }

    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        header("Location: ../signup.php?error=invalidemail&uid=".$Username);
        exit();

    }

    else if (!preg_match("/^[a-zA-Z0-9]*$/", $Username )) {

        header("Location: ../signup.php?error=invalidusername&email=".$email);
        exit();

    }

    else if ($password !== $repeatedPassword) {

        header("Location: ../signup.php?error=passwordcheck&uid=".$Username."&email=".$email);
        exit();
    }

    else {

        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)){

            header("Location: ../signup.php?error=sqlerror");
            exit();
        }

        else {
            mysqli_stmt_bind_param($stmt, "s", $Username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if ($resultCheck > 0){

                header("Location: ../signup.php?error=usertaken&email=".$email);
                exit();

            }

            else {

                $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (? ,?, ?)";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)){

                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }

                else {

                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $Username, $email, $hashedPassword);
                    mysqli_stmt_execute($stmt);

                    header("Location: ../signup.php?signup=success");
                    
                
                }

            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}

else {
    header("Location: ../signup.php");
    exit();
};