<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ativar administrador</title>
    <link rel="shortcut icon" href="imagens/Alpha_Go_2_2[1406].png" /> 
    <link rel="stylesheet" href="styleadmin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

<nav id="menu-h">
        <ul>
            <li>
                <a href="administradores.php">
                    Administradores
                </a>
            </li>

            <li><a href="listarcategorias.php">Categorias</a></li>
            
            <li><a href="listarprodutos.php">Produtos</a></li>

            <li><a href="listarimagem.php">Cadastrar imagem</a></li>
            
            <li><a href="loginadmin.html">Sair</a></li>
        </ul>
    </nav>

        <h1>Atualizar administrador</h1>

<?php
//Dados para conexao ao MySQL → MySQL
require_once 'PHP/conecta.php';

// Coleta os dados do Administrador
$id = $_GET["id"];

// Realiza uma Query SQL para buscar o administrador que tenha o EMAIL e a SENHA passado pelo usuario
$admin = $pdo->query("SELECT * FROM ADMINISTRADOR WHERE ADM_ID=" . $id)->fetch() ;

// Se o retorna for vazio (0), então a senha ou email estão incorretos
$nome = $admin["ADM_NOME"];
$email = $admin["ADM_EMAIL"];
$senha = $admin["ADM_SENHA"];
?>    

<div class="container">
<Form id="contact" Action="excluirprocessamentoadministradores.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    

    
    
    <input type="radio" name="ativo" value='1'"<?php echo $nome ?>"> Selecione para Ativar Administrador.
    <br>
    <input type="radio" name="ativo" value='0'"<?php echo $nome ?>"> Selecione para Desativar Administrador.
    <br>
    

    <input type="submit" value="Enviar"> 
</Form>
</div>

</body>
</html>