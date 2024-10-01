<?php
session_start();
include_once('conn.php');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

if(!isset($_POST["btn_login"])){
    header('Location:../index.php');
}

$mail = $_POST['mail'];
$pass = preg_replace('/[^[:alnum:]_]/', '',$_POST['pass']);

///echo $mail;
///echo $pass;

$sql = "SELECT usuario, email, senha FROM administrador where email = '$mail' and senha = '$pass'";


   
    $busca = $conn->prepare($sql);
    $busca->execute();

    /* Return number of rows that were deleted */
    $count = $busca->rowCount();

    if($count > 0){      
        $_SESSION['adm'] = $mail;
        header('Location:dashboard.php');
    }else{
        $_SESSION['MSG_loginErro'] = "<div style='text-align:center; margin-top:20px;'> <p style='background-color:#fd3838; color:white; padding:5px;'>E-mail e/ou senha incorreto(s)</p></div>";
        header('Location:../index.php');
    }
    