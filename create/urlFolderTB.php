<?php
    include "../connect/connect.php";

    // 기존 테이블 삭제 (있을 경우)
    $sql = "DROP TABLE IF EXISTS urlFolderTB;";
    if ($connect->query($sql) === TRUE) {
        echo "Existing table urlFolderTB dropped successfully.<br>";
    } else {
        echo "Error dropping table: " . $connect->error . "<br>";
    }

    // 새로운 테이블 생성
    $sql = "CREATE TABLE urlFolderTB (";
    $sql .= "urlFolderID INT(10) UNSIGNED AUTO_INCREMENT,";
    $sql .= "userID VARCHAR(40) NOT NULL,";
    $sql .= "urlsID TEXT NOT NULL,";
    $sql .= "Title VARCHAR(255) NOT NULL,";
    $sql .= "youDelete TINYINT(1) DEFAULT 1,";
    $sql .= "youModTime INT(11) DEFAULT 0,";
    $sql .= "youRegTime INT(11) NOT NULL,";
    $sql .= "PRIMARY KEY (urlFolderID)";
    $sql .= ") DEFAULT CHARSET=utf8;";

    echo ($sql);

    if ($connect->query($sql) === TRUE) {
        echo "Table urlFolderTB created successfully";
    } else {
        echo "Error creating table: " . $connect->error;
    }

    $connect->close();
?>
