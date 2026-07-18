<?php
  
  require 'config/conexao.php';

  $codigo = (int)$_POST["codigo"];

  $sql = "DELETE FROM filmes WHERE CODIGO = ?;";

  $stm = $conexao->prepare($sql);

  $stm->bind_param("i", $codigo);

  if($stm->execute())
    echo "Filme removido com sucesso!";
  else
    echo "Erro ao remover filme.";
  
  $stm->close();
  $conexao->close();

  echo "<br><br>";
  header("location: index.php");