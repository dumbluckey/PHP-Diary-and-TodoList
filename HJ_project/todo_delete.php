<?php

        $num = $_GET["num"];

        $con = mysqli_connect("localhost", "user1", "0520", "hj_project");

        $sql = "delete from todo where num = $num";
        mysqli_query($con, $sql);
        mysqli_close($con);

        echo "
            <script>
                location.href = 'todo_main.php';
            </script>
        ";

?>