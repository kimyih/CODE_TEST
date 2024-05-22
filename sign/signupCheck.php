<?php
    include "../connect/connect.php";

    $type = $_POST['type'];
    $jsonResult = "bad";

    if( $type == "isIdCheck" ) {
        $youID = $connect -> real_escape_string(trim($_POST['youID']));
        $sql = "SELECT youID FROM members WHERE youID = '{$youID}'";
    };

    if( $type == "isEmailCheck" ) {
        $youEmail = $connect -> real_escape_string(trim($_POST['youEmail']));
        $sql = "SELECT youEmail FROM members WHERE youEmail = '{$youEmail}'";
    };

    $result = $connect -> query($sql);

    if($result -> num_rows == 0){
        $jsonResult = "good";
    };

    echo json_encode(array("result" => $jsonResult));
?>