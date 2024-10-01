<?php
include_once('conn.php');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');

if(isset($_POST['submit']) == NULL){
    header('Location:../index.php');
}

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



$sql = "INSERT INTO `cliente` (`idCliente`, `fk_idAdmin`, `nome`, `UF`, `cidade`, `bairro`, `logradouro`, `numero`, `complemento`, `contato`, `ultimoPag`, `conta`, `senha`, `dataCreate`) VALUES 
        (NULL, '$idadm', '$nome', '$UF', '$cidade', '$bairro', '$logradouro', '$numero', '$complemento', '$contato', '$ultimoPag', '$contaMilka', '$senhaMilka', now())";

try {
    if($conn->exec($sql)):

        echo"<script>
                alert('CADASTRADO COM SUCESSO!');
                javascript:window.location='dashboard.php';
            </script>";  
    else:

        echo"<script>
                alert('ERRO AO CADASTRAR, tente novamente.');
                javascript:window.location='formulario.php';
            </script>";   
    endif;
} catch (Exception $e) {  
        echo "<div style='max-width: 20em; text-align:center; border-radius:5px;  padding:20px; background-color:red; color:yellow;'>
                <h2>Esse USUARIO já possui cadastro!</h2><br>
                <a href='../index.html' style='text-decoration:none; border-radius: 5px; color:white; background-color:gray; padding: 10px; '>Sair</a>
              </div>"; 
    }
             
?>