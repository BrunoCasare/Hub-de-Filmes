<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineDev - Excluir</title>
    <link rel="stylesheet" href="assets/basico_style.css">
</head>
<body>
    
    <main class="container">
        <div class="form-container">
            <h2 class="form-title">Excluir filme</h2>
            <form enctype="multipart/form-data" method="POST" action="excluir.php">

                <div class="form-group">
                <label for="codigo">Codigo: </label>
                <input type="number" name="codigo" required><br><br>
                </div>

                <button type="submit" class="btn-submit">Excluir</button>

                <a href="index.php" class="link-back">Voltar para o início</a>
            </form>
        </div>
    </main>
</body>
</html>