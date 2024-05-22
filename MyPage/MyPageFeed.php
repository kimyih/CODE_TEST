<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FEED</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        /* 팝업 스타일 */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 90%;
            max-width: 700px;
            background-color: white;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            border-radius: 20px;
            z-index: 1000;
            padding: 20px;
            box-sizing: border-box;
        }

        .popup-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
            position: relative;
        }

        .popup-header img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .popup-header p {
            flex-grow: 1;
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }

        .popup-header .close {
            font-size: 20px;
            cursor: pointer;
            position: absolute;
            right: 20px;
            top: 1px;
        }

        .upload-btn {
            position: absolute;
            right: 20px;
            top: 35px;
            padding: 5px 10px;
            background-color: #78E3D0;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .popup-body {
            padding: 20px;
            text-align: center;
        }

        .popup-body textarea {
            width: 100%;
            height: 100px;
            margin-top: 10px;
            border: none;
            border-radius: 10px;
            padding: 10px;
            resize: none;
            background-color: #fff;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .image-box {
            width: 100%;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            margin-top: 10px;
            border-radius: 10px;
            overflow: hidden;
            background-size: cover;
            background-position: center;
            cursor: pointer;
        }

        .image-box img {
            max-width: 100%;
            max-height: 100%;
            border-radius: 10px;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 500;
        }
    </style>
</head>
<!-- //head -->

