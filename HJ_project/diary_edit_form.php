<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" main_text="IE=edge">
    <meta name="viewport" main_text="width=device-width, initial-scale=1.0">
    <title>일기 수정</title>
    <link rel="stylesheet" type="text/css" href="./css/diaryform.css">
    <script>
        
    // 빈칸 입력 방지 함수
    function check_input() {
      if (!document.diary.title.value)
      {
          alert("제목을 입력하세요!");
          document.diary.title.focus();
          return;
      }
      if (!document.diary.main_text.value)
      {
          alert("내용을 입력하세요!");    
          document.diary_form.main_text.focus();
          return;
      }
      document.diary.submit();
   }
</script>
</head>
<body>

<?php
      session_start();

      $uid = $_SESSION["id"];
      
      if (!$uid)  //session으로 받은 id 값이 아닐 시 alert 창 출력
      {
          echo("
                      <script>
                      alert('게시판 글쓰기는 로그인 후 이용해 주세요!');
                      history.go(-1)
                      </script>
          ");
                  exit;
      }

      $num  = $_GET["num"];
	  $page = $_GET["page"];

      $con    = mysqli_connect("localhost", "user1", "0520", "hj_project");
      $sql    = "select * from members where id = '$uid'";
      $result = mysqli_query($con, $sql);
      mysqli_close($con);
      $row    = mysqli_fetch_array($result);

    // ===================================================================

    $con     = mysqli_connect("localhost", "user1", "0520", "hj_project");
	$sql     = "select * from diary where num = '$num'";
    $result2 = mysqli_query($con, $sql);
    mysqli_close($con);
    $rows    = mysqli_fetch_array($result2);

	$name       = $row["name"];
	$title      = $rows["title"];
	$main_text  = $rows["main_text"];		
	$file_name  = $rows["file_name"];
  

    ?>

<form  name="diary" method="post" action="diary_edit_DB.php?num=<?=$num?>&page=<?=$page?>" enctype="multipart/form-data" class="center">
    <fieldset class="center2">
    <legend><h3>일기 수정✍️</h3></legend>  
                <div id="diary_form">
				<div>
					<span class="col1">이름 : <?= $row["name"]?></span><br>
				</div>
                <hr>
                <div>
                    <span class="weather">날씨 : </span>
                    <select name="weather" class="weather" >
                        <option value="<?= $rows["weather"]?>" selected><?= $rows["weather"]?></option>
                        <option value="맑음">맑음☀️</option>
                        <option value="흐림">흐림🌥️</option>
                        <option value="비">비☔</option>
                        <option value="번개">번개⚡</option>
                    </select>
                </div><br>

	    		<div>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="title" type="text" value="<?= $rows["title"]?>"></span>
	    		</div><br>	    	
                
	    		<div id="text_area">	
	    			<span class="col3">내용 : </span>
	    			<span class="col4">
	    				<textarea cols="50" rows="20" name="main_text"  ><?= $rows["main_text"]?></textarea>
	    			</span><br><br>
                </div>
                <hr>
                <div>
                    <span class="col5"> 첨부 파일 : </span>
                    <span> | <?= $rows["file_name"]?></span>
                </div>
	    		<hr><br>
            </div>
            <center>
            <div class="buttons">
                <button type="button" onclick="check_input()">수정완료</button>
                <button type="button" onclick="location.href='diary_list.php'">목록</button>			
            </div>
            </center>
            </fieldset>
    </form>
</body>
</html>