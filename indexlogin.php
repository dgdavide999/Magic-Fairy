<!DOCTYPE html>
<html lang="it">

<head>
    <title>Log In</title>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

	<?php require_once('navbarhead.php'); ?>
    <script src="js/checkform.js"></script>
    <link rel="stylesheet" href="css/log-style.css">

</head>

<body>
    <?php
    session_start();
        if(empty($_SESSION['id'])){
            require_once('navbar.html');
        }
        else{
            die("<div class ='error'>sei già loggato<br> <a href=home_page.php>torna alla home page</a></div>");
        }
    ?>
    <div class="login-wrap" >
        <div class="login-html">

            <input id="tab-1" type="radio" name="tab" class="sign-in" checked>
            <label for="tab-1" class="tab">Registrati</label>
            <input id="tab-2" type="radio" name="tab" class="sign-up">
            <label for="tab-2" class="tab">Accedi</label>

            <div class="login-form" id="test">
                <!--   ISCRIVITI  -->
                <div class="sign-in-htm">
                        <form action="php/registration.php" method="POST" id="form1">
                        <div class="group">
                            <label for="firstname" class="label" >Nome</label>
                            <input id="firstname" name="firstname" type="text" class="input" placeholder="Mario" onfocusout="valida(this.id);" >
                            <label id="err_firstname" class="err_label"></label>
                        </div>
                        <div class="group">
                            <label for="lastname" class="label">Cognome</label>
                            <input id="lastname" type="text" name="lastname" class="input" placeholder="rossi" onfocusout="valida(this.id);" >
                            <label id="err_lastname" class="err_label"></label>
                        </div>
                        <div class="group">
                            <label for="email" class="label">e-mail</label>
                            <input id="email" name="email" type="email" class="input" placeholder="mario.rossi@gmail.com" onfocusout="validaMail(this.id);">
                            <label id="err_email" class="err_label"></label>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="pass" type="password" name="pass" class="input" data-type="password" onfocusout="validaPass(this.id);">
                            <label id="err_pass" class="err_label"></label>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">conferma Password</label>
                            <input id="confirm" name="confirm" type="password" class="input" data-type="password" onfocusout="valida(this.id);">
                            <label id="err_confirm" class="err_label"></label>
                        </div>
                        <div class="group">
                            <label for="checkbox" class="label">vuoi iscriverti alla nostra newsetter?</label>
                            <input type="checkbox" name="newsletter" value="yes"/>
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="registrati" onsubmit="return submitRegistration()">
                        </div>
                        <div class="hr"></div>
                    </form>
                </div>
                <!--   ACCEDI  -->
                <div class="sign-up-htm">
                    <form action="php/login.php" method="POST" id="form2">
                        <div class="group">
                            <label for="email" class="label">e-mail</label>
                            <input id="emailL" type="email" class="input" name="email" onfocusout="validaMail(this.id);">
                            <label id="err_emailL" class="err_label"></label>
                        </div>
                        <div class="group">
                            <label for="pass" class="label">Password</label>
                            <input id="passL" type="password" name="pass" class="input" data-type="password" onfocusout="valida(this.id);">
                            <label id="err_passL" class="err_label"></label>
                        </div>
                        <div class="group">
                            <label for="radio" class="label">Accedi come</label>
                            <input type="radio" name="ruolo" value="player" checked="player"/>giocatore
                            <input type="radio" name="ruolo" value="master"/>game master
                        </div>
                        <div class="group">
                            <input type="submit" class="button" value="accedi" onsubmit="return submitLogin()">
                        </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>