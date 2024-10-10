<?php
global $selected;
global $tabela;

include_once ('../../conexao.php');

if (!isset($tabela)) {
  die('Variáveis globais $tabela ou $campos não estão definidas.');
}

$query = mysqli_query($conexao, "SELECT Id, Nome FROM Ver$tabela ORDER BY Id");

if (!$query) {
  die('Query Inválida (keys): ' . mysqli_error($conexao));
}

foreach ($query as $row) {
  if ($selected === $row['Nome']) {
    echo "<option selected value='{$row['Id']}'>{$row['Nome']}</option>";
  } else {
    echo "<option value='{$row['Id']}'>{$row['Nome']}</option>";
  }
}