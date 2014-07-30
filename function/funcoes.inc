<?php
function verificandoUser(){
    if($logado = true){
        echo '';
    }
        else{
            echo "Bem Vindo: " . $_SESSION['nome'] . "<br/>";
            echo "<a href='logout.php'> Deslogar </a>";
        }
}
?>
