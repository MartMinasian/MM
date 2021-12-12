<?php
session_start();
$x = 1;
$y = 2;
$z = $x + $y;
$u = $_SESSION["user"];

// Здесь нарушены принципы безопасности:
// 1. Принцип наименьших привилегий
// 2. Слабый пароль
// 3. Секрет в коде
//$conn = mysqli_connect("localhost","root","","calc");
// 4. Код, уязвимый для Sql-injection

//Первые три проблемы исправлены ниже:
include("/Applications/XAMPP/xamppfiles/htdocs/MM/AppParams/params.php");
$conn = mysqli_connect($DB_URL,$DB_USER,$DB_PWD,$DB_NAME);
echo "INSERT INTO log(Number1,Number2,Result,UserID) VALUES($x,$y,$z,'$u')";
$sql = "INSERT INTO log(Number1,Number2,Result,UserID) VALUES($x,$y,$z,'$u')";
mysqli_query($conn,$sql);
echo(mysqli_error($conn));
mysqli_close($conn);
echo($z);
?>
