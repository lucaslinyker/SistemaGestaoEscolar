<?php
global $tabelas;
include_once ('../conexao.php');

foreach ($tabelas as $tabela) {
  $query = mysqli_query($conexao, "SELECT * FROM Ver$tabela ORDER BY Id");

  if (!$query) {
    die('Query Inválida: ' . @mysqli_error($conexao));
  }

  if ($row = mysqli_fetch_assoc($query)) {
    echo "<h2 class='mt-4 text-center'>$tabela</h2>";
    echo "<table class='table table-striped table-hover'>";
    echo "<thead><tr>";
    foreach (array_keys($row) as $key) {
      echo "<th>$key</th>";
    }
    echo "<th>Ações</th></tr></thead><tbody>";

    do {
      echo "<tr>";
      foreach ($row as $value) {
        echo "<td>$value</td>";
      }
      echo "<td>";
      echo "<a href='../php/delete.php?tabela=" . $tabela . "&amp;id=" . $row['Id'] . "' onclick=\"return confirm('Tem certeza que deseja excluir?')\" class='btn' title='Excluir'>&#128465;</a>";

      $id = $row['Id'];
      echo "<a href='create/$tabela.php?tabela=" . $tabela . "&Id=" . $id . "' class='btn' title='Alterar'>&#9998;</a>";
      echo "</td></tr>";
    } while ($row = mysqli_fetch_assoc($query));

    echo "</tbody></table>";
  }
}