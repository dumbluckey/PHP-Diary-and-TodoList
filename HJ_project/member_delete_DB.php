<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원 탈퇴</title>
</head>
<body>
    <?php
    session_start();
    
    // DB 열기
    $con = mysqli_connect("localhost", "user1", "0520", "hj_project");

    $U_id = $_SESSION["id"];
    $sql = "delete from members where id = '$U_id'";
           
    mysqli_query($con, $sql);
 
    // DB 닫기
    mysqli_close($con);

    if (isset($_SESSION["id"])) {
    ?>
     <script>
        alert("탈퇴되었습니다. 이용해주셔서 감사합니다!");
        location.href = "index.php";   //돌아가기
    </script>
    <?php
    }
    else {
    ?>
    <script>
        alert("주의! 잘못된 접근입니다!");
        location.href="index.php";
    </script>
    <?php
    }

    unset($_SESSION["id"]); //탈퇴한 세션 지우기
    ?>
</body>
</html>