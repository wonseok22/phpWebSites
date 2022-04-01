<header id="header">
    <div class="member">
        <span class="ir_so">회원 정보 영역</span>
        <ul>
    <?php if(isset($_SESSION['memberID'])){ ?>
        <?php 
        $memberID = $_SESSION['memberID'];
        $sql = "SELECT * FROM myMember WHERE memberID = '$memberID'";
        $result = $connect -> query($sql);   ?>
        <?php foreach($result as $photo){ ?>
        <li><a href="../mypage/mypage.php">
    <?php if($photo['youPhotoFile'] == NULL || FALSE){ ?>
    <?php    $photo['youPhotoFile'] = "face2.png"; ?> 
    <?php } ?>
    
        <img src="../asset/img/mypage/<?=$photo['youPhotoFile']?>" alt="블로그 이미지">
        </a></li>
        <?php }   ?>
            <li><a href="../mypage/mypage.php"><?=$_SESSION['youName']?>님 환영합니다.</a></li>
            <li><a href="../login/logout.php">로그아웃</a></li>
            <ul>
    <?php } else {  ?>
        <ul>
            <li><a class="header-join" href=../login/join01.php>회원가입</a></li>
            <li><a class="header-join" href="../login/login.php">로그인</a></li>
    <?php } ?>
        </ul>
    </div>
    <div class="menu">
        <ul>
            <li><a href="#">증상별 질병찾기</a></li>
            <li><a href="../findMap/findMap.php">동물병원 찾기</a></li>
            <li><a href="../community/community.php">정보 공유하기</a></li>
            <li><a href="../board/freeBoard.php">게시판</a></li>
        </ul>   
    </div>
    <div class="logo"><a href="../pages/main.php"><img src="../asset/img/logo_image.png" width="80" height="80"></a></div>
</header>