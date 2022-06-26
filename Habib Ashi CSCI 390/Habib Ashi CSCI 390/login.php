<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/register.css">
    <link rel="stylesheet" href="CSS/header.css">
    <style>
        .button {
            background-color: greenyellow; padding: 12px; width: 70px; border-radius: 5px; border: none; cursor: pointer;
        }
        .color{
            color: red;
            font-size: small;
        }
    </style>
    <title>login</title>
</head>
<body>
    <header>
        <div class="header-left">
            <a href="profile.php"><ion-icon class="icon" name="fitness-outline"></ion-icon></a>
            <p style="font-size: 23px;"> Fitness Zone </p>
        </div>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <ul class="header-right">
            <li><a href="register.php">REGISTER</a></li>
        </ul>
    </header>

    <?php
        session_start();
        include "connection.php";


        $usernameErr = $passwordErr = $passwordWrong = "";
        $usernamedone = $passworddone = "";
        $username = $password = "";
        $usernameHolder = $passwordHolder = $usernameNOTFound = "";
        $error = false;
        $num = 0;

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (empty($_POST["username"])){
                $error = true;
                $usernameErr = "border: 2px solid red;";
            } else {
                $username = test_register($_POST["username"]);
                $sql_user = mysqli_query($conn,"SELECT username FROM users WHERE username='$username'");
                if (mysqli_num_rows($sql_user) == 0) {
                    $error = true;
                    $usernameErr = "border: 2px solid red;";
                    $usernameNOTFound = "Username not found";
                } else {
                    $usernamedone = "border: 2px solid green;";
                    $usernameHolder = $username;
                    $num++;
                }
            }

            if (empty($_POST["password"])){
                $error =true;
                $passwordErr = "border: 2px solid red;";
            } else {  
                $password = test_register($_POST["password"]);
                if (strlen($password) < 7){
                    $error = true;
                    $passwordWrong = "Must be grater than 6";
                    $passwordErr = "border: 2px solid red;";
                } else {
                    $passworddone = "border: 2px solid green;";
                    $passwordHolder = $password;
                    $num++;
                }
            } 
        }

        if ($num == 2){
            $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";

            $result = mysqli_query($conn, $query);

            $row = mysqli_fetch_array($result);

            if (is_array($row)){
                $_SESSION["id"] = $row['id'];
                $_SESSION["username"] = $row['username'];
            } else {
                $error = true;
                $usernameErr = "border: 2px solid red;";
                $passwordWrong = "username or password wrong";
                $passwordErr = "border: 2px solid red;";
            }
            if (isset($_SESSION["id"])){
                header("location:fitcal.php");
            }
        }
        

        function test_register($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> " method="post">
        <div class="register-cont">
            <div>
                <input class="username" autocomplete="off" class="form-control mx-auto w-auto" value="<?php echo $usernameHolder;?>" id="username" name="username" placeholder="Username" type="text" style="<?php echo($error ? $usernameErr : $usernamedone); ?>">
                <br>
                <span class="color"> <?php echo $usernameNOTFound;?></span>
            </div>
            <div>
                <input class="username" id="password" name="password" value="<?php echo $passwordHolder;?>" placeholder="Password" type="password" style="<?php echo ($error ? $passwordErr : $passworddone); ?> ">
                <br>
                <span class="color"><?php echo $passwordWrong; ?></span>
            </div>
            <input class="button" type="submit" name="Register" value="login" >
        </div>
    </form>
</body>
</html>