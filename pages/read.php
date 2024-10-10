<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NSA v2.0 Turbo Aspirado</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark sticky-top">
      <div class="container">
        <a class="navbar-brand" href="../index.php">NSA v2.0 Turbo Aspirado</a>
        <ul class="navbar-nav">
          <li class="nav-item"><a href="../index.php" class="nav-link">Início</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Cadastrar
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="create/alunos.php">Aluno</a></li>
              <li><a class="dropdown-item" href="create/classes.php">Classe</a></li>
              <li><a class="dropdown-item" href="create/cursos.php">Curso</a></li>
              <li><a class="dropdown-item" href="create/horarios.php">Horário</a></li>
              <li><a class="dropdown-item" href="create/professores.php">Professor</a></li>
            </ul>
          </li>
          <li class="nav-item"><a href="read.php" class="nav-link link-body-emphasis">Listar</a></li>
        </ul>
      </div>
    </nav>
  </header>

  <main class="container">
    <?php
      $tabelas = ['Cursos', 'Professores', 'Classes', 'Alunos', 'Horarios'];
      require_once ('../php/list.php');
    ?>
  </main>

  <footer class='container'>
    <p class='text-center text-body-secondary mb-0'>
      Desenvolvido por &copy; <span class='text-black'>Linyker</span> e <span class='text-black'>Alberganti</span>
    </p>
  </footer>

  <?php /* require_once 'partials/footer.php'; */ ?>
  <?php require_once "../php/services/resultBD.php"; ?>
  <!--  NOTE:  Exibe mensagem de sucesso ou erro -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>