<!doctype html>
<html lang="it">

<head>

    <link href="css/carousel.css" rel="stylesheet">
    <link href="css/home.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    require("navbarhead.php");
    ?>
</head>

<body>
    <?php
        session_start();
		if(empty($_SESSION['id'])){
			require_once("navbar.html");
		}
		elseif($_SESSION['role'] == 'master'){
			require_once('master_navbar.html');
		}
        else{
            require_once('logged_navbar.html');
        }
        include("carosello.html");
	?>
<div class="imgpers">

<div class="item-evi">
    <h2>INIZIA A GIOCARE</h2>
    <p>Non hai mai giocato a Magic Fairy?
         Inizia da qui, avventurati nel mondo fantasy che puoi creare con la tua fantasia.</p>
</div>

<div class="item-evi">
    <h2>Panoramica</h2>
     <p>Il gioco è incentrato sulla narrativa e con i tuoi amici potrai 
         portare i personaggi attraverso battaglie con nemici letali,
         audaci salvataggi, intrighi di corte e tanto altro.
         Magic Fairy è il gioco fantasy che stavi aspettando online.
            Divertiti a partecipare alle campagne con i tuoi amici in tutto il mondo, 
            il master potrà realizzare mappe personalizzate per esperienze uniche e sempre nuove.
            Grazie al sito di Magic Fairy potrai dimenticarti i fogli delle schede di gioco da portare sempre in giro
            perchè potrai accedere ai tuoi dati in qualunque momento da qualsiasi dispositivo.
        </p>
</div>

<div class="item-evi">
     <p> Iscriviti ora ed entra in azione.</p>
</div>

<div id="mes-full">
    <p>Immergiti nel magico mondo di Magic Fairy</p>
</div>

<div id="content">
    <div class="articolo">
            <div class="ch-item ch-img-1" style="background-image: url(img/personaggio1.png);">
                <div class="ch-info">
                     <a href="personaggi.php"><h3>Crea i Tuoi Personaggi</h3></a>
                         
                </div>
            </div>
        <h2>Crea i Tuoi Personaggi</h2>
        <p>Quando un giocatore gioca a Magic Fairy, interpreta il ruolo di un
            avventuriero: un abile guerriero, un chierico devoto, 
            un ladro letale o un misterioso mago.

            Il primo passo è immaginare e creare il proprio personaggio.
            Un personaggio è una combinazione di statistiche di gioco, 
            spunti di interpretazione e contributi dell’immaginazione del giocatore. 
            Scegli una razza (per esempio un umano o un halfling) e una classe 
            (per esempio un guerriero o un mago). Dopodiché inventa la personalità, 
            l’aspetto e il background del tuo personaggio. Una volta completato,
            quel personaggio sarà il tuo alter ego all’interno del gioco.

            Con alcuni amici e un pizzico di immaginazione, potrai partire alla
            volta di grandi imprese e avventure mirabolanti, mettendoti alla prova 
            contro una lunga serie di sfide e di mostri assetati di sangue.</p>
                    
    </div>
    <div class="articolo last">
            <div class="ch-item ch-img-2" style="background-image: url(img/montagna.jpg);">
                <div class="ch-info">
                     <a href="campagne.php"><h3>Immagina nuovi mondi</h3></a>
                </div>
            </div>
        <h2>Ruolo del Master</h2>
        <p>Un giocatore assumerà il ruolo del Master, che creerà la campagna fulcro del gioco 
            su cui si determinerà l'avventura che coinvolgerà i personaggi in straordinarie avventure.
            Il Master determina il risultato delle azioni degli avventurieri e descrive ciò 
            che accade ai personaggi. Dal momento che il DM può reagire con l’improvvisazione
            a tutto ciò che i giocatori tentano di fare.
            Cosa aspetti? Inizia a giocare e crea subito una nuova campagna.
        </p>
       
    </div>
</div>



<div class="clear"></div>

   
<div class="item-evi">
    	<h2>Info</h2>
    	<p>Magic Fairy S.R.L.
        Via Cavour, 3 – 16035 Rapallo (GE) | email: magicfairy.bgt@gmail.com | tel: 3313146871
        C.F. / P.IVA – Reg. imprese di Genova (IT) 11840241660</p>
    </div>

	<div id="footer">
        <p> <a href="crowdfunding.php">FAI UNA DONAZIONE </a><br>
            <a href="privacy.html">PRIVACY POLICY </a>
        </p>
    </div>

</div>
</div>
</body>
</html>
