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

//Captura o post do Usuario
$email = $_POST["email"];
$senha = $_POST["senha"];

//Realiza uma Query SQL para buscar o administrador que tenha o EMAIL e a SENHA passado pelo Usuario
$admin = $pdo->query("SELECT * FROM ADMINISTRADOR WHERE ADM_EMAIL='" . $email . "' AND ADM_SENHA='" . $senha . "' AND COALESCE(ADM_ATIVO, 1) = 1")->fetchAll();

//Se o retorno for vazio (0), então a senha ou email estão incorretos
if(count($admin)==0){
    echo "<script language='javascript' type='text/javascript'>
    alert('Email ou senha inválidos');window.location
    .href='loginadmin.html';</script>";
} else {
    echo "<script language='javascript' type='text/javascript'>
    alert('Login realizado com sucesso');window.location
    .href='menuadmin.html';</script>";
}
?>
