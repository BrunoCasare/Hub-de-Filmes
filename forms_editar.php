<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineDev - Editar</title>
    <link rel="stylesheet" href="assets/basico_style.css">
</head>
<body>

    <main class="container">
        <div class="form-container">
            <h2 class="form-title">Editar filme</h2>
            <form enctype="multipart/form-data" method="POST" action="editar.php">
                <div class="form-group">
                <label for="codigo">Codigo: </label>
                <input type="number" name="codigo" required><br><br>
                </div>

                <div class="form-group">
                <label for="nome">Nome: </label>
                <input type="text" name="nome" required><br><br>
                </div>

                <div class="form-group">
                <label for="nota">Nota: </label>
                <input type="number" name="nota" step="0.1" min="0" max="10" required><br><br>
                </div>

                <div class="form-group">
                <label for="genero">Gênero: </label>
                <input type="text" name="genero" required><br><br>
                </div>

                <div class="form-group">
                <label for="imagem">Capa do filme: </label>
                <input type="file" name="imagem" accept="image/*" required><br><br>
                </div>

                <button type="submit" class="btn-submit">Editar</button>

                <a href="index.php" class="link-back">Voltar para o início</a>
            </form>
        </div>
    </main>
</body>
</html>