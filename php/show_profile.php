<!DOCTYPE html>
<html lang="it">

<head>
    <title>esercizio 1</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

    <?php require_once "../navbarhead.php" ?>
    <script src="../js/checkform.js"></script> <!-- Modernizr -->
    <link rel="stylesheet" href="../css/log-style.css">
</head>

<body>
<?php
session_start();
if(empty($_SESSION['id'])){
    die("<div class ='error'>ops, devi essere loggato per entrare qui<br> <a href=..>torna alla homepage</a></div>");
}
else{
    require_once('../logged_navbar.html');
}
?>
<div class="login-wrap">
    <div class="login-html">

        <label for="tab-1" class="tab">Modifica Account</label>

        <div class="login-form">
            <!--   ISCRIVITI  -->
            <form action="update_profile.php" method="POST" id="modAccount">
                <div class="group">
                    <label for="firstname" class="label">Nome</label>
                    <input id="firstname" name="firstname" type="text" class="input" value=<?php echo ("\"".$_SESSION['firstname']."\"" );?> onfocusout="valida(this.id);">
                    <label id="err_firstname" class="err_label"></label>
                </div>
                <div class="group">
                    <label for="lastname" class="label">Cognome</label>
                    <input id="lastname" type="text" name="lastname" class="input" value=<?php echo ("\"".$_SESSION['lastname']."\"");?> onfocusout="valida(this.id);">
                    <label id="err_lastname" class="err_label"></label>
                </div>
                <div class="group"><!-- bloccare la mail (visibile nel form ma non modificabile)-->
                    <label for="email" class="label">e-mail</label>
                    <input id="email" name="email" type="email" class="input" value=<?php echo ("\"".$_SESSION['email']."\"");?>onfocusout="validaMail(this.id);">
                    <label id="err_email" class="err_label"></label>
                </div>
                <div class="group"> <!-- cambio password da spostare? (già c'è poca roba)-->
                    <label for="pass" class="label">Password</label>
                    <input id="pass" type="password" name="pass" class="input" data-type="password" onfocusout="valida(this.id);">
                    <label id="err_pass" class="err_label"></label>
                </div>
                <div class="group">
                    <label for="new-pass" class="label">Nuova Password</label>
                    <input id="new-pass" name="new-pass" type="password" class="input" data-type="password" onfocusout="valida(this.id);">
                    <label id="err_new_pass" class="err_label"></label>
                </div>
                <div class="group">
                    <label for="confirm" class="label">conferma Nuova Password</label>
                    <input id="confirm" name="confirm" type="password" class="input" data-type="password">
                    <label id="err_confirm" class="err_label"></label>
                </div>
                <div class="group">
                    <label for="lingua" class="label">Lingua</label>
                    <select name ="lingua" class="Selectcharacter">
                        <option value = "italiano">Italiano</option>
                        <option value = "inglese">Inglese</option>
                        <option value = "francese">Francese</option>
                        <option value = "cinese">Cinese</option>
                    </select>
                    <label id="err_confirm" class="err_label"></label>
                </div>
                <div class="group">
                    <label for="checkbox" class="label">vuoi iscriverti alla nostra newsetter? <br>(non mettere la spunta causerà la disiscrizione)</label>
                    <input type="checkbox" name="newsletter" value="yes"/>
                </div>

                <div class="group">
                    Backgound:<input type="color" name="backgound"/>
                    Text color:<input type="color" name="textc" />
                </div>
                <div class="group">
                    <input type="submit" class="button" value="Salva Modifiche" onclick="submitModificaAccount()">
                </div>
                <div class="hr"></div>
            </form>

        </div>
    </div>
</div>
</body>

</html>
