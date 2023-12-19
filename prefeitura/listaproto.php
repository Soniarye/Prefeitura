<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Protocolos</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
    <header><h2>Lista de Protocolos</h2></header>
    <main>
    <form action ="">
        <input type="text" name="busca" placeholder="Digite a pesquisa">
        <button type="submit" name="pesquisar">Pesquisar</button>
    </form>
<table>
    <thead>
        <tr>
            <th>Nome do Contribuinte</th>
            <th>Descrição</th>
            <th>Data do Registro</th>
            <th>Prazo</th>
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
        
        $sql = "SELECT * FROM protocolos";
        $dados = $conexao->query($sql);

        if (!isset($_GET['busca'])) {
                
        } else {
        $pesquisa = $_GET['busca'];
        $sql_code = "SELECT * FROM protocolos WHERE nomecont LIKE '%$pesquisa%'
        OR descr LIKE '%$pesquisa%'
        OR `data` LIKE '%$pesquisa%'
        OR prazo LIKE '%$pesquisa%'";
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
            echo '<td>' . $linha['nomecont'] . '</td>';
            echo '<td>' . $linha['descr'] . '</td>';
            echo '<td>' . $linha['data'] . '</td>';
            echo '<td>' . $linha['prazo'] . '</td>';
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