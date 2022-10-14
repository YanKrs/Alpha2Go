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
$email = $_POST["email"];
$senha = $_POST["senha"];
$id = $_GET["id"];

// Monta o comando de inserção
$cmdtext = "UPDATE ADMINISTRADOR SET ADM_NOME='" . $nome . "', ADM_EMAIL='" . $email . "', ADM_SENHA='" . $senha . "' WHERE ADM_ID=" .$id;
$cmd = $pdo->prepare($cmdtext);

//Executa o comando e verifica se teve sucesso
$status = $cmd->execute();
if($status){
    echo "<script language='javascript' type='text/javascript'>
    alert('Administrador atualizado com sucesso');window.location
    .href='administradores.php';</script>";
} else {
    echo "<script language='javascript' type='text/javascript'>
    alert('Ocorreu um erro ao atualizar');window.location
    .href='administradores.php';</script>";
}
?>