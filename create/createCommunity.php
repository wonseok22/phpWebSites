<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE Community (";
    $sql .= "CommunityID int(10) unsigned auto_increment,";
    $sql .= "memberID int(10) unsigned NOT NULL,";
    $sql .= "communityTitle varchar(255) NOT NULL,";
    $sql .= "communityContents longtext NOT NULL,";
    $sql .= "communityCategory varchar(20) NOT NULL,";
    $sql .= "communityAuthor varchar(20) NOT NULL,";
    $sql .= "communityView varchar(10) NOT NULL,";
    $sql .= "communityLike varchar(10) NOT NULL,";
    $sql .= "communityImgFile varchar(100) DEFAULT NULL,";
    $sql .= "communityImgSize varchar(100) DEFAULT NULL,";
    $sql .= "communityDelete int(10) NOT NULL,";
    $sql .= "communityRegTime int(20) NOT NULL,";
    $sql .= "communityModTime int(20) DEFAULT NULL,";
    $sql .= "PRIMARY KEY (CommunityID)";
    $sql .= ") charset=utf8;";

    $result = $connect -> query($sql);

    if($result){
        echo "create table true";
    } else {
        echo "create table false";
    }
?>
