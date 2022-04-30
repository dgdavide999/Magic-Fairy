<?php
    session_start();
    if(!isset($_GET['idCampagna']) || !isset($_GET['idPersonaggio'])){
        die('accesso negato');
    }
    $camp = $_GET['idCampagna'];
    $pers = $_GET['idPersonaggio'];;
    require_once("connection.php");
    
    if(!($stmt_update = mysqli_prepare($connection,
        "UPDATE CampagnaPersonaggi SET accettato = 1 WHERE idCampagna = ? AND idPersonaggio = ?"))){
        die("<div class = 'error'>statement update non riuscita</div>");
    }
    if(!mysqli_stmt_bind_param($stmt_update, 'ii', $camp,$pers)){
        die("<div class = 'error'>bind parametri fallito</div>");
    }
    if(!mysqli_stmt_execute($stmt_update)){
        die("<div class = 'error'>problema di connessione</div>");
    }
    if(($num = mysqli_stmt_affected_rows($stmt_update))<1){
        die("<div class = 'error'>invito errato o già accettato</div>");
    }
    echo "invito accettato";
    mysqli_close($connection);
?>