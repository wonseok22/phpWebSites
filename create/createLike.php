<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE Likeit (";
    $sql .= "LikeID int(10) unsigned auto_increment,";
    $sql .= "memberID int(10) NOT NULL,";
    $sql .= "b_number int(10) unsigned NOT NULL,";
    $sql .= "like_check int default 0,";
    $sql .= "PRIMARY KEY (LikeID)";
    $sql .= ") charset=utf8;";

    $result = $connect -> query($sql);

    if($result){
        echo "create table true";
    } else {
        echo "create table false";
    }
?>
