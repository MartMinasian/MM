<?php
    session_start();
// Если жетона безопасности (т.е., в нашем случае,
// сессионной переменной с названием user)нет, "не пущаем"
   if (!isset($_SESSION["user"])) {
    echo('<meta http-equiv="refresh" content="2; URL=../login.php">');
    die("Требуется логин!");
   } 
   $user = $_SESSION["user"];

  // echo($user);
    include(getenv("MYAPP_CONFIG"));
//include ('/var/www/html/params.php');
    //include("/Applications/XAMPP/xamppfiles/htdocs/MM/AppParams/params.php");


           //Оставим уязвимость sql-injection для спортивных управжнений
            $sql = "SELECT ID, NUMBER1, Number2,Result, UserID
                    FROM log 
                    WHERE UserID='$user'
            ";

            $conn = mysqli_connect($DB_URL,$DB_USER,$DB_PWD,$DB_NAME);
            //echo $sql;
            //Нудная, но необходимая процедура передачи параметов 
            //в sql выражение, что гарантирует защиту от инжекции sql

            $statement = mysqli_prepare($conn, $sql);
            mysqli_stmt_execute($statement);
            echo(mysqli_error($conn));
            $cursor = mysqli_stmt_get_result($statement);
            $result = mysqli_fetch_all($cursor);

            echo(mysqli_error($conn));
            mysqli_close($conn);

            //var_dump($result);
            //json_encode($result);
            echo (json_encode($result));
     
    