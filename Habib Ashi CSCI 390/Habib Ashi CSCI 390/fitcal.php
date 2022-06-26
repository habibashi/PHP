<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/home.css">
    <link rel="stylesheet" href="CSS/header.css">
    <style>
        .callcu{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            border: 1px solid lightgray;
            padding-top: 15px;
            padding-bottom: 15px;
            background-color: blue;
            color: white;
            margin-bottom: 25px;
        }
    </style>
    <title>FitCal</title>
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
    ?>
    <div class="callcu">
        calculator
    </div>


    <div class="calculator">
        <div>
            <a class="calculator-a" href="BMR.php">Basal Metabolic Rate (BMR)</a>
        </div>
        <div>
            <a  class="calculator-a" href="BMI.php">Body Mass Index (BMI)</a>
        </div>
        <div>
            <a class="calculator-a" href="HR.php">Maximum Heart Rate (HR Max)</a>
        </div>
        <div>
            <a class="calculator-a" href="Waist.php">Waist To Hip Ratio</a>
        </div>
        

    </div>

</body>
</html>