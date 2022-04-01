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
    <title>게시판</title>

    <!-- style -->
    <?php
        include "../include/styletest.php"
    ?>
    <!-- //style -->
    <style>
        .footer {
            background: #f5f5f5;
        }
    </style>
</head>
<body>
    <!-- header -->
    <?php
        include "../include/skip.php";
    ?>
    <!-- //header -->

    <!-- header -->
    <?php
        include "../include/header.php";
    ?>
    <!-- //header -->
    <!-- main -->
    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="board-type" class="section center mb100">
            <div class="container">
                <p class="section__desc">서로의 반려동물 꿀팁을 공유하세요!</p>
                <div class="board__inner">
                    <div class="board__modify">
                        <form action="infoBoardWriteSave.php" name="boardWrite" method="post">
                            <fieldset>
                                <legend class="ir_so">게시판 작성 영역</legend>
                                <div>
                                    <label for="boardTitle">제목</label>
                                    <input type="text" name="boardTitle" id="boardTitle" placeholder="제목을 넣어주세요." required>
                                </div>
                                <div>
                                    <label for="boardContents">내용</label>
                                    <textarea name="boardContents" id="boardContents" placeholder="내용을 넣어주세요." required></textarea>
                                </div>
                                <div class="board__btn">
                                    <button type="submit" value="저장하기">저장하기</button>
                                </div>   
                            </fieldset>
                           
                        </form>
                    </div>
                  
                </div>
            </div>
        </section>
    </main>
    <!-- //main -->


    <!-- footer -->
    <?php
        include "../include/footer.php";
    ?>
    <!-- //footer -->
    
</body>
</html>