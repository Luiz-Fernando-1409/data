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
        <form id=cadastra method="post" action="functions.php" >
            <span>Cadastrar Usuário</span><br>
            USUÁRIO:<input required name=user oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
            type = "number" maxlength = "6" /><br>

            NOME:<input required type=text name=name oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
            maxlength = "50"><br>
            
            <label for="label-select">SETOR:</label>
            <select name="sector-select">
                <option value="">--Selecione o setor--</option>
                <option value="Axial">Axial</option>
                <option value="Radial">Radial</option>
                <option value="Linha Rápida">Linha Rápida</option>
                <option value="Snap-in">Snap In</option>
                <option value="Giga">Giga</option>
                <option value="Film PW">FILM PW</option>
            </select><br>

            SENHA:<input required type="password" name="senha"><br>
            CONFIRME A SENHA:<input required type="password" name="senhaC"><br>

            <label for="label-select">PERFIL:</label>
            <select name="perfilselect">
                <option value="">--Selecione o perfil--</option>
                <option value="Gerencial">Gerencial</option>
                <option value="Operacional">Operacional</option>
            </select><br>            

            E-MAIL:<input type=email name=email><br>

            <label for="label-select">CARGO:</label>
            <select name="cargoselect">
                <option value="">--Selecione o cargo--</option>
                <option value="Mecânico Preparador 1">Mecânico Preparador 1</option>
                <option value="Mecânico Preparador 2">Mecânico Preparador 2</option>
                <option value="Operadora de Máquina">Operadora de Máquina</option>
                <option value="Auxiliar de Fabricação">Auxiliar de Fabricação</option>
                <option value="Supervisor">Supervisor</option>
                <option value="Técnico de Produto">Técnico de Produto</option>
                <option value="Técnico de Processo">Técnico de Processo</option>
            </select><br>

        DATA DE ADMISSÃO:<input type=date name=date><br>    

            <label for="label-select">GÊNERO:</label>
            <select name="genderselect">
                <option value="">--Selecione o gênero--</option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
                <option value="O">Outro</option>
            </select><br>                            
            <input type="hidden" name="action_type" value="cadastra_usuario">
            <button class="submit" type="submit" value="submit">SALVAR</button><br>
            <button class="clear" type="clear">LIMPAR CAMPOS</button>                                  
    </div>   
  
</body>
</html>