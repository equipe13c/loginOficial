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
            include 'includes/funcoesUteis.inc';
                include 'conexao/conecta.inc';
             validaAutenticacao('index.php', 'RES');           
            ?> <br/>
            <a href="perfil.php"> Alterar dados </a>
        </fieldset>
        </section>
    </body>
</html>

