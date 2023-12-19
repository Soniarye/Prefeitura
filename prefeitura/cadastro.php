<?php
    session_start();
    
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "prefeitura";

    $conexao=mysqli_connect($servidor, $usuario, $senha, $dbname);
    if(!$conexao){
        die("Houve um erro:".mysqli_connect_error());
    }


    $nome = $_POST['nome'];
    $datanasc = $_POST['datanasc'];
    $cpf = $_POST['cpf'];
    $sexo = $_POST['sexo'];
    $cidade = $_POST['cidade'];
    $bairro = $_POST['bairro'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];

    $query= mysqli_query($conexao, "INSERT INTO `usuários` (`nome`, `datanasc`, `cpf`,
    `sexo`, `cidade`, `bairro`, `rua`, `numero`, `complemento`) VALUES ('$nome', '$datanasc', '$cpf', '$sexo', '$cidade', 
    '$bairro', '$rua', '$numero', '$complemento')");

    if($query){
        echo "Usuário cadastrado com sucesso";
    }
    else{
        echo "Erro" . mysqli_connect_error($conexao);
    }
    mysqli_close($conexao);
?>