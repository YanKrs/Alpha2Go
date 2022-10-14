
<?php
require_once 'PHP/conecta.php';

//Captura os valores das variáveis
$nome = $_POST["nome"];
$id = $_POST["id"];
    
//Monta o comando de Inserção no Banco
$cmdtext = "DELETE FROM CATEGORIA WHERE CATEGORIA_ID='$id'";
$cmd = $pdo->prepare($cmdtext);

//Executa o comando e verifica se teve sucesso
$status = $cmd->execute();
if($status){
    echo "<script language='javascript' type='text/javascript'>
    alert('Exclusão de categoria com sucesso');window.location
    .href='listarcategorias.php';</script>";
} else {
    echo "<script language='javascript' type='text/javascript'>
    alert('Ocorreu um erro ao excluir a categoria');window.location
    .href='listarcategorias.php';</script>";
}
?>