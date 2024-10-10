<?php
  $host = "localhost";
  $user = "root";
  $pass = "";
  $banco = "sistema_gestao_escolar";
  $conexao = @mysqli_connect($host, $user, $pass, $banco)
    or die ("Problemas com a conexao do Banco de Dados");
?>