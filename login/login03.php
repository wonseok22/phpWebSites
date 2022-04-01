<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 완료</title>
</head>
<link rel="stylesheet" href="../asset/css/reset.css">
<style>
    * {
        margin: 0;
        padding: 0;
        font-family: 'NotoSansKR';
    }
    #wrap {
        width: 1920px;
        height: 1200px;
    }
    .container {
        width: 1240px;
        margin: 0 auto;
    }
    #header {
        width: 100%;
        height: 150px;
        background: rgb(161, 216, 11);
    }
    .joinform h3 {
        font-family: 'NotoSansKR';
        text-align: center;
        margin-top: 70px;
        font-size: 30px;
    }
    .joinform .joinlist {
        margin: 0 auto;
        width: 550px;
        display: flex;
        justify-content: space-between;
        margin-top: 60px;
        font-size: 20px;
    }
    .joinform .joinlist span:nth-child(3){
        border-bottom: 2px solid #000;
    }
    .joinform .joinend {
        text-align: center;
        font-size: 40px;
        font-weight: bold;
        margin-top: 100px;
    }
    .joinform .joinend-form {
        margin: 0 auto;
        text-align: center;
        width: 600px;
        margin-top: 15px;
        border: 3px solid #000;
        padding: 70px 0 50px 0;
    }
    .joinform .joinend-form p {
        font-size: 26px;
        margin-bottom: 50px;
    }
    .joinform .joinend-form a {
        display: inline-block;
        text-decoration: none;
        color: #000;
        font-size: 24px;
        margin-top: 15px;
        border: 1px solid #FFF9C4;
        padding: 10px 20px 10px 20px;
        background: #FFF9C4;
    }
    #footer {
        width: 100%;
        height: 100px;
        margin-top: 150px;
        background: #000;
    }
</style>
<body>
    <div id="wrap">
        <header id="header"></header>
        <main id="contents" class="container">
            <div class="joinform">
                <h3>회원가입</h2>
                <div class="joinlist">
                    <span>이용약관</span>
                    <span>회원정보 입력</span>
                    <span>가입완료</span>
                </div>
                <p class="joinend">회원가입 완료</p>
                <div class="joinend-form">
                    <p>성공적으로 가입되었습니다.</p>
                    <a href="#">로그인 페이지로</a>
                </div>
            </div>
        </main>
        <footer id="footer"></footer>
    </div>
</body>
</html>