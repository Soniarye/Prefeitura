
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prefeitura de Paradis</title>
</head>
<br>
    <header><h1>Prefeitura de Paradis</h1></header>
    <link rel="stylesheet" type="text/css" href="style.css">

<body>
    <main>
<?php
session_start();
include("conexao.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (!empty($email) && !empty($senha) && !is_numeric($email)) {

        $query = "SELECT * FROM adm WHERE email = '$email' LIMIT 1";
        $result = mysqli_query($conexao, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);

            if ($user_data['senha'] === $senha) {
                $_SESSION['id'] = $user_data['id'];
                $_SESSION['nome'] = $user_data['nome']; 
                header("Location: inicial.php");
                die;
            } else {
                echo "Senha incorreta!";
            }
        } else {
            echo "Usuário não encontrado!";
        }
    } else {
        echo "Email ou senha incorretos!";
    }
}
?>
    <form action="" method="post">
        <label for="">Email: </label>
        <input type="email" name="email" id="email">
        <br>
        <label for="">Senha: </label>
        <input type="password" name="senha" id="senha">

        <input type="submit" value="Entrar">
    </form>
</main>

</body>
</html>