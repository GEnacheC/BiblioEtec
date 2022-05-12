<?php session_start();?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Livro</title>
    <link rel="stylesheet" href="style.css?<?=filemtime("style.css")?>">
</head>
<body>
    <section class="formLayout">
        
        <div class="card">
            <button onclick="closeForm()" class="reds close">X</button>
            <form  method="post" action="crudLivros.php">
                <h1 >Registrar livro</h1>

                <label >Cód. Livro:</label><br><input  name="cod" required="required"  /><br>

                <label >Nome:</label><input name="nomeLivro" required="required"><br>

                <label >Autor:</label><input name="autor" required="required"><br>
                
                <label >Estante:</label>
                <select name="estante">
                     <option value="01">01</option>
                     <option value="02">02</option>
                     <option value="03">03</option>
                     <option value="04">04</option>
                     <option value="05">05</option>
                     <option value="06">06</option>
                     <option value="07">07</option>
                     <option value="08">08</option>
                     <option value="09">09</option>
                </select><br>

                <label >Gênero:</label><br>
                <select name="genero">
                     <option value="Obras gerais de referência">Obras gerais de referência</option>
                     <option value="Dicionários">Dicionários</option>
                     <option value="Metodologia">Metodologia</option>
                     <option value="Ciência da computação">Ciência da computação</option>
                     <option value="Jornalismo">Jornalismo</option>
                     <option value="Filosofia">Filosofia</option>
                     <option value="Psicologia">Psicologia</option>
                     <option value="Religião">Religião</option>
                     <option value="Ciências sociais">Ciências sociais</option>
                     <option value="Meio ambiente">Meio ambiente</option>
                     <option value="Matemática">Matemática</option>
                     <option value="Astronomia">Astronomia</option>
                     <option value="Física">Física</option>
                     <option value="Química">Química</option>
                     <option value="Biologia">Biologia</option>
                     <option value="Medicina">Medicina</option>
                     <option value="Engenharia">Engenharia</option>
                     <option value="Nutrição">Nutrição</option>
                     <option value="Contabilidade">Filosofia</option>
                     <option value="Administração">Administração</option>
                     <option value="Inglês">Inglês</option>
                     <option value="Espanhol">Espanhol</option>
                     <option value="Geografia">Geografia</option>
                     <option value="História">História</option>
                     <option value="Literatura">Literatura</option>
                     <option value="Literatura inglesa">Literatura inglesa</option>
                     <option value="Literatura americana">Literatura americana</option>
                     <option value="Literatura portuguesa">Literatura portuguesa</option>
                     <option value="Literatura alemã">Literatura alemã</option>
                     <option value="Literatura francesa">Literatura francesa</option>
                     <option value="Literatura espanhola">Literatura espanhola</option>
                     <option value="Literatura italiana">Literatura italiana</option>
                     <option value="Literatura brasileira">Literatura brasileira</option>
                     <option value="Literatura russa">Literatura russa</option>
                     <option value="Literatura chinesa">Literatura chinesa</option>
                     <option value="Literatura japonesa">Literatura japonesa</option>
                     <option value="Artes, entretenimento e esportes">Artes, entretenimento e esportes</option>
                     <option value="Poesia">Poesia</option>
                     <option value="Teatro">Teatro</option>
                     <option value="Crônicas">Crônicas</option>
                     <option value="Livros em inglês, francês e espanhol">Livros em inglês, francês e espanhol</option>
                     <option value="Revistas">Revistas</option>
                     <option value="Cds">Cds</option>
                     <option value="TCCs">TCCs</option>
                     <option value="Livros didáticos">Livros didáticos</option>
                     <option value="Apostilas">Apostilas</option>
                     <option value="Estatística">Estatística</option>
                     <option value="Biografia">Biografia</option>
                     <option value="Artes">Artes</option>
                     <option value="Marketing">Marketing</option>
                     <option value="Automação">Automação</option>
                     <option value="Gramática">Gramática</option>
                     <option value="Português">Português</option>
                     <option value="Contos">Contos</option>
                     <option value="Eletrônica">Eletrônica</option>
                     <option value="Contabilidade">Contabilidade</option>
                     <option value="Ética">Ética</option>
                     <option value="Sociologia">Sociologia</option>
                     <option value="Economia">Economia</option>
                     <option value="Direito">Direito</option>
                     <option value="Pedagogia">Pedagogia</option>
                     <option value="Enciclopédia">Enciclopédia</option>
                     <option value="Informática">Informática</option>
                     <option value="Comunicação">Comunicação</option>
        
                </select>

                <button onclick="submitForm('c');" class="downButton">Registrar</button><br>

                <input type="text" name="Act"  value="c" id="Act" style="display:none" ></input><br>
            </form>
        </div>
        
    </section>

    <section class="formLayout">
        
        <div class="card">
            <button onclick="closeForm()" class="reds close">X</button>
            <form  method="post" action="crudLivros.php">
                
                <h1 >Apagar registro</h1>
                <input name="deleteByName" placeholder="Digite um nome" required="required">
                <button onclick="submitForm('d');" class="reds downButton">Deletar</button>
                
                <input type="text" name="Act" value="d" id="Act" style="display:none" ></input><br>
            </form>
        </div>
        
    </section>
   

   
    <header>
        <a href="index.php" class="btn-link btn btn-home"><</a>
        <h1>Livros registrados</h1>
        <button onclick="addAluno()" class="btn">Cadastrar livro</button>
        <button onclick="deleteAluno()" class="btn">Apagar registro</button>
    </header> 
    <form  method="post" action="crudLivros.php" class="formSearch">
                
                
                <label>Pesquisar:</label><input name="search" class="inpt" placeholder="Digite um nome ou código" />
                <button onclick="submitFormS('s');" class="yellow btn">Pesquisar</button>
                <button onclick="submitFormS('r');" class="blue btn">Recarregar</button>
                <input type="text" name="Act" value="s" id="ActS" style="display:none" ></input><br>
    </form>
   
