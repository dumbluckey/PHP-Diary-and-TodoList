<?php

    // ===== 로그인 하지 않고 접속했을 때 띄울 alert 창 =====
    session_start();

    $uid = $_SESSION["id"];
    
    if (!$uid)
    {
        echo("
                    <script>
                    alert('투두리스트 이용 시 로그인 후 이용해 주세요!');
                    history.go(-1)
                    </script>
        ");
                exit;
    }

//==============================사용자 이름 출력=====================================

$con    = mysqli_connect("localhost", "user1", "0520", "hj_project");

$sql    = "select * from members where id = '$uid'";

$result = mysqli_query($con, $sql);

$row    = mysqli_fetch_array($result);

mysqli_close($con);

//=============================입력한 투두리스트 정렬=================================

$cons    = mysqli_connect("localhost", "user1", "0520", "hj_project");

$sqls    = "select * from todo order by num desc";

$results = mysqli_query($cons, $sqls);

$rows    = mysqli_fetch_array($results);

mysqli_close($cons);

?>
<!------------------------------------------------------------------------------------->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo</title>
    <link rel="stylesheet" type="text/css" href="./css/todo.css">
    <script>
        
        // ====== 아무 것도 입력하지 않고 버튼 누를시 나오는 alert 창 ======
        function todo_insert(){
            if (!document.todoform.todo.value){
                alert("내용을 입력하세요!");
                document.todoform.todo.focus();
                return;
            }
                document.todoform.submit();
        }
    </script>
</head>
<body>
    <fieldset class="todo_f">
    <legend>✨<?= $row["name"]?>님의 투두리스트!✔️</legend>
        <form  name="todoform" method="post" action="todo_insert.php">
            <center>
                <h3>원하시는 서비스를 선택하세요!</h3>
                <input type="button" value="내 정보 수정" onclick=location.href='member_edit.php'>
                <input type="button" value="로그아웃" onclick=location.href='logout.php'>
                <input type="button" value="메인으로" onclick=location.href='main_page.php'><br><br><br>
                <a href='diary_list.php'>📄여기를 클릭하면 일기장 목록으로 이동합니다. </a><br><br><br>
                <hr><br>
                <label for="todo" style="font-size: 25px;">할 일 : </label>
                <input type="text" name="todo" id="todo" style="height: 22px;" placeholder="입력 후 등록 클릭!">
                <input type="button" value="등록!" onclick="javascript:todo_insert()"><br><br>
                <span>= = = = = = = = = 👇(^∇^*)👇 = = = = = = = = =</span><br><br>
           
        </form>
        </center>
       
   <!----------------------------------------------------------------------------->

   <?php
      $uid = $_SESSION["id"];

      // DB 접속
      $con          = mysqli_connect("localhost", "user1", "0520", "hj_project");
      $sql          = "select * from todo where id = '$uid' order by num desc";
      $result       = mysqli_query($con, $sql);
      $total_record = mysqli_num_rows($result);  //행 개수 구하기
    
      $scale = 30; //한 화면에 보일 수 있는 투두리스트의 개수

      //표시할 페이지에 따라 $start 계산
      $start  = 0;
      $number = $total_record - $start;

      // 0($start)부터 30($scale)까지 반복
      for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
      {
        
        mysqli_data_seek($result, $i);
        // $result에서 원하는 순번의 데이터를 선택
        $row = mysqli_fetch_array($result);
        // $result에서 선택한 값만 가져오기

        $num  = $row["num"];
        $todo = $row["todo"];   //입력한 투두 내용

    ?>      

    <!-----------------------------투두리스트 목록 출력 ------------------------------>
      <ul style="list-style-type: circle;">
      <li style="margin-left: 360px;">
		<span class="todo_text" style="font-size: 22px;"> <?=$todo?> &nbsp;</span>
        <button id="todobtn" onclick="location.href='todo_delete.php?num=<?=$num?>'">X</button>
        <!-- X 버튼 누를 시 삭제됨 -->
      </li>
      </ul>
      <br>
<?php
    $number--;
    }
    mysqli_close($con);
?>

    </ul>
   

    </fieldeset>    
</body>
</html>