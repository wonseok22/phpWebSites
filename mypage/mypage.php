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
    <title>마이페이지</title>

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
<div id="mypage-container">
        <div class="mypage-contents">
            <h2 class="ir_so">컨텐츠 영역</h2>
            <section class="mypage-wrap">
                <div class="member-menu">
                    <ul>
                        <li class="active"><a href="#">내정보 수정</a></li>
                        <li><a href="#"></a>내정보 수정</li>
                        <li><a href="#"></a>내정보 수정</li>
                        <li><a href="#"></a>내정보 수정</li>
                        <li><a href="#"></a>내정보 수정</li>
                        <li><a href="#"></a>내정보 수정</li>
                        <li><a href="#"></a>내정보 수정</li>
                        <li><a href="#"></a>내정보 수정</li>
                        <li><a href="#"></a>내정보 수정</li>
                        <li><a href="#"></a>내정보 수정</li>
                        <li><a href="#"></a>내정보 수정</li>
                        <li><a href="#"></a>내정보 수정</li>
                    </ul>
                </div>
                <div class="member-form">
                    <h3>회원정보</h3>
                    <form action="mypageSave.php" name="mypage" method="post" enctype="multipart/form-data"
                        onsubmit="return check()">
                        <fieldset>
                            <legend class="ir_so">회원정보 입력폼</legend>
                            <div class="member-form-modify">

                                <div class="member-box" role="table">
                                    <?php
$memberID = $_SESSION['memberID'];
$sql = "SELECT * FROM myMember WHERE memberID = '$memberID'";
$result = $connect -> query($sql);
if($result){
$mypageInfo = $result -> fetch_array(MYSQLI_ASSOC);
echo "<div role='row' class='member-modify'><label role='columnheader' for='youEmail'>이메일</label><input role='cell' type='email' id='youEmail' value='".$mypageInfo['youEmail']."' name='youEmail' autocomplete='off'></div>";
echo "<div role='row' class='member-modify'>
            <label role='columnheader' for='youName'>이름</label>
            <input role='cell' type='text' id='youName' value='".$mypageInfo['youName']."' name='youName' autocomplete='off'>
    </div>
    <div class='member-modify-btn' onclick='duplicateCheck()'>중복 검사</div><div class='dupCheckResult'></div>";
echo "<div role='row' class='member-modify'>
        <label role='columnheader' for='youAddress'>주소</label>
        <input role='cell' type='text' id='youAddress' value='".$mypageInfo['youAddress']."' name='youAddress' autocomplete='off'>
    </div>
    <div class='member-modify-btn' onclick='sample6_execDaumPostcode()'>주소 검색</div>";
echo "<div role='row' class='member-modify'><label role='columnheader' for='youAddress'>상세 주소</label><input role='cell' type='text' id='youAddress2' value='".$mypageInfo['youAddress2']."' name='youAddress2' autocomplete='off'></div>";
echo "<div role='row' class='member-modify'><label role='columnheader' for='youPass'>비밀번호</label><input  role='cell'type='password' id='youPass' name='youPass' placeholder='비밀번호를 입력해주세요!' maxlength='15' autocomplete='off' required></div>";
}
?>
                                    <!-- <div class="modify">
                        <label for="youEmail">이메일</label>   
                        <input type="email" id="youEmail" name="youEmail" autocomplete="off">
                    </div>
                    <div class="modify">
                        <label for="youName">이름</label>   
                        <input type="text" id="youName" name="youName" maxlength="5" autocomplete="off">
                    </div>
                    <div class="modify">
                        <label for="youBirth">생년월일</label>   
                        <input type="text" id="youBirth" name="youBirth" maxlength="12" autocomplete="off">
                    </div>
                    <div class="modify">
                        <label for="youPhone">휴대폰 번호</label>   
                        <input type="text" id="youPhone" name="youPhone" maxlength="15" autocomplete="off">
                    </div>
                    <div>
                        <label for="youPass">비밀번호 입력</label>   
                        <input type="password" id="youPass" name="youPass" placeholder="로그인 비밀번호를 입력해주세요!" maxlength="15" autocomplete="off" required>
                    </div> -->
                                </div>
                                <div class="join-intro">
                                    <div class="face">
                                        <?php 
                            $memberID = $_SESSION['memberID'];
                            $sql = "SELECT * FROM myMember WHERE memberID = '$memberID'";
                            $result = $connect -> query($sql);   ?>
                                        <?php foreach($result as $photo){ ?>
                                        <?php if($photo['youPhotoFile'] == NULL || FALSE){ ?>
                                        <?php    $photo['youPhotoFile'] = "face2.png"; ?> 
                                        <?php } ?>
                                        <img src="../asset/img/mypage/<?=$photo['youPhotoFile']?>" id="memberImg" value="" alt="">
                                        <?php }   ?>
                                        
                                        <div class="filebox">
                                            <input class="upload-name" value="파일선택" disabled="disabled">
                                            <label class="member-modibtn" for="youPhotoFile">업로드</label>
                                            <input type="file" name="youPhotoFile" id="youPhotoFile"
                                                class="upload-hidden" type="file" name="youPhotoFile"
                                                accept="image/jpeg, image/png, image/jpg, image/png, image/gif"
                                                id="youPhotoFile">
                                            <input type="button" class="upload-hidden" class="member-modibtn" id="resetImg" />
                                            <label class="member-modibtn" for="resetImg" onclick="resetImg('이미지 삭제');">삭제</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                <div class="member-btnbox">
                    <button id="joinBtn" class="member-modify-submit" type="submit"><span>회원정보
                            수정</span></button>
                </div>
                        </fieldset>
                <?php
