<?php
    include "../connect/connect.php"; 
    include "../connect/session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    </style>
<!-- style -->
<?php
    include "../include/style.php"
?>
<!-- //style -->
</head>
<body>
    <!-- skip -->
    <?php
    include "../include/skip.php"
    ?>
    <!-- //skip -->

    <!-- header -->
    <?php
        include "../include/header.php";
    ?>
    <!-- //header -->
    <div id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <div>
            <?php
                // echo "<pre>";
                // var_dump($_SESSION);
                // echo "</pre>";
            ?>
            <div class="mainbanner">
            </dvi>
            <div class="video">
                <!-- <video src="../asset/video/main.mp4" width="1200px" ></video> -->
                <!-- controls autoplay loop muted -->
            </div>
            <div id="community-contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="community-type" class="center mainpage">
            <div class="community-container">
                <h3 class="section__title">정보 공유</h3>
                <p class="section__desc">커뮤니티</p>
                <div class="community__inner">
                    <div class="community__cont">
<?php
    $sql = "SELECT youPhotoFile FROM myMember";
    $sql = "SELECT * FROM Community ORDER BY CommunityID DESC LIMIT 3";
    $result = $connect -> query($sql);
?>

<?php foreach($result as $community){ ?>
    <article class='community'>
        <figuer class='community__header'>
            <a href="../community/communityView.php?CommunityID=<?=$community['CommunityID']?>" style="background-image:url(../asset/img/community/<?=$community['communityImgFile']?>)"></a>
        </figuer>
        <div class="community__body">
            <div class="community__title"><a href="../community/communityView.php?CommunityID=<?=$community['CommunityID']?>"><?=$community['communityTitle']?></a></div>
            <div class="community__info">
                <span class="author">
                    <div class="div">
                    <img src="../asset/img/mypage/face2.png" style="width: 36px; height: 36px;" alt=""><a href="#"><?=$community['communityAuthor']?></a>
                    </div>
                </span>
            </div>
        </div>
        <div class="community__footer">
              <span class="community__cate"><?=$community['communityCategory']?></span>
              <div class="footer__info">
                  <span class="like">LIKE: <?=$community['communityLike']?></span>
              </div>
            <div class="footer__info">
                <span class="view">조회수: <?=$community['communityView']?></span>
            <span class="date"><?=date('Y-m-d', $community['communityRegTime'])?></span>
            </div>
        </div>
    </article>
<?php } ?>
 
                    </div>
                </div>
            </div>
        </section>
<!-- //게시판 -->

        <section id="board-type" class="center mainpage">
            <div class="board-container">
                <h3 class="section__title">최신글 보기</h3>
                <p class="section__desc">최신 댓글과 공지사항을 확인하세요!</p>
                <div class="board__inner">
                <article class="notice">
                        <h4>댓글</h4>
                        <a class="more" href="#">더보기</a>
                        <div class="board__table">
                        <ul>
                            <li><a href="#">dd</a><span>2022-03-30</span></li>
                            <li><a href="#">댓글내용</a><span>2022-03-22</span></li>
                            <li><a href="#">내용</a><span>2022-03-22</span></li>
                            <li><a href="#">글내용</a><span>2022-03-22</span></li>
                        </ul>
                    </div>
                    </article>
                    <article class="notice">
                        <h4>공지사항</h4>
                        <a class="more" href="../board/freeBoard.php">더보기</a>
                        <div class="board__table">
                        <ul>
<?php
    $sql ="SELECT * FROM freeBoard ORDER BY boardID DESC LIMIT 4";
    $result = $connect -> query($sql);
?>
<?php foreach($result as $board){ ?>
        <li><a href="../board/freeView.php?boardID=<?=$board['boardID']?>"><?=$board['boardTitle']?></a><span><?=date('Y-m-d', $board['regTime'])?></span></li>
<?php } ?>

                        </ul>
                    </div>
                    </article>
                </div>
            </div> 
        </section>
<!-- //공지사항 -->
    </div>

    <!-- footer -->
    <?php
        include "../include/footer.php"
    ?>
    <!-- //footer -->
        
</div>
</body>
</html>