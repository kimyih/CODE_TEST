<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>아이디 찾기</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/signID.css">
</head>


<body>
    <header id="header" role="banner">
        <h1 class="logo">CODE PIN</h1>
        <div class="Profile">
            <div class="popup_Profile">
                <div class="popup_Profile_top">
                    <img src="assets/img/974e19416242ccb6755ce5e4878d4988.jpg" alt="유저 이미지">
                    <p>닉네임</p>
                </div>
                <div class="popup_Profile__line"></div>
                <div class="popup_Profile_butm">
                    <div class="mycode">
                        <p>내 코드</p>
                        <img src="assets/img/Vector.svg" alt="화살표">
                    </div>
                    <div class="setting">
                        <img src="assets/img/setting.svg" alt="설정">
                        <p>설정</p>
                    </div>
                    <div class="logout">
                        <img src="assets/img/logout.svg" alt="화살표">
                        <p>로그아웃</p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header -->

    <main class="myidfind">
        <div class="main__inner" onclick="InputEvent()" onkeydown="InputEvent()">
            <div class="main_container">
                <div class="idfind_title">
                    <h1>내 계정 비밀번호 찾기</h1>
                </div>
                <div class="idfind_contents">
                    <p class="text_guide">내 계정 비밀번호를 복구하려면 이메일을 입력하세요.</p>
                </div>
                <div class="idfind_forms">
                    <form name="findform">
                        <fieldset role="form">
                            <legend></legend>
                            <div class="one_input_container">
                                <label for="recoveryld">아이디</label>
                                <input name="recoveryId" id="recoveryId" type="text" maxlength="100" autocomplete="off"
                                    required="required">
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="idfind_forms">
                    <form name="findform">
                        <fieldset role="form">
                            <legend></legend>
                            <div class="one_input_container">
                                <label for="recoveryld">복구용 이메일</label>
                                <input name="recoveryId" id="recoveryId" type="text" maxlength="100" autocomplete="off"
                                    required="required">
                                <div class="findform_error_msg" ng-messages="findform_error">
                                    <div ngmessage="required" class="error_msg">유효한 이메일 주소를 입력해주세요.</div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="under_container">
                    <div class="one_btn_container">
                        <button class="findid_btn" type="button" disabled="disabled">계속</button>
                    </div>
                    <div class="under_menu">
                        <ul>
                            <li><a href="sign.php">로그인 하기</a></li>
                            <li><a href="signID.php">아이디 찾기</a></li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <footer id="footer" role="contentinfo">
        <div class="container">
            <div class="footer__inner">
                <div class="left">
                    <span>문의 : <a href="mailto:wlsakf23@gmail.com" class="maill">wlsakf23@gmail.com</a>,
                        <a href="mailto:kjw040416@gmail.com" class="maill">kjw040416@gmail.com</a>, <a
                            href="mailto:liarusen@gmail.com" class="maill">liarusen@gmail.com</a></span>
                    <p>Copyright © WEBS Corp. All Rights Reserved.</p>
                </div>
                <div class="right">
                    <ul>
                        <li><a href="https://github.com/kimyih">김이현</a></li>
                        <li><a href="https://github.com/KIMJW04">김진우</a></li>
                        <li><a href="https://github.com/sunhew">최선화</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer -->

</body>

</html>