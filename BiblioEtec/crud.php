<?php 
    $RM = $_POST["RM"];
    $name = $_POST["name"];
	$serie = $_POST["serie"];
	$curso = $_POST["curso"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];


    $search = $_POST["search"];
    $deleteByName = $_POST["deleteByName"];
    

    $act = $_POST["Act"];
    
    $con = new mysqli("127.0.0.1:3306", "root", "", "biblioteca");

    session_start();
    if($act == 'c'){
            $sql = "insert into alunosreg (rm, name, serie, curso, email, tel) values ('$RM','$name', '$serie','$curso','$email','$tel')"; 
	        $res = $con->query($sql); 
	        
            header("location: ".$_SERVER['HTTP_REFERER']);
    }
    if($act == 'd'){
                $sql = "delete from alunosreg where name= '$deleteByName' or rm = '$deleteByName' "; 
               
                $res = $con->query($sql); 
          
                
                header("location: ".$_SERVER['HTTP_REFERER']);
    }
    if($act == 's'){
        
        //$sql = "select * from alunosreg where name like '$search%' or rm = '$search' ";
        //$res = $con->query($sql); 
        
        $_SESSION["Nome"] =  $search; 
        $_SESSION["Rm"] =  $search; 
        $_SESSION["Search"] = True;
        
        header("location: ".$_SERVER['HTTP_REFERER']);
    }
    else{
    $_SESSION["Search"] = False;
    header("location: ".$_SERVER['HTTP_REFERER']);
    }
?>