<?php 
    $RM = $_POST["RM"];
    $cod = $_POST["cod"];


    $dateEmpre = $_POST["dateEmp"];
    $dateDev = $_POST["dateDev"];
    $deleteByName = $_POST["deleteByName"];
    $act = $_POST["Act"];
    $return = $_POST["returnBook"];
    $returnRm = $_POST["returnRm"];
    
    
    echo($act);

    $search = $_POST["search"];
    
 
    

    $con = new mysqli("127.0.0.1:3306", "root", "", "biblioteca");

    session_start();
    if($act == 'cEm'){
        $sqlR = "select * from alunosreg where rm= '$RM' ";
        $resR = $con->query($sqlR);
        if(mysqli_num_rows($resR) > 0){
                $sqlS = "select name,serie,curso,email,tel from alunosreg where rm= '$RM' ";
                $resS = $con->query($sqlS);

                $resName = $con->query($sqlS);
                $resSerie = $con->query($sqlS);
                $resCurso = $con->query($sqlS);
                $resEmail = $con->query($sqlS);
                $resTel = $con->query($sqlS);

                $rowName =  $resName->fetch_array()[0];
                $rowSerie =  $resSerie->fetch_array()[1];
                $rowCurso =  $resCurso->fetch_array()[2];
                $rowEmail =  $resEmail->fetch_array()[3];
                $rowTel =  $resTel->fetch_array()[4];


                $sqlL = "select name from livrosreg where cod = '$cod'  ";
                $resL = $con->query($sqlL);
                if(mysqli_num_rows($resL) > 0){
                    $rowNameL =  $resL->fetch_array()[0];

                    $sqlU = "update livrosreg SET status = 'Emprestado' WHERE cod = '$cod'";
                    $resU = $con->query($sqlU);


                    $sql = "insert into livrosempre (nameAluno, nameLivro, serie, curso, email, tel,dateEmpre, dateDev, status) values ('$rowName','$rowNameL', '$rowSerie','$rowCurso','$rowEmail','$rowTel','$dateEmpre','$dateDev', 'Emprestado')"; 
                    $res = $con->query($sql); 
                    $_SESSION["aviso"] = "O cadastro foi efetuado com sucesso"; 
                }
        }
        header("location: ".$_SERVER['HTTP_REFERER']);
    }

    if($act == 'dEm'){
            $sql = "delete from livrosempre where livrosempre.nameAluno = '$deleteByName'"; 
            $res = $con->query($sql); 
            header("location: ".$_SERVER['HTTP_REFERER']);
    }



    if($act == 'rt'){
            $sql = "select name from livrosreg where cod = '$return'"; 
            $res = $con->query($sql); 
            $rowName = $res->fetch_array()[0];
           
            $sqlU = "update livrosreg SET status = 'Na biblioteca' WHERE cod = '$return'";
            $resU = $con->query($sqlU);

            $sqlS = "select name from alunosreg where rm= '$returnRm' ";
            $resS = $con->query($sqlS);
            $rowNameAluno = $resS->fetch_array()[0];


            $sqlReg = "select serie,curso,email,tel,dateEmpre,dateDev from livrosempre where nameLivro= '$rowName' and nameAluno = '$rowNameAluno'";            
            

            $resSerie = $con->query($sqlReg);
            $resCurso = $con->query($sqlReg);
            $resEmail = $con->query($sqlReg);
            $resTel = $con->query($sqlReg);
            $resDateEmpre = $con->query($sqlReg);
            $resDateDev = $con->query($sqlReg);

            
            $rowSerie =  $resSerie->fetch_array()[0];
            $rowCurso =  $resCurso->fetch_array()[1];
            $rowEmail =  $resEmail->fetch_array()[2];
            $rowTel =  $resTel->fetch_array()[3];
            $rowDateEmpre =  $resDateEmpre->fetch_array()[4];
            $rowDateDev =  $resDateDev->fetch_array()[5];
            
            $sql = "insert into livrosemprereg (rm,cod, nameAluno, nameLivro, serie, curso, email, tel,dateEmpre, dateDev, status) values ('$returnRm','$return','$rowNameAluno','$rowName','$rowSerie','$rowCurso','$rowEmail','$rowTel','$rowDateEmpre','$rowDateDev', 'Na biblioteca')"; 
            $res = $con->query($sql); 
            $sqlD = "delete from livrosempre where livrosempre.nameLivro = '$rowName' and nameAluno = '$rowNameAluno'";
            $resD = $con->query($sqlD); 

            header("location: ".$_SERVER['HTTP_REFERER']);
}
    if($act == 's'){
        
        // $sql = "select * from livrosempre where nameLivro like '$search%' ";
        // $res = $con->query($sql); 
        
        $_SESSION["NomeLivro"] =  $search; 
        // echo($_SESSION["NomeLivro"].' ');
        // $sql = "select * from livrosempre where nameLivro like '%$search%' ";
        // $res = $con->query($sql); 
        // echo( $res->fetch_assoc()["nameLivro"]);
        $_SESSION["SearchEmp"] = True;
        
        header("location: ".$_SERVER['HTTP_REFERER']);
       
    }
    else{
        $_SESSION["SearchEmp"] = False;
        header("location: ".$_SERVER['HTTP_REFERER']);
        }
    if($act == 'rw'){
        $renewName = $_POST["bookNameRenew"];
        $renewDate = $_POST["dateRenew"];
        // echo($renewDate.' ');
        // echo($renewName);
        

        
        $sql = "update livrosempre SET dateDev = '$renewDate' WHERE nameLivro = '$renewName'"; 
        $res = $con->query($sql); 
       
        echo(mysqli_error($con));
        header("location: ".$_SERVER['HTTP_REFERER']);
        
}
   

  
?>