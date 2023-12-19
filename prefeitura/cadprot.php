<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Protocolo</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<main>
    <?php
    session_start();

    if (!isset($_SESSION['id'])) {
        header('Location: login.php');
        exit();
    }

    $pesquisa = $_POST['busca'] ?? '';    
    include("conexao.php");

    if ($conexao->connect_error) {
        die("Conexão falhou: " . $conexao->connect_error);
    }

    $descr = isset($_POST['descr']) ? $_POST['descr'] : '';
    $data = isset($_POST['data']) ? $_POST['data'] : '';
    $prazo = isset($_POST['prazo']) ? $_POST['prazo'] : '';
    $nomecont = isset($_POST['nomecont']) ? $_POST['nomecont'] : '';

    $query = mysqli_query($conexao, "INSERT INTO protocolos (`descr`, `data`, `prazo`, `nomecont`) VALUES ('$descr', '$data', '$prazo', '$nomecont')");

    if (!$query) {
        die("Erro: " . mysqli_error($conexao));
    }

    $sql = "SELECT * FROM usuários WHERE nome LIKE '%$pesquisa%'";
    $dados = mysqli_query($conexao, $sql);

    while ($linha = mysqli_fetch_assoc($dados)) {
        $nomecont = $linha['nome'];
    }

    ?>

    <form action="cadprot.php" method="post">
        <label for="descr">Descrição:</label>
        <input type="text" name="descr" id="descr" required>
        <br>
        <label for="data">Data do registro:</label>
        <input type="date" name="data" id="data" required>
        <br>
        <label for="prazo">Prazo:</label>
        <input type="date" name="prazo" id="prazo" required>
        <br>
        
        <label for="nomecont">Contribuinte:</label>
        <select id="nomecont" name="nomecont">
            <?php

            if ($dados && $dados->num_rows > 0) {
                mysqli_data_seek($dados, 0);
                while ($row = mysqli_fetch_assoc($dados)) {
                    echo '<option value="' . $row['nome'] . '">' . $row['nome'] . '</option>';
                }
            } else {
                echo '<option value="">Nenhum nome encontrado</option>';
            }
            ?>
        </select>
        <br>
        <input type="submit" value="Enviar">
    </form>
    
    <?php

    $conexao->close();
    ?>
    <form action="inicial.php" method="get">
    <button>Voltar para a página inicial</button>
    </form>
</main>
</body>
</html>