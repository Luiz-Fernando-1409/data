<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login SGM</title>
</head>
<body>
    <div id="container">
            <div id="login">
                <fieldset>  
                    <img src="img/logo_big.png" id="imglogo" alt="logo"><br>         
                    <form action="bridge.php" method="post">
                        <span class="center_text">DIGITE SEU USUÁRIO</span><br>
                        <input type="text" name="user"><br>
                        <span class="center_text">DIGITE SUA SENHA</span><br>
                        <input type="password" name="password"><br>
                        <button class="submit" type="submit">ACESSAR</button>
                        <br>
                        <button class="clear" type="submit" formaction="forgot.php">ESQUECI MEU USUÁRIO OU SENHA</button>
                    </form>
                </fieldset>
            </div>
    </div>
    
</body>
</html>