<body>
    <?php include "../include/skip.php"; ?>
    <!-- //skip -->

    <header id="header" role="banner">
        <h1 class="logo">CODE PIN</h1>
        <?php if(isset($_SESSION['memberID'])){ ?>
            <div class="Profile">
                <div class="popup_Profile">
                    <div class="popup_Profile_top">
                        <img src="../assets/img/974e19416242ccb6755ce5e4878d4988.jpg" alt="유저 이미지">
                        <p>닉네임</p>
                    </div>
                    <div class="popup_Profile__line"></div>
                    <div class="popup_Profile_butm">
                        <div class="mycode">
                            <p>내 코드</p>
                            <img src="../assets/img/Vector.svg" alt="화살표">
                        </div>
                        <div class="setting">
                            <img src="../assets/img/setting.svg" alt="설정">
                            <p>설정</p>
                        </div>
                        <div class="logout">
                            <img src="../assets/img/logout.svg" alt="화살표">
                            <a href="../sign/signout.php">로그아웃</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>
    </header>
    <!-- //header -->
    <section class="layout_cotainer">
        <div class="feed_container">
            <div class="feed_contents">
                <div class="feed_head">
                    <div class="Mypage_tap">
                        <li><a href="../index.php"><button class="Mypage_code">코드</button></a></li>
                        <li><a href="#"><button class="Mypage_board">보드</button></a></li>
                        <li class="active"><a href="#"><button class="Mypage_feed">피드</button></a></li>
                    </div>
                </div>
                <!-- //feed_head -->
                <div class="feed_wirte_container">
                    <a class="feed_write" href="javascript:void(0)">
                        <button class="feed_wirte_btn" onclick="openPopup()">작성하기</button>
                    </a>
                    <!-- 팝업 HTML -->
                    <div class="overlay" id="overlay" onclick="closePopup()"></div>
                    <div class="popup" id="popup">
                        <div class="popup-header">
                            <img src="../assets/img/974e19416242ccb6755ce5e4878d4988.jpg" alt="유저 이미지">
                            <p>닉네임</p>
                            <span class="close" onclick="closePopup()">&times;</span>
                            <button class="upload-btn" onclick="uploadImage()">업로드</button>
                        </div>
                        <div class="popup-body">
                            <textarea placeholder="글씨 쓰는 곳"></textarea>
                            <div class="image-box" id="imageBox" style="background-image: url('../assets/img/board_ex3.webp');">
                                <input type="file" id="fileInput" style="display: none;" accept="image/*" onchange="previewImage(event)">
                                <span onclick="document.getElementById('fileInput').click();">코드 썸네일</span>
                            </div>
                        </div>
                    </div>
                    <div class="feed_list_container">
                        <div>
                            <div class="profile_container">
                                <a href="user_profile">
                                    <div class="profile_profile_container">
                                        <img src="/assets/img/eximg.png" alt="">
                                        <p class="profie_name">개발자</p>
                                    </div>
                                </a>
                            </div>
                            <!-- //profile_container -->

                            <div class="feed_desc_container">
                                <a href="">
                                    <p class="feed_desc_title">
                                        좋아보이는 코드가 있어서 공유합니다.
                                        함께 보는건 어떠세요? 굉장히 흥미롭습니다.
                                    </p>
                                </a>
                                <div class="feed_desc_img_container">
                                    <a class="feed_desc_img" href="">
                                        <img src="../assets/img/feedeximg.png" alt="">
                                    </a>
                                    <div class="feed_desc_scrap">
                                        <a class="feed_desc_scraplink" href="">
                                            <span>코드 보기</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="desc_line"></div>
                            </div>
                        </div>

                        <!-- 추가 피드 아이템들 -->

                    </div>
                    <!-- //feed_list_container -->
                    <div class="feed_pager_main">
                        <ul>
                            <li><a href="#"><img class="arrow_left" src="../assets/img/arrow_right.svg" alt="이전"></a>
                            </li>
                            <li><a href="#"><span>1</span></a></li>
                            <li><a href="#"><span>2</span></a></li>
                            <li><a href="#"><span>3</span></a></li>
                            <li><a href="#"><span>4</span></a></li>
                            <li><a href="#"><span>5</span></a></li>
                            <li><a href="#"><img class="arrow_right" src="../assets/img/arrow_right.svg" alt="다음"></a>
                            </li>
                        </ul>
                    </div>
                </div>
    </section>
    <!-- //conetents  -->

    <?php include "../include/footer.php"; ?>
    <!-- //footer -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
       // 팝업 기능을 위한 JavaScript
        function openPopup() {
            document.getElementById("popup").style.display = "block";
            document.getElementById("overlay").style.display = "block";
        }

        function closePopup() {
            document.getElementById("popup").style.display = "none";
            document.getElementById("overlay").style.display = "none";
            resetPopupContent();
        }
        
        // 이미지 업로드 로직 추가
        function uploadImage() {
            
            const imageBox = document.getElementById("imageBox");
            const image = document.createElement("img");
            image.src = "/path/to/your/image.jpg"; // 업로드된 이미지 경로로 변경
            imageBox.innerHTML = "";
            imageBox.appendChild(image);
        }

        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function () {
                const imageBox = document.getElementById("imageBox");
                imageBox.style.backgroundImage = `url(${reader.result})`;
                imageBox.innerHTML = ''; // Remove the "코드 썸네일" text
            };
            reader.readAsDataURL(file);
        }

        function resetPopupContent() {
            // 팝업창 내용 초기화
            const textarea = document.querySelector('.popup-body textarea');
            textarea.value = '';

            const imageBox = document.getElementById("imageBox");
            imageBox.style.backgroundImage = 'url("../assets/img/board_ex3.webp")';
            imageBox.innerHTML = '<span onclick="document.getElementById(\'fileInput\').click();">코드 썸네일</span>';

            const fileInput = document.getElementById('fileInput');
            fileInput.value = '';
        }
    </script>
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

            $('#urlForm').submit(function (event) {
                event.preventDefault(); // 페이지 새로고침 방지

                var url = $('#urlInput').val();
                var corsAnywhereUrl = 'http://miento.iptime.org:8801/get?url=';
                var allOriginsUrl = corsAnywhereUrl + encodeURI(url);

                $.ajax({
                    url: allOriginsUrl,
                    success: function (response) {
                        if (response.title && response.description && response.image_url) {

                            // 서버로 메타 데이터 전송
                            $.ajax({
                                url: 'get_data.php',
                                method: 'POST',
                                contentType: 'application/json',
                                data: JSON.stringify({
                                    title: response.title,
                                    description: response.description,
                                    image_url: response.image_url,
                                    url: url,
                                }),
                                success: function (data) {
                                    alert('데이터를 성공적으로 불러왔습니다.');
                                    location.reload();
                                },
                                error: function (xhr, status, error) {
                                    console.error(xhr, status, error);
                                    alert('데이터를 불러오는데 실패했습니다. 관리자에게 문의하세요');
                                }
                            });
                        } else {
                            console.log("error")
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr, status, error);
                    }
                });
            });
        });
        function openLink(url) {
            window.open(url, '_blank');
        }
    </script>
</body>

</html>
