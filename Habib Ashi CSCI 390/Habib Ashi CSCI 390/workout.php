<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/workout.css">
    <title>Work Out</title>
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

    <main>
    <?php
        session_start();
        include "connection.php";
        if (!$_SESSION["id"]){
            header("location: login.php");
        }

        if ($_SESSION["id"] == 1) {
            echo '
                <div class="post">
                    <a href="post.php"><ion-icon name="add-circle-outline"></ion-icon></a>
                </div>
            ';
        }

        
        ?>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <div class="main1">
            <div class="head-1">
                WORKOUTS
            </div>

            <div class="paragraph">
                <div>
                    <p class="paragraph-in">Whether you're into bodybuilding, power lifting, strength training or just</p>
                </div>
                <div>
                    <p class="paragraph-in">getting started, these workouts and tips will help you reach your goals.</p>
                </div>
            </div>
        </div>
        
        <div class="main2">
            <div>
                <div>
                    <a target="_blank" href="image/workout1.jpg"><img class="radius" src="image/workout1.jpg" alt="workout" width= "386px" height="220px"></a>
                </div>

                <div class="under-image">
                    <div>
                        <div class="p-bellow">
                            <p>FULL-BODY EXERCISES</p>
                        </div>
                        <div class="head-4">
                            <h4 class="h4">THESE 5 PARTIAL ROM EXERCISES WILL GET YOU BACK TO FULL STRENGTH</h4>
                        </div>
                    </div>
                    
                    <div>
                        <div class="p2-bellow">
                            These top trainers offer up some unique moves to help build muscle and power.
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div>
                    <a target="_blank" href="image/workout2.jpg"><img class="radius" src="image/workout2.jpg" alt="workout" width="386px" height="220px"></a>
                </div>

                <div class="under-image">
                    <div>
                        <div class="p-bellow">
                            <p>WORKOUT TIPS</p>
                        </div>
                        <div class="head-4">
                            <h4 class="h4">GET GAMER-READY WITH THIS PERFORMANCE WORKOUT FROM OBI...</h4>
                        </div>
                    </div>
                    
                    <div>
                        <div class="p2-bellow">
                            Get ready for GIFT: Gaming Intensity Fitness Training.
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div>
                    <a target="_blank" href="image/workout3.jpg"><img class="radius" src="image/workout3.jpg" alt="workout" width="386px" height="220px"></a>
                </div>

                <div class="under-image">
                    <div>
                        <div class="p-bellow">
                            <p>ABS AND CORE EXERCISES </p>
                        </div>
                        <div class="head-4">
                            <h4 class="h4">HERE ARE THE CORE REASONS WHY YOU SHOULD NEVER FORGET YOUR OBLIQUES</h4>
                        </div>
                    </div>
                    
                    <div>
                        <div class="p2-bellow">
                            Show love to your love handles with these ways to strengthen those muscles.
                        </div>
                    </div>
                </div>
            </div>
        </div>

    

        <div class="mediaa">
            <?php 
 
            $workout = "SELECT * FROM posts";

            $results = mysqli_query($conn, $workout);

            while ($row = mysqli_fetch_array($results)){
                if ($row['type'] == 'workout'){
                
            ?>
            <div>    
                <hr class="hr">
                <div class="row">
                    <div>
                        <a href="<?php echo $row['image'] ?>"><img class="radius" src="<?php echo $row['image'] ?>" alt="workout" width="380px" height="220px"></a>
                    </div>
                    <div class="under2-image">
                        <div>
                            <div class="p-bellow">
                                <p><?php echo $row['title'] ?></p>
                            </div>
                            <div class="head-4">
                                <h4 class="h4"><?php echo $row['subject'] ?></h4>
                            </div>
                        </div>     
                        <div>
                            <div class="p2-bellow">
                               <?php echo $row['about'] ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } } ?>     
        </div>
    </main>
</body>
</html>