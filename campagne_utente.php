<!doctype html>
<html lang="it" class="h-100">
<head>
    <?php
        require("navbarhead.php");
    ?>
    <link href="css/table.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <?php
        session_start();
		if(empty($_SESSION['id'])){
			die("<div class = 'error'>non sei loggato</div>");
		}
		if($_SESSION['role'] == 'player'){
			require_once('logged_navbar.html');
		}else{
            die("<div class = 'error'>devi essere loggato come giocatore</div>");
        }
    ?>
    <div class="container">
        <ul class="responsive-table">
            <li class="table-header">
                <div class="col col-1">Nome campagna</div>
                <div class="col col-2"></div>
                <div class="col col-3">Lingua</div>
                <div class="col col-4"></div>
            </li>
            <?php
                    require_once("php/tabellaCampagne_utente.php");
            ?>
        </ul>
</div>
</body>
</html>
