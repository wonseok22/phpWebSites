<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>

    <?php 
        include "../include/styletest.php"; 
    ?>
        <link rel="stylesheet" href="../asset/css/like.css">
</head>
<body>
    <?php 
        include "../include/skip.php";
    ?>
    <!-- //skip --> 
    <?php 
        include "../include/header.php";
    ?>
    <!-- //header -->  

    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="community-type" class="section center mb100">
            <div class="container">
            <?php
                $CommunityID = $_GET['CommunityID'];  

                $sql = "SELECT * FROM Community WHERE CommunityID = {$CommunityID}";
                $result = $connect -> query($sql);

                $sql = "UPDATE Community SET communityView = communityView + 1 WHERE CommunityID";
                $connect -> query($sql);
                if($result){
                    $communityInfo = $result -> fetch_array(MYSQLI_ASSOC);


            ?>
                <h3 class="section__title"><?=$communityInfo['communityTitle']?></h3>
                <p class="section__desc"><?=$communityInfo['communityAuthor']?> | <?=date('Y-m-d H:i', $communityInfo['communityRegTime'])?> | 조회수: <?=$communityInfo['communityView']?></p>
                <div class="community__inner">
                    <div class="comu__title"><?=$communityInfo['communityTitle']?></div>
                    <div class="comu__img">
                        <img src="../asset/img/community/<?=$communityInfo['communityImgFile']?>" alt="1">
                    </div>
                    <div class="comu__cont">
                        
                        <p><?=$communityInfo['communityContents']?></p>
                    </div>
                    
                    <div class="like_con">
                        <div class="button-container like-container" name="like" onclick="boardLike(<?=$communityInfo['CommunityID']?>)">
                        <?php
                            $memberID = $_SESSION['memberID'];
                            $sql = "SELECT like_check FROM Likeit WHERE memberID = {$memberID} AND b_number = {$cid}";
                            $likeCheck = $connect -> query($sql);
                            if($like_check == 1 ){
                        ?>
                            <a href="#c" class="liking">
                            <i class="fa fa-heart-o"> Like</i>    
                            </a>
                        <?php } else { ?>
                            <a href="#c">
                            <i class="fa fa-heart-o"> Like</i>    
                            </a>
                        <?php }?>
                        </div>
                    </div>
                    <div class="like_text"><span>LIKE:<?=$communityInfo['communityLike']?></span></div>
                    <div class="comu__btn">
                        <?php
                            if($result){
                                if ($communityInfo['communityAuthor'] == $_SESSION['youName'] || $_SESSION['memberID'] == 1){ ?>
                        <a href="communityRemove.php?communityID=<?=$CommunityID?>" onclick="noticeRemove()";>삭제하기</a>
                        
                        
                        <a href="community.php">수정하기</a>
                        <?php   }   } ?>
                        <a href="community.php">목록보기</a>
                    </div>
<?php } ?>
                </div>
            </div>
        </section>
    </main>

    <?php 
        include "../include/footer.php";
    ?>
    <!-- //footer -->  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function noticeRemove(){
            let notice = confirm("정말 삭제하시겠습니까?", "");
            return notice;
        }
        function boardLike(communityID){
            console.log(communityID)
            $.ajax({
            type : "POST",           
            url : "likeCheck.php",     
            data : { "CommunityID" : communityID},     
            success : function(data){ 
                document.querySelector(".like_text").innerHTML = data;
            },
            error : function(request, status, error){
                console.log("request" + request);
                console.log("status" + status);
                console.log("error" + error);
            }
            });
        }

    </script>
</body>
</html>