<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empréstimo de livros</title>
    <link rel="stylesheet" href="style.css?<?=filemtime("style.css")?>">
</head>
<body>
    
   <section class="formLayout">
        <div class="card">
            

        <button onclick="closeForm()" class="reds close">X</button>
            <form  method="post" action="crudEmpre.php">
                <h1 >Registrar empréstimo</h1>
                <label >RM do aluno:</label><input  name="RM" required="required" 
            
                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/><br>
                <label >Cod. do livro:</label><input name="cod" required="required" 
                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/><br>
                <br>
   
               
                <label >Data do empréstimo:</label>
                <input type="date" name="dateEmp" id="" required="required">
                <br>
                <br>
                <label >Data de devolução:</label>
                <input type="date" name="dateDev" id="" required="required" />
        
                
                


        
                <button onclick="submitForm('cEm');" class="downButton">Adicionar empréstimo</button><br>

                <input type="text" name="Act" value="cEm" id="Act" style="display:none" ></input><br>
            </form>

            
        </div>
   </section>

   <section class="formLayout">
        
        <div class="card">
            <button onclick="closeForm()" class="reds close">X</button>
            <form  method="post" action="crudEmpre.php">
                
                <h1 >Apagar empréstimo</h1>
                <input name="deleteByName" placeholder="Digite um nome" required="required" />
                <button onclick="submitForm('dEm');" class="reds downButton">Deletar</button>
                
                <input type="text" name="Act" value="dEm" id="Act" style="display:none" /><br>
            </form>
        </div>
        
    </section>

    <section class="formLayout">
        
        <div class="card">
            <button onclick="closeForm()" class="reds close">X</button>
            <form  method="post" action="crudEmpre.php">
                
                <h1 >Devolver</h1>
                <input name="returnBook" placeholder="Digite o código do livro" required="required"
                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/>
                <br>
                <br>
                <input name="returnRm" placeholder="Digite o RM do aluno" required="required"

                oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/>
                <button class="purple downButton">Devolver</button>
                
                <input type="text" name="Act" value="rt" id="Act" style="display:none" /><br>
            </form>
        </div>
        
    </section>


    <section id="formRenew" class="formLayout">
        
        <div class="card">
            <button onclick="closeForm()" class="reds close">X</button>
            <form  method="post" action="crudEmpre.php">
                
                <h1 >Renovar Empréstimo</h1>
              
                <br>
                <label >Data de devolução:</label>
                <input type="date" name="dateRenew" id="" required="required" />
                
                <button class="purple downButton">Renovar</button>
                
                <input type="text" name="Act" value="rw" id="Act" style="display:none" /><br>
                <input type="text" id="bookNameRenew" value="" name="bookNameRenew" style="display: none"/>
            </form>
        </div>
        
    </section>

    <header>
        
        
        <a href="index.php" class="btn-link btn btn-home"><</a>
        <h1>Empréstimo de livros</h1>
    
        <button onclick="addAluno()" class="btn">Registrar empréstimo</button>
        <button onclick="returnBook()" class="btn">Devolver livro</button>
        <button onclick="deleteAluno()" class="btn">Apagar empréstimo</button>
        
    </header> 

    <form  method="post" action="crudEmpre.php" class="formSearch">
                
                
                <label>Pesquisar:</label><input name="search" class="inpt" placeholder="Digite o nome do livro" />
                <button onclick="submitFormS('s');" class="yellow btn">Pesquisar</button>
                <button onclick="submitFormS('r');" class="blue btn">Recarregar</button>
                <input type="text" name="Act" value="s" id="ActS" style="display:none" /><br>
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
const callFormRenew = (whatBook) =>{ 
        document.getElementById('formRenew').style.display = "block";
        document.getElementById('bookNameRenew').value = whatBook;
   
}
</script>


<?php 
$con = new mysqli("127.0.0.1:3306", "root", "", "biblioteca"); 







