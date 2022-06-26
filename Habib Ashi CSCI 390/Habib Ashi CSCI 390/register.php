<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/register.css">
    <link rel="stylesheet" href="CSS/header.css">
    <title>Register</title>
    <style>
        .button {
            background-color: greenyellow; padding: 12px; border-radius: 5px; width: 70px; border: none; cursor: pointer;
        }
        .color{
            color: red;
            font-size: small;
        }
    </style>
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
            <li class="right-marg"><a href="login.php">LOGIN</a></li>
            <li><a href="register.php">REGISTER</a></li>
        </ul>
    </header>
    <?php
        include "connection.php";

        $usernameErr = $passwordErr = $passwordWorng = $confpasswordWrong = $confErr = $usernameTxt = "";
        $usernamedone = $passworddone = $confpassworddone = "";
        $username = $password = $confirmation = "";
        $usernameHolder = $passwordHolder = $confPassHolder = "";
        $error = false;
        $accepted = 0;

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if (empty($_POST["username"])){
                $error = true;
                $usernameErr = "border: 2px solid red;";
                $usernameTxt = "Enter a username";
            } else {
                $username = test_register($_POST["username"]);
                $row = mysqli_query($conn, "SELECT username FROM users WHERE username='$username'");
                if (mysqli_num_rows($row) > 0) {
                    $error = true;
                    $usernameErr = "border: 2px solid red;";
                    $usernameTxt = "Username already taken";
                } else {
                    $usernamedone = "border: 2px solid green;";
                    $usernameHolder = $username;
                    $accepted++;
                }
            }
            
            if (empty($_POST["password"])){
                $error = true;
                $passwordErr = "border: 2px solid red;";
            } else { 
                $password = test_register($_POST["password"]);
                if (strlen($password) < 7){
                    $error = true;
                    $passwordWorng = "Must be grater than 6"; 
                    $passwordErr = "border: 2px solid red;";
                } else {
                    $passworddone = "border: 2px solid green;";
                    $passwordHolder = $password;
                    $accepted++;
                }
            }
            if (empty($_POST["confirmation"])){
                $error = true;
                $confErr = "border: 2px solid red;";
            } else {
                $confirmation = test_register($_POST["confirmation"]);
                if ($confirmation != $password){
                    $error =true;   
                    $confpasswordWrong = "Must be the same";        
                    $confErr = "border: 2px solid red;";
                } else {
                    $confpassworddone = "border: 2px solid green;";
                    $confPassHolder = $confirmation;
                    $accepted++;
                }
            }
        }
        function test_register($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($accepted == 3) {
            $regist = "INSERT INTO users VALUES (default, '$username', '$password')";

            mysqli_query($conn, $regist) or die(mysqli_error($conn));
            header("Location:login.php");
        }
        
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> " method="post">
        <div class="register-cont">
            <div>
                <input class="username" autocomplete="off" class="form-control mx-auto w-auto" value="<?php echo $usernameHolder;?>" id="username" name="username" placeholder="Username" type="text" style="<?php echo ($error ? $usernameErr : $usernamedone); ?>">
                <br>
                <span class="color"><?php echo $usernameTxt; ?></span>
            </div>
            <div>
                <input class="username" id="password" name="password" value="<?php echo $passwordHolder;?>" placeholder="Password" type="password" style="<?php echo ($error ? $passwordErr : $passworddone); ?>">
                <br>
                <span class="color"><?php echo $passwordWorng; ?></span>
            </div>
            <div>
                <input class="username" id="confirmation" name="confirmation" value="<?php echo $confPassHolder;?>" placeholder="Confirm Password" type="password"  style="<?php echo ($error ? $confErr : $confpassworddone)?>">
                <br>
                <span class="color"><?php echo $confpasswordWrong; ?> </span>
            </div>
            <input class="button" type="submit" name="Register" value="Register" >
        </div>
    </form>
    
</body>
</html> 