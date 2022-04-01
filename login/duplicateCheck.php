<?php
    include "../connect/connect.php";

    $nickName = $_POST['nickName'];
    if (! $nickName){
        echo "닉네임을 입력해주세요!";
        exit;
    }
    echo "{$nickName}은(는) ";
    $sql = "SELECT * FROM myMember WHERE youName = '$nickName'";
    $result = $connect -> query($sql);
    $result = $result -> fetch_array(MYSQLI_ASSOC);
    if($result){
        echo "이미 존재하는 닉네임입니다.";
    } else {
        echo "사용 가능한 닉네임입니다.";
    }
?>