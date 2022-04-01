<?php
    include "../connect/connect.php";

    for($i=1; $i<=50; $i++){
        $regTime = time();
        $sql = "INSERT INTO freeBoard(memberID, boardTitle, boardContents, boardView, regTime) VALUES(3, '게시판 타이틀${i}입니다.', '게시판 내용${i}입니다. 게시글이 안만들어지고있어요', '1', '$regTime')";
        $connect -> query($sql);
    }
?>