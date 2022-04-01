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
    <title>게시판</title>

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
    <main id="contents">
        <h2 class="ir_so">컨텐츠 영역</h2>
        <section id="board-type" class="section center mb100">
            <div class="container">
                <h3 class="section__title">반려동물 정보 공유 게시판</h3>
                <p class="section__desc">서로의 반려동물 꿀팁을 공유하세요!</p> 
                <div class="category">
                    <a href="freeBoard.php">자유게시판</a>
                    <a href="infoBoard.php">꿀팁 게시판</a>
                </div>
                <div class="board__inner">
                    <div class="board__search">
                        <form action="board.php" name="boardSearch" method="GET">
                            <fieldset>
                                <legend class="ir_so">게시판 검색 영역</legend>
                                <div>
                                    <input type="search" name="searchKeyword" class="search-form" placeholder="검색어를 입력하세요!" aria-label="search" required>
                                </div>
                                <div>
                                    <select name="searchOption" class="search-option">
                                        <option value="boardTitle">제목</option>
                                        <option value="boardContents">내용</option>
                                        <option value="youName">등록자</option>
                                    </select>
                                </div>
                                <div>
                                    <button type="submit"class="search-btn">검색</button>
                                </div>
                                <div>
                                    <a href="boardWrite.php" class="search-btn black">글쓰기</a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class="board__table">
                        <table class="hover">
                            <thead>
                                <colgroup>
                                    <col style="width: 5%"> 
                                    <col> 
                                    <col style="width: 10%"> 
                                    <col style="width: 12%"> 
                                    <col style="width: 7%"> 
                                </colgroup>
                                <tr>
                                    <th>번호</th>
                                    <th>제목</th>
                                    <th>등록자</th>
                                    <th>등록일</th>
                                    <th>조회수</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
    if(isset($_GET['page'])){
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }
    $keyword = $_GET['searchKeyword'];
    $searchType = $_GET['searchOption'];

    //게시판 불러올 갯수
    $pageView = 10;
    $pageLimit = ($pageView * $page) - $pageView;

    //LIMIT 0,  10  --> page1  
    //LIMIT 10, 10  --> page2  
    //LIMIT 20, 10  --> page3  
    //LIMIT 30, 10  --> page4  .....
    //LIMIT {$boardLimit}, {$boardView}

    if ($keyword){
        $sql1 = "SELECT b.boardID, b.boardTitle, b.youName, b.regTime, b.boardView FROM infoboard b JOIN myMember m ON(m.memberID = b.memberID) WHERE b.{$searchType} LIKE '%{$keyword}%' ORDER BY boardID DESC LIMIT {$pageLimit}, {$pageView}";
        $sql2 = "SELECT count(boardID) FROM infoboard WHERE {$searchType} LIKE '%{$keyword}%'";
    } else {
        $sql1 = "SELECT b.boardID, b.boardTitle, b.youName, b.regTime, b.boardView FROM infoboard b JOIN myMember m ON(m.memberID = b.memberID ) ORDER BY boardID DESC LIMIT {$pageLimit}, {$pageView}";
        $sql2 = "SELECT count(boardID) FROM infoboard";
    }
    $result = $connect -> query($sql1);

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
    ?>


                            </tbody>
                        </table>
                    </div>
                    <div class="board__pages">
                        <ul>
                        <?php
    $result = $connect -> query($sql2);
    $boardCount = $result -> fetch_array(MYSQLI_ASSOC);
    $boardCount = $boardCount['count(boardID)'];

    // echo "<pre>";
    // var_dump($boardCount);
    // echo "</pre>";

    //총 페이지 갯수
    $boardCount = ceil($boardCount/$pageView);

    //현재 페이지를 기준으로 보여주고 싶은 갯수
    $pageCurrent = 5;
    $startPage = $page - $pageCurrent;
    $endPage = $page + $pageCurrent;

    //처음 페이지 초기화
    if($startPage < 1) $startPage = 1;

    //마지막 페이지 초기화
    if($endPage >= $boardCount) $endPage = $boardCount;

    //이전 페이지
    if($page != 1){
        $prevPage = $page - 1;
        if ($keyword) {
            echo "<li><a href='board.php?page={$prevPage}&searchKeyword={$keyword}&searchOption={$searchType}'>이전</a></li>";
        } else {
            echo "<li><a href='board.php?page={$prevPage}'>이전</a></li>";
        }
    }

    //처음으로 페이지
    if($page != 1){
        if ($keyword) {
            echo "<li><a href='board.php?page=1'>처음으로</a></li>";
        } else {
            echo "<li><a href='board.php?page=1&searchKeyword={$keyword}&searchOption={$searchType}'>처음으로</a></li>";
        }
    }

    //페이지 넘버 표시
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";

        if($i == $page){
            $active = "active";
        }
        if ($keyword) {
            echo "<li class='{$active}'><a href='board.php?page={$i}&searchKeyword={$keyword}&searchOption={$searchType}'>{$i}</a></li>";
        } else {
            echo "<li class='{$active}'><a href='board.php?page={$i}' >{$i}</a></li>";
        }
    }

    //다음 페이지
    if($page != $endPage){
        $nextPage = $page + 1;
        if ($keyword) {
            echo "<li><a href='board.php?page={$nextPage}&searchKeyword={$keyword}&searchOption={$searchType}'>다음</a></li>";
        } else {
            echo "<li><a href='board.php?page={$nextPage}'>다음</a></li>";
        }
    }

    //마지막 페이지
    if($page != $endPage){
        if ($keyword) {
            echo "<li><a href='board.php?page={$boardCount}&searchKeyword={$keyword}&searchOption={$searchType}'>마지막으로</a></li>";
        } else {
            echo "<li><a href='board.php?page={$boardCount}'>마지막으로</a></li>";
        }
    }
?>

                        </ul>
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