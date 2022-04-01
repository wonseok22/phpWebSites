<?php
    $host = "localhost";
    $user = "linecom1234";
    $pass = "as12AS!!";
    $db = "linecom1234";
    $connect = new mysqli($host, $user, $pass, $db);
    $connect -> set_charset("utf8");

    if(mysqli_connect_errno()){
        echo "DATABASE Connect False";
    } else {
        // echo "DATABASE Connect True";
    }
?>