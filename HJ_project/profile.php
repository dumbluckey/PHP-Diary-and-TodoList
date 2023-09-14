<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>프로필 변경</title>
  <link rel="stylesheet" type="text/css" href="./css/mainpage.css">
</head>
<script>
// 빈칸 입력 방지 함수
function check_input() {
  if (!document.profile_form.profile.value)
  {
      alert("프로필사진을 선택하세요!");
      document.profile_form.profile.focus();
      return;
  }
  if (!document.profile_form.profile_text.value)
  {
      alert("프로필 내용을 입력하세요!");
      document.profile_form.profile_text.focus();
      return;
  }
  document.profile_form.submit();
}
</script>
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

mysqli_close($con);
?>
<body>
    <form name="profile_form" action="profile_DB.php" method="post" enctype="multipart/form-data">
    <fieldset class="profile_fd">
        <legend><h2>✨<?= $row["name"]?>님의 프로필✨</h2></legend>
        <center>
        📂프로필 사진 첨부 : <input type="file" name="profile" id="profile"><br><br>
        <span style="margin-left: 75px;">📝프로필 메세지 : </span> 
        <textarea cols="40" rows="5" name="profile_text" placeholder="내용을 입력하세요!"></textarea><br><br><br>

        <button type="button" class="pro_btn" onclick="check_input()">완료</button>
        <button type="button" class="pro_btn" onclick="location.href='main_page.php'">뒤로가기</button>
        </center>
    </fieldset>
    </form>
</body>
</html>
