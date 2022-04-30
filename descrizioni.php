<html>
    <head>
    <?php
        require("navbarhead.php");
    ?>
    <link href="css/descrizioni.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
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
    ?>
    <div class="container">
        <h2 class="descr">Razze</h2>
            <div class="descr">Elfi</div>
                <p>I longevi elfi sono i figli del mondo naturale, simili per alcuni versi alle creature fatate, e tuttavia differenti. Gli elfi danno valore alla riservatezza ed alle tradizioni e sebbene sia per loro piuttosto difficile instaurare nuove amicizie, a qualsiasi livello, una volta che uno straniero è accettato come compagno, tale alleanza può durare per intere generazioni. Gli elfi hanno un curioso Legame con ciò che li circonda, forse conseguenza della loro longevità o per altri motivi più profondi e mistici, e se abitano nello stesso luogo per molto tempo scoprono che il loro fisico si è adattato al luogo. Il segno più evidente è il colore della pelle che riflette quello dell'ambiente. Quegli elfi che passano le loro vite fra le razze meno longeve, d'altra parte, spesso sviluppano una Percezione distorta della mortalità e diventano più cupi, per aver visto invecchiare e morire davanti ai loro occhi i propri compagni numerose volte.</p>
            <div class="descr">Gnomi</div>
                <p>Gli gnomi tracciano la loro discendenza nel misterioso regno fatato, un luogo in cui i colori sono più luminosi, le terre incolte più selvagge e le emozioni più primeve. Forze sconosciute molto tempo fa hanno portato via gli gnomi antichi da quel regno, costringendoli a cercare rifugio in questo mondo; malgrado ciò, gli gnomi non hanno mai completamente abbandonato le loro radici fatate nè si sono adattati alla cultura mortale. Di conseguenza, gli gnomi sono considerati dalle altre razze per lo più come misteriosi e bizzarri.</p>
            <div class="descr">Halfling</div>
                <p>Ottimisti e allegri per natura, benedetti da una fortuna misteriosa e determinati da uno spirito formidabile, gli halfling compensano la loro bassa statura con un'abbondanza di spavalderia e curiosità. Emozionabili e accomodanti allo stesso tempo, gli halfling prediligono mantenere un temperamento costante e controllato in ogni occasione, evitando quegli scoppi troppo violenti o emotivi delle altre razze più volubili. Anche nei momenti più catastrofici, un halfling non perde quasi mai il suo senso dell'umorismo.
                            Gli halfling sono opportunisti inveterati. Incapaci di difendersi fisicamente dai rigori del mondo, sanno quando piegarsi al vento e quando nascondersi. Tuttavia la curiosità degli halfling spesso sovrasta il buon senso, portandoli a decisioni poco adeguate per evitare i pericoli.
                            Benchè la loro curiosità li guidi per viaggiare e cercare nuovi posti ed esperienze, gli halfling possiedono un forte senso della propria casa, spendendo spesso oltre i loro mezzi per aumentare le comodità della vita domestica.</p>
                    
            <div class="descr">Mezzelfi</div>
                <p>Gli elfi hanno per lungo tempo attratto gli sguardi bramosi delle altre razza. La loro longevità, affinità magica e innata grazia contribuiscono tutte all'ammirazione o talvolta all'amara invidia di chi sta loro vicino. Di tutte le loro caratteristiche, tuttavia, nessuna è più attraente per gli umani della loro bellezza. Da quando le due razze sono entrate in contatto tra loro, gli umani hanno sostenuto gli elfi come modelli di perfezione fisica, vedendoli come versioni idealizzate di se stessi. Da parte loro, molti elfi trovano gli umani attraenti malgrado i loro modi alquanto barbari, spinti dalla passione e dall'impeto con cui i membri di questa razza più giovane vivono la propria breve esistenza.
                            A volte questa infatuazione reciproca porta a rapporti romantici. Benchè solitamente di breve durata, anche per gli standard umani, questi incontri segreti portano di solito alla nascita dei mezzelfi, una razza che discende da due culture, ma non è erede di nessuna. I mezzelfi possono riprodursi tra loro, ma persino questi mezzelfi di "sangue puro" tendono ad essere visti egualmente come bastardi dagli umani e dagli elfi.</p>
                    
            <div class="descr">Mezzorchi</div>
                <p>I mezzorchi sono delle mostruosità, le loro nascite tragiche il risultato di perversione e violenza, o almeno è così che le altre razze li vedono. E' vero che i mezzorchi sono raramente il risultato di unioni d'amore e per questo sono costretti a crescere in fretta tra mille difficoltà, lottando spesso per difendere se stessi o per farsi un nome. Temuti, mal visti e maltrattati, i mezzorchi riescono con crescente costanza a sorprendere i loro detrattori con gesta eroiche ed inattesa Saggezza, benchè a volte sia più facile farlo spaccando qualche cranio.</p>
            <div class="descr">Nani</div>
                 <p>I nani sono una razza stoica ma severa, nascosta in città scavate nel cuore delle montagne e determinata ferocemente a respingere le razzie delle creature selvagge come orchi e goblin. Più di qualunque altra razza, i nani hanno acquisito una reputazione come artigiani taciturni e seri. Si può dire che la storia dei nani abbia forgiato l'indole introversa di molti nani, data la loro abitudine a vivere su picchi quasi inaccessibili o in scuri e pericolosi regni sotterranei, costantemente in guerra con giganti, goblin ed altri orrori simili.</p>
            <div class="descr">Umani</div>
                  <p>Gli umani possiedono un'eccezionale spinta ed una grande capacità di resistere ed espandersi e pertanto sono attualmente la razza dominante nel mondo. I loro imperi e nazioni sono ampi e in espansione ed i cittadini di queste società scolpiscono i loro nomi con la Forza delle armi ed il potere dei loro incantesimi. L'umanità è meglio caratterizzata dalla sua turbolenza e diversità e le culture umane vanno dalle tribù selvagge, ma dai rigidi codici d’onore, alle famiglie nobili decadenti e adoratrici di demoni nelle città più cosmopolite. La curiosità e l'ambizione umane trionfano spesso sulla predilezione per uno stile di vita sedentario e molti lasciano le loro case per esplorare i numerosi angoli dimenticati del mondo o per condurre potenti eserciti per conquistare i vicini, semplicemente perchè possono.</p>
                    
        <h2 class="descr">Classi</h2>
            <div class="descr">Barbaro</div>
                <p>Combattente brutale alimentato da un'ira primeva.</p>
            <div class="descr">Bardo</div>
                <p>Guida arcana che ispira e potenzia gli alleati e confonde i nemici.</p>
            <div class="descr">Chierico</div>
                <p>Fedele seguace di una divinità, che può curare, rianimare i morti e invocare l'ira divina.</p>
            <div class="descr">Druido</div>
                <p>Adoratore della natura e della magia primordiale, capace di assumere forme diverse.</p>
            <div class="descr">Guerriero</div>
                <p>Maestro coraggioso dell'arte bellica e delle tecniche di combattimento.</p>
            <div class="descr">Ladro</div>
                <p>Astuto esperto dell'arte del sotterfugio per colpire i nemici ed aiutare gli alleati in molte occasioni.</p>
            <div class="descr">Mago</div>
                <p>Studioso di magia con incredibili poteri arcani.</p>
            <div class="descr">Monaco</div>
                <p> Studente delle arti marziali, allena il suo corpo ad essere arma e difesa contro i nemici.</p>
            <div class="descr">Paladino</div>
                <p>Seguace devoto della legge e della giustizia.</p>
            <div class="descr">Ranger</div>
                <p>Cacciatore e guida, abile ad Inseguire i suoi nemici nei boschi.</p>
            <div class="descr">Stregone</div>
                <p>Incantatore dalle doti arcane innate.</p>

                    </p>
                <div class="descr">Avanzamento dei personaggi</div>
                    <p>L'esperienza data dal successo nelle sfide intraprese fa guadagnare ai personaggi dei Punti Esperienza. Una volta accumulati un certo numero di Punti Esperienza, i personaggi avanzano di livello e potere. La velocità di avanzamento dipende dal tipo di gioco che voi ed il GM preferite: alcuni preferiscono un gioco più dinamico, dove si avanza di livello dopo qualche sessione di gioco, mentre altri preferiscono un gioco dove l'avanzamento è più lento. Comunque alla fine, il modo migliore viene lasciato alla vostra decisione. L'avanzamento degli eroi viene dato nella Tabella: Avanzamento dei Personaggi e Benefici Dipendenti dal Livello.</p>
                
                <div class="descr">Avanzare di livello</div>
                    <p>I personaggi avanzano di livello quando hanno accumulato Punti Esperienza sufficienti per farlo: solitamente i Punti Esperienza vengono dati dal GM a fine partita.

                        Il processo di avanzamento del personaggio funziona più o meno come la sua creazione, salvo che i Punteggi di Caratteristica, la razza e le scelte precedenti riguardo a classe, Abilità e talenti non possono essere cambiati. Aggiungere un livello in genere conferisce nuove capacità, gradi d'Abilità addizionali da spendere, più punti ferita e possibilmente un aumento del punteggio di una caratteristica o un talento aggiuntivo (vedi Tabella: Avanzamento dei Personaggi e Benefici Dipendenti dal Livello). Col tempo, mentre il vostro personaggio sale ai livelli più alti, diventa una vera Forza nel gioco, capace di governare o di assoggettare le nazioni al proprio volere.

                        Quando si aggiungono nuovi livelli ad una classe esistente o si aggiungono livelli di una nuova classe (vedi Multiclasse, sotto), bisogna assicurarsi di seguire le azioni indicate nell'ordine. In primo luogo, scegliete il vostro nuovo livello di classe. Occorre qualificarsi per questo livello prima di procedere oltre con le modifiche successive. In secondo luogo, occorre applicare l'aumento ad un punteggio di caratteristica qualsiasi dato dall'avanzamento di livello. In terzo luogo, occorre integrare tutti i nuovi privilegi di classe dati dal livello e poi tirare per i punti ferita addizionali. Per concludere, occorre aggiungere Abilità e talenti. Per maggiori informazioni su quando si ottengono nuovi talenti e gli aumenti di un punteggio di caratteristica, vedi la Tabella: Avanzamento dei Personaggi e Benefici Dipendenti dal Livello.</p>
                
                <div class="descr">Multiclasse</div>
                    <p>Invece di guadagnare le capacità concesse dal livello successivo nella classe attuale del personaggio, si possono guadagnare le capacità di 1° livello di una nuova classe, aggiungendo tutte queste nuove capacità a quelle esistenti. Ciò è noto con il termine "multiclassare".

                        Per esempio, un Guerriero di 5° livello decide di cimentarsi nelle arti arcane ed aggiunge un livello da Mago quando avanza al 6° livello. Questo personaggio avrà i poteri e le capacità sia di un Guerriero di 5° livello che di un Mago di 1° livello, ma è considerato un personaggio di 6° livello. (I suoi livelli di classe sono 5° e 1°, ma il suo livello totale del personaggio è 6°.) Mantiene tutti i suoi talenti bonus guadagnati dai 5 livelli da guerriero, ma ora può anche lanciare incantesimi di 1° livello e scegliere una scuola di magia. Aggiunge tutti i punti ferita, i Bonus di Attacco Base e i bonus ai Tiri Salvezza come mago di 1° livello a quelli ottenuti dall'essere un guerriero di 5° livello.

                        Si noti che ci sono un certo numero di effetti e di prerequisiti che si basano sul livello del personaggio e sui suoi Dadi Vita. Tali effetti sono basati sempre sul numero totale dei livelli o Dadi Vita che un personaggio possiede, non su quelli di una classe. Fanno eccezione a questa regola i privilegi di classe, molti dei quali sono basati sul numero totale dei livelli di classe che un personaggio possiede in una classe specifica.</p>
                
                <div class="descr">Classe preferita</div>
                    <p>Ogni personaggio inizia il gioco con una classe preferita di sua scelta: solitamente, questa è la stessa classe scelta al 1° livello. Ogni volta che avanza di livello nella sua classe preferita, un personaggio riceve o 1 punto ferita o 1 grado di Abilità aggiuntivo. La scelta della classe preferita non può essere cambiata una volta che il personaggio è stato creato, e la scelta di guadagnare un punto ferita o un grado di Abilità ogni volta che il personaggio avanza di livello (compreso il 1° livello) non può essere modificata una volta fatta per un particolare livello. Le classi di prestigio (vedi Classi di Prestigio) non possono mai essere classi preferite.</p>
                
        
            <a href="creazione_personaggio.php"><h4>crea un nuovo personaggio</h4></a>
            <a href="creazione_campagna.php"><h4>crea una nuova campagna</h4></a>
    </div>
</body>
</html>