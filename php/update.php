<?php
$conexao = mysqli_connect('localhost', 'root', '', 'sistema_gestao_escolar')
  or die('Não foi possível conectar');

$atributos = [];
foreach ($_GET as $key => $value) {
  if (is_numeric($value)) {
    $atributos[$key] = $value;
  } else {
    $atributos[$key] = mysqli_real_escape_string($conexao, $value);
  }
}

try {
  $tabela = "`" . str_replace("'", "", $atributos['tabela']) . "`";

  $types = '';
  foreach ($atributos as $key => $value) {
    if ($key !== 'tabela' && $key !== 'id_old') {
      $set_clause[] = "`$key` = ?";
      $params[] = $value;
      $types .= is_numeric($value) ? 'i' : 's';
    }
  }

  $sql = "UPDATE $tabela SET " . implode(', ', $set_clause) . " WHERE id=?";
  $stmt = $conexao->prepare($sql);
  if ($stmt === false) {
    throw new Exception('Erro na preparação da consulta: ' . $conexao->error);
  }

  $params[] = $atributos['id_old'];
  $types .= 'i';

  $stmt->bind_param($types, ...$params);
  $stmt->execute();

  if ($stmt->affected_rows > 0) {
    $resultado = 'Atualizado com sucesso';
  } else {
    $resultado = 'Nenhuma linha foi atualizada';
  }
} catch (\Throwable $th) {
  $resultado = 'Erro ao atualizar: ' . $th->getMessage();
} finally {
  if (isset($stmt)) {
    $stmt->close();
  }
  $conexao->close();
}

header('Location: ../pages/read.php?resultado=' . urlencode($resultado));