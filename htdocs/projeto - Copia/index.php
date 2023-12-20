<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastro</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <style>
    p {
      float: right;
    }
  </style>
  <body>

  <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Cadastrar Usuario</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="lista.php">Listar Usuarios</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <h1>Cadastrar Usuario Formulario</h1>
    <br><br>
  <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  <div class="col-md-4 position-relative">
    <label for="formGroupExampleInput" class="form-label"><h5>NOME COMPLETO:</h5></label>
  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" name="nome" required>
    <div class="invalid-tooltip">
      Este campo é obrigatorio.
    </div>
  </div>
  <br>
  <div class="col-md-4 position-relative">
    <label for="formGroupExampleInput" class="form-label"><h5>EMAIL:</h5></label>
  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder" name="email" required>
    <div class="invalid-tooltip">
      Este campo é obrigatorio.
    </div>
  </div>
  <br>
  <div class="col-md-4 position-relative">
    <label for="formGroupExampleInput" class="form-label"><h5>ALTURA:</h5></label>
  <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input placeholder"  name="altura"required>
    <div class="invalid-tooltip">
      Este campo é obrigatorio.
    </div>
  </div>
  <br>
</div>
<div class="col-12">
  <button class="btn btn-primary" type="submit" name="enviar">ENVIAR</button>
</div>
</form>
<?php
include ('config.php');
if (isset($_POST['enviar'])) {
$nome = $_POST['nome'];
$email = $_POST['email'];
$altura = $_POST['altura'];
}
$erros = [];
$erros2 = [];
if (!$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS)) {
 $erros[] = "Nome inválido.";
} 
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$altura = filter_input(INPUT_POST, 'altura', FILTER_SANITIZE_NUMBER_FLOAT);
if (!$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
  $erros[] = "Email inválido.";
}
if (empty($email)) {
  $erros2[] = "Digite seu email.";
}
if (!$altura = filter_input(INPUT_POST, 'altura', FILTER_VALIDATE_FLOAT)) {
  $erros[] = "Altura inválida.";
}
if (empty($altura)) {
  $erros2[] = "Digite sua altura.";
}
if (!empty($erros)) {
foreach ($erros as $erro) {
    echo "<li> $erro </li>";
}} else {
    if (!empty($erros2)) {
    foreach ($erros2 as $erro) {
        echo "<li> $erro </li>";
    }} else {
      echo "Dados corretos.";
    }
  }
print "<li> $nome </li>";
echo "<li> $email </li>";
echo"<li> $altura </li>";
$sql = "INSERT INTO cadastro (nome,email,altura) VALUES ('{$nome}','{$email}','{$altura}')";
$conn->query($sql);
$conn->close();
?>    
<script src="js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>