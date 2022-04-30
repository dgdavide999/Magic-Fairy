<?php
session_start();
    if(!isset($_POST['character'])){
        die('accesso negato');
    }
    $character = $_POST['character'];
    $user = $_POST['player'];
    $id = $_POST['charaId'];

    if(empty($_SESSION['id'])){
        die("<div class = 'error'>non sei loggato</die>");
    }
    elseif($_SESSION['role'] != 'master'){
        die("<div class = 'error'>devi essere loggato come dungeon master</die>");
    }
    require_once("mailer/mailsender.php");
    require_once("connection.php");

    $stmt_select = mysqli_prepare($connection,"SELECT email,firstname FROM Utenti JOIN Personaggi ON id = idUtente WHERE idPersonaggi = ?");



    if(!($stmt_select)){
        die("<div class = 'error'>statement select non riuscita</div>");
    }
    if(!mysqli_stmt_bind_param($stmt_select, 'i', $id)){
        die("<div class = 'error'>bind parametri fallito</div>");
    }
    if(!mysqli_stmt_execute($stmt_select)){
        die("<div class = 'error'>esecuzione select fallita</div>");
    }
    if(!($giocatoreInDB=mysqli_stmt_get_result($stmt_select))){
        die("<div class = 'error'>query non riuscita select<br> <a href=home_page.php>torna alla home page</a></div>");
    }

    $subject ="invito campagna";
    $row=mysqli_fetch_row($giocatoreInDB);
            $body = "Ciao ".$user."<br>".$character." è stato invitato ad una nuova campagna da ".$_SESSION['firstname']."\n guarda se ti può interessare <br>
                        <a href='https://saw21.dibris.unige.it/~S4840738/progetto/php/conferma_invito.php?idCampagna=".$_SESSION['idCampagna']."&idPersonaggio=".$id."'>Clicca qui per accettare</a>";
            $messaggio = send_mail($row['email'], $subject, $body);

            $stmt_insert = mysqli_prepare($connection,"INSERT INTO CampagnaPersonaggi (idCampagna,idPersonaggio) VALUES (?,?)");

            if(!$stmt_insert){
                die("<div class = 'error'>statement insert non riuscita</div>");
            }
            if(!mysqli_stmt_bind_param($stmt_insert, 'ii', $_SESSION['idCampagna'],$id)){
                die("<div class = 'error'>bind parametri fallito</div>");
            }
            if(!mysqli_stmt_execute($stmt_insert)){
                die("<div class = 'error'>hai già invitato questa persona</div>");
            }

mysqli_close($connection);
?>