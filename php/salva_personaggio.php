<?php
    if(!isset($_POST['nome'])){
        die("accesso negato");
    }
    session_start();
    //leggo dati nuovo utente / pulisco input
    $nome= trim($_POST['nome']);
    $classe = $_POST['classe'];
    $razza = $_POST['razza'];
    $user = $_SESSION['id'];
    require_once("connection.php");

    if(!($stmt_insert = mysqli_prepare($connection,
                        "INSERT INTO Personaggi (nome,classe,razza,idUtente) VALUES (?,?,?,?);"))){
        die("<div class = 'error'>statement insert non riuscita</div>");
    }
    if(!mysqli_stmt_bind_param($stmt_insert, 'sssi', $nome,$classe,$razza,$user)){
        die("<div class = 'error'>bind parametri fallito</div>");
    }

    if(empty($nome)) {
        die("<div class = 'error'>non hai inserito un nome <br> <a href=../creazione_personaggio.php>torna alla creazione personaggio</a></div> </body></html>");
    }
    if(!mysqli_stmt_execute($stmt_insert)){
        die("<div class = 'error'>errore durante l'esecuzione</div>");
    }
    if(($num = mysqli_stmt_affected_rows($stmt_insert))>1){
        die("<div class = 'error'>troppi insert</div>");
    }
    elseif($num < 1){
        die("<div class = 'error'>errore di sistema</div>");
    }
    mysqli_close($connection);

    header("Location:../personaggi.php");
?>