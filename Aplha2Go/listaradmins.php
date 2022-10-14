<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de administradores</title>
    <link rel="shortcut icon" href="imagens/Alpha_Go_2_2[1406].png" /> 
    <link rel="stylesheet" href="styleadmin.css">
</head>

<body>

<nav id="menu-h">
        <ul>
            <li>
                <a href="cadastraradmin.html">
                    Cadastrar administradores
                </a>
            </li>

            <li><a href="listarcategorias.php">Categorias</a></li>
            
            <li><a href="listarprodutos.php">Produtos</a></li>

            <li><a href="listarimagem.php">Cadastrar imagem</a></li>
            
            <li><a href="loginadmin.html">Sair</a></li>
        </ul>
    </nav>

        <h1>Listar os Administradores</h1>
        <br>
<?php
require_once 'PHP/conecta.php';

//Monta o comando de Inserção no Banco
$cmd = $pdo->query("SELECT * FROM ADMINISTRADOR");
?>      
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Senha</th>
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
                    echo $linha["ADM_ID"];
                ?>
            </td>
            <td>
                <?php
                    echo $linha["ADM_NOME"];
                ?>                
            </td>
            <td>
                <?php
                    echo $linha["ADM_EMAIL"];
                ?>
            </td>    
            <td>
                 <?php
                    echo $linha["ADM_SENHA"];
                ?>
            </td>    
            <td>
                <a href="atualizarform.php?id=<?php echo $linha["ADM_ID"] ?>">Atualizar</a>
            </td>
            <td>
                <a href="excluirform.php?id=<?php echo $linha["ADM_ID"] ?>">Ativar/Desativar</a>
            </td>        
        </tr>
    <?php
    } //while($linha = $cmd->fetch())
?>
    </table>
   
    </body>
    </html>