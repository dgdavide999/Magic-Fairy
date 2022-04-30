<!DOCTYPE html>
<html lang="it">

<head>
    <title>Crea Campagna</title>
    <link rel="icon" href="img/logo.jpg">
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

	<?php require_once('navbarhead.php'); ?>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/log-style.css">

    <script src="js/checkform.js"></script>

</head>

<body>
    <?php
    session_start();
        if(empty($_SESSION['id'])){
			die("<div class = 'error'>non sei loggato</die>");
		}
		elseif($_SESSION['role'] == 'master'){
			require_once('master_navbar.html');
		}
        else{
            die("<div class = 'error'>devi essere loggato come dungeon master</die>");
        }
    ?>
    <div class="login-wrap" >
        <div class="login-html">

            <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
            <label for="tab-1" class="tab"></label>
            <input id="tab-2" type="radio" name="tab" class="sign-up">
            <label for="tab-2" class="tab"></label>

            <div class="login-form" id="test">
                <!--   ISCRIVITI  -->
                <div class="sign-in-htm">
                        <form action="php/salva_campagna.php" method="POST" id="form1">
                        <div class="group">
                            <label for="nome" class="label" >Nome campagna</label>
                            <input id="nome" name="nome" type="text" class="input" placeholder="Cittadella" onfocusout="valida(this.id);" >
                            <label id="err_nome" class="err_label"></label>
                        </div>
                        <div class="group">
                            <label for="lingua" class="label">Lingua</label>
                            <select name ="lingua" class="Selectcharacter">
                            <option value = "italiano">Italiano</option>
                            <option value = "inglese">Inglese</option>
                            <option value = "francese">Francese</option>
                            <option value = "cinese">Cinese</option>
                            </select>

                            <label id="err_classe" class="err_label"></label>
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="Salva">
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</body>

</html>