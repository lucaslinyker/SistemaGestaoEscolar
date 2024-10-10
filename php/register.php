<?php
$conexao = mysqli_connect('localhost', 'root', '', 'sistema_gestao_escolar')
  or die('Não foi possível conectar');

if (!isset($_GET['tabela'])) {
  die('Nenhuma tabela foi informada');
}

$columns = [];
$values = [];

foreach ($_GET as $key => $value) {
  if ($key !== 'tabela') {
    $columns[] = $key;
    if (is_numeric($value)) {
      $values[] = $value;
    } else {
      $values[] = "'" . mysqli_real_escape_string($conexao, $value) . "'";
    }
  }
}

$columns_str = implode(", ", $columns);
$values_str = implode(", ", $values);

if (empty($columns) || empty($values)) {
  die('Nenhum dado foi enviado');
}

$tabela = $_GET['tabela'];
$sql = "INSERT INTO $tabela ($columns_str) VALUES ($values_str)";

try {
  mysqli_query($conexao, $sql);
  $resultado = 'Registro inserido com sucesso';
} catch (\Throwable $th) {
  $resultado = 'Erro ao inserir registro: ' . $th->getMessage();
}

$conexao->close();
header('Location: ../pages/create/' . $tabela . '.php?resultado=' . urlencode($resultado));