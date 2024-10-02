<?php
session_start();
include_once("conn.php");
date_default_timezone_set('America/Sao_Paulo');

$idCliente = $_GET['idCliente'];
$adm = $_SESSION['adm'];

/// verifica se existe id cliente e se valor e nulo
if ($idCliente <= 0 || $idCliente == NULL || $idCliente == '') {
    header(header: 'Location:../index.php');
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
    $nomeAdmin = $valor["usuario"];
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
    <link rel="shortcut icon" type="imagex/png" href="../img/icon/milka.jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/dashboard.css">
    <title>Dashboard</title>
</head>

<body>

    <header>
        <a href="dashboard.php"><img src="../img/icon/sair.png" width="30"></a>
        <h3><strong>Administrador: </strong> <?php echo $nomeAdmin; ?></h3>
        <hr><br>
    </header>

    <?php
    foreach ($result as &$valor) {
    ?>

        <div id="box">
            <h2><strong><?php echo $valor['nome']; ?> <span></span> </strong> </h2>
            <hr>
            Endereço
            <h3><?php echo $valor['logradouro']; ?>,
                <?php echo $valor['numero']; ?>,
                <?php echo $valor['cidade']; ?>,
                <?php echo $valor['UF']; ?>
            </h3>
            <hr>
            Complemento
            <h3><?php echo $valor['complemento']; ?></h3>
            <hr>
            Contato
            <h3><?php echo $valor['contato']; ?></h3>
            <hr>
            Último Pagamento
            <h3><?php echo $valor['ultimoPag']; ?></h3>
            <hr>
            Status
            <h3>Ativo</h3>
                    <hr>

            Conta Milka
            <h3><input id="conta" readonly value="<?php echo $valor['conta']; ?>"/> 
            <button id="btnConta">Copiar</button></h3>
                    
            Senha Milka
            <h3><input id="senha" readonly value="<?php echo $valor['senha']; ?>" />
            <button id="btnSenha">Copiar</button></h3>
                                
                                    <hr>
                                    <br>
                                    <ul>
                                        <li><a target="_blank"
                                                href="https://wa.me/55<?php echo $valor['contato']; ?>"><ion-icon
                                                    size="small" name="logo-whatsapp"></ion-icon></a></li>
                                        <li><a href="edita.php?idCliente=<?php echo $valor['idCliente']; ?>" ><ion-icon size="small" name="create-outline"></ion-icon></a></li>
                                        <li><a onclick="return confirma()"
                                                href="deleta.php?idCleinte=<?php echo $valor['idCliente']; ?>"><ion-icon
                                                    size="small" name="trash-outline"></ion-icon></a></li>
                                        <li><a href="dashboard.php">Voltar</a></li>
                                    </ul>
        </div>

    <?php
    }
    unset($valor); // quebra a referência com o último elemento
    ?>


    <script>
        const conta = document.getElementById('conta');
        const senha = document.getElementById('senha');
        const btnConta = document.getElementById('btnConta');
        const btnSenha = document.getElementById('btnSenha');


        btnConta.addEventListener('click', () => {
            conta.select();
            document.execCommand('copy');
            btnConta.innerHTML = "Copiado"
        });

        btnSenha.addEventListener('click', () => {
            senha.select();
            document.execCommand('copy');
            btnSenha.innerHTML = "Copiado"
        });
    </script>

    <script type="text/javascript">
        /// modal para confirmar o delete
        function confirma() {

            if (confirm('Deseja mesmo DELETAR?') == true) {
                return true;
            } else {
                return false;
            }
        }
    </script>

    <!-- js dos icones site ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>