<?php
//Dados para conexao ao MySQL → MySQL
$mysqlhostname = "144.22.244.104";
$mysqlport = "3306";
$mysqlusername = "Alpha2Go";
$mysqlpassword = "Alpha2Go";
$mysqldatabase = "Alpha2Go";

//Mostra a String de Conexao ao MySQL → Criei a String de conexão e conectei ao banco (PDO)
$dsn = 'mysql:host=' . $mysqlhostname . ';dbname=' . $mysqldatabase . ';port=' . $mysqlport;
$pdo = new PDO($dsn, $mysqlusername, $mysqlpassword);

// Captura os valores das variaveis
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$id = $_POST["id"];

// Monta o comando de inserção
$cmdtext = "UPDATE CATEGORIA SET CATEGORIA_NOME='" . $nome . "', CATEGORIA_DESC='" . $descricao . "' WHERE CATEGORIA_ID=" .$id;
$cmd = $pdo->prepare($cmdtext);

//Executa o comando e verifica se teve sucesso
$status = $cmd->execute();
if($status){
    echo "<script language='javascript' type='text/javascript'>
    alert('Categoria atualizada com sucesso');window.location
    .href='listarcategorias.php';</script>";
} else {
    echo "<script language='javascript' type='text/javascript'>
    alert('Ocorreu um erro ao atualizar');window.location
    .href='listarcategorias.php';</script>";
}
?>
