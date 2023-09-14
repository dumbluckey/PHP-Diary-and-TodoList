<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/mainpage.css">
    <title>메인페이지</title>
</head>
<body>
    <?php
        session_start();
        
        $uid = $_SESSION["id"];
        
        if (isset($_SESSION["id"])) {
    
            include "main_page.php";
            
        }
      else {
    ?>
        <script>
            alert("주의! 잘못된 접근입니다!");
            location.href="index.php";
        </script>
    <?php
      }
    ?>
</body>
</html>