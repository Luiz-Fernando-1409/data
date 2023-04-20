<?php

include 'conexao.php';

$user=$_POST['user'];
$password=$_POST['password'];
$login="SELECT * from USERS where (matricula_func ='$user') AND (senha_func='$password')";
$consulta= mysqli_query($conexao,$login);

if (empty($user)||empty($password)){
    echo "<script>alert('É necessário digitar um usuário ou senha!');location.href=\"index.php\";</script>";
    exit(0);
};

if (!$consulta) {
    echo "Não pode executar a query.<br>\n";
    echo mysqli_error($banco)."<br>";
} else {
    $dados = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
};


if(empty($dados)){
    echo "<script>alert('Usuário ou senha incorretos!');location.href=\"index.php\";</script>";
    exit(0);
};

if(!empty($dados)){
    session_start();
    $_SESSION['user']=$dados['nome_func'];
    echo "USUÁRIO {$_SESSION['user']} CONECTADO";
};

if($dados['perfil_func']=="Gerencial")
    header('location:main_manager.php');
else
    header('location:main_operator.php');

?>


