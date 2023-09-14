<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>내 정보 수정</title>
    <link rel="stylesheet" type="text/css" href="./css/signUp.css">
    <script>
        //빈칸 입력 시 넘어감을 방지하는 함수
        function check(){
            if ((document.edit.pass01.value == "" )||(document.edit.pass02.value == "")) {
                alert("비밀번호를 입력하세요!");
                return; // 비밀번호 미입력 시 페이지 넘어가는 것을 방지
            }
            if (document.edit.pass01.value != document.edit.pass02.value) {
                alert("비밀번호가 서로 다릅니다!");
                return; // 입력한 비밀번호와 다를 시 페이지 넘어가는 것을 방지
            }
            if (document.edit.uname.value == ""){
                alert("이름을 입력하세요!");
                return; //이름 미입력 시 페이지 넘어가는 것을 방지
            }

            document.edit.submit();
            
        }

    </script>
</head>
<body>
    <?php
        session_start();

          // DB 열기
          $con = mysqli_connect("localhost", "user1", "0520", "hj_project");

          $uid = $_SESSION["id"];
          $sql = "select * from members where id = '$uid'";
                  // select : 조건에 만족한 내용을 추출
  
          $result = mysqli_query($con, $sql);
          // select에서 뽑아낸 값을 result에 저장
  
          // DB 닫기
          mysqli_close($con);

          $row = mysqli_fetch_array($result); //result에서 원하는 값 꺼내오기

          $e   = explode("@", $row["email"]);   //문자열을 나눠 배열로 저장

        if (isset($_SESSION["id"])) {   //session으로 불러온 id 값이 있는지 확인
    ?>
        <form name="edit" action="member_edit_DB.php" method="post"> 
        <fieldset>

        <legend>회원정보 수정</legend> <br> 
             
        <label for="uid"> 아이디 : </label>
        <input type="text" name="uid" id="uid" value='<?= $_SESSION["id"]?>' style="margin-left: 58px;" disabled> <br> 

        <label for="pass01"> 비밀번호 : </label> 
        <input type="password" name="pass01" id="pass01" value='<?= $row["pass"]?>' style="margin-left: 44px;"> <br>

        <label for="pass02"> 비밀번호 재입력 : </label>
        <input type="password" name="pass02" id="pass02" value='<?= $row["pass"]?>'> <br>

        <label for="uname"> 이름 : </label>
        <input type="text" name="uname" id="uname" value='<?= $row["name"]?>' style="margin-left: 72px;"> <br>

         성별 : <select name="gender" id="gender" style="margin-left: 70px;">
                <option value="<?= $row["gender"] ?>"><?= $row["gender"] ?></option>
                <option value="남">남</option>
                <option value="여">여</option>
                </select><br>

        <label for="email01"> 이메일 : </label> 
        <input type="text" name="email01" id="email01" value='<?= $e[0]?>' style="margin-left: 58px;"> @ 
        <input type="text" name="email02" id="email02" value='<?= $e[1]?>'> <br><br><br>
      
        <center>
        <input type="button" value="수정하기" onclick="check()"> 
        <input type="reset" value="작성취소"> 
        <input type="button" value="돌아가기" onclick=location.href='main_page.php'><br><br>
        <a href="member_delete.php" style="font-size: 12px;">회원 탈퇴</a>
        </center>

    </fieldset>
        </form>
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