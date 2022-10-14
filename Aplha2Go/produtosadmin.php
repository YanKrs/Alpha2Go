<html><!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de produtos</title>
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


<!-- Formulário  -->

<?php
require_once 'PHP/conecta.php';

//Monta o comando de Inserção no Banco
$cmd = $pdo->query("SELECT * FROM PRODUTO");
?>   

<div class="container">  
    <form id="contact" action="criarprocessamentoproduto.php" method="POST">
      <h3>Cadastro de produtos</h3>
      <h4>Cadastre os produtos e suas informações abaixo</h4>
      <fieldset>
        <input placeholder="Nome do produto" type="text" name="nome" id="nome" tabindex="1" required>
      </fieldset>
      <fieldset>
        <textarea placeholder="Descrição do produto" name="descricao" id="descricao" tabindex="2" required></textarea>
      </fieldset>
      <fieldset>
        <input placeholder="Preço do produto" type="number" step="0.01" min="1" name="preco" id="preco" tabindex="3" required>
      </fieldset>
      <fieldset>
        <input placeholder="Desconto do produto" type="number" step="0.01" min="1" name="desconto" id="desconto" tabindex="4" required>
      </fieldset>
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
      <fieldset>
        <button value="Cadastrar" id="cadastrar" name="cadastrar">Cadastrar</button>
      </fieldset>
    </form>
   
    
  </div>


</body>
</html>