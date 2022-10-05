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
    <title>Document</title>

    <?php include "../include/link.php" ;?>
</head>
<body>
<div id="skip">
        <a href="#header">헤더 영역 바로가기</a>
        <a href="#main">컨텐츠 영역 바로가기</a>
        <a href="#footer">푸터 영역 바로가기</a>
    </div>
    <!-- skip -->

    <?php include "../include/header.php" ;?>
    <!-- header -->
    
    
    <main id="main">
        <section id="board" class="container">
            <h2>게시판 보기 영역입니다.</h2>
            <div class="board__inner">
                <div class="board__title">
                    <h3>게시판</h3>
                    <p>웹디자이너, 웹퍼블리셔, 프론트앤드 개발자를 위한</p>
                </div>
                <div class="board_view">
                    <table>
                        <colgroup>
                            <col style="width: 20%">
                            <col style="width: 80%">
                        </colgroup>
                        <tbody>
<?php
    $myBoardID = $_GET['myBoardID'];
    
    
    // echo  $myBoardID;
    $sql = "SELECT b.boardTitle, m.youName, b.regTime, b.boardView, b.boardContents FROM myBoard b JOIN myMember m ON(m.myMemberID = b.myMemberID) WHERE b.myBoardID = {$myBoardID}";
    $result = $connect -> query($sql);
    
    //볼때 마다 조회수 + 1 (update 사용)
    $reviewsql = "UPDATE myBoard SET boardView = boardView + 1 WHERE myBoardID={$myBoardID}";
    $result = $connect -> query($reviewsql);


    if($result) {
        $info = $result -> fetch_array(MYSQLI_ASSOC);

        // echo "<pre>";
        // var_dump($info);
        // echo "</pre>";

        echo "<tr><th>제목</th><td>".$info['boardTitle']."</td></tr>";
        echo "<tr><th>등록자</th><td>".$info['youName']."</td></tr>";
        echo "<tr><th>등록일</th><td>".date('Y-m-d H:i', $info['regTime'])."</td></tr>";
        echo "<tr><th>조회수</th><td>".$info['boardView']."</td></tr>";
        echo "<tr><th>내용</th><td class='height'>".$info['boardContents']."</td></tr>";
    };
?>
                            <!-- <tr>
                                <th>제목</th>
                                <td>게시판 제목입니다.</td>
                            </tr>
                            <tr>
                                <th>등록자</th>
                                <td>송성희</td>
                            </tr>
                            <tr>
                                <th>등록일</th>
                                <td>2022.03.04</td>
                            </tr>
                            <tr>
                                <th>조회수</th>
                                <td>999</td>
                            </tr>
                            <tr>
                                <th>내용</th>
                                <td class="height"
                                    >전화권유에 의해 회원권, 어학교재, 학습지, 월간지 등을 구입 또는 이용계약을 한 후 철회기간 이내(14일)에 청약의 철회를 요구할 때
                                    방문판매로 자격증 교재, 건강식품, 유아용 교재, 가전제품 등을 구입 또는 스포츠센터 이용계약을 한 후 철회기간 이내(14일)에 청약의 철회를 요구할 때
                                    인터넷 쇼핑몰, TV홈쇼핑, 통신판매를 이용하여 물품이나 서비스상품을 구입한 후, 철회기간 이내(7일)에 청약의 철회를 요구할 때,할부로 물품을 구입한 후, 철회기간 이내(7일)에 청약의 철회를 요구할 때
                                    (상행위를 목적으로 할부계약을 체결한 경우 제외)물품 등을 할부로 구입 후, 아래와 같은 사유로 매도인과 신용제공자에 항변권을 행사하고자 할 때
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
                <div class="board__btn">
                    <a href="boardModify.php?myBoardID=<?=$myBoardID?>">수정하기</a>
                    <a href="boardRemove.php?myBoardID=<?=$myBoardID?>" onclick="alert('정말 삭제하시겠습니까?')">삭제하기</a>
                    <a href="board.php">목록보기</a>
                </div>
            </div>



        </section>
        <!-- board -->
    </main>

    <?php include "../include/footer.php" ;?>
</body>
</html>