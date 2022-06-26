<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/hr.css">
    <title>Heart Rate</title>
</head>
<body>
    <header>
        <div class="header-left">
            <a href="fitcal.php"><ion-icon class="icon" name="fitness-outline"></ion-icon></a>
            <p style="font-size: 23px;"> Fitness Zone </p>
        </div>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <ul class="header-center">
            <li><a href="workout.php">WORKOUT</a></li>
            <li><a href="nutrition.php">NUTRITION</a></li>
            <li><a href="fitcal.php">FITCAL</a></li>
            <li><a href="aboutus.html">ABOUT US</a></li>
        </ul>

        <ul class="header-right">
            <li>
            <form action="logout_action.php" method="post">
                <input class="logout" type="submit" value="LOGOUT">
            </form>
            </li>
        </ul>
    </header>
    <?php
    session_start();
    include "connection.php";
    if (!$_SESSION["id"]){
        header("location: login.php");
    }
    
        $Hr = "";

        if (isset($_GET['age'])){

            $age = $_GET["age"]; 
            
            if ($age){
                $Hr = 220 - $age;
            }
        }

    ?>
    <div class="blue">
        HR Max
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
        <div class="body-callcu">
            <div>
                Enter Age
            </div>
            <div>
                <input class="input" type="number" placeholder="0" name="age" required>
            </div>
            <input class="callculate" type="submit" name="calculate" value="calculate">
            <div class="tenth">
                <span class="span"><?php echo $Hr; ?></span>
                <p class="p">bmp</p>
            </div>
            <input class="clear" type="reset" name="clear" value="clear">
        </div>
    </form>
</body>
</html>