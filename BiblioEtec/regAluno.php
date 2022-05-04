<?php session_start();?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar aluno</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="formAdd">
        
        <div class="card">
            <button onclick="closeForm()" class="reds close">X</button>
            <form id="formRegAluno" method="post" action="crud.php">
                <h1 style="color:#000">Registrar aluno</h1>
                <label style="color:#000">RM:</label><br><input  name="RM" required="required" minlength="5" 
                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"
                /><br>
                <label style="color:#000">Nome:</label><input name="name" required="required"><br>

                <label style="color:#000">Série:</label>  <br>
                
                <select name="serie">
                     <option value="1º">1º</option>
                     <option value="2º">2º</option>
                     <option value="3º">3º</option>
                </select><br>


                <label style="color:#000">Curso:</label><br>
                <select name="curso">
                     <option value="ADM">ADM</option>
                     <option value="Aut">Aut</option>
                     <option value="DS">DS</option>
                </select>
                <br>
                <label style="color:#000">Email:</label><input name="email" type="email" required="required"><br>

                <label style="color:#000">Telefone:</label><input name="tel" required="required" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);"   
                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/><br>

                <button onclick="submitForm('c');" class="downButton">Registrar</button><br>

                <input type="text" name="Act"  value="c" id="Act" style="display:none" ></input><br>
            </form>
        </div>
        
    </section>

    <section class="formDelete">
        
        <div class="card">
            <button onclick="closeForm()" class="reds close">X</button>
            <form id="formRegAluno" method="post" action="crud.php">
                
                <h1 style="color:#000">Apagar registro</h1>
                <input name="deleteByName" placeholder="Digite um nome" required="required">
                <button onclick="submitForm('d');" class="reds downButton">Deletar</button>
                
                <input type="text" name="Act" value="d" id="Act" style="display:none" ></input><br>
            </form>
        </div>
        
    </section>


   
    <header>
        <a href="index.php" class="btn-link green btn-home"><</a>
        <h1>Alunos registrados</h1>
        <button onclick="addAluno()">Cadastrar aluno</button>
        <button onclick="deleteAluno()" class="reds">Apagar registro</button>
    </header> 
    <form id="formRegAluno" method="post" action="crud.php">
                
                
                <label>Pesquisar:</label><input name="search" class="inpt" placeholder="Digite um nome ou RM" />
                <button onclick="submitFormS('s');" class="yellow btn">Pesquisar</button>
                <button onclick="submitFormS('r');" class="blue btn">Recarregar</button>
                <input type="text" name="Act" value="s" id="ActS" style="display:none" ></input><br>
            </form>
   
</body>
<script src="scripts.js"></script>

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

if($_SESSION["Search"] == True){
    
    $rm = $_SESSION["Rm"];
    $nameAluno = $_SESSION["Nome"];
    
        
    $sql = "select * from alunosreg where name like '%$nameAluno%' or rm = '$rm' "; 
    $res = $con->query($sql); 
    // if(mysqli_num_rows($res) < 1){
    //     //echo("<p style='color:rgb(0, 192, 0)'>errou</p>");
    //     $_SESSION["Rm"] = "";
    //     $_SESSION["Nome"] = "";
    // }
    echo("<div class='tableCard'>");
    echo("<table>"); 
    echo("<tr><th>RM</th><th>Nome</th><th>Série</th><th>Curso</th><th>Email</th><th>Telefone</th></tr>"); 
    while($campo = $res->fetch_assoc()){ 
        echo(mysqli_error($con));
        echo("<tr>");
        echo("<td>".$campo["rm"]."</td>"); 
        echo("<td>".$campo["name"]."</td>"); 
        echo("<td>".$campo["serie"]."</td>");
        echo("<td>".$campo["curso"]."</td>"); 
        echo("<td>".$campo["email"]."</td>"); 
        echo("<td>".$campo["tel"]."</td>"); 
        
        echo("</tr>");
    }
    echo("</table>"); 
    echo("</div>");

}



else{
    $sql = "select * from alunosreg"; 
    $res = $con->query($sql); 
    if(mysqli_num_rows($res) > 0){ 
        echo("<div class='tableCard'>");
        echo("<table>"); 
        echo("<tr><th>RM</th><th>Nome</th><th>Série</th><th>Curso</th><th>Email</th><th>Telefone</th></tr>"); //cabecalho da tabela
        while($campo = $res->fetch_assoc()){ 
            echo("<tr>");
            echo("<td>".$campo["rm"]."</td>"); 
            echo("<td>".$campo["name"]."</td>"); 
            echo("<td>".$campo["serie"]."</td>");
            echo("<td>".$campo["curso"]."</td>"); 
            echo("<td>".$campo["email"]."</td>"); 
            echo("<td>".$campo["tel"]."</td>"); 
        
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