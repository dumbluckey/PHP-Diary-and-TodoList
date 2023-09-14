<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>메인페이지</title>
  <link rel="stylesheet" type="text/css" href="./css/mainpage.css">
</head>
<body>
<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
?>

<?php
$uid    = $_SESSION["id"];

$con    = mysqli_connect("localhost", "user1", "0520", "hj_project");

$sql    = "select * from members where id = '$uid'";

$result = mysqli_query($con, $sql);

$row    = mysqli_fetch_array($result);

$file_dir     = $row["profile"];
$profile_text = $row["profile_text"];


// str_replace : 특정 문자열을 지정한 문자열로 바꿔주는 함수
$profile_text = str_replace(" ", "&nbsp;", $profile_text);
$profile_text = str_replace("\n", "<br>", $profile_text);

mysqli_close($con);
?>
<!---------------------------------------------------------------------->
<form name="main_form" action="profile.php" method="post">
    <fieldset>
        <legend><h2>✨<?= $row["name"]?>님의 다이어리입니다!✨</h2></legend>
        <center>
            <h2>💭프 로 필💭</h2>
            <?php 
// ------------------ 프로필 등록을 안 했을 때 띄울 기본 이미지 --------------------

    if(isset($row["profile"])){ 
?>
    <img class="profile-image" src=<?= $row["profile"]?>>
<?php 
} 
    else { 
?>
    <img class="profile-image" src="./data/basic.png">
<?php 
}      
?> <br><br><br>
            <span>🗨️상태명 : <?= $profile_text ?></span><br><br><br>

            <input type="button" value="내 정보 수정" onclick=location.href='member_edit.php'>
            <input type="button" value="로그아웃" onclick=location.href='logout.php'>
            <input type="button" value="프로필 등록" onclick=location.href='profile.php'><br><br><br>

            <hr><br>

            <h3>원하시는 서비스를 선택하세요!</h3>
            <a href='diary_list.php'>📚 여기를 클릭하면 일기장 목록으로 이동합니다. </a><br><br>
            <a href='todo_main.php'>📄 여기를 클릭하면 투두리스트로 이동합니다. </a><br><br><br>
        </center>
    </fieldeset>
    <br><br><br><br>
</form>
</body>
</html>