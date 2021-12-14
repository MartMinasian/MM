<?php 
session_start();

if (!isset($_SESSION["user"])) {
    echo('<meta http-equiv="refresh" content="2; URL=login.php">');
}



?>



<html>
        <head>
 
            <meta charset="utf-8"/>

            <style>
                input, button {
                      width: 140px;
                      margin: 5px;
                      text-align: center;
                }
                button {
                    width: 63px;

                }
                .pressed {
                    background-color: pink;
                }
            </style>
            <script>
                function plus() {
                 var x = document.getElementById("x").value;
                  var y =  document.getElementById("y").value; 
                  var z = parseInt(x) + parseInt(y);
                  document.getElementById ("z").value = z;
                  document.getElementById ("btn1").className = "pressed";
                  document.getElementById ("btn2").className = "";
                }
                  function minus() {
                 var x = document.getElementById("x").value;
                  var y =  document.getElementById("y").value; 
                  var z = parseInt(x) - parseInt(y);
                  document.getElementById ("z").value = z;
                  document.getElementById ("btn1").className = "";
                  document.getElementById ("btn2").className = "pressed";
                  }
            </script>

            <body>
                <a href="billing.php"></a>	
                <h1>Калькулятор
                </h1>
                <input id="x" /> <br />
                <input id="y" /> <br />
                <button id="btn1" onclick="plus();">+</button> 
                <button id="btn2" onclick="minus();">-</button> <br />
           

                <input id= "z" /> <br />
            </body>
        </head>
</html>