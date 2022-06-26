<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/home.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/BMR.css">
    <title>BMR</title>
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
    <div class="bmr">
        BMR
    </div>
    
    <?php
    session_start();
    include "connection.php";
    if (!$_SESSION["id"]){
        header("location: login.php");
    }

    $bmr = $age = $weight = "";
    if(isset($_GET['gender']) && isset($_GET['weight']) && isset($_GET['age']) && isset($_GET['height']) && isset($_GET['activity'])){

        $gender = $_GET["gender"];
        $weight = $_GET["weight"];
        $age = $_GET["age"];
        $height = $_GET["height"];
        $activity = $_GET["activity"];
        
        if ($gender == "F" && $activity == "none"){
            $bmr = 655.1 + (9.563 * $weight) + (1.850 * $height) - (4.676 * $age);
        } elseif ($gender == "F" && $activity == "low"){
            $bmr = 655.1 + (9.563 * $weight) + (1.850 * $height) - (4.676 * $age) + (488);
        } elseif ($gender == "F" && $activity == "medium"){
            $bmr = 655.1 + (9.563 * $weight) + (1.850 * $height) - (4.676 * $age) + (720);
        } elseif ($gender == "F" && $activity == "high"){
            $bmr = 655.1 + (9.563 * $weight) + (1.850 * $height) - (4.676 * $age) + (945);
        } elseif ($gender == "M" && $activity == "none") {
            $bmr = 66.5 + (13.75 * $weight) + (5.003 * $height) - (6.755 * $age);
        } elseif ($gender == "M" && $activity == "low") {
            $bmr = 66.5 + (13.75 * $weight) + (5.003 * $height) - (6.755 * $age) + (680);
        }elseif ($gender == "M" && $activity == "medium") {
            $bmr = 66.5 + (13.75 * $weight) + (5.003 * $height) - (6.755 * $age) + (1000);
        }elseif ($gender == "M" && $activity == "high") {
            $bmr = 66.5 + (13.75 * $weight) + (5.003 * $height) - (6.755 * $age) + (1220);
        }
        
        
    }

    ?>

    <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="bmr-callcu">
            <div>
                Select Gender
            </div>
            <div>
                <input type="radio" name="gender" id="male" value="M" required>
                <label style="margin-right: 80px;" for="male">Male</label>  
                <input class="space-left" type="radio" name="gender" id="female" value="F">
                <label for="female">Female</label>
            </div>
            <div class="three">
                <div class="four">
                    <div class="five">
                        Enter Weight
                    </div>
                    <div>
                        <input class="input" type="number" placeholder="0 kg" name="weight" required>
                    </div>
                </div>
                <div>
                    <div class="five">
                        Enter Age
                    </div>
                    <div>
                        <input class="input" type="number" placeholder="0" name="age" required>
                    </div>
                </div>
            </div>
            <div>
                Enter Height
            </div>
            <div>
                <input class="input" type="number" placeholder="0 cm" name="height" required>
            </div>
            <div>
                Select Activity
            </div>
            <div class="siven">
                <input type="radio" name="activity" id="none" value="none" required>
                <label style="margin-right: 15px;" for="none">None</label>
                <input type="radio" name="activity" id="low" value="low">
                <label style="margin-right: 15px;" for="low">Low</label>
                <input type="radio" name="activity" id="meduim" value="medium">
                <label style="margin-right: 15px;" for="meduim">Meduim</label>
                <input type="radio" name="activity" id="high" value="high">
                <label for="high">High</label>
            </div>
            <div>
                Your Body Needs
            </div>
            <div class="tenth">
                <span class="span"><?php echo $bmr; ?></span>
                <p class="p">Calories Daily</p>
            </div>
            <input class="callculate" type="submit" name="calculate" value="calculate">
            <input class="clear" type="reset" name="clear" value="clear">

        </div>
    </form>

</body>
</html>