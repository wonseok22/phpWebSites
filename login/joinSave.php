<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        include "../connect/connect.php";
        $youEmail = $_POST['youEmail'];
        $youPass = $_POST['youPass'];
        $youPassC = $_POST['youPassC'];
        $youName = $_POST['youName'];
        $youAddress = $_POST['youAddress'];
        $youAddress2 = $_POST['youAddress2'];
        $regTime = time();
        //echo $youEmail, $youPass, $youPassC, $youName, $youBirth, $youPhone, $regTime;
        $sql = "INSERT INTO myMember(youEmail, youPass, youName, youAddress, youAddress2, regTime)
        VALUES('$youEmail', '$youPass', '$youName', '$youAddress', '$youAddress2', '$regTime')";
        $result = $connect -> query($sql);
        if($result){
            echo "INSERT INTO TRUE";
        } else {
            echo "INSERT INTO FALSE";
        }
        header("location: join03.php");
    ?>
</body>
</html>