<?php 
    $host = "localhost";
    $user = "tus1932";
    $pw = "chltjsghk1932#";
    $db = "tus1932";

    $connect = new mysqli($host, $user, $pw, $db);
    $connect -> set_charset("utf8");

    if($connect -> connect_error){
        echo "connect falied" . $connect -> connect_error;
    }
?>