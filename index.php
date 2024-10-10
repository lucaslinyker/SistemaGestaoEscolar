<!DOCTYPE html>
<html lang="pt-br" class="h-100">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NSA v2.0 Turbo Aspirado</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    main {
      /* 58 = header -- 24 - footer */
      height: calc(100% - (58px + 24px));
    }
  </style>
</head>
<body class="h-100">
  <header>
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
      <div class="container">
        <a class="navbar-brand" href="index.php">NSA v2.0 Turbo Aspirado</a>
        <ul class="navbar-nav">
          <li class="nav-item"><a href="index.php" class="nav-link link-body-emphasis">Início</a></li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Cadastrar
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="pages/create/alunos.php">Aluno</a></li>
              <li><a class="dropdown-item" href="pages/create/classes.php">Classe</a></li>
              <li><a class="dropdown-item" href="pages/create/cursos.php">Curso</a></li>
              <li><a class="dropdown-item" href="pages/create/horarios.php">Horário</a></li>
              <li><a class="dropdown-item" href="pages/create/professores.php">Professor</a></li>
              <!-- <li><hr class="dropdown-divider"></li> -->
            </ul>
          </li>
          <li class="nav-item"><a href="pages/read.php" class="nav-link">Listar</a></li>
          <!-- <li class="nav-item"><a href="pages/edit.php" class="nav-link">Editar</a></li> -->
        </ul>
      </div>
    </nav>
  </header>

  <main class="d-flex flex-column justify-content-center align-items-center container text-center">
    <h2>Seja bem-vindo ao sistema de gestão escolar</h2>
    <p>Escolha uma das opções no menu acima para começar.</p>
  </main>

  <?php require_once 'pages/partials/footer.php'; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>