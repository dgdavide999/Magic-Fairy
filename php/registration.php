<?php
    if(!isset($_POST['pass'])){
        die("accesso negato");
    }
    //confronto password
    $pass = $_POST['pass'];
    $confirm = $_POST['confirm'];
    //leggo dati nuovo utente / pulisco input
    $firstname= trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    if(isset($_POST['newsletter']) && $_POST['newsletter']=="yes"){
        $news = 1;
    }else{
        $news=0;
    }

    //controlli pre connessione
    if(!$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        die("mail non valida");
    }
    if(empty($firstname) || empty($lastname)){
        die("<div class = 'error'>non hai riempito tutti i campi <br> <a href=../indexlogin.php>torna alla pagina di login</a></div></body></html>");
    }
    if(strlen($pass)<6){
        die("password troppo corta");
    }
    if( $pass != $confirm ){
        die("<div class = 'error'>le password non combaciano <br> <a href=../indexlogin.php>torna alla pagina di login</a></div></body></html>");
    }

    $pass = password_hash($pass,PASSWORD_DEFAULT);

    require_once("connection.php");

    if(!($stmt_insert = mysqli_prepare($connection, 
                        "INSERT INTO Utenti (firstname,lastname,email,pass,news) VALUES (?,?,?,?,?);"))){
        die("<div class = 'error'>statement insert non riuscita</div>");
    }
    if(!mysqli_stmt_bind_param($stmt_insert, 'ssssi', $firstname,$lastname,$email,$pass,$news)){
        die("<div class = 'error'>bind parametri fallito</div>");
    }

    if(!mysqli_stmt_execute($stmt_insert)){
        die("<div class = 'error'>email già utilizzata</div>");
    }

    if(($num = mysqli_stmt_affected_rows($stmt_insert))>1){
        die("<div class = 'error'>beccato</div>");
    }
    elseif($num < 1){
        die("<div class = 'error'>errore, riprovare<br> <a href=../indexlogin.php>torna alla pagina di login</a></div></body></html>");
    }
    mysqli_close($connection);
    
    header("Location:../indexlogin.php");
?>