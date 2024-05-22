<?php
session_start();
?>


<header id="header" role="banner">
<h1 class="logo">CODE PIN</h1>
<?php if(isset($_SESSION['memberID'])){ ?>
    <div class="Profile">
        <div class="popup_Profile">
            <div class="popup_Profile_top">
                <img src="assets/img/974e19416242ccb6755ce5e4878d4988.jpg" alt="유저 이미지">
                <p><?php echo htmlspecialchars($_SESSION['youName']); ?></p>
            </div>
            <div class="popup_Profile__line"></div>
            <div class="popup_Profile_butm">
                <div class="mycode">
                    <p>내 코드</p>
                    <img src="assets/img/Vector.svg" alt="화살표">
                </div>
                <a href=""></a><div class="setting">
                    <img src="assets/img/setting.svg" alt="설정">
                    <p>설정</p>
                </div>
                <div class="logout">
                    <img src="assets/img/logout.svg" alt="화살표">
                    <a href="../sign/signout.php">로그아웃</a>
                </div>
            </div>
        </div>
    </div>
<?php }?>
</header>