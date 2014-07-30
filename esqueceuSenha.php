<!DOCTYPE html>
<html>
    <head>
        <title>Página Inicial</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <h3>Recuperação de Senha</h3><br/>
        <section>
        <fieldset>
            <?php
            include 'conexao/conecta.inc';
            include 'function/funcoes.inc';
            ?>
            <form action="enviarSenha.php" method="post" name="login">
                <h1 id="h1Login"> Recuperar Senha </h1><br/>
                <label>E-mail:</label><input class="txts" type="email" name="email" required><br/>
                <input type="submit" id="btnLogar" value="Recuperar Senha">
            </form> 
        </fieldset>
        </section>
    </body>
</html>

