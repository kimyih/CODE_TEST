<?php
    include "connect/connect.php";
    include "connect/session.php";

    // 페이지네이션 설정
    $limit = 12; // 한 페이지에 보여줄 개수
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // 현재 페이지 번호
    $offset = ($page - 1) * $limit; // OFFSET 계산
    
    if (isset($_SESSION['memberID'])) {
        $userID = $_SESSION['memberID'];
    
        // urlTB 데이터 가져오기
        $query = "SELECT urlID, urlLink, urlTitle, urlImg, urlDescription FROM urlTB WHERE userID = '$userID' ORDER BY urlID DESC LIMIT $limit OFFSET $offset";
        $result = $connect->query($query);
        $codeTotalCount = $connect->query("SELECT COUNT(*) as count FROM urlTB WHERE userID = '$userID'")->fetch_assoc()['count'];
    
        // 페이지 총 개수 계산
        $totalPages = ceil($codeTotalCount / $limit);
    }
?>

<!DOCTYPE html>
<html lang="ko">
<?php include "include/head.php"; ?>
<body>
    <?php include "include/skip.php"; ?>
    <?php include "include/header.php"; ?>
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

    <?php if(isset($_SESSION['memberID'])) { ?>
    <section id="contents">
        <article class="content">
            <div class="contetns_wrap">
                <div class="Mypage_header"></div>
                <div class="Mypage_tap">
                    <a href="index.php"><button class="Mypage_code active">코드</button></a>
                    <a href=""><button class="Mypage_board">보드</button></a>
                    <a href="MyPage/MyPageFeed.php"><button class="Mypage_feed">피드</button></a>
                </div>
                <div class="Mypage_info">
                    <div id="code" class="Mypage_info_codes code">
                        <div class="MyPage_info_items">
                            <p class="Mypage_count"><?php echo $codeTotalCount; ?> 개의 코드</p>
                            <button class="Mypage_addItem">
                                <img src="./assets/img/icon_cross_grey.webp" alt="">
                                <span>코드 추가</span>
                            </button>
                        </div>
                        <div class="Code_Grid">
                            <?php while($row = $result->fetch_assoc()) { ?>
                            <div class="item_out_Container">
                                <div class="item_container">
                                    <a href="/code/<?=$row['urlID']?>">
                                        <div class="item_square">
                                            <img src="<?php echo $row['urlImg']; ?>" alt="URL Image">
                                            <div class="item_overlay" onclick="openDescription('<?php echo $row['urlDescription']; ?>')"></div>
                                        </div>
                                    </a>
                                    <div class="item_edit_Container">
                                        <div class="item_editButton_Container">
                                            <button class="item_edit">
                                                <img src="/assets/img/icon_dots.webp" alt="">
                                            </button>
                                        </div>
                                        <div class="ItemEditModal_container" id="editModal_<?=$row['urlID']?>">
                                            <div class="ItemEditModal_menu">
                                                <button class="ItemEditModal_Item">
                                                    <img src="/assets/img/icon_category_grey.webp" alt="">
                                                    <p class="ItemEditModal_text">편집</p>
                                                </button>
                                                <button class="ItemEditModal_Item">
                                                    <img src="/assets/img/icon_delete_grey.webp" alt="">
                                                    <p class="ItemEditModal_text">코드 삭제</p>
                                                </button>
                                            </div>
                                        </div>
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
                        <div class="pagination">
    <?php if ($page > 1) { ?>
        <a href="?page=1">처음으로</a>
        <a href="?page=<?php echo $page - 1; ?>">&laquo; 이전</a>
    <?php } ?>

    <?php
    $startPage = max(1, $page - 2);
    $endPage = min($totalPages, $page + 2);

    if ($startPage > 1) {
        echo '<span>...</span>';
    }

    for ($i = $startPage; $i <= $endPage; $i++) { ?>
        <a href="?page=<?php echo $i; ?>"<?php if ($i == $page) echo ' class="active"'; ?>><?php echo $i; ?></a>
    <?php }

    if ($endPage < $totalPages) {
        echo '<span>...</span>';
    } ?>

    <?php if ($page < $totalPages) { ?>
        <a href="?page=<?php echo $page + 1; ?>">다음 &raquo;</a>
        <a href="?page=<?php echo $totalPages; ?>">마지막으로</a>
    <?php } ?>
</div>
                    </div>
                </div>
            </div>
        </article>
    </section>
    <?php } ?>
    <?php include "include/footer.php"; ?>

<div class="Modal_outerContainer">
    <div class="Modal_container">
    <div class="ItemEditPopup_container">
        <div class="ItemEditPopup_top">
            <p class="ItemEditPopup_title">코드 편집</p>
            <button class="ItemEditPopup_close">
                <img alt="닫기" class="ItemEditPopup_closeIcon"src="/assets/img/close_black.webp">
            </button>
        </div>
        <div class="ItemEditPopup_list">
            <div class="ItemEditPopup_add">
                <div class="ItemEditPopup_buttonContainer">
                    <div class="ItemEditPopup_button">
                        <img class="ItemEditPopup_icon" alt="코드 추가" src="/assets/img/icon_cross.webp" >
                    </div>
                </div>
                <p class="ItemEditPopup_text">코드 추가</p>
            </div>
            <div class="ItemEditPopup_bucket">
                <div class="ItemEditPopup_thumb">
                    <img class="ItemEditPopup_image" alt="코드 폴더 대표 사진" src="/assets/img/icon_cross.webp">
                </div>
                <div class="ItemEditPopup_content">
                    <p class="ItemEditPopup_text">ㅇㅇ</p>
                </div>
            </div>
        </div>
        <div class="ItemEditPopup_bottom">
            <div class="ItemEditPopup_delete">
                <div class="ItemEditPopup_text">
                    <p class="ItemEditPopup_title">코드 삭제</p>
                    <p class="ItemEditPopup_desc">삭제하면 복구할 수 없어요.</p>
                </div>
                <button class="ItemEditPopup_button">
                    <img class="ItemEditPopup_image" alt="쓰레기통 이미지" src="/assets/img/icon_delete_light-grey.webp">
                    <div class="ItemEditPopup_overlay"></div>
                </button>
            </div>
            <div class="ItemEditPopup_save">
                <button class="ItemEditPopup_button">저장</button>
            </div>
        </div>
    </div>
</div>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function () {
        // .Mypage_addItem (코드 추가 창) 클릭시 팝업창 띄우기
        $(".Mypage_addItem").click(function (event) {
            $(".addItem_outcontainer").show();
            event.stopPropagation();
        });

        // 팝업 외부 클릭 시 숨기기
        $(document).click(function () {
            $(".addItem_outcontainer").hide();
            $(".ItemEditModal_container").hide();
        });

        // 팝업 내부 클릭 시 팝업 유지
        $(".addItem_outcontainer, .ItemEditModal_container").click(function (event) {
            event.stopPropagation();
        });

        // 팝업의 닫기 버튼 클릭 시 숨기기
        $(".popup_top_close, .board_popup_top_close, .ItemEditPopup_close").click(function () {
            $(".addItem_outcontainer").hide();
            $(".Modal_outerContainer").hide();
        });

        // .item_overlay 클릭 시 item_popup 보이기
        $(".item_overlay").click(function (event) {
            event.preventDefault(); // 기본 동작을 막습니다.
            $(".item_popup").hide(); // 모든 item_popup을 숨깁니다.
            var popup = $(this).closest('.item_container').find('.item_popup');
            popup.toggle();
            event.stopPropagation();
        });

        // item_popup 내부 클릭 시 팝업 유지
        $(".item_popup").click(function (event) {
            event.stopPropagation();
        });

        // .item_editButton_Container 클릭시 해당 아이템의 모달만 보이기
        $(".item_editButton_Container").click(function (event) {
            var modal = $(this).siblings('.ItemEditModal_container');
            $(".ItemEditModal_container").not(modal).hide(); // 다른 모달 숨기기
            modal.toggle(); // 클릭된 모달 보이기/숨기기
            event.stopPropagation();
        });

        // .ItemEditModal_Item 클릭 시 Modal_outerContainer 보이기
        $(".ItemEditModal_Item").click(function (event) {
            $(".Modal_outerContainer").css("display", "flex");
            event.stopPropagation();
        });

        // Profile 팝업 관련 코드
        $(".Profile").click(function (event) {
            $(".popup_Profile").show();
            event.stopPropagation();
        });

        $(document).click(function () {
            $(".popup_Profile").hide();
        });

        $(".popup_Profile").click(function (event) {
            event.stopPropagation();
        });

        // MyPage 탭 클릭시 컨텐츠 토글
        $(".Mypage_code").click(function() {
            $("#code").show();
            $("#board").hide();
            $(".Mypage_code").addClass("active");
            $(".Mypage_board").removeClass("active");
        });

        $(".Mypage_board").click(function() {
            $("#board").show();
            $("#code").hide();
            $(".Mypage_board").addClass("active");
            $(".Mypage_code").removeClass("active");
        });

        // URL 폼 제출
        $('#urlForm').submit(function (event) {
            event.preventDefault();

            var url = $('#urlInput').val();
            var corsAnywhereUrl = 'http://miento.iptime.org:8801/get?url=';
            var allOriginsUrl = corsAnywhereUrl + encodeURI(url);

            $.ajax({
                url: allOriginsUrl,
                success: function (response) {
                    if (response.title && response.description && response.image_url) {
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
    </script>
</body>
</html>
