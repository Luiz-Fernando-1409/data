<?php
    include 'session.php';
?>
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
        <?php
            echo "<span>Bem vindo {$_SESSION['user']}!</span>";
        ?>
    <div id="container">            
            <div id=main_icons>
            <a href="equipments.php">CONSULTAR EQUIPAMENTOS</a><br>
            <a href="users.php">REGISTRAR MANUTENÇÕES</a><br>
            <a href="users.php">CONSULTAR MANUTENÇÕES</a><br>
            <a href="users.php">CONSULTAR PEÇAS DE REPOSIÇÃO</a><br>
            <a href="users.php">CONSULTAR MANUAIS E DESENHOS TÉCNICOS</a><br>

            <?php
                echo "<a href=\"session.php?logout=1\">LOGOUT</a>"; 
            ?>    
            </div>                      
    </div>    
    
</body>
</html>