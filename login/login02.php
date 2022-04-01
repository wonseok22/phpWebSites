<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>
<!DOCTYPE html>    
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판</title>
    <style>
        #footer {background: #f5f5f5;}
    </style>
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
    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="board-type" class="section center mb100">
            <div class="container">
                <h3 class="section__title">자유 게시판</h3>
                <p class="section__desc">자유 게시판입니다. 여러 소식들을 공유해 주세요!</p> 
                <div class="board__inner">
                    <div class="board__search">
                        <form action="boardSearch.php" name="boardSearch" method="GET">
                            <fieldset>
                                <legend class="ir_so">게시판 검색 영역</legend>
                                <div>
                                    <input type="search" name="searchKeyword" class="search-form" placeholder="검색어를 입력하세요!" aria-label="search" required>
                                </div>
                                <div>
                                    <select name="searchOption" class="search-option">
                                        <option value="title">제목</option>
                                        <option value="content">내용</option>
                                        <option value="name">등록자</option>
                                    </select>
                                </div>
                                <div>
                                    <button type="submit" class="search-btn">검색</button>
                                </div>
                                <div>
                                    <a href="boardWrite.php" class="search-btn black">글쓰기</a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class="board__table">
                        <table class="hover">
                            <colgroup>
                                <col style="width: 5%;">
                                <col>
                                <col style="width: 10%;">
                                <col style="width: 12%;">
                                <col style="width: 7%;">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>번호</th>
                                    <th>제목</th>
                                    <th>등록자</th>
                                    <th>등록일</th>
                                    <th>조회수</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <tr>
                                    <td>1</td>
                                    <td class="left">오늘의 일기</td>
                                    <td>홍길동</td>
                                    <td>2022-03-15</td>
                                    <td>4</td>
                                </tr> -->
                                <?php
    if(isset($_GET['page'])){
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }
    //게시판 불러올 갯수
    $pageView = 10;
    $pageLimit = ($pageView * $page) - $pageView;
    //LIMIT 0,  10  --> page1
    //LIMIT 10, 10  --> page2
    //LIMIT 20, 10  --> page3
    //LIMIT 30, 10  --> page4  .....
    //LIMIT {$boardLimit}, {$boardView}
    $sql = "SELECT b.boardID, b.boardTitle, m.youName, b.regTime, b.boardView FROM myBoard b JOIN myMember m ON(m.memberID = b.memberID) ORDER BY boardID DESC LIMIT {$pageLimit}, {$pageView}";
    $result = $connect -> query($sql);
    if($result){
        $count = $result -> num_rows;
        if($count > 0){
            for($i=1; $i<=$count; $i++){
                $boardInfo = $result -> fetch_array(MYSQLI_ASSOC);
                echo "<tr>";
                echo "<td>".$boardInfo['boardID']."</td>";
                echo "<td class='left'><a href='boardView.php?boardID={$boardInfo['boardID']}'>".$boardInfo['boardTitle']."</a></td>";
                echo "<td>".$boardInfo['youName']."</td>";
                echo "<td>".date('Y-m-d', $boardInfo['regTime'])."</td>";
                echo "<td>".$boardInfo['boardView']."</td>";
                echo "</tr>";
            }
        }
    }
?>                      </tbody>
                        </table>
                    </div>
                </div>
                <div class="board__pages">
                    <ul>
<?php
    include "boardPage.php"
?>
                        <!-- <li><a href="#">처음으로</a></li>
                        <li><a href="#">이전</a></li>
                        <li class="active"><a href="board.php?page=1">1</a></li>
                        <li><a href="board.php?page=2">2</a></li>
                        <li><a href="board.php?page=3">3</a></li>
                        <li><a href="board.php?page=4">4</a></li>
                        <li><a href="board.php?page=5">5</a></li>
                        <li><a href="board.php?page=6">6</a></li>
                        <li><a href="board.php?page=7">다음</a></li>
                        <li><a href="#">마지막으로</a></li> -->
                    </ul>
                </div>
            </div>
        </section>
    </main>
    <!-- //main -->

    <!-- footer -->
    <?php
        include "../include/footer.php"    
    ?>
    <!-- //footer -->
</body>
</html>