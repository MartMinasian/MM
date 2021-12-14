<?php 
session_start();

if (!isset($_SESSION["user"])) {
    echo('<meta http-equiv="refresh" content="2; URL=login.php">');
}

?>
<html>
        <head>
 
            <meta charset="utf-8"/>

            
            <script>
                function getlog() {
                 var url = "api/get_log.php"  ;
                 var xhr = new XMLHttpRequest();
                 xhr.open("GET",url,false);
                 xhr.send();
                 var text = xhr.responseText;     
                 var results = JSON.parse(text);
                 console.log(results)  ; 
                 var out = ""; 
                 var counter = 0; 
                 for(var i=0; i < results.length; i++)  {
                    var calc = results[i];
                    console.log(calc);
                    var x = calc[1];
                    var y = calc[2];
                    var result = calc[3];
                    out += "X:" + x + " Y:" + y + " Result:" + result + "<br />";
                    counter += 1;
                } 
                 document.getElementById("display").innerHTML = out;
                 document.getElementById("amount").innerText = 
                        "C Вас, сударь, $" + counter;
                }
                  
            </script>
        </head>
            <body onload="getlog();">
             <a href="index_.html">Индекс</a>
                <h1>Ваши вычисления  </h1>
                <div id="display"></div>
                <h2 id="amount"></h2>
            </body>
        </head>
</html>