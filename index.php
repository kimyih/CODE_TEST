<?php
    include "connect/connect.php";
    include "connect/session.php";
?>
<!DOCTYPE html>
<html lang="ko">

<?php include "include/head.php"; ?>
<!-- //head -->

<body>
    <?php include "include/skip.php"; ?>
    <!-- //skip -->

    <?php include "include/header.php"; ?>
    <!-- //header -->
    <main id="main">
        <h3 class="codepin">
            <p>📌COD<em>E</em> PIN</p>
        </h3>
<?php if(isset($_SESSION['memberID'])){ ?>
        <form class="linkinput" id="urlForm" name="linkSave" method="post">
            <input type="text" name="urlInput" id="urlInput" placeholder="링크를 입력하여 코드를 저장해보세요." required>
            <button type="submit">저장</button>
        </form>
<?php } else { ?>
        <div class="linkinput">
            <input type="text" name="linkSave" id="linkSave" placeholder="로그인 하여 코드를 저장해보세요." disabled>
            <button onclick="location.href='./sign/sign.php'">Login</button>
        </div>
<?php } ?>
    </main>
    <!-- main -->
<?php if(isset($_SESSION['memberID'])){ 
    $userID = $_SESSION['memberID'];
    $query = "SELECT urlID, urlLink, urlTitle, urlImg, urlDescription, urlUserTitle, urlUserDescription, youModTime, youRegTime FROM urlTB WHERE userID = '$userID' ORDER BY urlID DESC";
    $result = $connect->query($query);

    $connect->close();
?>
    <section id="contents">
        <article class="content">
            <div class="contetns_wrap">
                <div class="Mypage_header"></div>
                <div class="Mypage_tap">
                    <div class="Mypage_code active">코드</div>
                    <div class="Mypage_board">보드</div>
                    <div class="Mypage_feed"><a href="MyPage/MyPageFeed.php">피드</a></div>
                    <!-- 코드, 보더 변경 버튼 -->
                </div>
                <div class="Mypage_info">
                    <div class="Mypage_info_codes code">
                        <div class="MyPage_info_items">
                            <p class="Mypage_count">몇 개의 코드</p>
                            <button class="Mypage_addItem">
                                <img src="./assets/img/icon_cross_grey.webp" alt="">
                                <span>코드 추가</span>
                            </button>
                        </div>
                        <div class="Code_Grid">
                            <?php while($row = $result->fetch_assoc()) { ?>
                                <div class="item_out_Container" onclick="openLink('<?php echo $row['urlLink']; ?>')">
                                    <div class="item_container">
                                        <a href="#">
                                            <div class="item_square">
                                                <img src="<?php echo $row['urlImg']; ?>" alt="URL Image">
                                                <div class="item_overlay" onclick="openDescription('<?php echo $row['urlDescription']; ?>')"></div>
                                            </div>
                                        </a>
                                        <div class="item_popup">
                                            <button class="item_popup_button">편집</button>
                                            <button class="item_popup_button">코드 삭제</button>
                                        </div>
                                        <div class="item_edit_Container">
                                            <button class="item_editButton_Container">
                                                <div class="item_edit">
                                                    <img src="/assets/img/icon_dots.webp" alt="">
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <a href="">
                                        <div class="item_gap"></div>
                                        <div class="item_text">
                                            <p class="item_name"><?php echo $row['urlTitle']; ?></p>
                                            <p class="item_memo"><?php echo $row['urlDescription']; ?></p>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>                            
                        </div>
                    </div>
                    <div class="Mypage_info_codes board">
                        <div class="MyPage_info_items">
                            <p class="Mypage_count">몇 개의 보드</p>
                            <button class="Mypage_addItem">
                                <img src="/assets/img/icon_cross_grey.webp" alt="">
                                <span>보드 추가</span>
                            </button>
                            <div class="addboard_outcontainer">
                                <div class="addboard_container">
                                    <div class="addboard_popup_container">
                                        <div class="addItem_popup_top">
                                            <div class="popup_top_title">새 보드 추가</div>
                                            <button class="popup_top_close">
                                                <img src="/assets/img/close_black.webp" alt="">
                                            </button>
                                        </div>
                                        <!-- //addItem_popup_top -->

                                        <div class="addItem_popup_contents">
                                            <div class="popup_contents_codename">보드 이름</div>
                                            <input class="contenst_codename" type="text">
                                            <p class="addboard_popup_length">0/16</p>
                                            <div class="container_line"></div>
                                            <!-- //container_line 프로필 셋팅에서 재활용 -->
                                            <div class="addboard_popup_private">
                                                <input type="checkbox" type="checkbox">
                                                <label for="checkbox">비공개</label>
                                            </div>
                                        </div>
                                        <!--//addItem_popup_contents  -->

                                        <div class="addItem_popup_bottom">
                                            <button class="addItem_save">
                                                <span>저장하기</span>
                                            </button>
                                        </div>
                                        <!-- //addItem_popup_bottom -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- //MyPage_info_items -->

                        <div class="Code_Grid">
                            <div class="Myboard_contaienr">
                                <div class="boardItem">
                                    <div class="boardItem_square">
                                        <a href="#">
                                            <div class="boardItem_squeare_container">
                                                <div class="boardItem_vertical">
                                                    <div class="boardItem_overlay"></div>
                                                    <img src="/assets/img/board_ex1.webp" alt="상품이름">
                                                </div>
                                                <div class="boardItem_vertical">
                                                    <div class="boardItem_horizontal">
                                                        <div class="boardItem_overlay"></div>
                                                        <img src="/assets/img/board_ex2.webp" alt="">
                                                    </div>
                                                    <div class="boardItem_horizontal">
                                                        <div class="boardItem_overlay"></div>
                                                        <img src="/assets/img/board_ex3.webp" alt="">
                                                    </div>
                                                </div>
                                                <div class="boardItem_line"></div>
                                            </div>
                                            <div class="boardIten_line2"></div>
                                        </a>
                                        <button class="boardItem_edit">
                                            <img src="/assets/img/icon_edit_black.webp" alt="">
                                        </button>
                                        <div class="addboard_edit_outcontainer">
                                            <div class="addboard_edit_container">
                                                <div class="addboard_popup_container">
                                                    <div class="addboard_popup_top">
                                                        <div class="board_popup_top_title">보드 편집</div>
                                                        <button class="board_popup_top_close">
                                                            <img src="/assets/img/close_black.webp" alt="">
                                                        </button>
                                                    </div>
                                                    <!-- //addItem_popup_top -->

                                                    <div class="addboard_popup_contents">
                                                        <div class="board_popup_contents_codename">보드 이름</div>
                                                        <input class="board_contents_codename" type="text">
                                                        <p class="addboard_popup_length">0/16</p>
                                                        <div class="addboard_popup_private">
                                                            <input type="checkbox" type="checkbox">
                                                            <label for="checkbox">비공개</label>
                                                        </div>
                                                    </div>
                                                    <!--//addItem_popup_contents  -->

                                                    <div class="addboard_popup_bottom">
                                                        <div class="board_container_line"></div>
                                                        <button class="addboard_save">
                                                            <span>저장하기</span>
                                                        </button>
                                                        <button class="addboard_delete">
                                                            <span>삭제하기</span>
                                                        </button>
                                                    </div>
                                                    <!-- //addItem_popup_bottom -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="boardItem_memo">
                                        <p class="board_name">보드 제목</p>
                                        <p class="board_number">몇 개의 아이템</p>
                                    </div>

                                </div>
                                <!-- //boardItem -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>
<?php } ?>
    <!-- //conetents  -->

    <?php include "include/footer.php"; ?>
    <!-- //footer -->

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
