<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- style -->
    <link rel="stylesheet" href="../assets/css/fonts.css">
    <link rel="stylesheet" href="../assets/css/var.css">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<header id="header">  
        <h1><a href="../pages/main.php">php <em>class</em></a></h1>
        <nav>
            <h2 class="ir_so">메인 메뉴</h2>
            <ul>
                <li><a href="#">댓글</a></li>
                <li><a href="#">회원가입</a></li>
                <li><a href="#">로그인</a></li>
                <li><a href="#">게시판</a></li>
                <li><a href="#">블로그</a></li>
            </ul>
        </nav>
        <div class="member">
            <strong class="ir_so">회원 정보 영역</strong>
            <a href="../login/login.php">로그인</a>
            <a href="../login/join.php">회원가입</a>
        </div>
    </header>
    <!-- //header -->

    <div id="skip">
        <a href="#contents">회원가입 바로가기</a>
        <a href="#footer">푸터 바로가기</a>
    </div>
    <!-- //skip -->

    <main id="contents">
        <section id="mainCont" class="gray">
            <h2 class="ir_so">회원가입 컨텐츠</h2>
            <article class="content-article">
                <div class="member-form">
                    <h3>안내</h3>
<?php
    include "../connect/connect.php";
    $youEmail = $_POST['youEmail'];
    $youPass = $_POST['youPass'];
    $youPassC = $_POST['youPassC'];
    $youName = $_POST['youName'];
    $youBirth = $_POST['youBirth'];
    $youPhone = $_POST['youPhone'];
    $regTime = time();
    //echo $youEmail, $youPass, $youPassC, $youName, $youBirth, $youPhone;
    // $sql = "INSERT INTO myMember99(youEmail, youPass, youName, youBirth, youPhone, regTime) 
    // VALUES('$youEmail', '$youPass', '$youName', '$youBirth', '$youPhone', '$regTime')";
    // $result = $connect -> query($sql);
    // if( $result ){
    //     echo "INSERT INTO ture";
    // } else {
    //     echo "INSERT INTO false";
    // }
    //메세지 출력
    function msg($alert){
        echo "<p class='alert'>{$alert}</p>";
    }
    //유효성 검사
    //이메일 검사 : 정규식 표현
    // $check_email = preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $youEmail);
    // if( $check_email == false ){
    //     echo "이메일이 잘못되었습니다. <br> 올바른 이메일을 적어주세요!!";
    // }
    //이메일 검사 : 내장 함수
    //var_dump(filter_var('webnaver.com', FILTER_VALIDATE_EMAIL));
    $check_email = filter_var($youEmail, FILTER_VALIDATE_EMAIL);
    if( $check_email == false ){
        msg("이메일이 잘못되었습니다. <br> 올바른 이메일을 적어주세요!!");
        exit;
    }
    //비밀번호 검사
    if( $youPass !== $youPassC ){
        msg("비밀번호가 일치하지 않습니다. <br> 다시 한번 확인해주세요!");
        exit;
    }
  

    //공백검사
    if( $youPass == null || $youPass == ''){
        msg("비밀번호를 입력해주세요!!");
        exit;
    }

    if( $youPassC == null || $youPassC == ''){
        msg("비밀번호 확인을 입력해주세요!!");
        exit;
    }

    if( $youName == null || $youName == ''){
        msg("이름을 입력해주세요!!");
        exit;
    }

    if( $youBirth == null || $youBirth == ''){
        msg("생년월일을 입력해주세요!!");
        exit;
    }

    if( $youPhone == null || $youPhone == ''){
        msg("연락처를 입력해주세요!!");
        exit;
    }


    //비밀번호 암호화
    //$youPass = sha1($youPass);
    //이름 검사
    $check_name = preg_match("/^[가-힣]{1,}$/", $youName);
    if( $check_name == false ){
        msg("이름이 정확하지 않습니다. <br> 한글로만 적어주세요!");
        exit;
    }
    //생년월일 검사
    $check_birth = preg_match("/^(19[0-9][0-9]|20\d{2})-(0[0-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $youBirth);
    if( $check_birth == false ){
        msg("생년월일이 정확하지 않습니다. <br> 올바른 생년월일(YYYY-MM-DD)을 적어주세요!");
        exit;
    }
    //휴대폰 번호 검사
    $check_number = preg_match("/^(010|011|016|017|018|019)-[0-9]{3,4}-[0-9]{4}$/", $youPhone);
    if( $check_number == false ){
        msg("번호가 정확하지 않습니다. <br> 올바른 번호(000-0000-0000)를 적어주세요!");
        exit;
    }


    //데이터 가져오기 -> 유효성 검사 -> 중복 검사 -> 회원가입
    //중복검사 -> 이메일, 핸드폰 

    //이메일 중복 검사
    $isEmailCheck = false;

    $sql = "SELECT youEmail FROM myMember WHERE youEmail = '$youEmail'";
    $result = $connect -> query($sql);

    if( $result ){
        $count = $result -> num_rows;

        if( $count == 0 ) {
    $isEmailCheck = true;

            //회원가입
        }else{
            msg("이미 회원가입이 되어있는 아이디입니다. 로그인을 시도해주세요.");
            exit;
        }
    } else {
        msg("에러발생01 - 관리자에게 문의해주세요.");
        exit;
    }

    //핸드폰 중복 검사
    $isPhoneCheck = false;
    $sql = "SELECT youPhone FROM myMember WHERE youPhone = '$youPhone'";
    $result = $connect -> query($sql);

    if( $result ){
        $count = $result -> num_rows;
        
        if( $count == 0 ) {
            $isPhoneCheck = true;
            //회원가입
        }else{
            msg("이미 회원가입이 되어있는 전화번호입니다. 로그인을 시도해주세요.");
            exit;
        }
    } else {
        msg("에러발생02 - 관리자에게 문의해주세요.");
        exit;
    }
    

    //회원가입을 시켜줘야한다.

    if($isEmailCheck = true && $isPhoneCheck =true ){
        $sql = "INSERT INTO myMember(youEmail, youPass, youName, youBirth, youPhone, regTime)
        VALUES('$youEmail', '$youPass', '$youName', '$youBirth', '$youPhone', '$regTime')";
        
        $result = $connect -> query($sql);

        if($result){
            msg("회원가입을 축하합니다. 로그인을 해주세요.");
        } else {
            msg("에러발생03 - 관리자에게 문의하세요!");
            exit;
        }
    }else{
        msg("이메일 또는 핸드폰 번호가 틀립니다. 다시한번 확인해주세요.");
        exit;
    }
?>
                </div>
            </article>
        </section>
    </main>

    <footer id="footer">
        <?php
            include "../include/footer.php";
        ?>
    </footer>
    <!-- //footer -->
</body>
</html>