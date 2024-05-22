<?php
    include "connect/connect.php";
    include "connect/session.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $data = json_decode(file_get_contents("php://input"), true);

        if (isset($data['title']) && isset($data['description']) && isset($data['image_url']) && isset($_SESSION['memberID'])) {
            $userID = $connect->real_escape_string($_SESSION['memberID']);
            $title = $connect->real_escape_string($data['title']);
            $description = $connect->real_escape_string($data['description']);
            $image_url = $connect->real_escape_string($data['image_url']);
            $url = $connect->real_escape_string($data['url']);
            $Time = time();

            $stmt = $connect->prepare("INSERT INTO urlTB (userID, urlLink, urlTitle, urlImg, urlDescription, youRegTime) VALUES (?, ?, ?, ?, ?, ?)");
            if ($stmt === false) {
                die('prepare() failed: ' . htmlspecialchars($connect->error));
            }

            $time = time(); // 현재 시간을 타임스탬프로 저장
            $bind = $stmt->bind_param("sssssi", $userID, $url, $title, $image_url, $description, $Time);
            if ($bind === false) {
                die('bind_param() failed: ' . htmlspecialchars($stmt->error));
            }

            $exec = $stmt->execute();
            if ($exec === false) {
                die('execute() failed: ' . htmlspecialchars($stmt->error));
            }

            echo "New record created successfully";
            $stmt->close();
        } else {
            echo "Invalid input or not logged in";
        }

        $connect->close();
    } else {
        die('Invalid request method');
    }
?>
