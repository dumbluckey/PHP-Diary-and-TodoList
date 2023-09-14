<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>일기 목록</title>
    <link rel="stylesheet" href="./css/diaryform.css">
</head>
<body>
    
    <fieldset id="list_field">
    <legend><h3>📚일기 목록 > 제목을 클릭하세요!</h3></legend>
    <center>
    <ul id="diary_list">
        <li style="list-style-type: none;">
            <span class="col1"><b>🔢번호</b></span>
			<span class="col2"><b>🚩제목</b></span>
			<span class="col3"><b>🌅날씨</b></span>
			<span class="col4"><b>🗂️첨부파일</b></span>
			<span class="col5"><b>🕛작성일시</b></span>
        </li>

   <!----------------------------------------------------------------------------->

   <?php
      session_start();
      $uid = $_SESSION["id"];

      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
    
      $con          = mysqli_connect("localhost", "user1", "0520", "hj_project");
      $sql          = "select * from diary where id = '$uid'   order by num desc";
      $result       = mysqli_query($con, $sql);
      $total_record = mysqli_num_rows($result); //전체 글 수
    
      $scale = 4; //한 화면에 보일 수 있는 게시글의 수

      //전체 페이지 수를 계산   floor : 소수점 이하 버림
      if ($total_record % $scale == 0)
            $total_page = floor($total_record/$scale);
      else
            $total_page = floor($total_record/$scale) + 1;
        
      //표시할 페이지에 따라 $start 계산
      $start  = ($page - 1) * $scale;
      $number = $total_record - $start;

      for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
      {
        mysqli_data_seek($result, $i);
        //가져올 레코드로 위치 이동
        $row = mysqli_fetch_array($result);
        //하나의 레코드만 가져오기

        $num        = $row["num"];
        $name       = $row["name"];
        $title      = $row["title"];
        $weather    = $row["weather"];
        $file_name  = $row["file_name"];
        $regist_day = $row["regist_day"];

        if ($row["file_name"])
            $file_image = "<img src='./img/file.gif>";
        else
            $file_image = " ";

    ?>      

    <!--------일기 목록--------->
    
      <li style="list-style-type: none;">
        <span class="col1"><?=$number?></span>
		<span class="col2"><a href="diary_view.php?num=<?=$num?>&page=<?=$page?>"><?=$title?></a></span>
		<span class="col3"><?=$weather?></span>
		<span class="col4"><?=$file_name?></span>
		<span class="col5"><?=$regist_day?></span>
      </li>

<?php
    $number--;
    }
    mysqli_close($con);
?>

    </ul>
    <ul id="page_num" style="list-style-type: none;">

<?php
    if ($total_page>=2 && $page >= 2) //글 4개 넘어갈 시 다음, 이전 링크 출력
    {
        $new_page = $page-1;
        echo "<br><a href='diary_list.php?page=$new_page'>◀ 이전&nbsp;&nbsp;</a>";
    }
    else
        echo "<li>&nbsp;</li>";
    
    //일기 목록에 하단에 페이지 링크 번호 출력
    for ($i=1; $i<=$total_page; $i++)
    {
        if ($page == $i)    //현재 페이지 번호 링크 
        {
            echo "<b>&nbsp;&nbsp; $i &nbsp;&nbsp;</b>";
        }
        else
        {
            echo "<a href='diary_list.php?page=$i'> $i </a>";
        }
    }

    if ($total_page >= 2 && $page != $total_page) {
        $new_page = $page + 1;
        echo "<a href='diary_list.php?page=$new_page'>&nbsp;&nbsp;다음 ▶</a>";
    }
    else 
        echo "<li>&nbsp;</li>";
?>

<?php
    if($uid) {
?>
    <br><br><br>
    <button onclick="location.href='main_page.php'">메인으로</button>
    <button onclick="location.href='diary_form.php'">일기쓰기</button>
    <center>
    </fieldset>
<?php
    } else {
?>
    <!---- 비회원으로 접속 시 경고창 출력 ----->
    <a href="javascript:alert('⚠️로그인 후 이용해주세요!')"><button>일기 쓰기</button></a>

<?php
    }
?>

    </li>
</ul>

</body>
</html>