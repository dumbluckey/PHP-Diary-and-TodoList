<?php
//투두리스트 내용 삽입

session_start();
$uid = $_SESSION["id"];
$todo = $_POST["todo"];    

$con    = mysqli_connect("localhost", "user1", "0520", "hj_project");

$sql    = "insert into todo (id,todo) values ('$uid','$todo')";

mysqli_query($con, $sql);

mysqli_close($con);


echo "<script>
        location.href='todo_main.php'
      </script>"
?>