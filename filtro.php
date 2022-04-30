<?php
    session_start();
    require_once ('php/controllo_filtro.php');

    require_once("php/connection.php");
    if(!($stmt_select = mysqli_prepare($connection, "SELECT * FROM Personaggi  JOIN Utenti ON idUtente=id WHERE 
                                                           (nome LIKE ?
                                                         OR razza LIKE ?
                                                         OR classe LIKE ?)
                                                         AND idUtente <> ?")))
    {
        die("<div class = 'error'>statement non riuscita</div>");
    }


    if(!mysqli_stmt_bind_param($stmt_select, 'sssi',$filtro,$filtro,$filtro,$id)){
        die("<div class = 'error'>bind parametri fallito</div>");
    }
     if(!mysqli_stmt_execute($stmt_select)){
         die("<div class = 'error'>esecuzione select fallita</div>");
     }
     if(!($res=mysqli_stmt_get_result($stmt_select))){
         die("<div class = 'error'>query non riuscita select<br> <a href=home_page.php>torna alla home_page</a></div>");
     }
     
     echo "<html>
                <head>";
                    require('navbarhead.php');
                    echo"<link href='css/table.css' rel='stylesheet'>
                    <script src='js/invita.js'></script>
                </head>
                <body>";


                if($_SESSION['role'] == 'master'){
                    require_once('master_navbar.html');
                }
                else{
                    die("<div class = 'error'>devi essere loggato come dungeon master</div>");
                }
                    echo "<div style = 'padding-bottom: 100px'></div>
                    <div class='container'>
                        <ul class='responsive-table'>
                            <li class='table-header'>
                                <div class='col col-1'>Nome</div>
                                <div class='col col-2'>Classe</div>
                                <div class='col col-3'>Razza</div>
                                <div class='col col-4'>Giocatore</div>
                                <div class='col col-5'></div>
                            </li>";
     $i =0;
     foreach($res as $e){
        $i = $i+1;
     echo "                 <li class='table-row' id ='column'>
                                <div class='col col-1' data-label='Nome' id='nome".$i."'>".$e['nome']."</div>
                                <div class='col col-2' data-label='Classe' >".$e['classe']."</div>
                                <div class='col col-3' data-label='Razza'>".$e['razza']."</div>
                                <div class='col col-4' data-label='giocatore' id='giocatore".$i."'>".$e['firstname']."</div>
                                <div class='col col-5' data-label='invita'><input type='submit' class ='button' id='invitaButton".$i."' value='invita' onclick='invita(this.id,".$e['idPersonaggi'].")'></div>
                                
                            </li>";
     }

     echo "<div id = 'result'></div></div></div></body></head>";
