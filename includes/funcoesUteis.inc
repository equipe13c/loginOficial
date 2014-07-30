<?php

function validaAutenticacao($link, $tipo){
    
    echo '<meta charset=UTF-8>';
session_start();


if(!isset($_SESSION['email']) or !isset($_SESSION['senha'])){
    session_destroy();
    
    echo '<script> 
        alert("Acesso negado!\n Você não efetuou login.")
    location.href="'.$link.'"
            </script>';
}else{
    
    
    if($tipo == 'RES'){ include_once 'conexao/conecta.inc';
                        include_once 'classes/Bcrypt.class.php';}
    if($tipo == 'ADM'){ include_once '../conexao/conecta.inc';
                        include_once '../classes/Bcrypt.class.php';}
    $email = $_SESSION['email'];
     $senha = $_SESSION['senha'];
    $query = "SELECT * FROM usuario WHERE EMAIL_USUARIO='$email'";
    $result = mysql_query($query);
    $totalUsuarios = mysql_num_rows($result);
    if($totalUsuarios !== 0){
        //testando senha
        $usuarios = mysql_fetch_assoc($result);
        $senhaBanco = $usuarios['SENHA_USUARIO'];
        $tipoBanco = $usuarios['TIPO_USUARIO'];
        
        
        
        if (Bcrypt::check($senha, $senhaBanco)) {
            session_destroy();            
            echo '<script> 
        alert("Acesso negado!\n Senha não confere.")
    location.href="'.$link.'"
            </script>';            
        }
        
    }else{
            session_destroy();
           // echo $totalUsuarios;
           echo '<script> 
       alert("Acesso negado!\n Email não confere.")
    location.href="'.$link.'"
           </script>';
            
        }
        echo "Bem Vindo: " . $_SESSION['nome'] . "<br/>";
        echo "<a href='../loginOficial/sair.php'> Logout </a>";    
}

if($tipo !== $tipoBanco ){
    session_destroy();
    echo '<script> 
       alert("Acesso negado!\n Você não tem permissão para acessar esta página!.")
    location.href="'.$link.'"
           </script>';
}

}

function exibedados($link, $tipo){
    
    echo '<meta charset=UTF-8>';
session_start();


if(!isset($_SESSION['email']) or !isset($_SESSION['senha'])){
    session_destroy();
    
    echo '<script> 
        alert("Acesso negado!\n Você não efetuou login.")
    location.href="'.$link.'"
            </script>';
}else{
    
    
    if($tipo == 'RES'){ include_once 'conexao/conecta.inc';
                        include_once 'classes/Bcrypt.class.php';}
    if($tipo == 'ADM'){ include_once '../conexao/conecta.inc';
                        include_once '../classes/Bcrypt.class.php';}
    $email = $_SESSION['email'];
     $senha = $_SESSION['senha'];
    $query = "SELECT * FROM usuario WHERE EMAIL_USUARIO='$email'";
    $result = mysql_query($query);
    $totalUsuarios = mysql_num_rows($result);
    if($totalUsuarios !== 0){
        //testando senha        
        $usuarios = mysql_fetch_assoc($result);
        $senhaBanco = $usuarios['SENHA_USUARIO'];
        $tipoBanco = $usuarios['TIPO_USUARIO'];
        
        
        
         if (Bcrypt::check($senha, $senhaBanco)) {
            session_destroy();            
            echo '<script> 
        alert("Acesso negado!\n Senha não confere.")
    location.href="'.$link.'"
            </script>';            
        }
        
    }else{
            session_destroy();
           // echo $totalUsuarios;
           echo '<script> 
       alert("Acesso negado!\n Email não confere.")
    location.href="'.$link.'"
           </script>';
            
        }
}
if($tipo !== $tipoBanco ){
    session_destroy();
    echo '<script> 
       alert("Acesso negado!\n Você não tem permissão para acessar esta página!.")
    location.href="'.$link.'"
           </script>';
}
}


?>

