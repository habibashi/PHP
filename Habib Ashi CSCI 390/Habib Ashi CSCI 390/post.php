<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/post.css">
    <title>posts</title>
</head>
<body>
    <?php
    session_start();
    include "connection.php";

    if (!$_SESSION["id"]){
        header("location: login.php");
    }
    $type = $image = $title = $subject = $about = "";
    $typeokay = $imageokay = $titleokay = $subjectokay = $aboutokay ="";
    $typeerr = $imageerr = $titleerr = $subjecterr = $abouterr = "";
    $imagetext = $subjectValue = "";
    $error = false;
    $accepted = 0;
    

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
      $target_dir = "image/";
      $target_file = $target_dir . basename($_FILES["file"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      if (empty($_POST["type"])){
        $error = true;
        $typeerr = "border: 2px solid red;";
      } else {
        $type = test_input($_POST["type"]);
        $typeokay = "border: 2px solid green";
        $accepted++;
      }
      

      // Check if file already exists
      if (file_exists($target_file)) {
        $error = true;
        $imageerr = "border: 2px solid red;";
        $imagetext = "Sorry, file already exists.";
        $uploadOk = 0;
      }

      // Check file size
      if ($_FILES["file"]["size"] > 500000) {
        $imagetext = "Sorry, your file is too large.";
        $uploadOk = 0;
        $error = true;
        $imageerr = "border: 2px solid red;";
      }

      // Allow certain file formats
      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      && $imageFileType != "gif" ) {
        $imagetext = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        $error = true;
        $imageerr = "border: 2px solid red;";
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        $imagetext = "Sorry, your file was not uploaded.";
        $error = true;
        $imageerr = "border: 2px solid red;";
      // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
          $imageokay = "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
          $accepted++;
        } else {
          $imagetext = "Sorry, there was an error uploading your file.";
          $error = true;
          $imageerr = "border: 2px solid red;";
        }
      }      


      if (empty($_POST["title"])){
        $error = true;
        $titleerr = "border: 2px solid red";
      } else {
        $title = test_input($_POST["title"]);
        $titleokay = "border: 2px solid green";
        $accepted++;
      }

      if (empty($_POST["subject"])){
        $error = true;
        $subjecterr = "border: 2px solid red";
      } else {
        $subject = test_input($_POST["subject"]);
        $subjectokay = "border: 2px solid green";
        $accepted++;
        $subjectValue = $subject;
      }

      if (empty($_POST["about"])){
        $error = true;
        $abouterr = "border: 2px solid red";
      } else {
        $about = test_input($_POST["about"]);
        $aboutokay = "border: 2px solid green ";
        $accepted++;
      }
    }
      function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    
      $user_id = $_SESSION["id"];
      if ($accepted == 5 && $uploadOk == 1){
        $posts = "INSERT INTO posts VALUES (DEFAULT, '$user_id', '$title', '$subject', '$about', '$target_file', '$type')";
        if (mysqli_query($conn, $posts)) {
          echo "<script>alert('Posted')</script>";
        } else {
          die("Error updating record: " . mysqli_error($conn));
        }
        // mysqli_query($conn, $posts) or die(mysqli_error($conn));
        // header("Location:fitcal.php");
      }
    
    ?>

    <div class="bmr">
        <a href="fitcal.php"><ion-icon class="icon" name="arrow-back-outline"></ion-icon></a>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-25">
              <label for="type">TYPE</label>
            </div>
            <div class="col-75">
              <select id="type" name="type" style="<?php echo ($error ? $typeerr : $typeokay)?>">
                <option value="workout">WORKOUT</option>
                <option value="nutrition">NUTRITION</option>
              </select>
            </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="image">IMAGE</label>
          </div>
          <div class="col-75">
            <input type="file" id="image" name="file" style="<?php echo ($error ? $imageerr : $imageokay) ?>">
            <span><?php echo $imagetext ?> </span>
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="title">TITLE</label>
          </div>
          <div class="col-75">
            <input type="text" id="title" name="title" placeholder="TITLE.." style= "<?php echo ($error ? $titleerr : $titleokay) ?>">
          </div>
        </div>
        <div class="row">
          <div class="col-25">
            <label for="subject"> SUBJECT</label>
          </div>
          <div class="col-75">
            <textarea id="subject" name="subject" value="<?php echo $subjectValue; ?>"  placeholder="Write something.." style="height:120px; <?php echo ($error ? $subjecterr : $subjectokay) ?>"></textarea>
          </div>
        </div>
        <div class="row">
            <div class="col-25">
              <label for="subject">ABOUT</label>
            </div>
            <div class="col-75">
              <textarea id="about" name="about" placeholder="Write something.." style="height:120px; <?php echo ($error ? $abouterr : $aboutokay) ?>" ></textarea>
            </div>
        </div>
        <br>
        <div class="row">
          <input type="submit" value="Submit">
        </div>
        </form>
      </div>
</body>
</html>