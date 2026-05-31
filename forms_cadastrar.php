<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineDev - Cadastro</title>
</head>
<body>
    <h2>Cadastrar filme</h2>
    <form enctype="multipart/form-data" method="POST" action="cadastrar.php">
        <label for="nome">Nome: </label>
        <input type="text" name="nome" required><br><br>
        <label for="nota">Nota: </label>
        <input type="number" name="nota" required><br><br>
        <label for="genero">Gênero: </label>
        <input type="text" name="genero" required><br><br>
        <label for="imagem">Capa do filme: </label>
        <input type="file" name="imagem" accept="image/*" required><br><br>
        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>