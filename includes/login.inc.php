<?php

if (isset($_POST["login-submit"])) {

    require 'dbh.inc.php';

    $Username = $_POST['uid'];
    $password = $_POST['pwd'];

    if (empty($Username) || empty($password)) {

        header("Location: ../login.php?error=emptyfields");
        exit();
    }

    else {

        $sql = "SELECT * FROM users WHERE uidUsers=?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {

            header("Location: ../login.php?error=sqlerror");
            exit();
        }

        else {

            mysqli_stmt_bind_param($stmt, "s", $Username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {

                $pwdCheck = password_verify($password, $row['pwdUsers']);

                if ($pwdCheck == false) {

                    header("Location: ../login.php?error=wrongPassword");
                    exit();

                }

                else if ($pwdCheck == true) {

                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUId'] = $row['uidUsers'];

                    header("Location: ../index.php");
                    exit();
                }

                else {
                    header("Location: ../login.php?error=wrongPassword");
                    exit();
                }

            }

            else {

                header("Location: ../login.php?error=noUser");
                exit();

            }

        }
    }

} 
else {

    header("Location: ../login.php");
    exit();

}