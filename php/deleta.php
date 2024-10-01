<?php
include_once("conn.php");

$id = $_GET["idCleinte"];

$del = $conn->prepare("DELETE FROM cliente WHERE `cliente`.`idCliente` = '$id'");
$del->execute();

$cont = $del->rowCount();

if($cont > 0 ){
    echo"
        <script>   
            alert('DELETADO COM SUCESSO!');
            javascript:window.location='dashboard.php';
        </script>
    ";
    
}else{
    echo "<script> alert('Algo deu errado. Contate o desenvovedor do sistema!');</script>";
}