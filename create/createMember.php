<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE myMember (";
    $sql .= "memberID int(10) unsigned auto_increment,";
    $sql .= "youEmail varchar(20) NOT NULL,";
    $sql .= "youPass varchar(20) NOT NULL,";
    $sql .= "youName varchar(10) UNIQUE,";
    $sql .= "youAddress varchar(50) NOT NULL,";
    $sql .= "youAddress2 varchar(50) NOT NULL,";
    $sql .= "youPhotoFile varchar(100) DEFAULT NULL,";
    $sql .= "youPhotoSize varchar(100) DEFAULT NULL,";
    $sql .= "regTime int(20) NOT NULL,";
    $sql .= "PRIMARY KEY (memberID)";
    $sql .= ") charset=utf8;";

    $result= $connect -> query($sql);

    if($result){
        echo "create table true";
    } else {
        echo "create table false";
    }
?>