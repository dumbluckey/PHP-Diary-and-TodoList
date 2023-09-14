<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>다이어리 로그인</title>
    <link rel="stylesheet" href="./css/index.css">
        <script>
        // 아이디, 비밀번호 미입력시 넘어가는 것을 방지하는 함수
        function check() {
            if (document.Login.uid.value == ""){
                alert("아이디를 입력하세요!");
                return; //아이디 입력 안 하고 페이지 넘어가는 것을 방지
            }
            if (document.Login.pass01.value == ""){
                alert("비밀번호를 입력하세요!");
                return; //비밀번호 입력 안 하고 페이지 넘어가는 것을 방지
            }
            document.Login.submit();
        }
        </script>
</head>
<body>
    <?php
        session_start();
        
        // sessoin 으로 받은 id값이 있을 시 main 페이지로 넘어감
        if (isset($_SESSION["id"])) {
            echo "<script>
                    location.href='main.php'
                    </script>";
        }
    else {
    ?>
        <center>
        <form name="Login" action="login_check.php" method="get" class="center">
        <fieldset style=" height: 270px;">
        <legend><h3>✨나의 다이어리 로그인📝</h3></legend>
     
        <label for="uid">아이디</label>
        <input type="text" name="uid" id="uid" placeholder="아이디 입력" style="margin-left: 10px; margin-top: 10px"> <br>

        <label for="pass01">비밀번호</label>
        <input type="password" name="pass01" id="pass01" placeholder="비밀번호 입력"><br><br>
        
        <input type="button" value="로그인" onclick="javascript:check()" style=" margin-top:10px">
        <input type="button" value="회원가입" onclick=location.href="signUp.php" style="margin-top: 10px">
        
        </fieldset>
        </center>
    <?php
    }
    ?>
</from> 
</body>
</html>