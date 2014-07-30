<?php 
echo "<meta charset='UTF-8'>";
include 'conexao/conecta.inc';
include_once 'classes/Bcrypt.class.php';

$email = $_POST['email']; 

$query = "SELECT EMAIL_USUARIO FROM usuario WHERE EMAIL_USUARIO = '$email'";
$result = mysql_query($query);

$totalUsuario = mysql_num_rows($result);
if($totalUsuario === 0){
    echo 'Usuario nao encontrado!<br/> <br/>';
     echo '<a href="javascript:history.back(1)">Voltar</a><br/><br/>';
      echo '<a href="frmcadastro.php">Cadastre-se</a><br/>';
}
else{

$query = "SELECT NOME_USUARIO, SENHA_USUARIO FROM usuario WHERE EMAIL_USUARIO = '$email'";
$result = mysql_query($query);
$usuarios = mysql_fetch_array($result);
$senha = $usuarios['SENHA_USUARIO'];
$nome = $usuarios['NOME_USUARIO'];
$novasenha = Bcrypt::hash($senha);

$emaildestinatario = $email;
$assunto = "Recuperação de Senha ";
$envio = "UPDATE USUARIO SET EMAIL_USUARIO = '$email', SENHA_USUARIO = '$novasenha' WHERE COD_USUARIO = $code";


