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

<header>
    <div class="container">
        <div class="logo">
            <a href="#">
            <img src="sea-snail.png" alt="Logo">   
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </div>

    <div class="log-out">
        <form  action="includes/logout.inc.php" method="POST">
            <button type="submit" name="logout-submit" class="btn"> Logout </button>     
        </form> 
    </div>
   
</header>


<main>

<?php 
    if (isset($_SESSION['userId'])) {
        echo '<p class="main-para">You are logged in</p>';
    }

    else {
        echo '<p class="main-para">You are logged out</p>';
    }

?>

</main>
</body>
</html>