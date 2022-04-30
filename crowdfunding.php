<!doctype html5>
<html lang="it">

<head>
    <?php
        require("navbarhead.php");
    ?>                               
    <link href="css/carousel.css" rel="stylesheet">
    <link href="css/crowdfunding.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
</head>

<body>
    <?php
        session_start();
        if(empty($_SESSION['id'])){
            require_once('navbar.html');
        }
        elseif($_SESSION['role'] == 'master'){
            require_once('master_navbar.html');
        }
        else{
            require_once('logged_navbar.html');
        }
        require("php/connection.php");
        if(!($stmt_select = mysqli_prepare($connection, "SELECT importo FROM Crowdfunding"))){
            die("<div class = 'error'>statement select non riuscita</div>");
        }
        if(!mysqli_stmt_execute($stmt_select)){
            die("<div class = 'error'>esecuzione select fallita</div>");
        }
        if(!($result=mysqli_stmt_get_result($stmt_select))){
            die("<div class = 'error'>query non riuscita select<br> <a href=home_page.php>torna alla home_page</a></div>");
        }
        $i=0;
        foreach($result as $e){
          $i=$i+$e['importo'];
        }
	?>

    <div class="container">
    <section class="section-iniz">
        <p>Sostieni Magic Fairy. Grazie al tuo aiuto potremo incominciare a svilluppare il gioco online.</p>
        <button id="btnmodale" class="btn">Versa un contributo</button> <!--modal-btn java-->
    </section>
    <section class="section-progress">
        <div class="progress-item">
            <div class="digit">&#8364<span id="donato"><?php echo $i;?></span></div><!--total-amount  total-target java-->
            <div class="digit-text" id="totale-donazioni">di &#8364 100,000 totali</div>
        </div>
    
        <div class="progress-bar">
            <div class="progress"></div>
        </div>
    </section>
    </div>
    <!-- Selection Modal Start -->
    <section id="modal">
        <div class="modal-header">
            <h2>Aiuta Magic Fairy </h2>
            <p>Rendiamo Magic Fairy un gioco sempre più coinvolgente grazie al tuo aiuto</p>
            <button id="close-modal">&times;</button>
        </div>
        <div class="finestra-modale">
            <form action="php/salva_crowdfunding.php" method="POST" id="form1" nome="invio">
                <input id="email" name="email" type="email" class="input" value='<?php if(@$_SESSION['email']){echo (@$_SESSION['email']);}else echo "";?>' onfocusout="validaMail(this.id);"/>
                <label id="err_email" class="err_label"></label>
                <input type="number"  name="importo" id="importo" class="input-bid" id="any-pledge" min="1" placeholder="0" required />
                <input type = "text"  maxlength="16" minlength="15" id = "cardNumber" name = "cardNumber" class="carta" placeholder="Numero di carta di credito" onfocusout="validaCarta(this.id);"/>
                <label id="err_cardNumber" class="err_label"></label>
                <br>Scadenza
                <input type="date" name ="scad"class="scad" id="scad" onfocusout="valida(this.id);"/>
                <input type="text" name ="cvv" maxlength="4" minlength="3" placeholder="CVV" class="cvv" id ="cvv" onfocusout="validaCvv(this.id);"/>
                <label id="err_cvv" class="err_label"></label>

                Lascia un commento<textarea placeholder="Messaggio..." rows="3" name="msg"></textarea>
                <button type="submit" class="continue pay button" id="any-continue" value="invia" onsubmit="validaCrowd()">invia</button>
            </form>
        </div>
        <!-- Success modal start CELLE finestra modale che ringrazia-->
        <div id="success-container">
            <div id="success-modal">
                <img src="img/logod.jpg" id="success-icon">   
                <h3>Grazie per il supporto</h3>
                
                <button id="final-success">Continua</button>
            </div>
        </div>
    </section>
    <!-- Success modal end -->

    <!-- Notification modal start -->
    <div id="notification-container">
        <div id="notification-modal"></div>
    </div>
    <!-- Notification modal end -->


    <script src="js/crowdfunding.js"></script>
    <script src="js/checkform.js"></script>
</body>
</html>