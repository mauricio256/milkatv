<?php
session_start();
include_once("conn.php");
date_default_timezone_set('America/Sao_Paulo');

$idCliente = $_GET['idCliente'];
$adm = $_SESSION['adm'];

/// verifica se existe id cliente e se valor e nulo
if ($idCliente <= 0 || $idCliente == NULL || $idCliente == '') {
    header('Location:../index.php');
};

/// verifica se existe sessao de adm e se nao tiver volta para menu
if (!isset($_SESSION['adm'])) {
    header('Location:../index.php');
};

//// busca ADMs
$sth = $conn->prepare("SELECT * FROM administrador WHERE email = '$adm' ");
$sth->execute();

$result_adm = $sth->fetchAll();

foreach ($result_adm as &$valor) {
    $idAdmin = $valor["idAdmin"];
}

//// Busca Cliente por ID
$sth = $conn->prepare("SELECT * FROM `cliente` WHERE `fk_idAdmin` = $idAdmin AND idCliente LIKE '%$idCliente%'");
$sth->execute();

$result = $sth->fetchAll();


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="../css/styleForm.css">
    <link rel="shortcut icon" type="imagex/png" href="../img/icon/milka.jpg">
    <script defer src="../js/scriptForm.js"></script>
</head>

<body>

    <h1>Editar Cadastro</h1>
    

    <form id="form" action="validaEdita.php" method="post">
        
        <input  hidden value="<?php echo $idCliente;?>" type="text" name="idCliente">
        <input  hidden value="<?php echo $idAdmin;?>" type="text" name="idadm">

        <?php
            foreach ($result as &$valor) {
        ?>

        <label>Nome Completo:</label>
        <input required name="nome" class="input" type="text" value="<?php echo $valor['nome']; ?>" name="nome" id="nome">
        <span class="span"></span>

        <label>UF:</label>
        <input required readonly value="<?php echo $valor['UF']; ?>" class="input" name="UF" type="text">
        <span class="span"></span>

        <label>Cidade:</label>
        <input required readonly value="<?php echo $valor['cidade']; ?>" class="input" name="cidade" type="text">
        <span class="span"></span>

        <label>Bairro:</label>
        <input required name="bairro" value="<?php echo $valor['bairro']; ?>" class="input" type="text">
        <span class="span"></span>

        <label>Logradouro:</label>
        <input required name="logradouro" value="<?php echo $valor['logradouro']; ?>" class="input" type="text">
        <span class="span"></span>

        <label>Número:</label>
        <input required name="numero" value="<?php echo $valor['numero']; ?>" class="input" type="text">
        <span class="span"></span>

        <label>Complemento:</label>
        <input required name="complemento" value="<?php echo $valor['complemento']; ?>" class="input" type="text">
        <span class="span"></span>

        <label>Contato:</label>
        <input class="input" type="text" id="phone" value="<?php echo $valor['contato']; ?>" name="contato" onkeypress="mask(this, mphone);" onblur="mask(this, mphone);" />
        <span class="span"></span>

        <label for="dataConclusao">Último pagamento: </label>
        <input required class="input" type="date" value="<?php echo $valor['ultimoPag']; ?>" name="ultimoPag">
        <span class="span"></span>

        <label>Conta Milka:</label>
        <input class="input" type="text" value="<?php echo $valor['conta']; ?>" name="contaMilka" />
        <span class="span"></span>

        <label>Senha:</label>
        <input class="input" type="text" value="<?php echo $valor['senha']; ?>" name="senhaMilka" />
        <span class="span"></span>

        <button type="submit" name="submit" onclick="return validaForm();">Salvar alterações</button>
        <a href="visualiza.php?idCliente=<?php echo $idCliente?>">Fechar</a>
    </form>
    <?php
        }
        unset($valor); // quebra a referência com o último elemento
    ?>

</body>

</html>