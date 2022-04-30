<!DOCTYPE html>
<html lang="it">

<head>
    <title>Creazione Personaggio</title>
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
			die("<div class = 'error'>non sei loggato</div>");
		}
		elseif($_SESSION['role'] == 'player'){
			require_once('logged_navbar.html');
		}
        else{
            die("<div class = 'error'>devi essere loggato come giocatore</die>");
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
                        <form action="php/salva_personaggio.php" method="POST" id="form1">
                        <div class="group">
                            <label for="nome" class="label" >Nome</label>
                            <input id="nome" name="nome" type="text" class="input" placeholder="Alastor" onfocusout="valida(this.id);" >
                            <label id="err_nome" class="err_label"></label>
                        </div>
                        <div class="group">
                            <label for="classe" class="label">Classe</label>
                            <!-- <input id="classe" type="text" name="classe" class="input" placeholder="bardo" onfocusout="valida(this.id);" >-->
                            <select name ="classe" class="Selectcharacter">
                            <option value = "bardo">bardo</option>
                            <option value = "barbaro">barbaro</option>
                            <option value = "guerriero">guerriero</option>
                            <option value = "mago">mago</option>
                            <option value = "stregone">stregone</option>
                            <option value = "druido">druido</option>
                            <option value = "monaco">monaco</option>
                            <option value = "paladino">paladino</option>
                            <option value = "chierico">chierico</option>
                            <option value = "ranger">ranger</option>
                            </select>

                            <label id="err_classe" class="err_label"></label>
                        </div>
                        <div class="group">
                            <label for="razza" class="label">Razza</label>
                            <!--<input id="razza" name="razza" type="TEXT" class="input" placeholder="elfo" onfocusout="valida(this.id);">-->
                            <select name ="razza" class="Selectcharacter">
                            <option value = "elfo">elfo</option>
                            <option value = "gnomo">gnomo</option>
                            <option value = "halfling">halfling</option>
                            <option value = "mezzelfo">mezzelfo</option>
                            <option value = "mezzorco">mezzorco</option>
                            <option value = "nano">nano</option>
                            <option value = "umano">umano</option>
                            </select>
                            <label id="err_razza" class="err_label"></label>
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