<?php
    session_start();
    if(!isset($_POST['nome'])){
        die("accesso negato");
    }
    //leggo dati nuovo utente / pulisco input
    $nome= trim($_POST['nome']);
    $lingua = $_POST['lingua'];
    $user = $_SESSION['id'];

    if(empty($nome)) {
        die("<div class = 'error'>non hai inserito un nome <br> <a href=../creazione_campagna.php>torna alla pagina creazione campagna</a></div></body></html>");
    }

    require_once "connection.php";
    require_once("mailer/mailsender.php");

    $stmt_insert = mysqli_prepare($connection, "INSERT INTO Campagne (nome,lingua,idMaster) VALUES (?,?,?);");
    if(!($stmt_insert)){
        die("<div class = 'error'>statement insert non riuscita</div>");
    }
    if(!mysqli_stmt_bind_param($stmt_insert, 'ssi', $nome,$lingua,$user)){
        die("<div class = 'error'>bind parametri fallito</div>");
    }
    
    if(!mysqli_stmt_execute($stmt_insert)){
        die("<div class = 'error'>esecuzione statement fallita</div>");
    }

    if(($num = mysqli_stmt_affected_rows($stmt_insert))>1){
        die("<div class = 'error'>troppi insert</div>");
    }
    elseif($num < 1){
        die("<div class = 'error'>errore di sistema</div>");
    }

//mail


$stmt_select = mysqli_prepare($connection, "SELECT * FROM Utenti WHERE lingua=? AND news=1");
    if(!($stmt_select)){
        die("<div class = 'error'>statement select non riuscita</div>");
    }
    if(!mysqli_stmt_bind_param($stmt_select, 's', $lingua)){
        die("<div class = 'error'>bind parametri fallito</div>");
    }
    if(!mysqli_stmt_execute($stmt_select)){
        die("<div class = 'error'>esecuzione select fallita</div>");
    }
    if(!($res=mysqli_stmt_get_result($stmt_select))){
        die("<div class = 'error'>query non riuscita select<br> <a href=home_page.php>torna alla home_page</a></div>");
    }


while ($row = mysqli_fetch_array($res)) {
    $email = $row['email'];
    $subject ="nuova campagna";
    $body = "Ciao ".$row['firstname']."\nè stata creata una nuova campagna: ".$nome."\n gurada se ti può interessare";
    $messaggio = send_mail($email,$subject,$body);
}
mysqli_close($connection);

header("Location:../campagne.php");
?>