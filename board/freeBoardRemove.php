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
    $boardID = $_GET['boardID'];
    $boardID = $connect -> real_escape_string($boardID);

    //쿼리문
    $sql = "DELETE FROM freeBoard WHERE boardID = {$boardID}";
    $connect -> query($sql);

    // Header("Location: board.php"); 
    echo "<script>alert('삭제되었습니다.'); location.href = 'freeBoard.php';</script>";
?>


  

    
</body>
</html>