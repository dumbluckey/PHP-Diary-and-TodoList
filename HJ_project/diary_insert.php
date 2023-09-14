
    <?php
		session_start();
		if (isset($_SESSION["id"])) $userid = $_SESSION["id"];
		else $userid = "";
		if (isset($_SESSION["name"])) $username = $_SESSION["name"];
		else $username = "";
	
		if ( !$userid )
		{
			echo("
						<script>
						alert('게시판 글쓰기는 로그인 후 이용해 주세요!');
						history.go(-1)
						</script>
			");
					exit;
		}
		
		$title      = $_POST["title"];
		$main_text  = $_POST["main_text"];
		$weather    = $_POST["weather"];
		$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장
	
		$title = htmlspecialchars($title, ENT_QUOTES);
		$main_text = htmlspecialchars($main_text, ENT_QUOTES);
		// HTML의 코드로 인식될 수 있는 문자열의 일부내용을 특수문자형태로 변환해 출력해주는 함수

        $upload_dir = './data/';
		$img_path   = $upload_dir.$_FILES["upfile"]["name"];

		move_uploaded_file($_FILES["upfile"]["tmp_name"], $img_path);
		//서버로 전송된 파일을 저장할 때 쓰는 함수
		// 1. 업로드된 파일명 2. 넣어줄 위치

        $upfile_name	 = $_FILES["upfile"]["name"];
	    $upfile_tmp_name = $_FILES["upfile"]["tmp_name"];
	    $upfile_type     = $_FILES["upfile"]["type"];
	    $upfile_size     = $_FILES["upfile"]["size"];
	    $upfile_error    = $_FILES["upfile"]["error"];

        $con = mysqli_connect("localhost", "user1", "0520", "hj_project");

	    $sql = "insert into diary (id, name, title, main_text, weather, regist_day, file_name, file_type, file_dir)";
	    $sql .= "values('$userid', '$username', '$title', '$main_text', '$weather', '$regist_day','$upfile_name', '$upfile_type','$img_path')";
	    mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행

        mysqli_close($con); 

        echo "
	        <script>
	        location.href = 'diary_list.php';
	        </script>
	        ";
    ?>
