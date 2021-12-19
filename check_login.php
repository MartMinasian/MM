<?php
    session_start();
   //include ('/var/www/html/params.php');
   include (getenv("MYAPP_CONFIG"));
    //("\\Users\\martun\\AppParams\\params.php");  
?>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <?php
            $user = $_REQUEST["user"];
            $pwd = $_REQUEST["pwd"];
            $hash = hash('sha256',$pwd);
            $sql = "SELECT ID, UserName 
                    FROM users 
                    WHERE UserName=? AND PwdHash=?
            ";

            $conn = mysqli_connect($DB_URL,$DB_USER,$DB_PWD,$DB_NAME);
            //echo $sql;
            //Нудная, но необходимая процедура передачи параметов 
            //в sql выражение, что гарантирует защиту от инжекции sql

            $statement = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($statement,"ss",$user,$hash);
            mysqli_stmt_execute($statement);
            //echo 2 ;
            echo(mysqli_error($conn));
            $cursor = mysqli_stmt_get_result($statement);
            $result = mysqli_fetch_all($cursor);
            echo(mysqli_error($conn));

            var_dump($result);
            mysqli_close($conn);


            if(count($result) > 0) {
                echo ("<h2>hello, $user!</h2>");
                $_SESSION["user"] = $user;
                echo('<meta http-equiv="refresh" content="2; URL=calc.php">');
            }
            else {
                echo ("BAD LOGIN!");
            }
        ?>
    </body>
</html>