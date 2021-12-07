<?php

// Это комментарий
$x = $_REQUEST["x"];
$y = $_REQUEST["y"];
$z = $x + $y;

// Здесь нарушены принципы безопасности:
// 1. Принцип наименьших привелегий
// 2. Слабый пароль 
// 3. Секрет в коде

//$conn = mysqli_connect("localhost","root","","calc");
// 4. Код уязвимый для Sql-injection

include ("\\Users\\martun\\AppParams\\params.php");
//у меня мак и ссылки на диск С нет. Ошибка в написании команды!

$conn = mysqli_connect($DB_URL,$DB_USER,$DB_PWD,$DB_NAME);

$sql = "INSERT INTO calc(Number1,Number2,Result,UserID) VALUES(11,22,33,'anonym')";
mysqli_query($conn,$sql);
//echo (mysqli_error($conn));
mysqli_close($conn);
echo($z);

