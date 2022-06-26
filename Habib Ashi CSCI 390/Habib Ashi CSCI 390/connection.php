<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "csci390";

    try {
        $conn = mysqli_connect($servername, $username, $password, $db);
    } catch (Exception $e) {
        die ("connection failed ".$e->getMessage());
    }
?>