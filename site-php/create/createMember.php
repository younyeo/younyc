<?php
    include "../connect/connect.php";

    $sql = "CREATE table myMember(";
    $sql .= "myMemberID int(10) unsigned NOT NULL AUTO_INCREMENT,";
    $sql .= "youEmail varchar(40) NOT NULL,";
    $sql .= "youPass varchar(20) NOT NULL,";
    $sql .= "youName varchar(20) NOT NULL,";
    $sql .= "youBirth varchar(11) NOT NULL,";
    $sql .= "youPhone varchar(14) NOT NULL,";
    $sql .= "regTime int(14) NOT NULL,";
    $sql .= "PRIMARY KEY (myMemberID)) CHARSET=utf8;";

    $result = $connect -> query($sql);

    if($result) {
        echo "crate Table True";
    }else{
        echo "crate Table false";
    };

    // CREATE TABLE myMember(
    //     myMemberID int(10) unsigned NOT NULL AUTO_INCREMENT,
    //     youEmail varchar(40) NOT NULL,
    //     youPass varchar(20) NOT NULL,
    //     youName varchar(20) NOT NULL,
    //     youBirth varchar(11) NOT NULL,
    //     youPhone varchar(14) NOT NULL,
    //     regTime int(14) NOT NULL,
    //     PRIMARY KEY (myMemberID)) CHARSET=utf8;
?>