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
    <title>댓글</title>

    <!-- style -->
    <link rel="stylesheet" href="../assets/css/fonts.css">
    <link rel="stylesheet" href="../assets/css/var.css">
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

    <div id="skip">
        <a href="#contents">컨텐츠 바로가기</a>
        <a href="#footer">푸터 바로가기</a>
    </div>
    <!-- //skip -->
    
    <header id="header">  
        <?php
            include "../include/header.php";
        ?>
    </header>
    <!-- //header -->

    <main id="contents">
        <section id="mainCont">
            <h2 class="ir_so">메인 컨텐츠</h2>
            <div class="content-article">
            <!-- cardType01 -->
            <section class="cardType">
                    <div class="cardType01">
                        <h2>여찬이의 포트폴리오</h2>
                        <p>여찬이의 20살 부터 30살까지의 인생 포트폴리오입니다. 살아온 모든 과정을 담은 포트폴리오로 궁금한 사항이
                            있으시다면 언제든지 연락주신다면 성심성의껏 답변드리겠습니다. E-Mail : ducks0413@naver.com</p>
                        <div class="card-wrap">
                            <div class="card">
                                <a href="#">
                                    <img src="../assets/img/card01.jpg" alt="포트폴리오 관련 이미지입니다." class="card-img">

                                    <strong class="card-title">인테리어 디자이너</strong>
                                    <span class="card-desc">실내건축디자인과 졸업 후 인테리어 회사에 취업하여 설계, 시공 기사로 근무함.</span>
                                    <span class="card-keyword">
                                        <span>#실내건축기사</span>
                                        <span>#실내건축디자이너</span>
                                        <span>#디자이너</span>
                                    </span>
                                </a>
                            </div>
                            <div class="card">
                                <a href="#">
                                    <img src="../assets/img/card02.jpg" alt="포트폴리오 관련 이미지입니다." class="card-img">

                                    <strong class="card-title">기획자</strong>
                                    <span class="card-desc">건설 현장에서 만난 IT 사장님의 사업 제안으로 같이 어플리케이션을 출시해보다.</span>
                                    <span class="card-keyword">
                                        <span>#AViewer</span>
                                        <span>#도면관리시스템</span>
                                        <span>#건설 현장 맞춤 기획</span>
                                    </span>
                                </a>
                            </div>
                            <div class="card">
                                <a href="#">
                                    <img src="../assets/img/card03.jpg" alt="포트폴리오 관련 이미지입니다." class="card-img">

                                    <strong class="card-title">앱 개발자</strong>
                                    <span class="card-desc">기획자로 재직중 안된다는게 많은 개발자들의 태도에 개발자로 전향하다.</span>
                                    <span class="card-keyword">
                                        <span>#안되면되게하라</span>
                                        <span>#될때까지한다.</span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- cardType01 -->
            <article class="flow-article">
                <h3 class="ir_so">포트폴리오 문의하기</h3>
                <section id="comment"class="section-comment">
                    <h4>면접 문의하기</h4>
                    <h4>제가 필요하신 분들은 댓글로 알려주시면 답변을 드리겠습니다.</h4>
                    <div class="comment-form">
                        <form action="commentSave.php" method="post" name="comment">
                            <fieldset>
                                <legend class="ir_so">댓글 영역</legend>
                                <div class="comment-wrap">
                                    <div>
                                        <label for="youName" class="ir_so">이름</label>
                                        <input type="text" name="youName" id="youName" class="input_write2" placeHolder="이름" autocomplete="off" maxlength="10" required>
                                    </div>
                                    <div>
                                        <label for="youText" class="ir_so">휴대 전화 번호</label>
                                        <input type="text" name="youText" id="youText" class="input_write2 w100" placeHolder="휴대전화 번호를 적어주세요." autocomplete="off" required>
                                    </div>
                                    <button class="btn_submit2" type="submit" value="문의하기">전송</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                    <div class="comment-list">
                        <?php
                            include "../connect/connect.php";

                            $sql = "SELECT * FROM myComment LIMIT 10";
                            $result = $connect -> query($sql);

                            // echo "<pre>";
                            // var_dump(mysqli_fetch_array($result))
                            // echo "</pre>";

                            while($info = mysqli_fetch_array($result)){
                    ?>
                                <div>
                                    <p><?=$info['youText']?></p>
                                    <div>
                                        <img src="http://younyc.dothome.co.kr/class/img/img12.jpg" alt="신청자">
                                        <span><?=$info['youName']?></span>
                                        <span><?=date('Y-m-d H:i', $info['regTime'])?></span>
                                    </div>
                                </div>
                        <?php
                            }
                        ?>
                    </div>
                </section>
            </article>
                
    </main>
    <!-- //contents -->

    <footer id="footer">
        <?php
            include "../include/footer.php";
        ?>
    </footer>
    <!-- //footer -->
</body>
</html>