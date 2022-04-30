<?php
    $Sname ='localhost';
    $Uname = 'S4840738';
    $Spassword = 'Cima2000';
    $db_name = 'S4840738';
    $connection = mysqli_connect($Sname, $Uname, $Spassword, $db_name);
    if(!$connection){
        die("<div class = 'error'>connessione non riuscita <br> <a href=../home_page.php>torna alla home page</a></div>");
    }
?>