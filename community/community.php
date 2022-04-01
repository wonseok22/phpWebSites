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
    <title>커뮤니티</title>
    <link rel="stylesheet" href="../asset/css/like.css">
    <style>
        #footer {background: #f5f5f5;}
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
        include "../include/header.php"    
    ?>
    <!-- //header -->

    <!-- main -->
    <main id="community-contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="community-type" class="section center">
            <div class="community-container">
            <div class="category">
                    <ul>
                        <li class ="active"><a href="#">정보공유</a></li>
                    </ul>
                </div>
                <div class="community__inner">
                    <div class="community__cont">
<?php
    $sql = "SELECT youPhotoFile FROM myMember";
    $sql = "SELECT * FROM Community ORDER BY CommunityID DESC";
    $result = $connect -> query($sql);
?>

<?php foreach($result as $community){ ?>
    <article class='community'>
        <figuer class='community__header'>
            <a href="communityView.php?CommunityID=<?=$community['CommunityID']?>" style="background-image:url(../asset/img/community/<?=$community['communityImgFile']?>)"></a>
        </figuer>
        <div class="community__body">
            <div class="community__title"><a href="communityView.php?CommunityID=<?=$community['CommunityID']?>"><?=$community['communityTitle']?></a></div>
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
                  <span>LIKE: <?=$community['communityLike']?></span>
              </div>
            <div class="footer__info">
                <span>조회수: <?=$community['communityView']?></span>
            <span class="date"><?=date('Y-m-d', $community['communityRegTime'])?></span>
            </div>
        </div>
    </article>
<?php } ?>
 
                    </div>
                    <div class="community__btn">
                        <a href="communityWrite.php">글쓰기</a>
                    </div>
                    <div class="community__search">
                        <form action="communitySearch.php" method="GET">
                            <fieldset class="underline">
                                <legend class="ir_so">검색 영역</legend>
                                <input type="search" name="communitySearch" id="communitySearch" class="search" placeholder="검색어를 입력해주세요!">
                                <label for="communitySearch" class="ir_so">검색</label>
                                <button class="button">검색</button>
                            </fieldset>
                        </form>
                    </div>
                    <div class="community__pages">
                        <ul>
                            <li><a href="#">&lt;&lt;</a></li>
                            <li><a href="#">&lt;</a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">6</a></li>
                            <li><a href="#">&gt;</a></li>
                            <li><a href="#">&gt;</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- //main -->

    <!-- footer -->
    <?php
        include "../include/footer.php"    
    ?>
    <!-- //footer -->
    <script src="../asset/js/like.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
       
        

        function noticeRemove(){
            let notice = confirm("정말 삭제하시겠습니까?", "");
            return notice;
         }

         
   
    </script>
</body>
</html>