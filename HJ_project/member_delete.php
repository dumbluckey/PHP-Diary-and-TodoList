<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원탈퇴</title>
    <link rel="stylesheet" href="./css/signUp.css">
</head>
<body>
<?php
        session_start();

        if (isset($_SESSION["id"])) {
?>
           <fieldset style="width: 450px; height: 150px;">
            <center>
            <br><div>
            회원탈퇴를 선택하셨습니다. <br>
            계속 진행하시려면 '확인'을 눌러주세요. <br><br>
            </div>
            <a href="member_delete_DB.php">확인</a><br>
            <a href="main_page.php">취소</a> 
            </center>
            </fieldset>
        
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
?>
</body>
</html>