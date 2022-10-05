<?php
    include "../connect/connect.php"; //연결
    include "../connect/session.php"; //로그인 되어있는지 확인
    include "../connect/sessionCheck.php";  //경고창
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 사이트 만들기</title>

    <?php include "../include/link.php" ;?>
</head>

<body>
    <?php include "../include/header.php" ;?>
    <!-- header -->
    <div id="skip">
        <a href="#header">헤더 영역 바로가기</a>
        <a href="#main">컨텐츠 영역 바로가기</a>
        <a href="#footer">푸터 영역 바로가기</a>
    </div>
    <!-- skip -->
    <main id="main">
    <section id="board" class="container">
            <h2>게시판 영역입니다.</h2>
            <div class="board__inner">
                <div class="board__title">
                    <h3>게시판 글쓰기</h3>
                    <p>웹 디자이너, 웹 퍼블리셔, 프론트앤드 개발자를 위한 게시판입니다.</p>
                </div>
                <div class="board__write">
                    <form action="boardWriteSave.php" name="boardWrite" method="post">
                        <fieldset>
                            <legend>게시판 작성 영역</legend>
                            <div>
                                <label for="boardTitle">제목</label>
                                <input type="text" name="boardTitle" id="boardTitle">
                            </div>
                            <div>
                                <label for="boardContents">내용</label>
                                <textarea name="boardContents" id="boardContents" rows="20"></textarea>
                            </div>
                            <button type="submit" class="btn">저장하기</button>
                        </fieldset>
                    </form>
                </div>
            </div>    
    </section>
        <!-- join -->
    </main>

    <?php include "../include/footer.php" ;?>
</body>
</html>