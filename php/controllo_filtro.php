<?php
    if(empty($_SESSION['id'])){
        die("<div class = 'error'>non sei loggato</div>");
    }
    if($_SESSION['role']!='master'){
        die("<div class = 'error'>devi essere loggato come master</div>");
    }
    $id= $_SESSION['id'];
    $filtro = trim('%'.$_POST['parolaChiave'].'%');

    if(!$_POST['idCampagna']){
        die("<div class = 'error'>qualcosa è andato storto</div>");
    }

    $_SESSION['idCampagna'] = $_POST['idCampagna'];
?>