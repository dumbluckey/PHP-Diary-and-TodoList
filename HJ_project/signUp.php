<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
    <link rel="stylesheet" href="./css/signUp.css">
    <script>
        
        function check(){
            if (document.signUp.uid.value == ""){
                alert("아이디를 입력하세요!");
                return; //아이디 미입력 시 페이지 넘어가는 것을 방지
            }
            if (document.signUp.uid.value.length > 15){
                alert("아이디를 15자 이내로 입력하세요!");
                return; //아이디 15자 초과 시 페이지 넘어가는 것을 방지
            }
            if ((document.signUp.pass01.value == "" )||(document.signUp.pass02.value == "")) {
                alert("비밀번호를 입력하세요!");
                return; //비밀번호 미입력 시 페이지 넘어가는 것을 방지
            }
            if (document.signUp.pass01.value != document.signUp.pass02.value) {
                alert("비밀번호가 서로 다릅니다!");
                return; //입력한 비밀번호와 다를 시 페이지 넘어가는 것을 방지
            }
            if (document.signUp.uname.value == ""){
                alert("이름을 입력하세요!");
                return; //이름 미입력 시 페이지 넘어가는 것을 방지
            }
            if (document.signUp.gender.value == ""){
                alert("성별을 선택하세요!");
                return; //성별 미선택 시 페이지 넘어가는 것을 방지
            }
            if ((document.signUp.bday_year.value == "") || (document.signUp.bday_month.value == "") || (document.signUp.bday_day.value == "")){
                alert("생년월일을 입력하세요!");
                return; //생년월일 미입력 시 페이지 넘어가는 것을 방지
            }
           if ((document.signUp.email01.value == "") || (document.signUp.email02.value == "")){
                alert("이메일을 입력하세요!");
                return; //이메일 미입력 시 페이지 넘어가는 것을 방지
           }
        
            document.signUp.submit();
        }

        // 아이디 중복검사 함수
        function ID_Check() {
            var user_id = document.getElementById("uid").value;
            
            if (user_id) {
                url = "signUp_ID_check.php?uid="+user_id;
                window.open(url, "signUp_ID_check", "width=300, height=100");
                //사용 가능한 아이디거나 중복 아이디일 경우 윈도우 창 출력 
            }
            else {
                alert("아이디를 입력해주세요!");
            }
        }
        function ID_unlock() { //아이디가 중복이 아닐 경우 잠겨있던 아이디창을 다시 풀어줌
            document.getElementById("uid").disabled = false;
        }
        
        // sigUp_ID_Check.php 에서 쓰이는 함수 3개
        function Clean(){   //중복된 ID일 시 아이디 입력창을 지워줌
            document.getElementById("uid").value = "";
            document.getElementById("uid").focus();
        }

        function ID_success(){ //사용가능한 아이디인지 확인
            document.getElementById("uid").disabled = true;
        }
               
        function signUp_success(){  //사용가능한 아이디인지 확인
            document.getElementById("register").disabled = false;
        }        

    </script>

</head>
<body>  
        <form name="signUp" action="signUp_DB.php" method="post" class="center">
        <fieldset class="signUp">
        <legend><h3>✨회원가입✨</h3></legend>
        
        <label for="uid">아이디 </label><br>
        <input type="text" name="uid" id="uid" placeholder="15자 이내로 입력">
        <input type="button" value="중복검사" onclick="javascript:ID_Check()"><br>

        <label for="pass01">비밀번호</label><br>
        <input type="password" name="pass01" id="pass01" placeholder="15자 이내로 입력"><br>

        <label for="pass02">비밀번호 재입력</label><br>
        <input type="password" name="pass02" id="pass02" size="20" placeholder="비밀번호 재입력"><br>

        <label for="uname">이름</label><br>
        <input type="text" name="uname" id="uname" placeholder="이름 입력"><br>

        <label for="gender">성별</label><br>
            <select name="gender" id="gender">
                <option value="">성별</option>
                <option value="남">남자</option>
                <option value="여">여자</option>
            </select><br>

        <label for="bday_year">생년월일</label><br>
        <input type="text" name="bday_year" id="bday_year" placeholder="년도" size="5" title="년도를 입력해주세요 ex) 2001">
        <select name="bday_month" id="bday_month" style="">
            <option value="" selected>월</option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>               
            <option value="11">11</option>
            <option value="12">12</option>
        </select>
        <label for="bday_day"></label>
        <input type="text" name="bday_day" id="bday_day" placeholder="일" size="3" title="출생일을 입력해주세요!"><br>

        <label for="email01">Email</label><br>
        <input type="text" name="email01" id="email01" size="7" placeholder="이메일"> @
        <select name="email02" id="email02" style="">
            <option value="" selected>--선택--</option>
            <option value="naver.com">naver.com</option>
            <option value="daum.net">daum.net</option>
            <option value="google.com">gmail.com</option>
            <option value="hanmail.net">nate.com</option>
            <option value="ync.ac.kr">ync.ac.kr</option>
        </select><br><br>
    
            <input type="button" id="register" value="가입하기" onclick="javascript:ID_unlock(),check()" disabled>
            <input type="button" value="돌아가기" onclick=location.href='index.php'><br><br>
        </fieldset>
    </form>
</body>
</html>