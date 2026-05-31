<?php

    require_once 'config/conexão.php';

    $sql = "SELECT * FROM filmes;";
    $resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar filmes</title>
</head>
<body>
    <h3>Lista de filmes cadastradas</h3>
    <?php if($resultado->num_rows > 0) : ?>
    <table border="1" cellpading="5" cellspacing="0">
        <tr>
            <td>Código</td>
            <td>Nome</td>
            <td>Nota</td>
            <td>Genero</td>
            <td>Imagem</td>
        </tr>
        <?php while($linha = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?php echo $linha['CODIGO']; ?></td>
            <td><?php echo $linha['NOME']; ?></td>
            <td><?php echo $linha['NOTA']; ?></td>
            <td><?php echo $linha['GENERO']; ?></td>
            <td><?php echo $linha['IMAGEM']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <?php else: ?>
        <p>Nenhum filme cadastrado</php>
    <?php endif; ?>
</body>
<?php $conexao->close(); ?>
</html>