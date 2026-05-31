<?php

    require_once 'config/conexao.php';

    $sql = "SELECT * FROM filmes;";
    $resultado = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineDev - Catálogo de Filmes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header class="header">
        <a href="listar.php" class="logo">Cine<span>Dev</span></a>
        <nav class="navbar">
            <a href="#" class="active">Início</a>
            <a href="forms_cadastrar.php">Adicionar</a>
            <a href="forms_editar.php">Editar</a>
            <a href="forms_excluir.php">Excluir</a>
        </nav>
    </header>
    <main class="container">
        <h1 class="main-title">Filmes em Destaque</h1>

        <section class="movies-grid">
            <?php if($resultado && mysqli_num_rows($resultado) > 0) : 
                
                while($filme = mysqli_fetch_assoc($resultado)) :
            ?>

                <div class="movie-card">
                    <div class="movie-poster">
                        <img src="<?= !empty($filme['IMAGEM']) ? $filme['IMAGEM'] : 'assets/cinema_icon.png' ?>" alt="Capa do Filme">
                        <span class="rating"><?= $filme['NOTA'] ?></span>
                    </div>
                    <div class="movie-info">
                        <h3 class="movie-name"><?= $filme['NOME'] ?></h3>
                        <span class="movie-genre"><?= $filme['GENERO'] ?></span><br>
                        <span>Codigo: <?= $filme['CODIGO'] ?></span>
                    </div>
                </div>
            <?php
                endwhile;
            else: 
            ?>
                <p>Nenhum filme cadastrado</php>
            <?php endif; ?>

        </section>
    </main>
</body>
</html>