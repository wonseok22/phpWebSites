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
    <title>FAQ</title>

    <!-- style -->
    <?php
        include "../include/style.php";
    ?>
    <!-- //style -->
    <style>
        .footer {
            background: #f5f5f5;
        }
    </style>
</head>
<body>
    <!-- skip -->
    <?php
        include "../include/skip.php";
    ?>
    <!-- //skip -->

    <!-- header -->
    <?php
        include "../include/header.php";
    ?>
    <!-- //header -->
    
    <!-- main -->
    <main id="board-contents">
    <h2 class="ir_so">컨텐츠 영역</h2>
    <section id="board-type" class="section center mb100">
        <div class="board-container">
            <div class="category">
                <ul>
                    <li><a href="freeBoard.php">공지사항</a></li>
                    <li class="active"><a href="infoBoard.php">FAQ</a></li>
                </ul>
            </div>
            <div class="faqWrap">
                <ul>
                    <li>
                        <div class="questions">
                            <span>Q</span>
                            <p>어떤 서비스인가요?</p>
                        </div>
                        <div class="ask">
                            <span>A</span>
                            <p>입니다.</p>
                        </div>
                    </li>
                    <li>
                        <div class="questions">
                            <span>Q</span>
                            <p>어떤 서비스인가요?</p>
                        </div>
                        <div class="ask">
                            <span>A</span>
                            <p>입니다.</p>
                        </div>
                    </li>
                    <li>
                        <div class="questions">
                            <span>Q</span>
                            <p>어떤 서비스인가요?</p>
                        </div>
                        <div class="ask">
                            <span>A</span>
                            <p>입니다.</p>
                        </div>
                    </li>
                    <li>
                        <div class="questions">
                            <span>Q</span>
                            <p>어떤 서비스인가요?</p>
                        </div>
                        <div class="ask">
                            <span>A</span>
                            <p>입니다.</p>
                        </div>
                    </li>
                    <li>
                        <div class="questions">
                            <span>Q</span>
                            <p>어떤 서비스인가요?</p>
                        </div>
                        <div class="ask">
                            <span>A</span>
                            <p>입니다.</p>
                        </div>
                    </li>
                </ul>
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
    <script>
        document.querySelectorAll(".faqWrap li").forEach(el => {
            el.addEventListener("click", () => {
                el.lastElementChild.classList.toggle("show");
            })
        })

        document.querySelectorAll(".faqWrap li .questions p").forEach(p => {
            p.addEventListener("click", () => {
                p.classList.toggle("changed");
            })
        })
    </script>
</body>
</html>