<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 DB</title>
</head>
<body>
    <?php
        $uid    = $_POST["uid"];                                  
        $pass01 = $_POST["pass01"];                            
        $uname  = $_POST["uname"];                              
        $gender = $_POST["gender"];                            

        $email01 = $_POST["email01"];                          
        $email02 = $_POST["email02"];
        $email   = $email01."@".$email02;

        $bday_year  = $_POST["bday_year"];                       
        $bday_month = $_POST["bday_month"];
        $bday_day   = $_POST["bday_day"];
        $birthday   = $bday_year."-".$bday_month."-".$bday_day;

        
        //DB 사용 절차 1. open 2. SQL 명령어 실행  3. close
        
        // DB 열기
        $con = mysqli_connect("localhost", "user1", "0520", "hj_project");

        // SQL query 명령어 실행
        $sql = "insert into members(id, name, pass, birthday, email, gender) 
                values('$uid', '$uname', '$pass01', '$birthday', '$email', '$gender')";

        mysqli_query($con, $sql);
        
        // DB 닫기
        mysqli_close($con);
        
    
    ?>
    
    <script>
        alert("✨회원가입 되었습니다! Welcome :) ✨");
        location.href = "index.php";
    </script>
</body>
</html>