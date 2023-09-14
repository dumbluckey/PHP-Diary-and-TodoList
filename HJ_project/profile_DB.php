<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>

<?php

    $uid = $_SESSION["id"];

    $profile      = $_FILES["profile"]["name"];
    $profile_text = $_POST["profile_text"];

    $upload_dir   = './data/';
    $img_path     = $upload_dir.$_FILES["profile"]["name"];

    move_uploaded_file($_FILES["profile"]["tmp_name"], $img_path);
    //서버로 전송된 파일을 저장할 때 쓰는 함수
    // 1. 업로드된 파일명 2. 넣어줄 위치

    $con    = mysqli_connect("localhost", "user1", "0520", "hj_project");

    $sql = "update members set profile='$img_path', profile_text='$profile_text' where id = '$uid'";

    mysqli_query($con, $sql);
    mysqli_close($con);

?>

<script>
        alert("⚠️ 프로필 등록이 완료되었습니다!");
        location.href = "main_page.php";
    </script>
