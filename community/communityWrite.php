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
    <title>커뮤니티 글쓰기</title>
    <!-- style -->
    <?php include "../include/styletest.php";?>
    <!-- //style -->
    <style>
        .footer {
            background: #f5f5f5;
        }
    </style>
</head>
<body>
    <!-- skip -->
    <?php include "../include/skip.php";?>
    <!-- //skip -->

    <!-- header -->
    <?php include "../include/header.php";?>
    <!-- //header -->
    
    <!-- main -->
    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="board-type" class="section center mb100">
            <div class="container">
                <h3 class="section__title">커뮤니티</h3>
                <p class="section__desc">많은 사람들과 소통하세요~</p> 
                <div class="community__inner">
                <div class="community__write">
                        <form action="communityWriteSave.php" name="communityWrite" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <legend class="ir_so">블로그 게시글 작성 영역</legend>
                                <div>
                                    <label for="communityCate">카테고리</label>
                                    <select name="communityCate" id="communityCate">
                                        <option value="내 동물 소개">내 동물 소개</option>
                                        <option value="강아지 꿀팁">강아지 꿀팁</option>
                                        <option value="고양이 꿀팁">고양이 꿀팁</option>
                                    </select>
                                <div>
                                    <label for="communityTitle">제목</label>
                                    <input type="text" name="communityTitle" id="communityTitle" placeholder="제목을 넣어주세요" required>
                                </div>
                                <div>
                                    <label for="communityContents">내용</label>
                                    <textarea name="communityContents" id="communityContents" placeholder="내용을 넣어주세요!" required></textarea>
                                </div>
                                <div>
                                    <label for="communityFile">파일</label>
                                    <input type="file" name="communityFile" id="communityFile" placeholder="사진을 넣어주세요! 사진은 jpg, gif, png 파일만 지원이 됩니다." accept="image/jpeg, image/png, image/jpg, image/png">
                                </div>
                                <button type="submit" value="저장하기" >저장하기</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- footer -->
    <?php include "../include/footer.php";?><!-- //footer -->
    
    
    
</body>
</html>