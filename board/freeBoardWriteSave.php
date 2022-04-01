<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>
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
        $memberID = $_SESSION['memberID'];
        $boardTitle = $_POST['boardTitle'];
        $boardContents = $_POST['boardContents'];
        $youName = $_SESSION['youName'];
        $boardView = 1;
        $regTime = time();

        $boardTitle = $connect -> real_escape_string($boardTitle);          //특수문자방지
        $boardContents = $connect -> real_escape_string($boardContents);    //특수문자방지

        // echo $memberID, $boardTitle, $boardContents, $boardView , $regTime;

        $sql = "INSERT INTO freeBoard(memberID, boardTitle, boardContents, youName,boardView, regTime) VALUES('$memberID', '$boardTitle', '$boardContents','$youName', '$boardView', '$regTime')";
        $connect -> query($sql);   

        Header("Location: ../board/freeBoard.php"); 
    ?>
</body>
</html>