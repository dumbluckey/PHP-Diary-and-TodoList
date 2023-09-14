<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인 성공</title>
</head>
<body>
    <?php
        $uid  = $_GET["uid"];
        $pass = $_GET["pass01"];

        // DB 사용 절차 1. open 2. SQL 명령어 실행  3. close
        // DB 열기
        $con  = mysqli_connect("localhost", "user1", "0520", "hj_project");

        // SQL query 명령어 실행
        $sql  = "select * from members where id = '$uid' and pass = '$pass'";

        $result = mysqli_query($con, $sql);
        // select에서 뽑아낸 값을 result에 저장

        // DB 닫기
        mysqli_close($con);

        session_start();

        // 레코드 갯수 구하기
        if (mysqli_num_rows($result) == 0) {
            // 일치하는 행 찾기, $result에 담긴 값이 없으면 로그인 실패 
            echo ('<script>alert("⚠️아이디/패스워드가 틀렸거나 등록된 사용자가 아닙니다.");location.href = "index.php";</script>');
        }
        else {
            $row              = mysqli_fetch_array($result); //result에서 원하는 값 꺼내오기
            $_SESSION["id"]   = $row["id"];        // row에 id 값만 꺼내오기
            $_SESSION["name"] = $row["name"];
            $URL = "main.php?user_id=".$uid;

            echo "<script>
                  alert('✨로그인 성공! 환영합니다!✨');
                  location.href='$URL';
                 </script>";

        }
    ?>

</body>
</html>