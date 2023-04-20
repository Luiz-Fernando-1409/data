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
        <script>
            function input_consulta(){
                const myInput = document.querySelector('input[name="action_type"]');            
                myInput.value="consulta_usuario";
                }

            function input_deleta(){
                if((document.getElementById("user").value == "")&&(document.getElementById("name").value == "")){
                    alert('Por favor, preencha um dos campos!');
                    document.getElementById("user").focus();

                }else{
                const myInput = document.querySelector('input[name="action_type"]'); 
                var resultado = confirm("Deseja excluir o usuário?");
                if (resultado == true) {
                   myInput.value="deleta_usuario";                                        
                }else if(resultado == false) {    
                    myInput.value="cancela";
                };
            }               
            }      

        </script>
        <form id=cadastra method="post" action="functions.php" >
            <span>Consultar Usuário</span><br>
            USUÁRIO:<input id=user name=user oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
            type = "number" maxlength = "6" /><br>

            NOME:<input type=text id=name name=name oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
            maxlength = "50"><br>
                                     
            <input type="hidden" name="action_type" value="">

            <button class="submit" type="submit" value="submit" onclick="input_consulta()">CONSULTAR</button><br>
            <button class="clear" tupe="clear" onclick="input_deleta()">EXCLUI USUÁRIO</button>       
    </div>   
  
</body>
</html>