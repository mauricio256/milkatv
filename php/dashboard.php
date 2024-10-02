<?php
session_start();
include_once("conn.php");
date_default_timezone_set('America/Sao_Paulo');

if(!isset( $_SESSION['adm'] )){
    header('Location:../index.php');
};

 $adm = $_SESSION['adm'];


  //// busca ADMs
    $sth = $conn->prepare("SELECT * FROM administrador WHERE email = '$adm' ");
    $sth->execute();

    $result_adm = $sth->fetchAll();

    foreach ($result_adm as &$valor) {    
        $idAdmin = $valor["idAdmin"];
        $nomeAdmin = $valor["usuario"];
    }




    /// Busca Clientes
    $filtro = 1 ;// $_POST["filtro"]; se nao existir o botao de buscar filtro e busca recebe 1 para listar todos
    $busca = 1 ;/// $_POST['busca'];	

    if(isset($_POST['btnBuscar'])){
        
        $filtro = $_POST["filtro"];
        $busca = $_POST['busca'];

    }

        $sth = $conn->prepare("SELECT * FROM `cliente` WHERE `fk_idAdmin` = $idAdmin AND $filtro LIKE '%$busca%'");
        $sth->execute();

        $result = $sth->fetchAll();

        /////// contagem de registros
        $count = $sth->rowCount();   

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="imagex/png" href="../img/icon/milka.jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>Dashboard</title>
</head>
<body>
    
    <header> 
        <a href="../index.php"><img src="../img/icon/sair.png" width="30"></a>
        <h3><strong>Administrador: </strong> <?php echo $nomeAdmin; ?></h3><hr><br>
        <form action='dashboard.php' method='post'>
            <label>FILTRAR POR:</label>
            <select required name="filtro">
                <option value="nome">NOME</option>
                <option value="conta">CONTA</option>
            </select>
            <a id="filtro" href="dashboard.php">Listar Todos</a>
            <a id="cadastrar" href="formulario.php?idadm=<?php echo $idAdmin ?>">Cadastrar</a><br><br>
    
            <input required type="text" name="busca" placeholder='Selecione o tipo de filtro'>
            <button type="submit" name="btnBuscar">Buscar</button>
        </form><br><br>

        <span>(<?php echo $count; ?>) Registro encontrados</span>
    </header>

    <?php  
        foreach ($result as &$valor) {    
    ?>

    <div id="box">
    
       <h3><strong>
       <a style='float:right;' href="visualiza.php?idCliente=<?php echo $valor['idCliente']; ?>"><ion-icon size="small" name="chevron-forward-outline"></ion-icon></a> 
            <?php echo $valor['nome']; ?>
        </strong></h3><hr>

       <strong><label>Endereço: </label></strong>
            <?php echo $valor['logradouro']; ?>,
            <?php echo $valor['numero']; ?>,       
            <?php echo $valor['cidade']; ?>,
            <?php echo $valor['UF']; ?><br>
        <strong><label>Complemento: </label></strong>
            <?php echo $valor['complemento']; ?><br> 
        <strong><label>Contato: </label></strong>
            <?php echo $valor['contato']; ?>  <br>
        <strong><label>Status: </label></strong>
           Ativo<br>
    </div>


            <!-- js dos icones site ionicons -->
            <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
            <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
   

    <?php 
        } 
        unset($valor); // quebra a referência com o último elemento
    ?>        
</body>
</html>