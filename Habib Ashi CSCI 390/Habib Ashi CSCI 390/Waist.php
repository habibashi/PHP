<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/home.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/all.css">
    <title>Waist To Hip Ratio</title>
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
        Waist To Hip Ratio
    </div> 
    
    <?php
    session_start();
    include "connection.php";
    if (!$_SESSION["id"]){
        header("location: login.php");
    }

    $waist = $hip = $ratio = $output = "";
    $man = $woman = ""; 
    if (isset($_GET["gender"]) && isset($_GET["waist"]) && isset($_GET["hip"])) {

        $gender = $_GET["gender"];
        $waist = $_GET["waist"];
        $hip = $_GET["hip"];

        $ratio = round($waist / $hip, 3); 

        if ($gender = "M" && $ratio < 0.76){
            $output = "excellent";
        } elseif ($gender = "M" AND $ratio > 0.74 AND $ratio < 0.82) {
            $output = "Good";
        } elseif ($gender = "M" AND $ratio > 0.86 AND $ratio < 0.89) {
            $output = "High";
        } elseif ($gender = "M" AND $ratio > 0.81 AND $ratio < 0.86) {
            $output = "Average";
        } elseif ($gender = "M" AND $ratio > 0.90) {
            $output = "very High";
        } elseif ($gender = "F" && $ratio < 0.76){
            $output = "excellent";
        } elseif ($gender = "F" AND $ratio > 0.74 AND $ratio < 0.82) {
            $output = "Good";
        } elseif ($gender = "F" AND $ratio > 0.86 AND $ratio < 0.89) {
            $output = "High";
        } elseif ($gender = "F" AND $ratio > 0.81 AND $ratio < 0.86) {
            $output = "Average";
        } elseif ($gender = "F" AND $ratio > 0.90) {
            $output = "very High";
        } 
    }

    ?>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method="get">
        <div class="body-callcu">
            <div>
                Select Gender
            </div>

            <div>
                <input type="radio" name="gender" id="M" required>
                <label style="margin-right: 80px;" for="M">Male</label>
                <input type="radio" name="gender" id="F" required>
                <label for="F">Female</label>
            </div>

            <div>
                Enter Waist Circumference
            </div>

            <div>
                <input class="input" type="number" placeholder="0 cm" name="waist" required>
            </div>

            <div>
                Enter Hip Circumference
            </div>

            <div>
                <input class="input" type="number" placeholder="0 cm" name="hip" required>
            </div>

            <input class="callculate" type="submit" name="calculate" value="calculate">

            <span class="span"><?php echo $ratio ?></span>
            <span class="span" style="font-size: small;"><?php echo $output ?></span>  
            <input class="clear" type="reset" name="clear" value="clear"> 
        </div>
    </form>
</body>
</html>