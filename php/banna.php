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
    require_once("connection.php");


    $stmt_update = mysqli_prepare($connection,"UPDATE CampagnaPersonaggi SET ban=1 WHERE idCampagna = ? AND idPersonaggio= ? ");

    if(!$stmt_update){
        die("<div class = 'error'>statement update non riuscita</div>");
    }
    if(!mysqli_stmt_bind_param($stmt_update, 'ii', $_SESSION['idCampagna'],$id)){
        die("<div class = 'error'>bind parametri fallito</div>");
    }
    if(!mysqli_stmt_execute($stmt_update)) {
        die("<div class = 'error'>errore creazione invito</div>");
    }

mysqli_close($connection);
?>