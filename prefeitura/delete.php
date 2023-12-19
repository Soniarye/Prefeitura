<?php

    if(!empty($_GET['id']))
    {
        include('conexao.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT *  FROM protocolos WHERE id=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM protocolos WHERE id=$id";
            $resultDelete = $conexao->query($sqlDelete);
        }
    }
    header('Location: listaproto.php');
    
?>