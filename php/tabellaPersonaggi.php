<?php

if(empty($_SESSION['id'])){
    die('accesso negato');
}
                require("connection.php");
                if(!($stmt_select = mysqli_prepare($connection, "SELECT * FROM Personaggi WHERE idUtente=?"))){
                    die("statement select non riuscita");
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
                foreach($res as $e){
                echo "<li class='table-row'>
                    <div class='col col-1' data-label='Nome'>".htmlspecialchars($e['nome'])."</div>
                    <div class='col col-2' data-label='Classe'>".$e['classe']."</div>
                    <div class='col col-3' data-label='Razza'>".$e['razza']."</div>
                    </li>";
                }

            mysqli_close($connection);
            ?>