<?php
    include "../connect/connect.php";
    include "../connect/session.php";


    $cid = $_POST["CommunityID"];
    $memberID = $_SESSION['memberID'];
    $sql = "SELECT like_check FROM Likeit WHERE memberID = {$memberID} AND b_number = {$cid}";
    $result = $connect -> query($sql);
    if($result){
        $likeInfo = $result -> fetch_array(MYSQLI_ASSOC);
        if ($likeInfo){
            if($likeInfo['like_check'] == 1){
                //수정
                $sql = "UPDATE Likeit SET like_check = like_check - 1 WHERE memberID = {$memberID} AND b_number = {$cid}";
                $connect -> query($sql);
                $sql = "UPDATE Community SET communityLike = communityLike - 1 WHERE CommunityID = {$cid}";
                $connect -> query($sql);
            } else {
                $sql = "UPDATE Likeit SET like_check = like_check + 1 WHERE memberID = {$memberID} AND b_number = {$cid}";
                $connect -> query($sql);
                $sql = "UPDATE Community SET communityLike = communityLike + 1 WHERE CommunityID = {$cid}";
                $connect -> query($sql);
            }
        } else {
            $sql = "INSERT INTO Likeit(memberID, b_number, like_check) VALUES('$memberID', '$cid', 1)";
            $connect -> query($sql);  
            $sql = "UPDATE Community SET communityLike = communityLike + 1 WHERE CommunityID = {$cid}";
            $connect -> query($sql);
        }   
        $sql = "SELECT communityLike from Community WHERE CommunityID = {$cid}";
        $result = $connect -> query($sql);
        $likeCnt =  $result -> fetch_array(MYSQLI_ASSOC);
        
        echo "<span>LIKE:";
        echo $likeCnt['communityLike'];
        echo "</span>";
    }
?>