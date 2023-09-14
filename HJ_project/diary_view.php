<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" main_text="IE=edge">
    <meta name="viewport" main_text="width=device-width, initial-scale=1.0">
    <title>나의 일기</title>
    <link rel="stylesheet" type="text/css" href="./css/diaryform.css">

	<?php
	$num   = $_GET["num"];
	$page  = $_GET["page"];
	?>

	<script>
		function delete_diary() {
			var result = confirm("⚠️해당 글을 삭제하시겠습니까?");
			
			if(result){
			location.href="diary_delete.php?num=<?= $num ?>&page=<?= $page?>"
			}
		}
	</script>
</head>
<body>
	<fieldset class="center2">
		<legend><h3>일기 목록 > 나의 일기 📖</h3></legend>
		<center>
<!---------------------------------------------------------------------------------------------------------------------->
    <?php

	$con    = mysqli_connect("localhost", "user1", "0520", "hj_project");
	$sql    = "select * from diary where num=$num";
	$result = mysqli_query($con, $sql);

	$row = mysqli_fetch_array($result);
	$id      	  = $row["id"];
	$name         = $row["name"];
	$regist_day   = $row["regist_day"];
	$title        = $row["title"];
	$main_text    = $row["main_text"];
	$file_name    = $row["file_name"];
	$file_type    = $row["file_type"];
	$file_dir     = $row["file_dir"];

	// str_replace : 특정 문자열을 지정한 문자열로 바꿔주는 함수
	$main_text = str_replace(" ", "&nbsp;", $main_text);
	$main_text = str_replace("\n", "<br>", $main_text);
  
	mysqli_query($con, $sql);
?>		
	<!-------------------------------------------------------------------------------------------------->
		
	    <ul id="view_main_text" style="list-style-type: none;" class="ul">
			<li style="list-style-type: none;">
				<span class="col1"><b>📚제목 : </b> <?=$title?></span>
				<span class="col2"> | <b> 👤작성자 : </b> <?=$name?> | <b>🕒작성일시 : </b><?=$regist_day?></span>
			</li>
			<li style="list-style-type: none;">
				<?php
					if($file_name) {
						echo "<b>🗂️ 첨부파일 : </b>$file_name <br><br><br>";
						echo "<img src=$file_dir style='width: 500px; height: 300px;'><br><br>";
			           	}
				?>
				<br>
				<span>-------------------------------------------------------------</span><br><br>
				<?=$main_text?>
			</li>		
	    </ul>
	    <ul class="buttons" style="list-style-type: none;">
				<br><br>
				<button onclick="location.href='diary_list.php?page=<?=$page?>'">목록</button>
				<button onclick="location.href='diary_edit_form.php?num=<?=$num?>&page=<?=$page?>'">수정</button>
				<button onclick="javascript:delete_diary()">삭제</button>
				<button onclick="location.href='diary_form.php'">글쓰기</button>
		</ul><br><br><br>
		</center>
	</fieldset>
</body>
</html>