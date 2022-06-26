<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/all.css">
    <title>BMI</title>
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
    <div class="blue">
        BMI
    </div>

    <?php
    session_start();
    include "connection.php";
    if (!$_SESSION["id"]){
        header("location: login.php");
    }

    $weight = $height = $bmi = $output = $num = $BMI =  "";
    if (isset($_GET['weight']) && isset($_GET['height'])){

        $weight = $_GET["weight"];
        $height = $_GET["height"];

        $bmi = $weight / (($height * $height) / 10000);
        $BMI = round($bmi, 2);
        if ($BMI <= 18.50) {
            $output = "UNDERWEIGHT";
            
        } else if ($BMI > 18.5 AND $BMI<=24.9 ) {
            $output = "NORMAL WEIGHT";
            
        } else if ($BMI > 24.90 AND $BMI<=29.99) {
            $output = "OVERWEIGHT";
                
        } else if ($BMI > 30.0) {
            $output = "OBESE";
        }
    }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get">
        <div class="body-callcu">
            <div>
                Enter Weight
            </div>
            <div>
                <input class="input" type="number" placeholder="0 kg" name="weight" id="weight" required>
            </div>
            <div>
                Enter height
            </div>
            <div>
                <input class="input" type="number" placeholder="0 cm" name="height" id="height" required>
            </div>
            <div style="margin-top: 5px; margin-bottom: 5px;">
                <input class="callculate" type="submit" name="calculate" value="calculate">
            </div>
            <span class="span"><?php echo $BMI ?></span>
            <span class="span" style="font-size: small;"><?php echo $output ?></span>  
            <input class="clear" type="reset" name="clear" value="clear">     
        </div>
    </form>

</body>
</html>