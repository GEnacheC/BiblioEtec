<?php 
    $cod = $_POST["cod"];
    $nomeLivro = $_POST["nomeLivro"];
	$autor = $_POST["autor"];
    $estante = $_POST["estante"];
    $genero = $_POST["genero"];

   


    $search = $_POST["search"];
    $deleteByName = $_POST["deleteByName"];
    

    $act = $_POST["Act"];
    
    $con = new mysqli("127.0.0.1:3306", "root", "", "biblioteca");

    session_start();
    if($act == 'c'){
            $sql = "insert into livrosreg (cod, name, autor, estante, genero, status) values ('$cod','$nomeLivro', '$autor', '$estante', '$genero', 'Na biblioteca')"; 
	        $res = $con->query($sql); 
	
            header("location: ".$_SERVER['HTTP_REFERER']);
    }
    if($act == 'd'){
                $sql = "delete from livrosreg where name= '$deleteByName' or cod = '$deleteByName' "; 
               
                $res = $con->query($sql); 
    
                
                header("location: ".$_SERVER['HTTP_REFERER']);
    }
    if($act == 's'){
        
        $sql = "select * from livrosreg where name like '$search%' or cod = '$search' or autor like '$search%'  or genero like '$search%' or estante = '$search'";
        $res = $con->query($sql); 
        
        $_SESSION["NomeLivro"] =  $res->fetch_assoc()['name']; 
        $_SESSION["Cod"] =  $res->fetch_assoc()['cod']; 
        $_SESSION["SearchLi"] = True;
        
        header("location: ".$_SERVER['HTTP_REFERER']);
    }
    else{
    $_SESSION["SearchLi"] = False;
    header("location: ".$_SERVER['HTTP_REFERER']);
    }
?>