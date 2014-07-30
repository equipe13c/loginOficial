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
function geraSaltAleatorio($tamanho = 6) {
return substr(md5(mt_rand()), 0, $tamanho); 
}
$salt = geraSaltAleatorio();
$novasenha = Bcrypt::hash($salt);

$emaildestinatario = $email;
$assunto = "Recuperação de Senha ";
$envio = "UPDATE USUARIO SET EMAIL_USUARIO = '$email', SENHA_USUARIO = '$novasenha'  WHERE EMAIL_USUARIO = '$email'";
if(mysql_query($envio)){
    echo "Senha Recuperada<br/>";
    echo "$salt";
    
$emaildestinatario = $email;
$assunto = "Recuperação de Senha ";
$mensagemHTML = 'Olá'. $nome . '<br/>'
        . 'Sua Senha de Recuperação é : '. $salt;
$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: charset=utf-8\r\n";
$headers .= "From: www.multiplayer.com/\r\n"; 
$headers .= "Return-Path: $emaildestinatario \r\n";
$envio = mail($emaildestinatario, $assunto, $mensagemHTML, $headers); 
if($envio){
echo "E-mail Enviado,<br/> Verifique Sua Caixa de Mensagens<br/> Caso o E-mail não tenha sido enviado <a href=reenviarSenha.php>clique aqui</a>";
}
    
    }else{
    echo 'Erro ao recuperar senha';
}}
