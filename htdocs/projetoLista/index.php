<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>

  <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Cadastro</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="lista.php">Lista</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Procurar</button>
      </form>
    </div>
  </div>
  </nav>

  <div class="mb-3">
    <label for="formGroupExampleInput" class="form-label">Nome</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" name="nome">
  </div>
  <div class="mb-3">
    <label for="formGroupExampleInput2" class="form-label">Data</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Another input placeholder" name="data">
  </div>
  <div class="mb-3">
    <label for="formGroupExampleInput" class="form-label">Dia da Semana</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" name="DS">
  </div>
  <div class="col-12">
  <button class="btn btn-primary" type="submit" name="enviar">ENVIAR</button>
</div>
</form>
  <?php 
    include('config.php');
    if (isset($_POST['enviar'])) {
    $data = $_POST['data'];
    $nome = $_POST['nome'];
    $DS = $_POST['DS'];
    } else {

        echo "botão nao funciona";

    }

      echo "$data";

    $sql = "INSERT INTO datas_comemorativas (nome, data , dia_da_semana)
    VALUES ('{$nome}', '{$data}', '{$DS}')";
    
    $res = $conn->query($sql);
if ($res==true) {
  echo "<script>alert('Cadastrado com sucesso.')</script>";

}else {
echo "<script>alert('Falha no cadastro'.)</script>";
}

    

  ?>

    <script src="js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>