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
    <form action="" method="post">
            <h2>Digite seu usuário ou nome e enviaremos um e-mail com instruções para recuperar seu acesso!</h2>
            <input type="text" placeholder="Digite aqui" name="nome"><br>
            <button class="submit" type="submit" name="enviar">ENVIAR</button>                
    </div>    

<?php
    include 'conexao.php';

    if(!$_POST['enviar'])
        exit(0);
    else{    
        $user=$_POST['nome'];
        $recupera="SELECT email_func from USERS where (matricula_func='$user') OR (nome_func='$user')";

        if(!empty($_POST['nome']))
            $consulta= mysqli_query($conexao,$recupera);
    
               
        if (!$consulta) {
            echo "Não pode executar a query.<br>\n";
            echo mysqli_error($banco)."<br>";
        } else {
            $dados = mysqli_fetch_array($consulta, MYSQLI_ASSOC);
        } ;


        if($_POST['enviar'] and empty($dados)){
            echo "<script>alert('Usuário ou nome não encontrados!');location.href=\"forgot.php\";</script>";
            exit(0);
        };
        
        if(!empty($dados))
            print_r($dados);
        
    }
        
        ?>




    
</body>
</html>