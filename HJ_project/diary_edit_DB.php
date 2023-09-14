<?php
    $num  = $_GET["num"];
    $page = $_GET["page"];

    $title     = $_POST["title"];
    $main_text = $_POST["main_text"];
    $weather   = $_POST["weather"];
          
    $con  = mysqli_connect("localhost", "user1", "0520", "hj_project");
    $sql  = "update diary set weather='$weather', title='$title', main_text='$main_text'";
    $sql .= " where num=$num";
    mysqli_query($con, $sql);

    mysqli_close($con);     

    echo "
	      <script>
              alert('수정이 완료되었습니다');
	          location.href = 'diary_list.php?page=$page';
	      </script>
	  ";
?>
