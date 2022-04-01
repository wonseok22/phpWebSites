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
    <div class="container">
        <section>
            <div class="title__box"><h2>로그인</h2></div>
            <form action="loginSave.php" name="login" method="post">
                    <fieldset>
                        <legend class="ir_so">로그인 입력폼</legend>
                        <div class="login-box">
                            <div>
                                <label for="youEmail" class="ir_so">이메일</label>   
                                <input class="logininput" type="email" id="youEmail" name="youEmail" placeholder="아이디" autofocus required>
                            </div>
                            <div>
                                <label for="youPass" class="ir_so">비밀번호</label>   
                                <input class="logininput"  type="password" id="youPass" name="youPass" maxlength="20" placeholder="비밀번호" autocomplete="off" required>
                            </div>
                            <div class="check">
                                <input class="checkbox" type="checkbox" id="checkbox" checked="checked" name="id_save" value="y">
                                <label for="checkbox"><p class="check_p">아이디 저장</p></label>   
                            </div>
                        </div>
                        <a class="join__box" href="join01.php">회원가입</a>
                        <a class="idpass__box" href="#">아이디찾기/비밀번호찾기</a>
                        <button id="loginBtn" class="join-main" type="submit">로그인</button>
                        <button id="loginBtn" class="join-kakao" type="submit" onclick="kakaoLogin();">
                            <img src="../asset/img/kakaotalk_black_logo_icon_147117.png" alt="카카오 아이콘">
                            <a href="javascript:void(0)">카카오계정 로그인</a>
                        </button>
                        <button id="loginBtn" class="join-naver" type="submit">
                            <img src="../asset/img/naver_icon-icons.png" alt="네이버 아이콘">
                            <a href="">네이버계정 로그인</a>
                        </button>
                    </fieldset>
                </form>
            </div>
        </section>
    </div>
    <script src="https://developers.kakao.com/sdk/js/kakao.js"></script>
    <script src="//code.jquery.com/jquery.min.js"></script>
<script>
$(document).ready(function(){

//저장된 쿠기값을 가져와서 id 칸에 넣어준다 없으면 공백으로 처리
var key = getCookie("key");
console.log(key)
$("#youEmail").val(key);


if($("#youEmail").val() !=""){               // 페이지 로딩시 입력 칸에 저장된 id가 표시된 상태라면 id저장하기를 체크 상태로 둔다
   $("#checkbox").attr("checked", true); //id저장하기를 체크 상태로 둔다 (.attr()은 요소(element)의 속성(attribute)의 값을 가져오거나 속성을 추가합니다.)
}

 $("#checkbox").change(function(){ // 체크박스에 변화가 있다면,
       if($("#checkbox").is(":checked")){ // ID 저장하기 체크했을 때,
           setCookie("key", $("#youEmail").val(), 2); // 하루 동안 쿠키 보관
       }else{ // ID 저장하기 체크 해제 시,
           deleteCookie("key");
       }
 });

   // ID 저장하기를 체크한 상태에서 ID를 입력하는 경우, 이럴 때도 쿠키 저장.
   $("#youEmail").keyup(function(){ // ID 입력 칸에 ID를 입력할 때,
       if($("#checkbox").is(":checked")){ // ID 저장하기를 체크한 상태라면,
           setCookie("key", $("#youEmail").val(), 2); // 7일 동안 쿠키 보관
       }
   });
});

//쿠키 함수 
function setCookie(cookieName, value, exdays){
   var exdate = new Date();
   exdate.setDate(exdate.getDate() + exdays);
   var cookieValue = escape(value) + ((exdays==null) ? "" : "; expires=" + exdate.toGMTString());
   document.cookie = cookieName + "=" + cookieValue;
}

function deleteCookie(cookieName){
   var expireDate = new Date();
   expireDate.setDate(expireDate.getDate() - 1);
   document.cookie = cookieName + "= " + "; expires=" + expireDate.toGMTString();
}

function getCookie(cookieName) {
   cookieName = cookieName + '=';
   var cookieData = document.cookie;
   var start = cookieData.indexOf(cookieName);
   var cookieValue = '';
   if(start != -1){
       start += cookieName.length;
       var end = cookieData.indexOf(';', start);
       if(end == -1)end = cookieData.length;
       cookieValue = cookieData.substring(start, end);
   }
   return unescape(cookieValue);
}
Kakao.init('57f45a30527e7b038564a73ed3f0e377'); //발급받은 키 중 javascript키를 사용해준다.
//카카오로그인
function kakaoLogin() {
    Kakao.Auth.login({
      success: function (response) {
        Kakao.API.request({
          url: '/v2/user/me',
          success: function (response) {
        	  console.log(response)
          },
          fail: function (error) {
            console.log(error)
          },
        })
      },
      fail: function (error) {
        console.log(error)
      },
    })
  }
//카카오로그아웃  
function kakaoLogout() {
    if (Kakao.Auth.getAccessToken()) {
      Kakao.API.request({
        url: '/v1/user/unlink',
        success: function (response) {
        	console.log(response)
        },
        fail: function (error) {
          console.log(error)
        },
      })
      Kakao.Auth.setAccessToken(undefined)
    }
  }  
</script>
</body>
</html>