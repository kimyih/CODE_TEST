<?php
    include "../connect/connect.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ID = $connect->real_escape_string($_POST['signUpYouID']);
        $Email = $connect->real_escape_string($_POST['signUpyouEmail']);
        $Pass = $connect->real_escape_string($_POST['signUpYouPass']);
        $Quiz = $connect->real_escape_string($_POST['signUpYouQuiz']);
        $Name = $connect->real_escape_string($_POST['signUpYouName']);
        $Time = time();

        // 비밀번호 해시화
        $hashedPass = password_hash($Pass, PASSWORD_DEFAULT);

        // Prepare and bind
        $stmt = $connect->prepare("INSERT INTO members (youID, youName, youEmail, youPass, youQuizAnswer, youRegTime) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die('prepare() failed: ' . htmlspecialchars($connect->error));
        }

        $bind = $stmt->bind_param("sssssi", $ID, $Name, $Email, $hashedPass, $Quiz, $Time);
        if ($bind === false) {
            die('bind_param() failed: ' . htmlspecialchars($stmt->error));
        }

        // Execute statement
        $exec = $stmt->execute();
        if ($exec === false) {
            die('execute() failed: ' . htmlspecialchars($stmt->error));
        }

        // Close statement
        $stmt->close();

        // Close connection
        $connect->close();

        echo "<script>window.location.href='../index.php';</script>";
    } else {
        die('Invalid request method');
        echo "<script>window.location.href='../index.php';</script>";
    }
?>