echo "<pre>";
var_dump($photo);
echo "</pre>";
                ?>
                </form>
            </div>
        </section>
    </div>
</div>
<!-- //main -->

<!-- footer -->
<?php
include "../include/footer.php"    
?>
<!-- //footer -->
<script>
function resetImg(text) {
	alert(text);
}
</script>
<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script src="//code.jquery.com/jquery.min.js"></script>
<script> 
{

    function check() {
        pass = $('#youPass').val()
        passC = $_SESSION["youPass"];
        if (pass != passC) {
            alert("비밀번호가 일치하지 않습니다.")
            return false
        }

        dupCheck = $(".dupCheckResult").text()
        if (dupCheck.slice(-14) != '사용 가능한 닉네임입니다.') {
            alert("닉네임 중복확인이 완료되지 않았습니다.")
            return false
        }
    }
}

function duplicateCheck() {
    $.ajax({
        url: "../login/duplicateCheck.php",
        type: "POST",
        data: {
            nickName: $('#youName').val()
        }
    }).done(function (data) {
        if (data.slice(-14) != '사용 가능한 닉네임입니다.') {
            document.querySelector('.dupCheckResult').classList.remove("active")
        } else {
            document.querySelector('.dupCheckResult').classList.add("active")

        }
        $('.dupCheckResult').text(data);
    });
}

function sample6_execDaumPostcode() {
    new daum.Postcode({
        oncomplete: function (data) {
            // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

            // 각 주소의 노출 규칙에 따라 주소를 조합한다.
            // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
            var addr = ''; // 주소 변수
            var extraAddr = ''; // 참고항목 변수

            //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
            if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                addr = data.roadAddress;
            } else { // 사용자가 지번 주소를 선택했을 경우(J)
                addr = data.jibunAddress;
            }

            // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
            if (data.userSelectedType === 'R') {
                // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                if (data.bname !== '' && /[동|로|가]$/g.test(data.bname)) {
                    extraAddr += data.bname;
                }
                // 건물명이 있고, 공동주택일 경우 추가한다.
                if (data.buildingName !== '' && data.apartment === 'Y') {
                    extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                }
                // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                if (extraAddr !== '') {
                    extraAddr = ' (' + extraAddr + ')';
                }
            }
            // 우편번호와 주소 정보를 해당 필드에 넣는다.
            document.getElementById("youAddress").value = addr;
            // 커서를 상세주소 필드로 이동한다.
            document.getElementById("youAddress").focus();
        }
    }).open();
}
//preview image 
var imgTarget = $('.preview-image .upload-hidden');
imgTarget.on('change', function () {
    var parent = $(this).parent();
    parent.children('.upload-display').remove();
    if (window.FileReader) {
        //image 파일만
        if (!$(this)[0].files[0].type.match(/image\//)) return;
        var reader = new FileReader();
        reader.onload = function (e) {
            var src = e.target.result;
            parent.prepend('<div class="upload-display"><div class="upload-thumb-wrap"><img src="' +
                src + '" class="upload-thumb"></div></div>');
        }
        reader.readAsDataURL($(this)[0].files[0]);
    } else {
        $(this)[0].select();
        $(this)[0].blur();
        var imgSrc = document.selection.createRange().text;
        parent.prepend(
            '<div class="upload-display"><div class="upload-thumb-wrap"><img class="upload-thumb"></div></div>'
        );
        var img = $(this).siblings('.upload-display').find('img');
        img[0].style.filter =
            "progid:DXImageTransform.Microsoft.AlphaImageLoader(enable='true',sizingMethod='scale',src=\"" +
            imgSrc + "\")";
    }
});
{
    $("#youPhotoFile").on('change',function(){
        var fileName = $("#youPhotoFile").val();
        $(".upload-name").val(fileName);
    });
}
</script>
</body>
</html>