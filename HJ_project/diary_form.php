<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>일기 쓰기</title>
    <link rel="stylesheet" type="text/css" href="./css/diaryform.css">
<script>

    // 빈칸 입력 방지 함수
  function check_input() {
      if (!document.diary.weather.value)
      {
          alert("날씨를 선택하세요!");
          document.diary.weather.focus();
          return;
      }
      if (!document.diary.title.value)
      {
          alert("제목을 입력하세요!");
          document.diary.title.focus();
          return;
      }
      if (!document.diary.main_text.value)
      {
          alert("내용을 입력하세요!");    
          document.diary.main_text.focus();
          return;
      }
      document.diary.submit();
   }
</script>
</head>
<?php
      session_start();

      $uid = $_SESSION["id"];

      if (!$uid)    //session으로 받은 id 값이 아닐 시 alert 창 출력
      {
          echo("
                      <script>
                      alert('일기장 쓰기는 로그인 후 이용해 주세요!');
                      history.go(-1)
                      </script>
          ");
                  exit;
      }

      $con    = mysqli_connect("localhost", "user1", "0520", "hj_project");
    
      $sql    = "select * from members where id = '$uid'";
      
      $result = mysqli_query($con, $sql);
    
      mysqli_close($con);
    
      $row    = mysqli_fetch_array($result);

    ?>
<body>

    
    <form  name="diary" method="post" action="diary_insert.php" enctype="multipart/form-data" class="center">
    <fieldset class="d_form">
    <legend><h1>오늘의 일기✍️</h1></legend> 
                <div>
				<div>
					<span class="name">이름 : <?= $row["name"]?></span><br>
				</div>
                <hr>
                <div>
                    <span>날씨 : </span>
                    <select name="weather" class="weather">
                        <option value="" selected>선택</option>
                        <option value="맑음">맑음☀️</option>
                        <option value="흐림">흐림🌥️</option>
                        <option value="비">비☔</option>
                        <option value="번개">번개⚡</option>
                    </select>
                </div><br>

	    		<div>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="title" type="text" placeholder="제목을 입력하세요!"></span>
	    		</div><br>	    	
                
	    		<div id="text_area">	
	    			<span class="col3">내용 : </span>
	    			<span class="col4">
	    				<textarea cols="50" rows="20" name="main_text" placeholder="내용을 입력하세요!"></textarea>
	    			</span><br><br>
                </div>
                <hr>
                <div>
                    <span class="col5"> 첨부 파일 : </span>
			        <span class="col6"><input type="file" name="upfile" id="upfile"></span>
                </div>
	    		<hr><br>
            </div>
            <center>
            <div>
                <button type="button" onclick="check_input()">완료</button>
                <button type="button" onclick="location.href='diary_list.php'">목록</button>
                <button type="button" onclick="location.href='main_page.php'">메인으로</button>
            </div>
            </center>
            </fieldset>
    </form>
</body>
</html>