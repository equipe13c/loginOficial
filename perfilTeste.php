<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
         include 'includes/funcoesUteis.inc';
                include 'conexao/conecta.inc';
             exibedados('index.php', 'RES');    
        <?php
        echo "
        <form action=alterarDados.php method=post id=frmAlterar>
        Nome: <input type='text' readonly='readonly'  size='35'  id='usuarioTable' name='name' value='" . $usuarios['NOME_USUARIO'] . "'>
        Email: <input type='text' readonly='readonly'  size='35'  id='usuarioTable' name='email' value='" . $usuarios['EMAIL_USUARIO'] . "'>
        Confirm. E-mail:<input type='text' readonly='readonly'  size='35'  id='usuarioTable' name='confirmemail' value='" . $usuarios['EMAIL_USUARIO'] . "'>
        Senha:<input type='text' readonly='readonly'  size='3'  id='usuarioTable' name='password' value='" . $usuarios['SENHA_USUARIO'] . "'>
        Confirm. Senha:<input type='text' readonly='readonly'  size='3'  id='usuarioTable' name='confirmsenha' value='" . $usuarios['SENHA_USUARIO'] . "'>    
        <input type='submit' value='Atualizar'>
        </form>";        
        ?>        
    </body>
</html>


