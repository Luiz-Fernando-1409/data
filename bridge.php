<?php

include 'conexao.php';


$user=$_POST['user'];
$password=$_POST['password'];//recebendo valores do $_POST;



if (empty($user)||empty($password)){
    echo "<script>alert('É necessário digitar um usuário e senha!');location.href=\"index.php\";</script>";
    exit(0);
    };//verifica se foram preenchidos usuario e senha

$result= "SELECT senha_func FROM users WHERE matricula_func='$user'";
$consulta= mysqli_query($conexao,$result);//obtem do banco a senha criptografada do usuario
$row=mysqli_fetch_array($consulta,MYSQLI_ASSOC);

            if (password_verify($password, $row['senha_func'])){                                          
                session_start();
                $result1="SELECT nome_func,perfil_func FROM users WHERE matricula_func='239094'";
                $consulta1= mysqli_query($conexao,$result1);
                $dados=mysqli_fetch_array($consulta1,MYSQLI_ASSOC);                 
                $_SESSION['user']=$dados['nome_func'];  
                    if($dados['perfil_func']=="Gerencial")
                        header('location:main_manager.php');
                    else
                        header('location:main_operator.php');
            }else{
                echo "<script>alert('Usuário ou senha incorretos!');location.href=\"index.php\";</script>";
                exit(0);//erro caso não exista o usuario no banco ou a senha não confere
        }        
?>


