<?php

    require 'config/conexao.php';

    $nome = $_POST["nome"];
    $nota = (int)$_POST["nota"];
    $genero = $_POST["genero"];

    $imagem = $_FILES["imagem"];
    $path = pathinfo($imagem["name"], PATHINFO_EXTENSION);
    $novoNomeImagem = uniqid() . "." . $path;
    $pastaDestino = "uploads/";
    $pathCompleto = $pastaDestino . $novoNomeImagem;

    if (move_uploaded_file($imagem['tmp_name'], $pathCompleto)) {
        $sql = "INSERT INTO filmes (NOME, GENERO, NOTA, IMAGEM) VALUES (?, ?, ?, ?)";
        $stm = $conexao->prepare($sql);
        $stm->bind_param("ssis", $nome, $genero, $nota, $pathCompleto);

        if ($stm->execute()) {
            $stm->close();
            $conexao->close();

            header("location: index.php?sucesso=1");
            exit;
        } else {
            echo "Erro ao cadastrar filme no banco de dados: " . $stm->error;
        }

        $stm->close();
    } else {
        echo "Erro ao fazer o upload da imagem.";
    }

    $conexao->close();
?>