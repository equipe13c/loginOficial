<?php
include 'conexao/conecta.inc';
$query = "SELECT * FROM usuario WHERE EMAIL_USUARIO = '$email'";
$result = mysql_query($query);
$totalUsuario = mysql_num_rows($result);
if($totalUsuario === 0){
    echo 'Usuário não encontrado !';
    echo '<a href=frmlogin.php>Voltar</a>';
}
else{
//Agora preciso Testar a senha do usuário
    $usuarios = mysql_fetch_array($result); 
    $senhaUsuario = $usuarios['SENHA_USUARIO'];
    $tipoUsuario = $usuarios['TIPO_USUARIO'];
    $nomeUsuario = $usuarios['NOME_USUARIO'];
    if($senha !== $senhaUsuario){
        echo 'Senha não confere !';
        echo '<a href=index.php>Voltar</a>';
    }
    else{
        $_SESSION['email'] = $email;
        $_SESSION['nome'] = $nomeUsuario;
        $_SESSION['senha'] = $senha;
        $logado = true;
        if($tipoUsuario === 'RES'){
            echo "Logado com Sucesso RESTRITO";
    }
    elseif($tipoUsuario === 'ADM'){
            echo "Logado com Sucesso ADM";
    }
    else{
        echo 'Tipo de usuário inválido !';
    }
    }
    
}
