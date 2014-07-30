<?php
session_start();
$email = isset($_POST['email'])?$_POST['email']:null;
$senha = isset($_POST['password'])?$_POST['password']:null;
//echo $email . '    ' . $senha;
include 'conexao/conecta.inc';
$query = "SELECT * FROM usuario WHERE EMAIL_USUARIO = '$email'";
$result = mysql_query($query);
$totalUsuario = mysql_num_rows($result);
if($totalUsuario === 0){
    echo 'Usuário não encontrado !';
}
else{
//Agora preciso Testar a senha do usuário
    $usuarios = mysql_fetch_array($result); 
    $codeUsuario = $usuarios['COD_USUARIO'];
    $senhaUsuario = $usuarios['SENHA_USUARIO'];
    $tipoUsuario = $usuarios['TIPO_USUARIO'];
    $nomeUsuario = $usuarios['NOME_USUARIO'];
    if($senha !== $senhaUsuario){
    echo "<script> LoginF2() </script>";

    }
    else{
        $_SESSION['code'] = $codeUsuario;
        $_SESSION['email'] = $email;
        $_SESSION['nome'] = $nomeUsuario;
        $_SESSION['senha'] = $senha;
        $_SESSION['tipo'] = $tipoUsuario;
        $logado = true;
        if($tipoUsuario === 'RES'){
            echo "<script> LoginE() </script>";
            echo '<script>setTimeout("window.location='. "'" ."indexrestrito.php'" . '", 0);</script>';
    }
    elseif($tipoUsuario === 'ADM'){
            echo "<script> LoginE() </script>";
            echo '<script>setTimeout("window.location='. "'" ."admin/indexadmin.php'" . '", 0);</script>';
    }
    else{
        echo 'Tipo de usuário inválido !';
    }
    }
    
}

