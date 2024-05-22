<?php
    include "../connect/connect.php";

    $sql = "CREATE TABLE urlTB (";
    $sql .= "urlID INT(10) UNSIGNED AUTO_INCREMENT,";
    $sql .= "userID VARCHAR(40) NOT NULL,";
    $sql .= "urlLink VARCHAR(255) NOT NULL,";
    $sql .= "urlTitle VARCHAR(255) NOT NULL,";
    $sql .= "urlImg VARCHAR(255) NOT NULL,";
    $sql .= "urlDescription VARCHAR(255) NOT NULL,";
    $sql .= "urlUserTitle VARCHAR(255) NULL,";
    $sql .= "urlUserDescription VARCHAR(255) NULL,";
    $sql .= "youDelete INT(10) DEFAULT 1,";
    $sql .= "youModTime INT(11) DEFAULT 0,";
    $sql .= "youRegTime INT(11) NOT NULL,";
    $sql .= "PRIMARY KEY(urlID)";  // 유일한 기본 키는 urlID입니다
    $sql .= ") DEFAULT CHARSET=utf8;";

    if ($connect->query($sql) === TRUE) {
        echo "Table urlTB created successfully";
    } else {
        echo "Error creating table: " . $connect->error;
    }

    $connect->close();
?>
