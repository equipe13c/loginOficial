<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
         <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <?php
        session_start();        
        include 'includes/funcoesUteis.inc';
        include 'conexao/conecta.inc';      
        
$name = $_POST['name'];
$email = $_POST['email'];
$senha = $_POST['password'];
$code = $_POST['cod_user'];
$sql = "UPDATE usuario SET NOME_USUARIO = '$name', EMAIL_USUARIO = '$email', SENHA_USUARIO = '$senha' WHERE COD_USUARIO = $code";
  if(mysql_query($sql)){
    echo "Dados Atualizados";
    echo      "<form action=voltarIndex.php method=post>"
            . "<input type=hidden value=$email name=email>"
            . "<input type=hidden value=$senha name=password>"
            . "<input type=submit value=voltar>"
            . "</form>";
            //echo '<script>setTimeout("window.location='. "'" ."indexrestrito.php'" . '", 2000);</script>';
}
else{
    echo "Erro Ao Atualizar Dados";
}
   
        ?>        
    </body>
</html>


