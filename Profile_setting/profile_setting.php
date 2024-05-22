<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>

<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>프로필 설정</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
    <?php include "../include/header.php"; ?>
    <!-- header -->
    
    <section class="setting_layout_cotainer">
        <div class="setting_max_container">
            <div class="page_container">
                <h1>설정</h1>
                <div class="setting_container">
                    <h2>프로필 설정</h2>
                    <div class="container_line"></div>
                    <div class="setting_profile_container">
                        <div class="setting_profile_input1">
                            <h3>프로필 사진</h3>
                            <div class="setting_profile_img">
                                <img src="../assets/img/eximg.png" alt="">
                            </div>
                        </div>
                        <div class="setting_profile_input2">
                            <h3>닉네임</h3>
                            <div class="setting_text_input_container">
                                <input class="setting_text_input" type="text">
                                <p class="setting_counter">0/12</p>
                            </div>
                        </div>
                        <div class="setting_profile_input3">
                            <h3>소개</h3>
                            <div class="setting_text_input_container">
                                <input class="setting_text_input2" type="text">
                                <p class="setting_counter">0/50</p>
                            </div>

                        </div>
                    </div>
                    <button class="setting_button">프로필 수정</button>
                </div>
            </div>
        </div>
    </section>
    <!-- //setting layout -->

    <?php include "../include/footer.php"; ?>
    <!-- footer -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            // .Profile 클릭 시 팝업 보이기
            $(".Profile").click(function (event) {
                $(".popup_Profile").show();
                event.stopPropagation();
            });

            // 팝업 외부 클릭 시 숨기기
            $(document).click(function () {
                $(".popup_Profile").hide();
            });

            // 팝업 내부 클릭 시 팝업 유지
            $(".popup_Profile").click(function (event) {
                event.stopPropagation();
            });

            // .mycode 클릭 시 링크 이동
            $(".mycode").click(function () {
                window.location.href = "../index.html";
            });

            // .logout 클릭 시 링크 이동
            $(".logout").click(function () {
                window.location.href = "/index2.html";
            });
        });
    </script>
</body>

</html>