
<?php
    if(empty($_SESSION['id'])){
        die('accesso negato');
    }
                require("connection.php");
                if(!($stmt_select = mysqli_prepare($connection, "SELECT * FROM Campagne WHERE idMaster=?"))){
                    die("<div class = 'error'>statement select non riuscita</div>");
                }
                $id=$_SESSION['id'];
                if(!mysqli_stmt_bind_param($stmt_select, 'i', $id)){
                    die("<div class = 'error'>bind parametri fallito</div>");
                }
                if(!mysqli_stmt_execute($stmt_select)){
                    die("<div class = 'error'>esecuzione select fallita</div>");
                }
                if(!($res=mysqli_stmt_get_result($stmt_select))){
                    die("<div class = 'error'>query non riuscita select<br> <a href=home_page.php>torna alla home_page</a></div>");
                }
                $i=0;
                foreach($res as $e){
                    $i = $i+1;
                    echo "<li class='table-row'>
                        <div class='col col-1' data-label='Nome'>".htmlspecialchars($e['nome'])."</div>
                        <div class='col col-2' data-label='Lingua'>".$e['lingua']."</div>
                        <div class='col col-3' data-label='xxx'>
                            <p style='margin: 20px;'>
                                <label class='show_popin' for='popin_check_1'>Cerca Giocatori</label>
                            </p>
                            <div class='popin'>
                                <input id='popin_check_1' type='checkbox' class='popin_check' hidden />
                                <div class='content'>
                                    <div class='header'>INVITA GIOCATORE<label class='close_popin' for='popin_check_1'>X</label></div>
                                    <div class='main'>
                                       <form action='filtro.php' method='POST' id='form'>
                                            <input type='text' name='parolaChiave'>
                                            <input type='text' name='idCampagna' style='display: none' value='".$e['idCampagna']."'>
                                            <input type='submit' class='button' value='cerca'>
                                            <div id = 'result'></div>
                                       </form> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col col-4' data-label='Payment Status'>
                            <p style='margin: 20px;'>
                                <label class='show_popin' for='popin_check_2'>Banna Giocatore</label>
                            </p>
                            <div class='popin'>
                                <input id='popin_check_2' type='checkbox' class='popin_check' hidden />
                                <div class='content'>
                                    <div class='header'>BANNA GIOCATORE<label class='close_popin' for='popin_check_2'>X</label></div>
                                    <div class='main'>
                                       <form action='filtro_ban.php' method='POST' id='form'>
                                            <input type='text' name='parolaChiave'>
                                            <input type='text' name='idCampagna' style='display: none' value='".$e['idCampagna']."'>
                                            <input type='submit' class='button' value='cerca'>
                                            <div id = 'result'></div>
                                       </form> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>";
                }
            ?>