</body>
<script src="script.js?<?=filemtime("script.js")?>"></script>

<script>
const submitForm = (typeSubmit) =>{ 
        document.getElementById('Act').value = typeSubmit; 
}
const submitFormS = (typeSubmit) =>{ 
        document.getElementById('ActS').value = typeSubmit; 
}
</script>

<?php 



$con = new mysqli("127.0.0.1:3306", "root", "", "biblioteca"); 

if($_SESSION["SearchLi"] == True){
    
    $cod = $_SESSION["Cod"];
    $search = $_SESSION["NomeLivro"];
    $sql = "select * from livrosreg where cod = '$search' or name like '%$search%' or autor like '%$search%'  or genero like '$search%' or estante = '$search'"; 
    $res = $con->query($sql); 
    if(mysqli_num_rows($res) < 1){
        //echo("<p style='color:rgb(0, 192, 0)'>errou</p>");
        $_SESSION["Cod"] = "";
        $_SESSION["NomeLivro"] = "";
    }
    //echo("<p style='color:rgb(0, 192, 0)'>$nomeLivro</p>");
    echo("<div class='tableCard'>");
    echo("<table>"); 
    echo("<h1 style='color:rgb(0, 192, 0)'>Resultados encontrados</h1>");
    echo("<br>");
    echo("<tr><th>Cód. Livros</th><th>Nome do livro</th><th>Autor</th><th>Estante</th><th>Gênero</th><th>Status</th></tr>"); 
   
    while($campo = $res->fetch_assoc()){
       
        
        echo(mysqli_error($con));
        echo("<tr>");
        echo("<td>".$campo["cod"]."</td>"); 
        echo("<td>".$campo["name"]."</td>"); 
        echo("<td>".$campo["autor"]."</td>");
        echo("<td>".$campo["estante"]."</td>");
        echo("<td>".$campo["genero"]."</td>");
        if($campo["status"]== 'Na biblioteca'){
            echo("<td style='color:rgb(0, 192, 0)'>".$campo["status"]."</td>");
        }
        else{
            echo("<td style='color:red'>".$campo["status"]."</td>");
        }
        
        echo("</tr>");
    }
    echo("</table>"); 
    echo("</div>");

}



else{
    $sql = "select * from livrosreg"; 
    $res = $con->query($sql); 
    if(mysqli_num_rows($res) > 0){ 
        echo("<div class='tableCard'>");
        echo("<table>"); 
        echo("<tr><th>Cód. Livros</th><th>Nome do livro</th><th>Autor</th><th>Estante</th><th>Gênero</th><th>Status</th></tr>"); 
        while($campo = $res->fetch_assoc()){
        // $count = 1;
        // while($count < 8){
        //     $count += 1;
            echo("<tr>");
            echo("<td>".$campo["cod"]."</td>"); 
            echo("<td>".$campo["name"]."</td>"); 
            echo("<td>".$campo["autor"]."</td>");
            echo("<td>".$campo["estante"]."</td>");
            echo("<td>".$campo["genero"]."</td>");
            if($campo["status"]== 'Na biblioteca'){
                echo("<td style='color:rgb(0, 192, 0)'>".$campo["status"]."</td>");
            }
            else{
                echo("<td style='color:red'>".$campo["status"]."</td>");
            }
            
            echo("</tr>");
        }
        echo("</table>"); 
        echo("</div>");
}
    else{ 
    echo "Nenhum dado inserido por enquanto";
    }
}
?>

</html>