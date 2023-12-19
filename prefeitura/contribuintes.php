<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contribuintes</title>
    <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
    <header><h1>Lista de Contribuintes</h1></header>
    <main>
    <form action ="">
        <input type="text" name="busca" placeholder="Digite a pesquisa">
        <button type="submit" name="pesquisar">Pesquisar</button>
    </form>
<table>
    <thead>
        <tr>
            <th>Nome do Contribuinte</th>
            <th>Data de Nascimento</th>
            <th>CPF</th>
            <th>Cidade</th>
            <th>Bairro</th>
            <th>Rua</th>
            <th>Número</th>
            <th>Complemento</th>
        </tr>
    </thead>
    <tbody>
    <?php
        session_start();

        if (!isset($_SESSION['id'])) {
            header('Location: login.php');
             exit();
        }

        include("conexao.php");
        
        $sql = "SELECT * FROM usuários";
        $dados = $conexao->query($sql);

        if (!isset($_GET['busca'])) {
                
        } else {
        $pesquisa = $_GET['busca'];
        $sql_code = "SELECT * FROM usuários WHERE nome LIKE '%$pesquisa%'
        OR datanasc LIKE '%$pesquisa%'
        OR cpf LIKE '%$pesquisa%'
        OR cidade LIKE '%$pesquisa%'
        OR bairro LIKE '%$pesquisa%'
        OR rua LIKE '%$pesquisa%'
        OR numero LIKE '%$pesquisa%'
        OR complemento LIKE '%$pesquisa%'";
        $sql_query = $conexao->query($sql_code) or die("ERRO" . $conexao->error);
        

        if ($sql_query->num_rows == 0) {
            ?>
        <tr>
           <?php
            echo "Faça uma pesquisa na barra acima para obter os resultado"
           ?>
        </tr>
        <?php
        } else {
        while ($linha = $sql_query->fetch_assoc()) {       
            echo '<tr>';
            echo '<td>' . $linha['nome'] . '</td>';
            echo '<td>' . $linha['datanasc'] . '</td>';
            echo '<td>' . $linha['cpf'] . '</td>';
            echo '<td>' . $linha['cidade'] . '</td>';
            echo '<td>' . $linha['bairro'] . '</td>';
            echo '<td>' . $linha['rua'] . '</td>';
            echo '<td>' . $linha['numero'] . '</td>';
            echo '<td>' . $linha['complemento'] . '</td>';
            echo '<td><a href="delete.php?id=' . $linha['id'] . '">Deletar</a></td>';
            echo '</tr>';
        }
    }
}           
        ?>
    </form>
    </tbody>
</table>
        <form action="inicial.php" method="get">
        <button>Voltar para a página inicial</button>
</main>
</body>
</html>