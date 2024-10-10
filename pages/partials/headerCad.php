<?php
echo '
<header>
  <nav class="navbar navbar-expand-sm bg-primary navbar-dark sticky-top">
    <div class="container">
      <a class="navbar-brand" href="../../index.php">NSA v2.0 Turbo Aspirado</a>
      <ul class="navbar-nav">
        <li class="nav-item"><a href="../../index.php" class="nav-link">Início</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link link-body-emphasis dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cadastrar
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../create/alunos.php">Aluno</a></li>
            <li><a class="dropdown-item" href="../create/classes.php">Classe</a></li>
            <li><a class="dropdown-item" href="../create/cursos.php">Curso</a></li>
            <li><a class="dropdown-item" href="../create/horarios.php">Horário</a></li>
            <li><a class="dropdown-item" href="../create/professores.php">Professor</a></li>
          </ul>
        </li>
        <li class="nav-item"><a href="../read.php" class="nav-link">Listar</a></li>
      </ul>
    </div>
  </nav>
</header>';