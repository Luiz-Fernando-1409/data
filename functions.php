<?php  


switch($_POST['action_type']){
    case "cadastra_usuario":    
    cadastrausuario();
    break;

    case "consulta_usuario":
        consultausuario();
        break;

    case "deleta_usuario":
        deletausuario();
        break;
    
    case "cancela":
        cancela();
        break;
    
    case "":
        retorna();    
};


function cadastrausuario(){ 
    include 'conexao2.php';
    if($_POST['senha']!=$_POST['senhaC'])
    echo "<script>alert('As senhas digitadas não conferem!');location.href=\"users.php\";</script>";

    $user=$_POST['user'];
    $name=$_POST['name'];
    $sector=$_POST['sector-select'];
    $password=password_hash($_POST['senha'],PASSWORD_DEFAULT);
    $perfil=$_POST['perfilselect'];
    $email=$_POST['email'];
    $genero=$_POST['genderselect'];
    $cargo=$_POST['cargoselect'];
    $data=$_POST['date']; 

    $insere="INSERT INTO users(matricula_func,nome_func,setor_func,senha_func,perfil_func,email_func,cargo_func,genero_func,data_admissao) VALUES ('$user', '$name', '$sector', '$password','$perfil','$email','$cargo','$genero','$data')";

    if (mysqli_query($conexao, $insere)) {
        unset($user,$name,$sector,$password,$perfil,$email,$genero,$cargo,$data,$_POST);
        echo "<script>alert('Cadastro registrado com sucesso!');location.href=\"main_manager.php\";</script>";
    } else {
    echo "Error: " . $insere . "<br>" . mysqli_error($conexao);
    }
    mysqli_close($conexao);
}

function consultausuario(){
    include 'conexao2.php';                     

    if(!empty($_POST['user'])){
        $user=$_POST['user'];
        $consulta="SELECT matricula_func,nome_func,setor_func,perfil_func,email_func,cargo_func,genero_func,data_admissao FROM users where (matricula_func='$user')";
        $result=mysqli_query($conexao, $consulta);

            if(!$consulta) {
                echo "Não pode executar a query.<br>\n";
                echo mysqli_error($banco)."<br>";
            } else {
                $dados = mysqli_fetch_assoc($result);
                include 'session.php';
                
                $pagina=<<<pagina
                    <!DOCTYPE html>
                    <html lang="pt-br">
                    <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" href="style.css">
                    <title>Sistema GeMaInd</title>
                    </head>
                    <body>
   
                    <div id="header">
                    <img src="img/logo_big.png" id="header_logo" alt="logo"><br> 
                    <h1>Gerenciador de Manutenção Industrial</h1>
                    </div>                    
                    <span>Bem vindo {$_SESSION['user']}!                    
                    <div id=""> 
                    <h2>Resultado da consulta</h2><br>
                    <span>NOME: {$dados['nome_func']}</span><br>
                    <span>MATRÍCULA: {$dados['matricula_func']}</span><br>
                    <span>CARGO: {$dados['cargo_func']}</span><br>
                    <span>SETOR: {$dados['setor_func']}</span><br>
                    <span>E-MAIL: {$dados['email_func']}</span><br>
                    <span>FUNCIONÁRIO DESDE: {$dados['data_admissao']}</span><br>

                pagina;
            echo "$pagina";
            }
                                
    }elseif(!empty($_POST['name'])){
        $name=$_POST['name'];
        $consulta="SELECT matricula_func,nome_func,setor_func,perfil_func,email_func,cargo_func,genero_func,data_admissao FROM users where (nome_func='$name')";
        $result=mysqli_query($conexao, $consulta);
        

        if(!$consulta) {
        echo "Não pode executar a query.<br>\n";
        echo mysqli_error($banco)."<br>";
        } else {
        $dados = mysqli_fetch_assoc($result);
        include 'session.php';
        $pagina=<<<pagina
                    <!DOCTYPE html>
                    <html lang="pt-br">
                    <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" href="style.css">
                    <title>Sistema GeMaInd</title>
                    </head>
                    <body>
   
                    <div id="header">
                    <img src="img/logo_big.png" id="header_logo" alt="logo"><br> 
                    <h1>Gerenciador de Manutenção Industrial</h1>
                    </div>                    
                    <span>Bem vindo {$_SESSION['user']}!                    
                    <div id=""> 
                    <h2>Resultado da consulta</h2><br>
                    <span>NOME: {$dados['nome_func']}</span><br>
                    <span>MATRÍCULA: {$dados['matricula_func']}</span><br>
                    <span>CARGO: {$dados['cargo_func']}</span><br>
                    <span>SETOR: {$dados['setor_func']}</span><br>
                    <span>E-MAIL: {$dados['email_func']}</span><br>
                    <span>FUNCIONÁRIO DESDE: {$dados['data_admissao']}</span><br>

                pagina;
            echo "$pagina";      
        }
        
    }else{
        echo "<script>alert('É necessário digitar um USUÁRIO ou NOME para realizar a consulta!');location.href=\"users_DELETE.php\";</script>";
    }

    
}

function deletausuario(){
    
    include 'conexao2.php';


    if(!empty($_POST['user'])){
        $user=$_POST['user'];
        $consulta="DELETE FROM users where (matricula_func='$user')";
            if(mysqli_query($conexao, $consulta)){
                echo "<script>alert('Usuário $user excluído com sucesso!');location.href=\"users_DELETE.php\";</script>";;
              } else {
                echo "Error deleting record: " . mysqli_error($conn);
              }  

    }elseif(!empty($_POST['name'])){
        $name=$_POST['name'];
        $consulta="DELETE FROM users where (nome_func='$name')";
            if(mysqli_query($conexao, $consulta)){
                echo "<script>alert('Usuário $name excluído com sucesso!');location.href=\"users_DELETE.php\";</script>"; 
              } else {
                echo "Error deleting record: " . mysqli_error($conn);
              }          
    }else{
        echo "<script>alert('É necessário digitar um usuário nome para apagar o registro!');location.href=\"users_DELETE.php\";</script>";
    }
    
}

function cancela(){
    echo "<script>alert('Ação cancelada!');location.href=\"users_DELETE.php\";</script>";
}

function retorna(){
    header('location:users_DELETE.php');
}


?>