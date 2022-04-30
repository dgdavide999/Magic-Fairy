<!doctype html>
<html lang="it" class="h-100">
<head>
    <?php
        require("navbarhead.php");
    ?>
    <link href="css/table.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/finestramodale.css" rel="stylesheet">
    <script src='js/invita.js'></script>
</head>
<body>
    <?php
        session_start();
		if(empty($_SESSION['id'])){
			die("<div class = 'error'>non sei loggato</div>");
		}
		elseif($_SESSION['role'] == 'master'){
			require_once('master_navbar.html');
		}
        else{
            die("<div class = 'error'>devi essere loggato come dungeon master</div>");
        }
    ?>
    <div class="container">
        <ul class="responsive-table">
            <li class="table-header">
                <div class="col col-1">Nome campagna</div>
                <div class="col col-2">Lingua</div>
                <div class="col col-3"></div>
                <div class="col col-4"></div>
            </li>
            <?php
                    require_once("php/tabellaCampagne.php");
            ?>
            <a href="creazione_campagna.php"><h4>crea una nuova campagna</h4></a>
        </ul>
</div>
</body>
</html>

<script src="js/ricerca.js"></script>