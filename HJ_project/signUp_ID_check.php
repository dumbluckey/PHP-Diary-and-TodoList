<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
</head>
<body>
    <?php

        $uid    = $_GET["uid"];
        
        $con    = mysqli_connect("localhost", "user1", "0520", "hj_project");
        
        $sql    = "select * from members where id = '$uid'";

        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) == 0){
    ?>

    <div> <!-- 사용 가능한 ID일 경우 -->
        <h3>사용 가능한 ID 입니다!</h3>
        <input type="button" value="닫기" onclick="window.close(), opener.parent.ID_success(), opener.parent.signUp_success()">
                                                                <!--- opener.parent : 부모페이지에서 선택한 함수를 가져와 오픈해줌 --->
    </div>

    <?php
        }
        else {
    ?>  <!-- 중복된 ID일 경우 -->
    <div style="color: red">
         <h3>중복된 ID 입니다!</h3>
         <input type="button" value="닫기" onclick="window.close(), opener.parent.Clean()">
    </div>
    <?php
        }
    ?>
    
</body>
</html>