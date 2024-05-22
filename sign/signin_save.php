<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $youID = $connect->real_escape_string($_POST['signInYouID']);
        $youPass = $connect->real_escape_string($_POST['signInYouPass']);

        $stmt = $connect -> prepare("SELECT memberID, youID, youName, youPass, youImgSrc FROM members WHERE youID = ? ");
        $stmt -> bind_param("s", $youID);

        if($stmt -> execute()){
            $result = $stmt -> get_result();
            $count = $result -> num_rows;

            if($count == 0){
                // 사용자 아이디가 존재하지 않는 경우
                echo "<script>alert('아이디 또는 비밀번호가 없습니다. 회원가입을 해주세요!')</script>";
                echo "<script>history.back()</script>";
            } else {
                $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);

                if(password_verify($youPass, $memberInfo['youPass'])){
                    // 로그인 성공, 세션 설정
                    $_SESSION['memberID'] = $memberInfo['memberID'];
                    $_SESSION['youName'] = $memberInfo['youName'];
                    $_SESSION['youImgSrc'] = $memberInfo['youImgSrc'];

                    
                    echo "<script>alert('로그인 성공!!')</script>";
                    echo "<script>window.location.href='../index.php'</script>";
                }else{
                    // 로그인 실패
                    echo "<script>alert('아이디 또는 비밀번호가 틀렸습니다. 다시한번 확인해주세요.')</script>";
                    echo "<script>history.back()</script>";
                }
            }
        }else{
            // 로그인 실패
            echo "<script>alert('오류가 발생했습니다. 관리자에게 문의하세요')</script>";
            echo "<script>window.location.href='../index.php'</script>";
        }
    }
?>