<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그아웃</title>
</head>
<body>
    <?php
        session_start();

        unset($_SESSION["id"]);
    ?>

    <script>
        alert("로그아웃 되었습니다! 다음에 또 봐요! :)");
        location.href="index.php";
    </script>

</body>
</html>