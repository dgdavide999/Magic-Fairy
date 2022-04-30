<?php
    session_start();
    if(!isset($_POST['pass']) || !isset($_SESSION['id'])){
        die('accesso negato');
    }
    //confronto password
    $pass = $_POST['pass'];
    $newpass = $_POST['new-pass'];
    $confirm = $_POST['confirm'];


    if(!empty($newpass)){
        if($newpass != $confirm ){
            die("<div class = 'error'>le password non combaciano <br> <a href=indexlogin.php>torna alla pagina di login</a></div></body></html>");
        }
        $newpass=password_hash($newpass,PASSWORD_DEFAULT);
    }
    else{
        $newpass=password_hash($pass, PASSWORD_DEFAULT);
    }

    if(!$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        die("mail non valida");
    }
    //leggo dati nuovo utente / pulisco input
    $id = $_SESSION['id'];
    $firstname= trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $lingua = $_POST['lingua'];

    if(isset($_POST['newsletter']) && $_POST['newsletter']=="yes"){
        $news = 1;
    }else{
        $news=0;
    }

    if(empty($firstname) || empty($lastname)){
        die("<div class = 'error'>non puoi lasciare campi vuoti <br> <a href=indexlogin.php>torna alla pagina di login</a>");
    }

    require_once("connection.php");

    //preparo la statement
    if(!($stmt_update = mysqli_prepare($connection, 
    "UPDATE Utenti SET firstname= ?, lastname = ?, email = ? , pass = ?, lingua = ?, news = ? WHERE id = ?;"))){
        die("<div class = 'error'>statement update non riuscita</div>");
    }
    if(!mysqli_stmt_bind_param($stmt_update, 'sssssii', $firstname,$lastname,$email,$newpass,$lingua,$news,$id)){
        die("<div class = 'error'>bind parametri fallito</div>");
    }

    if(!mysqli_stmt_execute($stmt_update)){
        die("<div class = 'error'>esecuzione insert fallitaz</div>");
    }   
    if(($num = mysqli_stmt_affected_rows($stmt_update))>1){
        die("<div class = 'error'>beccato</div>");
    }
    elseif($num < 1){
        die("<div class = 'error'>errore di sistema</div>");
    }
    mysqli_close($connection);

    $arr_cookie_options = array (
        'expires' => time()+31536000, 
        'path' => '/'
        ); 
    $textc=$_POST['textc'];
    $backgound=$_POST['backgound'];
    
    setcookie("cookietextc", $textc, $arr_cookie_options);
    setcookie("cookiebackgound", $backgound, $arr_cookie_options);
    
    $_SESSION['firstname'] = htmlspecialchars($firstname);
    $_SESSION['lastname'] = htmlspecialchars($lastname);
    $_SESSION['email'] = $email;
    $_SESSION['pass'] = $newpass;
    $_SESSION['lingua'] = $lingua;
    header("Location:../home_page.php");
?>