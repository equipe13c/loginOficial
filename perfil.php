<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
         <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
              <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/validate.js"></script>
  <script type="text/javascript">
 $(document).ready(function(){
						 
			    $('#frmAlterar').validate({
			   
					rules:{ 
						email:{ 
                                                    required: true,
                                                    },//,
                                                confirmemail:{
                                                  required: true,
                                                  equalTo: "#email"
                                                },                                
                                             senha:{ 
                                                 required: true
                                                 },
                                              confirmsenha:{ 
                                                 required: true,
                                                 equalTo: "#senha"
                                                 },
                                               
                                                    /*código meu*/
                                             termos: "required"
                                        /*fim código meu*/
					},
                                        
                                      
					messages:{
						email:{ 
                                                     required: 'Este Campo &eacute; obrigat&oacute;rio' , 
                                                     remote: '<font color="red">Este Login j&aacute; est&aacute; em uso.</font>'},//,
                                                confirmemail:{
                                                       required: "O campo confirmação de email é obrigatorio.",
                                                       equalTo: '<font color="red">O campo confirmação de email deve ser identico ao campo email.</font>'
                                                     },
                                                senha:{ 
                                                       required: 'Este Campo &eacute; obrigat&oacute;rio' 
                                                      },
                                                confirmsenha:
                                                      { 
                                                         required: 'Este Campo &eacute; obrigat&oacute;rio', 
                                                         equalTo:  '<font color="red">O campo confirmação de senha deve ser identico ao campo senha.</font>'
                                                      },
					         termos: "Para se cadastrar você deve aceitar os termos de uso."
                                              }
					});
			
                                    });
			
			
					
					window.onload = function() {
					
                    // $('#login').keypress function(){alert("");});
					  
                       $("#email").keypress(function() {

					     $('div.loader').show();
                     });
									
                       $("#email").focusout(function() {

					     $('div.loader').hide();
                     });									
					 $("#email").keyup(function() {
                       $('div.loader').hide();
                     });
			}
            
        </script>
    </head>
    <body>
        <?php
        include 'includes/funcoesUteis.inc';
        include 'conexao/conecta.inc';
        exibedados('index.php', 'RES');  
        $busca = "SELECT * FROM usuario WHERE COD_USUARIO=" . $_SESSION['code'];
        $resultado = mysql_query($busca);
        $totalUsers = mysql_num_rows($resultado);
        $users = mysql_fetch_assoc($resultado);
        echo "
        <fieldset id=frmAlterarDados>
        <form action='alterarDados.php' method='post' id='frmAlterar'>
<input type='hidden'  readonly='readonly' class='txtsAlterarDados' id='id' size='35'  name='cod_user' value='" . $users['COD_USUARIO'] . "'>
        Nome: <input type='text'  class='txtsAlterarDados' size='35' id='nome'  name='name' value='" . $users['NOME_USUARIO'] . "'><br/>
        Email: <input type='text'  class='txtsAlterarDados'  size='35' id='email' name='email' value='" . $users['EMAIL_USUARIO'] . "'><br/>
        Confirm. E-mail:<input type='text'  class='txtsAlterarDados' size='35' id='confirmemail' name='confirmemail' value='" . $users['EMAIL_USUARIO'] . "'><br/>
        Senha:<input type='password'  class='txtsAlterarDados' size='35' id='senha'  name='password' value='" . $users['SENHA_USUARIO'] . "'><br/>
        Confirm. Senha:<input type='password'  class='txtsAlterarDados' size='35' id='confirmsenha'  name='confirmsenha' value='" . $users['SENHA_USUARIO'] . "'><br/>    
        <input type='submit' id='buttonAlterar' value='Atualizar'>
        </form>
        </fieldset>";
        ?>        
    </body>
</html>


