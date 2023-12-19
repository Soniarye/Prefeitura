<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página inicial</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
    <header><h1>Prefeitura de Paradis</h1></header>
<body>
    <main>
    
<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['nome'])) {
    echo "<p style='color: brown; font-size: 18px; font-weight: bold;'> Bem-vindo, " . $_SESSION['nome'] . "!";
} else {
    header('Location: login.php');
    exit();
}
?>
        <form action="cadastro1.php" method="post">
	    <input type="submit" value="Cadastrar contribuinte">
	    </form>
        <br>
        <form action="cadprot.php" method="post">
	    <input type="submit" value="Criar novo protocolo">
	    </form>
        <br>
        <form action="listaproto.php" method="post">
	    <input type="submit" value="Gerenciar protocolos">
        </form>
        <br>
        <form action="contribuintes.php" method="post">
	    <input type="submit" value="Gerenciar contribuintes">
	    </form>
        <br>
        <a href='logout.php'>Sair</a>
    </main>
</body>
</html>