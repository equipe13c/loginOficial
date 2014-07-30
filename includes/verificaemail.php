<?php
//Consulta SQL
$email = $_GET['email'];

$server = "localhost";
$user = "root";
$password = "12345678";
$database = "loginoficial3cdb";

$connection = mysql_connect($server,$user,$password);
mysql_select_db($database,$connection);

$query = "SELECT EMAIL_USUARIO FROM usuario WHERE EMAIL_USUARIO = '$email'";
$result = mysql_query($query);
//Matriz pra armazenar todos os emails cadastrados
$emailCadastrados = array();
while($usuarios = mysql_fetch_assoc($result)){
    $emailCadastrados[]=$usuarios['EMAIL_USUARIO'];
}

   
//Com a função in_array(valor_a_ser_pesquisado,matriz), é possível estabelecer uma pesquisa em uma matriz qualquer
//A função recebe 2 parâmetros: o critério de pesquisa (valor a ser pesquisado) e a matriz

if(in_array($email, $emailCadastrados))
                {
    echo 'false';
                }else{
                    echo 'true';
                }
                exit();