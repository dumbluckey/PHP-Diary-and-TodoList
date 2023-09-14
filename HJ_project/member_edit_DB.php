<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>내 정보 수정</title>
</head>
<body>
    <?php
        session_start();

        if (isset($_SESSION["id"])) {   //session으로 불러온 id 값이 있는지 확인
        
        $pass  = $_POST["pass01"];
        $name  = $_POST["uname"];
        $email = $_POST["email01"]."@".$_POST["email02"];
    
        // DB 열기
        $con = mysqli_connect("localhost", "user1", "0520", "hj_project");
    
        $u_id = $_SESSION["id"];
        $sql  = "update members set pass = '$pass', name = '$name', email = '$email' where id = '$u_id'";
               
        mysqli_query($con, $sql);
     
        // DB 닫기
        mysqli_close($con); ?>
         
        <script>
            alert("수정 완료 되었습니다!");
            location.href="index.php";
        </script> 
    <?php
    }
    else {
    ?>
        <!-- 로그인 하지않고 접속시 출력되는 alert창 -->
        <script>
            alert("⚠️주의! 잘못된 접근입니다! 로그인 후 이용해주세요.");
            location.href="index.php";
        </script>
    <?php
        }
    ?>
</body>
</html>