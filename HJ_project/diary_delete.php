<?php
    // * 일기 삭제  *

    $num   = $_GET["num"];
    $page  = $_GET["page"];

    $con    = mysqli_connect("localhost", "user1", "0520", "hj_project");
    $sql    = "select * from diary where num = $num";
    $result = mysqli_query($con, $sql);
    $row    = mysqli_fetch_array($result);

    $file_dir = $row["file_dir"];

	if ($file_dir)
	{
		unlink($file_dir);
    }

    $sql = "delete from diary where num = $num";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'diary_list.php?page=$page';
	     </script>
	   ";
?>

