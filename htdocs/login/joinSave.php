<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
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
        <section id="banner">
            <h2>회원가입 페이지입니다.</h2>
            <div class="banner__inner2 container">
                <div class="img">
                    <img src="../html/assets/IMG/Rocket launch.svg" alt="배너 이미지">
                </div>
                <div class="desc">
                    어떤 일이라도 <em>노력</em>하고 즐기면 그 결과는 빛을 바란다고 생각합니다. <br>
                    신입의 <em>열정</em>과 <em>도전정신</em>을 깊숙히 새기며 <em>배움</em>에 있어 <em>겸손함</em>을
                    유지하며 세부적인 곳까지 파고드는 <em>개발자</em>가 되겠습니다. <br>
<?php
    include "../connect/connect.php";

    $youEmail = $_POST ['youEmail'];
    $youName = $_POST ['youName'];
    $youPass = $_POST ['youPass'];
    $youPassC = $_POST ['youPassC'];
    $youNickName = $_POST ['youNickName'];
    $youPhone = $_POST ['youPhone'];
    $regTime = time();
    //확인
    // echo $youEmail;
    // echo $youName;
    // echo $youPass;
    // echo $youNickName;
    // echo $youPhone;
    // echo $regTime;

    // $sql = "INSERT INTO myMember(youEmail, youName, youPass, youNickName, youPhone, regTime) VALUES('$youEmail','$youName','$youPass','$youNickName','$youPhone', '$regTime' );";

    // $result = $connect -> query($sql);
    // if($result){
    //     echo "INSERT INTO TRUE";
    // } else {
    //     echo "INSERT INTO FALSE";
    // }


    //데이터 가져오기 --> 유효성 검사 --> 데이터 중복검사(데이터 존재 유무 판단) --> 없으면 회원가입 완료
    //데이터 가져오기 --> 유효성 검사 --> 데이터 중복검사(데이터 존재 유무 판단) --> 있으면 로그인


    // 메세지 출력
    function msg($alert) {
        echo "<p class='alert'>{$alert}</p>";
    };

    //mail유효성 검사(php내장함수) 
    // $checkEmail = filter_var($youEmail, FILTER_VALIDATE_EMAIL);

    // if($checkEmail == false) {
    //     msg("이메일이 잘못되었습니다. 잘좀 적어봐요!");
    //     exit;
    // }

    //메일 유효성 검사(정규식 표현)
    $checkEmail = preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $youEmail);
     if($checkEmail == false) {
        msg("이메일이 잘못되었습니다. 잘좀 적어봐요!");
        exit;
    }

    //비밀번호 검사
    if($youPass !== $youPassC) {
        msg("비밀번호가 일치하지 않습니다. <br> 정신차리고 다시 입력해봐요!");
        exit;
    }

    //비밀번호 암호화
    // $youPass = sha1($youPass);

    //이름 검사
    $checkName = preg_match("/^[가-힣]{1,}$/", $youName);

    if($checkName == false) {
        msg("이름이 정확하지 않습니다. <br> 지 이름도 몰라요?");
        exit;
    }
    //휴대폰번호 검사
    $checkNumber = preg_match("/^(010|011|016|017|018|019)-[0-9]{3,4}-[0-9]{4}$/", $youPhone);
    if($checkNumber == false) {
        msg("번호가 정확하지 않습니다. <br> 올바른 핸드폰 번호(000-0000-0000)형식으로 적어주세요");
        exit;
    }

    // 닉네임 검사
    $checkNickName = preg_match("/^[가-힣]{1,}$/", $youName);
    //이메일 중복 검사
    $isEmailCheck = false;

    $sql = "SELECT youEmail FROM myMember WHERE youEmail = '$youEmail'";
    $result = $connect -> query($sql);

    if($result){
        $count = $result -> num_rows;//변수가 있는지 확인

        if($count == 0) {
            //회원가입
            $isEmailCheck = true;
        } else {
            //로그인 유도
            msg("이미 아이디가 존재합니다.");
            exit;
        }
    } else {
        msg("에러발생 - 방법이 없어요");
        exit; //작업을 끝냄
    }

    //핸드폰 번호 중복검사
    $isPhoneCheck = false;
    $sql = "SELECT youPhone FROM myMember WHERE youPhone = '$youPhone'";

    $result = $connect -> query($sql);

    if($result){
        $count = $result -> num_rows;//변수가 있는지 확인

        if($count == 0) {
            //회원가입
            $isPhoneCheck = true;
        } else {
            //로그인 유도
            msg("이미 아이디가 존재합니다.");
            exit;
        }
    } else {
        msg("에러발생 - 방법이 없어요");
        exit; //작업을 끝냄
    }


    //회원가입
    if ( $isEmailCheck == true && $isPhoneCheck == true) {
        $sql = "INSERT INTO myMember(youEmail, youName, youPass, youNickName, youPhone, regTime) VALUES('$youEmail','$youName','$youPass','$youNickName','$youPhone', '$regTime' );";
        $result = $connect -> query($sql);


        if($result) {
           msg("회원가입을 축하합니다.!!!!!!<br> <a href='../main/main.php'>메인으로 이동하기</a>");
           exit;
        } else {
           msg("에러발생2 - 방법이 없다니까요..");
           exit;
        }
    } else {
        msg("이메일 또는 핸드폰 번호가 틀립니다 다시 확인해주세요!");
        exit;
    }

?>
</div>
                </div>
            </div>
        </section>
    </main>
    
</body>
</html>
