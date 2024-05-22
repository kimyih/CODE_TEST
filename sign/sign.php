<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN</title>
    <link rel="stylesheet" href="../assets/css/signin.css">
    <style>
        .form-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    <div class="header-container">
        <header id="header" role="banner">
            <h1 class="logo"><a href="../index.php">CODE PIN</a></h1>
        </header>
    </div>
    <div class="main-content">
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form action="signup.php" name="signup" method="post" onsubmit="return signupChecks()">
                    <div>
                        <label for="signUpYouID" class="required">아이디</label>
                        <div class="check">
                            <input type="text" name="signUpYouID" id="signUpYouID" placeholder="아이디를 적어주세요!"
                                autocomplete="off" class="input-style">
                            <div class="btn" onclick="IDChecking()">중복검사</div>
                        </div>
                        <p class="msg" id="youIDComment"></p>
                    </div>
                    <div>
                        <label for="signUpYouEmail" class="required">이메일</label>
                        <div class="check">
                            <input type="text" name="signUpyouEmail" id="signUpyouEmail" placeholder="이메일을 적어주세요!"
                                autocomplete="off" class="input-style">
                            <div class="btn" onclick="EmailChecking()">중복검사</div>
                        </div>
                        <p class="msg" id="youEmailComment"></p>
                    </div>
                    <div>
                        <label for="signUpYouPass" class="required">비밀번호</label>
                        <input type="password" name="signUpYouPass" id="signUpYouPass" placeholder="비밀번호를 적어주세요!"
                            autocomplete="off" class="input-style">
                        <p class="msg" id="youPassComment"></p>
                    </div>
                    <div>
                        <label for="signUpYouPassC" class="required">비밀번호 확인</label>
                        <input type="password" name="signUpYouPassC" id="signUpYouPassC" placeholder="다시 한번 비밀번호를 적어주세요!"
                            autocomplete="off" class="input-style">
                        <p class="msg" id="youPassCComment"></p>
                    </div>
                    <div>
                        <label for="signUpYouName" class="required">닉네임</label>
                        <input type="text" name="signUpYouName" id="signUpYouName" placeholder="닉네임을 적어주세요!"
                            autocomplete="off" class="input-style">
                        <p class="msg" id="youNameComment"></p>
                    </div>
                    <button type="submit">Sign Up</button>
                </form>
            </div>
            <!-- Sign In -->
            <div class="form-container sign-in-container">
                <form action="signin_save.php" name="signinSave" method="post">
                    <h2>Sign in</h2>
                    <div>
                        <label for="signInYouID" class="required">아이디</label>
                        <div class="check">
                            <input type="text" name="signInYouID" id="signInYouID" placeholder="아이디를 적어주세요!" autocomplete="off"
                                class="input-style" required>
                        </div>
                        <p class="msg"></p>
                    </div>
                    <div>
                        <label for="signInYouPass" class="required">비밀번호</label>
                        <div class="check">
                            <input type="password" name="signInYouPass" id="signInYouPass" placeholder="비밀번호를 적어주세요!" autocomplete="off"
                            class="input-style" required>
                        </div>
                        <p class="msg"></p>
                    </div>
                    <button>Sign In</button>
                    <a href="signID.php">아이디 찾기</a>
                    <a href="signpassword.php">비밀번호 찾기</a>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h2>Welcome<br> Sign Up!</h2>
                        <button class="ghost" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h2>Welcome Back!</h2>
                        <button class="ghost" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer id="footer" rolde="conentinfo">
        <div class="footer_container">
            <div class="footer__Inner">
                <div class="left">
                    <ul>
                        <li>고객센터
                            <ul>
                                <li><a href="#">공지사항</a></li>
                                <li><a href="#">문의하기</a></li>
                            </ul>
                        </li>
                        <li>팀원
                            <ul>
                                <li>김이현</li>
                                <li>김진우</li>
                                <li>최선화</li>
                            </ul>
                        </li>
                        <li>문의 이메일
                            <ul>
                                <li><a href="mailto:wlsakf23@gmail.com">wlsakf23@gmail.com</a></li>
                                <li><a href="mailto:kjw040416@gmail.com">kjw040416@gmail.com</a></li>
                                <li><a href="mailto:liarusen@gmail.com">liarusen@gmail.com</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="right">
                    <div class="sns">
                        <ul>
                            <li>
                                <a href="#">
                                    <span class="blind"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="blind"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="blind"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer__bot">
                <div class="left_bot">
                    <p class="copy">COPYRIGHT © WayRunMeaning. All Rights Reserved.</p>
                </div>
                <div class="right_bot">
                    <ul>
                        <li>
                            <a href="#">이용약관</a>
                        </li>
                        <li>
                            <a href="#">개인정보처리방침</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () =>
            container.classList.add('right-panel-active'));

        signInButton.addEventListener('click', () =>
            container.classList.remove('right-panel-active'));
    </script>
    <script>
        let isIdCheck = false;
        let isEmailCheck = false;

        function IDChecking(){
            // 아이디 검사
            let youID = $("#signUpYouID").val();

            if(youID == null || youID == ''){
                $("#youIDComment").text("➟ 아이디를 입력해주세요!");
                $("#signUpYouID").focus();
                return false;
            } else {
                // 아이디 유효성 검사
                let getYouID = RegExp(/^[a-zA-Z0-9]{4,20}$/);

                if(!getYouID.test( $("#signUpYouID").val())){
                    $("#youIDComment").text("➟ 아이디는 영어 또는 숫자를 포함하여 4~20글자 이내로 작성이 가능합니다.");
                    $("#signUpYouID").val('');
                    $("#signUpYouID").focus();
                    return false;
                } else{
                    $.ajax({
                        type: "POST",
                        url: "signupCheck.php",
                        data: {"youID": youID, "type": "isIdCheck"},
                        dataType: "json",
                        success: function(data){
                            if(data.result == "good") {
                                $("#youIDComment").text("➟ 사용 가능한 아이디입니다.");
                                isIdCheck = true;
                            } else {
                                $("#youIDComment").text("➟ 이미 존재하는 아이디입니다.");
                                isIdCheck = false;
                            }
                        }
                    })
                }
            }
        }

        function EmailChecking(){
            // 이메일 검사
            let youEmail = $("#signUpyouEmail").val();
            if(youEmail == null || youEmail == ''){
                $("#youEmailComment").text("➟ 이메일를 입력해주세요!");
                $("#signUpyouEmail").focus();
                return false;
            }else{
                let getYouEmail = RegExp(/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([\-.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,30}$/i);

                if(!getYouEmail.test($("#signUpyouEmail").val())){
                    $("#youEmailComment").text("➟ 올바른 이메일 주소를 입력해주세요");
                    $("#signUpyouEmail").val('')
                    $("#signUpyouEmail").focus();
                    return false;
                } else{
                    $.ajax({
                        type: "POST",
                        url: "signupCheck.php",
                        data: {"youEmail": youEmail, "type": "isEmailCheck"},
                        dataType: "json",
                        success: function(data){
                            if(data.result == "good") {
                                $("#youEmailComment").text("➟ 사용 가능한 이메일입니다.");
                                isEmailCheck = true;
                            } else {
                                $("#youEmailComment").text("➟ 이미 존재하는 이메일입니다.");
                                isEmailCheck = false;
                            }
                        }
                    })
                }
            }
        }

        function signupChecks(){
            // 메세지 초기화
            $(".msg").text("");

            // 비밀번호 검사
            let youPass = $("#signUpYouPass").val();
            if(youPass == null || youPass == ''){
                $("#youPassComment").text("➟ 비밀번호를 입력해주세요!");
                $("#signUpYouPass").focus();
                return false;
            } else{
                let getYouPass = $("#signUpYouPass").val();
                let getYouPassNum = getYouPass.search(/[0-9]/g);
                let getYouPassEng = getYouPass.search(/[a-z]/ig);
                let getYouPassSpe = getYouPass.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);

                if(getYouPass.length < 8 || getYouPass.length > 20){
                    $("#youPassComment").text("➟ 8자리 ~ 20자리 이내로 입력해주세요");
                    return false;
                } else if (getYouPass.search(/\s/) != -1){
                    $("#youPassComment").text("➟ 비밀번호는 공백없이 입력해주세요!");
                    return false;
                } else if (getYouPassNum < 0 || getYouPassEng < 0 || getYouPassSpe < 0 ){
                    $("#youPassComment").text("➟ 영문, 숫자, 특수문자를 혼합하여 입력해주세요!");
                    return false;
                } else {
                    $("#youPassComment").text(""); // 기존 오류 메시지 제거
                }
            }

            // 비밀번호확인 검사
            let youPassC = $("#signUpYouPassC").val();
            if(youPassC == null || youPassC == ''){
                $("#youPassCComment").text("➟ 비밀번호를 입력해주세요!");
                $("#signUpYouPassC").focus();
                return false;
            }

            // 비밀번호 동일한지 체크
            if($("#signUpYouPass").val() !== $("#signUpYouPassC").val()){
                $("#youPassCComment").text("➟ 비밀번호가 일치하지 않습니다.");
                $("#signUpYouPassC").focus();
                return false;
            } else {
                $("#youPassCComment").text(""); // 기존 오류 메시지 제거
            }

            // 이름 검사
            let youName = $("#signUpYouName").val();
            if(youName == null || youName == ''){
                $("#youNameComment").text("➟ 이름을 입력해주세요!");
                $("#signUpYouName").focus();
                return false;
            } else {
                let getYouName = RegExp(/^[가-힣]{3,5}$/);

                if(!getYouName.test($("#signUpYouName").val())){
                    $("#youNameComment").text("➟ 이름은 한글(3~5글자)만 사용할 수 있습니다.");
                    $("#signUpYouName").val('');
                    $("#signUpYouName").focus();
                    return false;
                } else {
                    $("#youNameComment").text(""); // 기존 오류 메시지 제거
                }
            }

            if(!isIdCheck || !isEmailCheck){
                alert("중복 확인을 먼저 진행해주세요!");
                return false;
            } else {
                alert("가입을 축합니다!");
            }
        }
    </script>
</body>

</html>
