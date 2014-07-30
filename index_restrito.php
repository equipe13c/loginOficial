<!DOCTYPE html>
<html>
    <head>
        <title>Página Inicial</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <h3>Index Restrito</h3><br/>
        <section>
        <fieldset>
            <?php 
            
            session_start();
            include 'conexao/conecta.inc';
            echo "Bem Vindo: " . $_SESSION['nome'] . "<br/>";
            echo "<a href='sair.php'> Logout </a>";
            ?>
        </fieldset>
        </section>
    </body>
</html>