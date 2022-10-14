<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar produto</title>
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

        <h1>Atualizar produto</h1>

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

// Coleta os dados do Administrador
$id = $_GET["id"];

// Realiza uma Query SQL para buscar o administrador que tenha o EMAIL e a SENHA passado pelo usuario
$admin = $pdo->query("SELECT * FROM PRODUTO WHERE PRODUTO_ID=" . $id)->fetch() ;

$nome = $admin["PRODUTO_NOME"];
$descricao = $admin["PRODUTO_DESC"];
$preco = $admin["PRODUTO_PRECO"];
$desconto = $admin["PRODUTO_DESCONTO"];

?>    

<div class="container">  
    <form id="contact" action="atualizarproduto.php" method="POST">
      <fieldset>
        <input placeholder="Nome do produto" type="text" name="nome" value="<?php echo $nome ?>" id="nome" tabindex="1"  required>
      </fieldset>
      <fieldset>
        <input type="text" placeholder="Descrição do produto" name="descricao" value="<?php echo $descricao ?>" id="descricao" tabindex="2"  required></input>
      </fieldset>
      <fieldset>
        <input placeholder="Preço do produto" type="number" step="0.01" min="1" name="preco" value="<?php echo $preco ?>" id="preco" tabindex="3"  required>
      </fieldset>
      <fieldset>
        <input placeholder="Desconto do produto" type="number" step="0.01" min="1" name="desconto" value="<?php echo $desconto ?>" id="desconto" tabindex="4"  required>
      </fieldset>
      <input type="hidden" value="<?php echo $_GET["id"]?>" name="id">
      <select name="categoriaId" id="categoriaId" required>
        <option> Categoria </option>

        <?php

        $stmt = $pdo->prepare("SELECT * FROM CATEGORIA");
        $stmt->execute();

        if($stmt->rowCount() > 0){
        while ($dados = $stmt->fetch(pdo::FETCH_ASSOC)){
          echo "<option value='{$dados['CATEGORIA_ID']}'>{$dados['CATEGORIA_NOME']}</option>";
        }  
        }

        ?>
      </select>
      <br>
        <input type="submit" value="Enviar"> 
    </form>
   
    
  </div>

</body>
</html>