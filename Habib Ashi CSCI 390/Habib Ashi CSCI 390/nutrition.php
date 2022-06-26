<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/workout.css">
    <title>Document</title>
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
    <main style="padding: 10px;">
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
                NUTRITION
            </div>

            <div class="paragraph">
                <div>
                    <p class="paragraph-in">Discover meal plans, diet tips, supplements info and delicious recipes to</p>
                </div>
                <div>
                    <p class="paragraph-in">help improve your sports nutrition.</p>
                </div>
            </div>
        </div>

        <div class="image0-main">
            <div>
                <a target="_blank" href="image/nutrition0.jpg"><img class="top-image0" src="image/nutrition0.jpg" alt="nutrition0"></a>
            </div>

            <div class="image0-btween">
                <div class="wrap">
                    <div class="image0-p">
                        <p>HEALTHY EATING</p>
                    </div>
                    <div class="image0-h4">
                        <h4>'THE FIT COOK KEVIN CURRY SHARES HIS BOOTSTRAP...</h4>
                    </div>
                </div>

                <div class="image0-end">
                    This is a great meal prep idea for those Easter leftovers.
                </div>
            </div>
        </div>
        <div style="display: flex; align-items: center; flex-wrap: wrap; justify-content: space-between">
            <div style="display: flex;"><h4 style="font-size: large;">Featured Articles</h4></div>
            <div style="width: 87%; height: 1px; font-size: large; background-color: black; display: flex; align-items: center;"></div>
        </div>
        
        <div class="main2">
            <div>
                <div>
                    <a target="_blank" href="image/nutrition1.jpg"><img class="radius" src="image/nutrition1.jpg" alt="workout" width= "386px" height="220px"></a>                </div>

                <div class="under-image">
                    <div class="warp">
                        <div class="p-bellow">
                            <p>HEALTHY EATING</p>
                        </div>
                        <div class="head-4">
                            <h4 class="h4">HOW TO SPRING CLEAN YOUR LIFESTYLE AND REINVIGORATE YOUR HEALTH</h4>
                        </div>
                        
                    </div>
                    
                    <div>
                        <div class="p2-bellow">
                            Step up your spring cleaning this year by including your health as well as your home.
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div>
                    <a href="image/nutrition2.jpg"><img class="radius" src="image/nutrition2.jpg" alt="workout" width="386px" height="220px"></a>
                </div>

                <div class="under-image">
                    <div>
                        <div class="p-bellow">
                            <p>HEALTHY EATING</p>
                        </div>
                        <div class="head-4">
                            <h4 class="h4">DWAYNE JOHNSON EXPLAINS HOW HE TURNED 7 BUCKS INTO ZOA+</h4>
                        </div>
                    </div>
                    
                    <div>
                        <div class="p2-bellow">
                            The Rock smelled what was cooking at rock bottom, so he fought his way to the top with...
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div>
                    <a href="image/nutrition3.jpg"><img class="radius" src="image/nutrition3.jpg" alt="workout" width="386px" height="220px"></a>
                </div>

                <div class="under-image">
                    <div>
                        <div class="p-bellow">
                            <p>HEALTHY EATING</p>
                        </div>
                        <div class="head-4">
                            <h4 class="h4">TRY TOP CHEF KEVIN CURRY'S LOW-CARB, >HIGH-FLAVOR BLACK BEAN QUESADILLAS</h4>
                        </div>
                    </div>
                    
                    <div>
                        <div class="p2-bellow">
                            Fit men cook, and live longer (and of course, fitter), says the culinary author.
                        </div>
                    </div>
                </div>
            </div>
        </div>

            <?php 
            // $user_id = $_SESSION["id"];  
 
            $nutrition = "SELECT * FROM posts";

            $results = mysqli_query($conn, $nutrition);

            while ($row = mysqli_fetch_array($results)){
                if ($row['type'] == 'nutrition'){
                
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
        <!-- <a class="a-hover" href="#"><strong> LOAD MORE NUTRITION </strong></a> -->
    </main>
</body>
</html>
</html>