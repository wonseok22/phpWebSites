<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 완료</title>
</head>
<link rel="stylesheet" href="../asset/css/reset.css">
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
        <main id="contents">
            <div class="joinform">
                <h3>회원가입</h2>
                <div class="joinlist">
                    <span>이용약관</span>
                    <span>회원정보 입력</span>
                    <span class="active">가입완료</span>
                </div>
                <div class="join03box">
                    <p class="joinend">회원가입 완료</p>
                    <p>성공적으로 가입되었습니다.</p>
                    <a href="login.php">로그인 페이지로</a>
                </div>
            </div>
        </main>
    </div>
</body>
</html>