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
    $communityID = $_GET["communityID"];
    $communityID = $connect -> real_escape_string($communityID);

    echo $communityID;

    //쿼리문
    $sql = "DELETE FROM Community WHERE communityID = {$communityID}";
    $connect -> query($sql);

    // Header("Location: community.php"); 
    echo "<script>alert('삭제되었습니다.'); location.href = 'community.php';</script>";
    
?>


  

    
</body>
</html>