if($_SESSION["SearchEmp"] == True ){
 

    $nameLivro = $_SESSION["NomeLivro"];
    
    $sql = "select * from livrosempre where nameLivro like '%$nameLivro%' "; 
    $res = $con->query($sql); 
    echo("<div class='tableCard'>");
    echo("<table>"); 
    echo("<h1 style='color:rgb(0, 192, 0)'>Resultados encontrados</h1>");
    echo("<br>");
    echo("<tr><th>Nome do aluno</th><th>Série</th><th>Curso</th><th>Email</th><th>Telefone</th><th>Nome do livro</th><th>Data de empréstimo</th><th>Data de devolução</th> <th>Dias para devolução</th><th>Status</th></tr>");
    while($campo = $res->fetch_assoc()){ 
   
    $dateDev = strtotime($campo['dateDev']);
    $dateActual = time();
    $intervalDays = round(($dateDev - $dateActual) / (60 * 60 * 24));


        echo(mysqli_error($con));
        echo("<tr>");
       
        echo("<td>".$campo["nameAluno"]."</td>"); 
        echo("<td>".$campo["serie"]."</td>"); 
        echo("<td>".$campo["curso"]."</td>"); 
        echo("<td>".$campo["email"]."</td>"); 
        echo("<td>".$campo["tel"]."</td>"); 
        echo("<td>".$campo["nameLivro"]."</td>");
        echo("<td>".$campo["dateEmpre"]."</td>"); 
        echo("<td>".$campo["dateDev"]."</td>"); 
        
        if($intervalDays < 0){
            echo("<td style='color:#ff4444'>".$intervalDays."</td>"); 
        }
        elseif($intervalDays < 10){
            echo("<td style='color:orange'>".$intervalDays."</td>"); 
        }
        else{
            echo("<td style='color:rgb(0, 192, 0)'>".$intervalDays."</td>"); 
        }
        if($campo["status"]== 'Na biblioteca'){
            echo("<td style='color:rgb(0, 192, 0)'>".$campo["status"]."</td>");
        }
        else{
            echo("<td style='color:red'>".$campo["status"]."</td>");
        }
       
        echo("<td> <button onclick='callFormRenew(this.id)' class='btn blue' id='".$campo["nameLivro"]." '>Renovar</button></td>"); 
        echo("</tr>");
    }
    echo("</table>"); 
    echo("</div>");
    
}


else{
    echo($_SESSION["SearchL"]);

$sql = "select * from livrosempre"; 
$res = $con->query($sql); 

if(mysqli_num_rows($res) > 0){ 
   
    echo("<div class='tableCard'>");
    echo("<table>"); 
    echo("<tr><th>Nome do aluno</th><th>Série</th><th>Curso</th><th>Email</th><th>Telefone</th><th>Nome do livro</th><th>Data de empréstimo</th><th>Data de devolução</th> <th>Dias para devolução</th><th>Status</th></tr>"); 
    while($campo = $res->fetch_assoc()){ 

       
        $dateDev = strtotime($campo['dateDev']);
        $dateActual = time();
        $intervalDays = round(($dateDev - $dateActual) / (60 * 60 * 24));

        echo("<tr>");
        echo("<td>".$campo["nameAluno"]."</td>"); 
        echo("<td>".$campo["serie"]."</td>"); 
        echo("<td>".$campo["curso"]."</td>"); 
        echo("<td>".$campo["email"]."</td>"); 
        echo("<td>".$campo["tel"]."</td>"); 
        echo("<td>".$campo["nameLivro"]."</td>");
        echo("<td>".$campo["dateEmpre"]."</td>"); 
        echo("<td>".$campo["dateDev"]."</td>"); 
       
        if($intervalDays < 0){
            echo("<td style='color:#ff4444'>".$intervalDays."</td>"); 
        }
        elseif($intervalDays < 10){
            echo("<td style='color:orange'>".$intervalDays."</td>"); 
        }
        else{
            echo("<td style='color:rgb(0, 192, 0)'>".$intervalDays."</td>"); 
        }
        if($campo["status"]== 'Na biblioteca'){
            echo("<td style='color:rgb(0, 192, 0)'>".$campo["status"]."</td>");
        }
        else{
            echo("<td style='color:red'>".$campo["status"]."</td>");
        }
        echo("<td> <button onclick='callFormRenew(this.id)' class='btn blue' id='".$campo["nameLivro"]." '>Renovar</button></td>"); 
        
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