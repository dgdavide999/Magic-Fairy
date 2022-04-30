<?php
    if(!isset($_POST['email'])){
        die("accesso negato");
    }
    //confronto password
    if(!$email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)){
        die("email non valida");
    }
    $importo = trim($_POST['importo']);
    $msg = trim($_POST['msg']);

    if(empty($importo) || $importo<1){
        die("<div class = 'error'>non hai riempito tutti i campi <br> <a href=../crowdfunding.php>torna alla pagina di crowdfunding</a></div></body></html>");
    }
    $carta=$_POST['cardNumber'];
    if(empty($carta) || !is_numeric($carta) || strlen($carta)<15 || strlen($carta)>16) {
        die("<div class = 'error'>dati carta non validi<br> <a href=../crowdfunding.php>torna alla pagina di crowdfunding</a></div></body></html>");
    }
    $scad = $_POST['scad'];
    if(empty($scad) || $scad < date('d/m/y',time())){
        die("<div class = 'error'>dati carta non validi2<br> <a href=../crowdfunding.php>torna alla pagina di crowdfunding</a></div></body></html>");
    }
    $cvv = $_POST['cvv'];
    if(empty($cvv) || !is_numeric($cvv) || strlen($cvv)!=3){
        die("<div class = 'error'>dati carta non validi3<br> <a href=../crowdfunding.php>torna alla pagina di crowdfunding</a></div></body></html>");
    }
    require_once("connection.php");

    if(!($stmt_insert = mysqli_prepare($connection, 
                        "INSERT INTO Crowdfunding (email,importo,messaggio) VALUES (?,?,?);"))){
        die("<div class = 'error'>statement insert non riuscita</div>");
    }
    if(!mysqli_stmt_bind_param($stmt_insert, 'sis', $email,$importo,$msg)){
        die("<div class = 'error'>bind parametri fallito</div>");
    }

    if(!mysqli_stmt_execute($stmt_insert)){
        die("<div class = 'error'>Errore nell'esecuzione dei tuoi dati. Riprovare</div>");
    }

    $num = mysqli_stmt_affected_rows($stmt_insert);
    if($num < 1){
        die("<div class = 'error'>errore di sistema</div>");
    }
    mysqli_close($connection);

    sleep(10000);
header("Location:../crowdfunding.php");
?>