<!DOCTYPE html>
<html>
    <head>
        <title>Página Inicial</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <meta name="viewport" content="width=device-width">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/validate.js"></script>
  <script type="text/javascript">
 $(document).ready(function(){
						 
			    $('#cadastroForm').validate({
			   
					rules:{ 
						email:{ 
                                                    required: true,
                                                    remote: 'includes/verificaemail.php'
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
        <script type="text/javascript">
        function CadastroE(){
            var cadastro = document.getElementById('quadroCad');
            cadastro.innerHTML = "<p class='sucesso'>Cadastrado</p>";
        }                

        </script>
    </head>
    <body>
        <h3>Página inicial - Sistema de Login</h3><br/>
        <section>
        <fieldset>
            <?php
            include 'conexao/conecta.inc';
            include 'function/funcoes.inc';
            ?>
            <form action="login.php" method="post" name="login">
                <h1 id="h1Login"> Formulário de Login </h1>
                <label>E-mail:</label><input class="txts" type="email" name="email" required><br/>
                <label>Senha:</label><input class="txts" type="password" name="password" required><br/>
                <input type="submit" id="btnLogar" value="Logar"><br/>
                <a href="esqueceuSenha.php"> Esqueceu sua Senha ? </a>
                <div name="quadro" id="quadroLogin" class="quadro">
                </div>
            </form> 
        </fieldset>
        <fieldset id="cadfield">
            <form action="cadastrando.php" method="post" id="cadastroForm">
                <h1 id="h1Cadastro"> Formulário de Cadastro </h1>
                <label>Nome:</label><br/>
                <label>E-mail:</label><br/>
                <label>Confirme e-mail:</label><br/>
                <label>Senha:</label><br/>
                <label>Confirme Senha:</label><br/>
                <div id="txtBox">
                <input class="txts" type="text" id="nome" name="name" required><br/>
                <input class="txts" type="email" id="email" name="email" required><br/>
                <input class="txts" type="email" id="confirmemail" name="confirmemail" required><br/>
                <input class="txts" type="password"id="senha" name="password" required><br/>
                <input class="txts" type="password" id="confirmsenha" name="confirmsenha" required><br/>
                </div>
                <input type="submit" id="btnCadastrar" value="Cadastrar">
                <input type="reset" id="btnResetar" value="Resetar">
                <div name="quadro" id="quadroCad" class="quadro">
                </div>
            </form> 
        <div class="loader" style="display: none;"><img src="images/loader.gif" alt="Carregando" /></div>
        </fieldset>
        </section>
    </body>
</html>

