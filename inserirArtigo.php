<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body> <center>
        <form name="materia" method="POST" action="envioArtigo.php">
            
            Título: <input type="text" name="nome_artigo" id="nome_artigo"> <br/> <br/>
            Categoria: <br/> 
            <input type="radio" name="categoria_artigo" value="preview" id="categoria_artigo" required> Preview <br/>
            <input type="radio" name="categoria_artigo" value="review" id="categoria_artigo" required> Review <br/>
            <input type="radio" name="categoria_artigo" value="historia" id="categoria_artigo" required> História <br/>
            <input type="radio" name="categoria_artigo" value="personagens" id="categoria_artigo" required> Personagens <br/>
            Data: <input type="date" name="data_artigo" id="data_artigo"> <br/>
            Descrição: <br/> 
            Conteúdo: <br/><textarea  name="conteudo_artigo" on rowspan="4" colspan="20"  id="conteudo_artigo" required> </textarea><br/>
            </form> </center>
    </body>
</html>
<t