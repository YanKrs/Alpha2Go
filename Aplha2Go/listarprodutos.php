<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de produtos</title>
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

        <h1>Lista de produtos</h1>
        <button class="listaAdmin" onclick="location.href='produtosadmin.php'" type="button">Novo</button>
<?php
require_once 'PHP/conecta.php';

//Monta o comando de Inserção no Banco
$cmd = $pdo->query("SELECT * FROM PRODUTO");
?>    

<div class="container">
    <table class="table table-dark">
        <tr>
            <th>Id</th>
            <th>Nome do produto</th>
            <th>Descrição</th> 
            <th>Preço</th> 
            <th>Desconto</th>
            <th>Categoria ID</th> 
            <th>Ativo</th>   
            <th>Atualização</th>
            <th>Ativar/Desativar</th>          
        </tr>
<?php
    //Lista os admins
    while($linha = $cmd->fetch()){
?>
        <tr>
            <td>
                <?php
                    echo $linha["PRODUTO_ID"];
                ?>
            </td>
            <td>
                <?php
                    echo $linha["PRODUTO_NOME"];
                ?>                
            </td>
            <td>
                <?php
                    echo $linha["PRODUTO_DESC"];
                ?>
            </td>
            <td>
                <?php
                    echo $linha["PRODUTO_PRECO"];
                ?>
            </td>
            <td>
                <?php
                    echo $linha["PRODUTO_DESCONTO"];
                ?>
            </td>
            <td>
                <?php
                    echo $linha["CATEGORIA_ID"];
                ?>
            </td>
            <td>
                <?php
                    echo $linha["PRODUTO_ATIVO"];
                ?>
            </td>          
            <td>
           <a href="atualizarformproduto.php?id=<?php echo $linha["PRODUTO_ID"] ?>"><button class="btn btn-secondary btn-sm">Atualizar</button>
            </td>
            <td>
           <a href="excluirform.php?id=<?php echo $linha["PRODUTO_ID"] ?>"> <button class="btn btn-secondary btn-sm">Ativar/Desativar</button>
            </td>        
        </tr>
    <?php
    } //while($linha = $cmd->fetch())
?>
    </table>

    </div>

   
    </body>
    </html>