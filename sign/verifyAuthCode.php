<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $enteredCode = $_POST['enteredCode'];
    if (isset($_SESSION['authCode']) && $_SESSION['authCode'] == $enteredCode) {
        unset($_SESSION['authCode']);
        echo json_encode(['result' => 'success']);
    } else {
        echo json_encode(['result' => 'fail']);
    }
}
?>
