<?php

    require 'config/conexao.php';

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        $codigo = (int)$_POST["codigo"];
        $nome = isset($_POST["nome"]) ? $_POST["nome"] : null;
        $nota = isset($_POST["nota"]) ? (int)$_POST["nota"] : null;
        $genero = isset($_POST["genero"]) ? $_POST["genero"] : null;

        $pathCompleto = null;

        if (isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] === UPLOAD_ERR_OK) {
            $imagem = $_FILES["imagem"];

            $path = pathinfo($imagem["name"], PATHINFO_EXTENSION);
            $novoNomeImagem = uniqid() . "." . $path;
            $pastaDestino = "uploads/";
            $pathCompleto = $pastaDestino . $novoNomeImagem;

            if (!move_uploaded_file($imagem['tmp_name'], $pathCompleto)) {
                die("Erro ao mover o arquivo de imagem para o servidor.");
            }
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

        if(!empty($pathCompleto))
        {
            $campos[] = "IMAGEM = ?";
            $valores[] = $pathCompleto;
            $tipos .= "s";
        }

        if(empty($campos))
            die("Nenhum campo foi atualizado!");

        $sql = "UPDATE filmes SET " . implode(", ",$campos) . " WHERE CODIGO = ?";
        $valores[] = $codigo;
        $tipos .= "i";
        $stm = $conexao->prepare($sql);
        $stm->bind_param($tipos, ...$valores);

        if($stm->execute()) {
            header("location: index.php");
            exit;
        } else {
            echo "Erro ao atualizar filme: " . "$stm->error";
        }

        $stm->close();
        $conexao->close();
    }
?>