<?php
  include_once '../../conexao.php';

  if (isset($_GET['Id'])) {
    try {
      $sql = "SELECT * FROM Ver" . $_GET['tabela'] . " WHERE Id=" . $_GET['Id'];
      $query = mysqli_query($conexao, $sql);
      $atributos = mysqli_fetch_assoc($query);
    } catch (\Throwable $th) {
      die('Query Inválida: ' . $th->getMessage());
    }
  } else {
    $atributos = [
      'Id' => '',
      'Nome' => '',
      'Professor' => '',
      'Curso' => '',
    ];
  }
?>

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
  <?php require_once '../partials/headerCad.php'; ?>

  <main>
    <div class="container">
      <h2 class="mt-4 text-center">Cadastrar Classe</h2>
      <form action="../edit-create.php?id_old=<?php echo $atributos['Id']; ?>" method="post" autocomplete="off">
        <?php if ($atributos['Id']) : ?>
          <div class="mb-3">
            <label for="id" class="form-label">Id:</label>
            <input type="number" class="form-control" name="id" id="id" value="<?php echo $atributos['Id']; ?>" required>
          </div>
        <?php endif; ?>

        <div class="mb-3">
          <label for="nome" class="form-label">Nome:</label>
          <input type="text" class="form-control" maxlength="100" name="nome" id="nome" value="<?php echo $atributos['Nome']; ?>" autoFocus required>
        </div>

        <div class="mb-3">
          <label for="professor" class="form-label">Professor:</label>
          <select name="professor_id" id="professor" class="form-select" required>
            <?php
              if (!isset($_GET['Id'])) {
                echo "<option>Escolha um professor</option>";
              }
              $selected = $atributos['Professor'];
              $tabela = "Professores";
              require ('../../php/services/fieldsOfFK.php');
            ?>
          </select>
        </div>

        <div class="mb-3">
          <label for="curso" class="form-label">Curso:</label>
          <select name="curso_id" id="curso" class="form-select" required>
            <?php
              if (!isset($_GET['Id'])) {
                echo "<option>Escolha um curso</option>";
              }
              $selected = $atributos['Curso'];
              $tabela = "Cursos";
              require ('../../php/services/fieldsOfFK.php');
            ?>
          </select>
        </div>

        <input type="submit" class="btn btn-primary" value="Enviar" />
        <input type="reset" class="btn btn-danger ms-3" value="Limpar" />
      </form>
    </div>
  </main>

  <?php require_once '../partials/footer.php'; ?>
  <?php require_once "../../php/services/resultBD.php"; ?>
  <!--  NOTE:  Exibe mensagem de sucesso ou erro -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>