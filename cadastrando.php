<?php
include "conexao/conecta.inc";
echo "<meta charset=UTF-8>";
include_once 'classes/Bcrypt.class.php';
    include 'index.php';
          
$nome = $_POST['name'];
$senha = $_POST['password'];
$confirmsenha = $_POST['confirmsenha'];
$email = $_POST['email'];
$confirmemail = $_POST['confirmemail'];
$tipo = "RES";

if(!($senha !== $confirmsenha)&& !($email !== $confirmemail))
{
    $senha = Bcrypt::hash($senha);
$query = "INSERT INTO usuario(nome_usuario, senha_usuario, email_usuario, tipo_usuario)
        VALUES('$nome', '$senha', '$email','$tipo')"; 
    

if($email === ""){
    echo "Desculpe, Campos de cadastro nao Definidos";
}
else{
  if(mysql_query($query)){
    echo "<script> CadastroE() </script>";
}
else{
    echo "<script> CadastroF() </script>";
}  
}
}else{
    echo "<script> CadastroF2() </script>";
}      
?>  

