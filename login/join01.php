<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <span class="active"><a href="join.php">이용약관</a></span>
                <span>회원정보 입력</span>
                <span>가입완료</span>
            </div>
            <div class="line__box"></div>
            <div class="join01_box">
                <form action="join02.php" name="login" method="post">
                    <fieldset>
                        <legend class="ir_so">로그인 입력폼</legend>
                        <div class="check1">
                            <h4 class="checktitle">이용약관</h4>
                            <div class="checkdesc">
                            <p>1.고객은 본 약관에 따라 본 서비스를 이용해야 합니다. 고객은 본 약관에 대해 동의를 했을 경우에 한하여 본 서비스를 이용할 수 있습니다.<br>
                            2.고객이 미성년자일 경우에는 친권자 등 법정대리인의 사전 동의를 얻은 후 본 서비스를 이용하십시오. 또한 고객이 본 서비스를 사업자를 위해 이용할 경우에는 당해 사업자 역시 본 약관에 동의한 후, 본 서비스를 이용하십시오.<br>
                            3.본 서비스에 적용되는 개별 이용약관이 존재할 경우, 고객은 본 약관 외에 개별 이용약관의 규정에 따라 본 서비스를 이용해야 합니다.</p>
                            <label>동의합니다</label>
                            <input type="checkbox" class="checkbox1" name="check1" required>
                        </div>
                        <div class="check1">
                            <h4 class="checktitle">개인정보 이용내역</h4>
                            <div class="checkdesc">
                            <p>목적 : 가입자 개인 식별, 가입 의사 확인, 가입자와의 원활한 의사소통, 가입자와의 교육 커뮤니케이션<br>
                            항목 : 아이디(이메일주소), 비밀번호, 이름, 생년월일, 휴대폰번호<br>
                            보유기간 : 회원 탈퇴 시까지 보유(탈퇴일로부터 즉시 파기합니다.)<br>
                            개인정보 수집에 대한 동의를 거부할 권리가 있으며, 회원 가입시 개인정보 수집을 동의함으로 간주합니다.</p>
                            <label>동의합니다</label>
                            <input type="checkbox" class="checkbox1" name="check1" required>
                            </div>
                        </div>
                        <div class="nextbtn_box">
                        <button class="nextbtn" type="submit">다음 페이지</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </main>
</body>
</html>