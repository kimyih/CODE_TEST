<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE members(";
    $sql .= "memberID int(10) UNSIGNED AUTO_INCREMENT,";
    $sql .= "youID varchar(40) NOT NULL UNIQUE,";
    $sql .= "youName varchar(40) NOT NULL,";
    $sql .= "youEmail varchar(40) NOT NULL,";
    $sql .= "youPass varchar(255) NOT NULL,";
    $sql .= "youQuizAnswer varchar(255) NOT NULL,";
    $sql .= "youImgSrc varchar(100) DEFAULT 'default',";
    $sql .= "youImgSize varchar(255) DEFAULT 0,";
    $sql .= "youDelete int(10) DEFAULT '1',";
    $sql .= "youModTime int(11) DEFAULT 0,";
    $sql .= "youRegTime int(11) NOT NULL,";
    $sql .= "PRIMARY KEY(memberID)";
    $sql .= ") DEFAULT CHARSET=utf8";

    $connect -> query($sql);
?>