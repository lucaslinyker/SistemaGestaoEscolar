<?php
$conexao = mysqli_connect('localhost', 'root', '', 'sistema_gestao_escolar')
  or die('Não foi possível conectar');

if (!isset($_GET['tabela']) || !isset($_GET['id'])) {
  die('ID ou TABELA não fornecido!');
}

$tabela = mysqli_real_escape_string($conexao, $_GET['tabela']);
$id = (int)$_GET['id'];

try {
  $sql = "DELETE FROM $tabela WHERE id=?";
  $stmt = $conexao->prepare($sql);
  $stmt->bind_param("i", $id);
  $stmt->execute();

  if ($stmt->affected_rows > 0) {
    $resultado = 'Campo deletado com sucesso';
  } else {
    $resultado = 'Erro ao deletar campo: Nenhuma linha afetada';
  }
} catch (\Throwable $th) {
  $resultado = 'Erro ao deletar campo: ' . $th->getMessage();
} finally {
  if (isset($stmt)) {
    $stmt->close();
  }
}

$conexao->close();
header('Location: ../pages/read.php?resultado=' . urlencode($resultado));