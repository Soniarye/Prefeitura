<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
    <header><h1>Cadastro de Contribuintes</h1></header>
<body>
<main>
    <?php
    session_start();

    if (!isset($_SESSION['id'])) {
        header('Location: login.php');
        exit();
    }

    ?>
    <form action="cadastro.php" method="post">
    <label for="">Nome completo: </label>
    <input type="text" name="nome" id="nome" required>
    <br>
    <label for="">Data de Nascimento: </label >
    <input type="date" name="datanasc" id="datanasc" required>
    <br>
    <label for="">CPF: </label>
    <input type="text" name="cpf" id="cpf" required>
    <br>
    <label for="">Sexo: (Feminino/Masculino)</label>
    <input type="text" name="sexo" id="sexo" required>
    <br>
    <label for="">Cidade: </label>
    <input type="text" name="cidade" id="cidade">
    <br>
    <label for="">Bairro: </label>
    <input type="text" name="bairro" id="bairro">
    <br>
    <label for="">Rua: </label>
    <input type="text" name="rua" id="rua">
    <br>
    <label for="">Número da residência: </label>
    <input type="text" name="numero" id="numero">
    <br>
    <label for="">Complemento: </label>
    <input type="text" name="complemento" id="complemento">
    <br>
    <button>Cadastrar</button>
</form>
    <form action="inicial.php" method="get">
    <button>Voltar para a página inicial</button>
    </form>
</main>
</body>
</html>