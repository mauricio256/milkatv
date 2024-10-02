<?php
include_once('conn.php');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

if(isset($_POST['submit']) == NULL){
    header('Location:../index.php');
}

$idCliente = $_POST['idCliente'];
$idadm = $_POST['idadm'];
$nome = mb_strtoupper($_POST['nome'], 'UTF-8');
$UF = $_POST['UF'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$logradouro = $_POST['logradouro'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$contato = $_POST['contato'];
$ultimoPag = $_POST['ultimoPag'];
$contaMilka= $_POST['contaMilka'];
$senhaMilka= $_POST['senhaMilka'];


    function removeCaractere($var) {
        $var = preg_replace('/[() -]/', '', $var);
        return $var;
    }

$contato = removeCaractere($contato);


/*
echo $idadm."<br>";
echo $nome."<br>"; 
echo $UF."<br>"; 
echo $cidade."<br>"; 
echo $bairro."<br>"; 
echo $logradouro."<br>"; 
echo $numero."<br>"; 
echo $complemento."<br>";  
echo $contato."<br>"; 
echo $ultimoPag."<br>"; 
echo $contaMilka."<br>"; 
echo $senhaMilka."<br>"; 
*/



$sql = "UPDATE `cliente` SET `complemento` = 'Casaa' WHERE `cliente`.`idCliente` = 15;";

$sql = "UPDATE `cliente` SET `nome` = '$nome', `UF` = '$UF', `cidade` = '$cidade', `bairro` = '$bairro', 
`logradouro` = '$logradouro', `numero` = '$numero', `complemento` = '$complemento', `contato` = '$contato',
 `ultimoPag` = '$ultimoPag', `conta` = '$contaMilka', `senha` = '$senhaMilka' 
 WHERE idCliente = '$idCliente'";


    if($conn->exec($sql)):

        echo"<script>
                alert('ALTERAÇÃO SALVA COM SUCESSO!');
                javascript:window.location='visualiza.php?idCliente=".$idCliente."';
            </script>";  
    else:

        echo"<script>
               
                alert('ATENÇÃO! Você não alterou nenhum dado do formulário.');
                javascript:window.location='visualiza.php?idCliente=".$idCliente."';
            </script>";   
    endif;
?>