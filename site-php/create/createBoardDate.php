<?php
    include "../connect/connect.php";

    for ($i=1; $i<=100; $i++) {
        $regTime = time();

        $sql = "INSERT INTO myBoard99(myMemberID, boardTitle, boardContent, boardView, regTime) VALUES('4', '게시판 제목입니다.${i}', '게시글 ${i}번째 내용입니다.', '1', '$regTime')";
        
        $result = $connect -> query($sql);

        echo $result;

        if($result) {
            echo "true";
        } else {
            echo "false";
        }
    }
?>