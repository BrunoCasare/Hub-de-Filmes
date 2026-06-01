<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineDev - Cadastro</title>
    <link rel="stylesheet" href="assets/basico_style.css">
    <style
    gap: 10px;
    margin: 20px;>
    </style>
</head>
<body>

    <main class="container">
        <div class="form-container">
            <h2 class="form-title">Cadastrar filme</h2>
            <form enctype="multipart/form-data" method="POST" action="cadastrar.php">

                <div class="form-group">
                <label for="nome">Nome: </label>
                <input type="text" name="nome" required><br><br>
                </div>

                <div class="form-group">
                <label for="nota">Nota: </label>
                <input type="number" name="nota" required><br><br>
                </div>

                <div class="form-group">
                <label for="genero">Gênero: </label>
                <input type="text" name="genero" required><br><br>
                </div>

                <div class="form-group">
                <label for="imagem">Capa do filme: </label>
                <input type="file" name="imagem" accept="image/*" required><br><br>
                </div>

                <button type="submit" class="btn-submit">Cadastrar</button><br><br>

                <a href="index.php" class="link-back">Voltar para o início</a>
            </form>
        </div>
    </main>
</body>
</html>