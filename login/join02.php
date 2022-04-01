<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 폼</title>
</head>
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
                        <span class="active">회원정보 입력</span>
                        <span>가입완료</span>
                    </div>
            </div>
            <div class="line__box"></div>
            <div class="joininput">
                <div class="joinbox">
                    <form action="joinSave.php" name="join" method="post" onsubmit="return check()">
                        <fieldset>
                            <legend class="ir_so">회원가입 입력폼</legend>
                            <div class="joinBox">
                                <div>
                                    <label for="youEmail">이메일</label>
                                    <input type="email" id="youEmail" placeholder="Sample@naver.com" name="youEmail"
                                        autocomplete="off" autofocus required>
                                        <a href="#c" class="test" onclick="emailChecking()">중복검사</a>
                                        <p class="comment" id="youEmailComment"></p>
                                </div>
                                <div>
                                    <label for="youPass">비밀번호</label>
                                    <input type="password" id="youPass" maxlength="20" name="youPass"
                                        placeholder="비밀번호를 적어주세요!" autocomplete="off" required>
                                </div>
                                <div>
                                    <label for="youPassC">비밀번호 확인</label>
                                    <input type="password" id="youPassC" maxlength="20" name="youPassC"
                                        placeholder="다시 비밀번호를 적어주세요!" autocomplete="off" required>
                                    <div class="passResult"></div>
                                </div>

                                <div class="smallbox">
                                    <label for="youName">닉네임</label>
                                    <input type="text" id="youName" maxlength="5" name="youName"
                                        placeholder="닉네임을 적어주세요!" autocomplete="off" required>
                                    <div class="join-button" onclick="duplicateCheck()">중복 검사</div>
                                    <div class = "dupCheckResult"></div><br>
                                </div>
                                <div class="smallbox">
                                    <label for="youAddress">주소</label>
                                    <input style="pointer-events: none;"type="text" id="youAddress" maxlength="50" name="youAddress" autocomplete="off" readonly/>
                                    <div class="join-button" onclick="sample6_execDaumPostcode()">주소 검색</div>
                                </div>
                                <div>
                                    <label for="youAddress" class="taleft">상세 주소</label>
                                    <input type="text" id="youAddress" maxlength="50" name="youAddress2"
                                        placeholder="상세 주소를 입력해주세요" autocomplete="off" required/>
                                </div>
                            </div>
                            <button id="joinBtn" class="join-submit" type="submit">회원가입 완료</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </main>
        <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="//code.jquery.com/jquery.min.js"></script>
        <script>
            {
                document.querySelector("#youPass").addEventListener("keyup",function(){
                    pass = $('#youPass').val()
                    passC = $('#youPassC').val()
                    if (passC != ""){
                        if (pass != passC){
                            document.querySelector('.passResult').classList.remove("active")
                            document.querySelector('.passResult').innerHTML = "비밀번호가 일치하지 않습니다.";
                        }
                        else {
                            document.querySelector('.passResult').classList.add("active")
                            document.querySelector('.passResult').innerHTML = "비밀번호가 일치합니다.";
                            
                        }
                    }
                })
                document.querySelector("#youPassC").addEventListener("keyup",function(){
                    pass = $('#youPass').val()
                    passC = $('#youPassC').val()
                    if (pass != passC){
                        document.querySelector('.passResult').classList.remove("active")
                        document.querySelector('.passResult').innerHTML = "비밀번호가 일치하지 않습니다.";
                    }
                    else {
                        document.querySelector('.passResult').classList.add("active")
                        document.querySelector('.passResult').innerHTML = "비밀번호가 일치합니다.";
                    }
                
                })
            function check(){
                pass = $('#youPass').val()
                passC = $('#youPassC').val()
                if (pass!=passC){
                    alert("비밀번호가 일치하지 않습니다.")
                    return false
                } 
                
                dupCheck = $(".dupCheckResult").text()
                if (dupCheck.slice(-14) != '사용 가능한 닉네임입니다.'){
                    alert("닉네임 중복확인이 완료되지 않았습니다.")
                    return false
                } 
            }
            function duplicateCheck() {
                $.ajax({
                    url: "duplicateCheck.php",
                    type: "POST",
                    data: {
                        nickName: $('#youName').val()
                    }
                }).done(function(data) {
                    if (data.slice(-14) != '사용 가능한 닉네임입니다.'){
                        document.querySelector('.dupCheckResult').classList.remove("active")
                    } else {
                        document.querySelector('.dupCheckResult').classList.add("active")

                    }
                    $('.dupCheckResult').text(data);
                });
            }
        }
            function sample6_execDaumPostcode() {
                new daum.Postcode({
                    oncomplete: function(data) {
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
                        if(data.userSelectedType === 'R'){
                            // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                            // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                            if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                                extraAddr += data.bname;
                            }
                            // 건물명이 있고, 공동주택일 경우 추가한다.
                            if(data.buildingName !== '' && data.apartment === 'Y'){
                                extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                            }
                            // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                            if(extraAddr !== ''){
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


            let emailCheck = false;

            function emailChecking(){
                let youEmail = $("#youEmail").val();

                if(youEmail == null || youEmail == ''){
                    $("#youEmailComment").text("이메일을 입력해주세요!");
                    $(".joinBox .comment").css("color", "red");
                    return;
                }
                $.ajax({
                    type: "POST",           
                    url: "joinCheck.php",     
                    data: {"youEmail": youEmail, "type": "emailCheck"},     
                    dataType: "json",

                    success : function(data){ 
                        if(data.result == "good"){
                            $("#youEmailComment").text("사용 가능한 이메일입니다.");
                            $(".joinBox .comment").css("color", "green");
                            emailCheck = true;
                            //이메일 유효성 검사
                        let getMail = RegExp(/[a-zA-Z0-9+-_.]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+/);
                        if(!getMail.test($("#youEmail").val())){
                            $("#youEmailComment").text("이메일 형식에 맞게 작성해주세요!");
                            $("#youEmailComment").val("");
                            $(".joinBox .comment").css("color", "red");
                            return false;
                        }
                        } else {
                            $("#youEmailComment").text("이미 존재하는 이메일입니다. 로그인을 해주세요!");
                            emailCheck = false;
                        }
                    
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