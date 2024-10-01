<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="imagex/png" href="./img/icon/milka.jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Changa+One:ital@0;1&family=Oswald:wght@200..700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="wrapper">
        <div class="form-box">
            <div class="logo">
                <img src="./img/logo.png" width="100">
            </div>
            <form action="php/verificaLogin.php" method="post" id="form"> 

                <?php 
                    if(isset($_SESSION['MSG_loginErro'])){
                        echo $_SESSION['MSG_loginErro'];
                        unset($_SESSION['MSG_loginErro']);
                    }
                ?>

                <div class="input-box">
                    <span class="icon"><ion-icon name="mail"></ion-icon></span>
                    <input type="text" class="input" name="mail">
                    <span class="span"></span>
                    <label>E-mail</label>
                </div>   
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                    <input type="password" class="input" name="pass">
                    <span class="span"></span>
                    <label>Senha</label>
                </div>
                <div class="forgot-pass">
                    <a href="recuperaSenha.html">Esqueci minha senha!</a>
                </div>   
                <button type="submit" name="btn_login" class="btn" onclick="return validaLogin();">Entrar</button> 
            </form>
        </div>

    </div>
    <script defer src="js/login.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>