<?php
    session_start();

//pulizia input
    if(!isset($_POST['pass'])){
        die("accesso negato");
    }
    $pass = $_POST['pass'];
    if(!$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        die("mail non valida");
    }

    require_once("connection.php");
    //preparo gli statement
    if(!($stmt_select = mysqli_prepare($connection, "SELECT * FROM Utenti WHERE email=?"))){
        die("<div class = 'error'>statement non riuscita</div>");
    }
    if(!mysqli_stmt_bind_param($stmt_select, 's', $email)){
        die("<div class = 'error'>bind parametri fallito</div>");
    }

    if(empty($pass)){
        die("<div class = 'error'>non hai riempito tutti i campi<br> <a href=../indexlogin.php>torna alla pagina di login</a></div>");
    }
 
    if(!mysqli_stmt_execute($stmt_select)){
        die("<div class = 'error'>esecuzione select fallita</div>");
    }
    
    if(!($res=mysqli_stmt_get_result($stmt_select))){
        die("<div class = 'error'>query non riuscita select<br> <a href=../indexlogin.php>torna alla pagina di login</a></div>");
    }

    $rowcount=mysqli_num_rows($res);
    if($rowcount == 0){
        die("<div class = 'error'>account non trovato<br> <a href=../indexlogin.php>torna alla pagina di login</a></div>");
    }
    elseif($rowcount > 1){
        die("<div class = 'error'>quanti account hai?</div>");
    }
    $rows = mysqli_fetch_all ($res, MYSQLI_ASSOC );
    //controllo password
    if(!password_verify($pass,$rows[0]['pass'])){
        die("<div class = 'error'><br>password non corretta <a href=../indexlogin.php>torna alla pagina di login</a></div>");
    }
   
    $_SESSION['id'] = $rows[0]['id'];
    $_SESSION['firstname'] = htmlspecialchars($rows[0]['firstname']);
    $_SESSION['lastname'] = htmlspecialchars($rows[0]['lastname']);
    $_SESSION['email'] = $rows[0]['email'];
    $_SESSION['pass'] = $rows[0]['pass'];
    $_SESSION['lingua'] = $rows[0]['lingua'];
    $_SESSION['role'] = $_POST['ruolo']; //player o master

    mysqli_close($connection);
    header("Location:../home_page.php");
?>