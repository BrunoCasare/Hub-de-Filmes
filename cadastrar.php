<?php

    require 'config/conexão.php';

    $nome = $_POST["nome"];
    $nota = (int)$_POST["nota"];
    $genero = $_POST["genero"];

    $imagem = $_FILES["image"];
    $path = pathinfo($imagem["name"], PATHINFO_EXTENSION);
    $novoNomeImagem = uniqid() . "." . $path;
    $pastaDestino = "uploads/";
    $pathCompleto = $pastaDestino . $novoNomeImagem;

    if (move_uploaded_file($imagem['tmp_name'], $pathCompleto)) {
        $sql = "INSERT INTO filmes (NOME, GENERO, NOTA, IMAGEM) VALUES ('$nome', '$genero', '$nota', '$pathCompleto')";

        if (mysqli_query($conexão, $sql)) {
            header("location: index.php?sucesso=1");
        } else {
            echo "Erro ao salvar imagem no banco: " . mysqli_error($conexão);
        }
    } else {
        echo "Erro ao fazer o upload da imagem.";
    }

    $sql = 'INSERT INTO filmes(nome, nota, genero) VALUES(?, ?, ?)';

    $stm = $conexao->prepare($sql);

    $stm->bind_param("sis", $nome, $nota, $genero);

    if($stm->execute())
        echo "Filme cadastrado com sucesso!";
    else
        echo "Erro ao cadastrar filme.";
  
    $stm->close();

    $conexao->close();

    echo "<br><br>";
    header("location: index.php");

?>