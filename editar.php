<?php

    require 'config/conexao.php';

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $codigo = (int)$_POST["codigo"];
        $nome = isset($_POST["nome"]) ? $_POST["nome"] : null;
        $nota = isset($_POST["nota"]) ? (int)$_POST["nota"] : null;
        $genero = isset($_POST["genero"]) ? $_POST["genero"] : null;

        $imagem = $_FILES["image"];
        $path = pathinfo($imagem["name"], PATHINFO_EXTENSION);
        $novoNomeImagem = uniqid() . "." . $path;
        $pastaDestino = "uploads/";
        $pathCompleto = $pastaDestino . $novoNomeImagem;

        if (move_uploaded_file($imagem['tmp_name'], $pathCompleto)) {
            $sql = "INSERT INTO filmes (NOME, GENERO, NOTA, IMAGEM) VALUES ('$nome', '$genero', '$nota', '$pathCompleto')";

            if (mysqli_query($conexao, $sql)) {
                header("location: index.php?sucesso=1");
            } else {
                echo "Erro ao salvar imagem no banco: " . mysqli_error($conexao);
            }
        } else {
            echo "Erro ao fazer o upload da imagem.";
        }

        $campos = [];
        $valores = [];
        $tipos = "";

        if(!empty($nome))
        {
            $campos[] = "NOME = ?";
            $valores[] = $nome;
            $tipos .= "s";
        }

        if(!empty($nota))
        {
            $campos[] = "NOTA = ?";
            $valores[] = $nota;
            $tipos .= "i";
        }

        if(!empty($genero))
        {
            $campos[] = "GENERO = ?";
            $valores[] = $genero;
            $tipos .= "s";
        }

        if(empty($campos))
            die("Nenhum campo foi atualizado!");

        $sql = "UPDATE filmes SET " . implode(", ",$campos) . " WHERE CODIGO = ?";
        $valores[] = $codigo;
        $tipos .= "i";
        $stm = $conexao->prepare($sql);
        $stm->bind_param($tipos, ...$valores);

        if($stm->execute())
            echo "filme n°$codigo atualizado com sucesso";
        else
            echo "Erro ao atualizar filme $stm->error";

        $stm->close();

        $conexao->close();
    }

    echo "<br><br>";
    header("location: index.php");


