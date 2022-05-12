<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="style.css?<?=filemtime("style.css")?>">
</head>
<body>
    <header>
        <h1>Biblioteca</h1>
    </header> 
   <section class="menu">
        <div class="card">
            <a href="regAluno.php" class="btn-link btn">Registro de alunos</a>
            <a href="regLivros.php" class="btn-link btn">Registro de livros</a>
            <a href="empreLivros.php" class="btn-link btn">Empréstimo de livros</a>
        </div>
   </section>
</body>
<script src="script.js?<?=filemtime("script.js")?>"></script>


<?php 


$_SESSION["Search"] = False;
$_SESSION["SearchLi"] = False;
$_SESSION["SearchEmp"] = False;

$con = new mysqli("127.0.0.1:3306", "root", "", "biblioteca"); 
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
        
        echo("</tr>");
    }
    echo("</table>"); 
    echo("</div>");
}
else{ 
    echo "Nenhum dado inserido por enquanto";
}

?>

</html>