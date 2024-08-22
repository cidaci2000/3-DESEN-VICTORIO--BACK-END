<?php
include_once('config.php');

// Verifica se houve um envio de formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Recebe os dados do formulário
  $email = $_POST["email"];
  $senha = $_POST["senha"];

  // Validação básica (adicione mais validações conforme necessário)
  if (empty($email) || empty($senha)) {
    echo "Por favor, preencha todos os campos.";
  } else {
    // Consulta ao banco de dados (ajuste a consulta para sua estrutura)
    $sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
      // Login válido, redireciona para a página adm.php
      header("Location: adm.php");
    } else {
      echo "Email ou senha inválidos.";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="style.css">
<body>
    <header class="cabecalho">
        <div class="fiotao">
            <a href="index.html">voltar</a>
            <img src="img/individuo.png" alt="" class="cab_img">
            <h1 class="cab_tit">individeo gamer
            </h1>
            <P class="cab_slogan">bem vindo
            </P>
            </div>
        </header>
    <div id="div2f"><br>
    <fieldset id="borda"><br>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Email: <input type="email" name="email" required>
    Senha: <input type="password" name="senha" required>
    <br>
    <button type="submit">Entrar</button>
    </form>
    <div id="div3">
        |Luis Gabriel C. Ph.|n°14|<br>|Arthur Bertolini|n°4|<br>|Adrian Phellipe S Rhoden|n°2|<br>|3° dev. sist.|colegio prof. victorio|<font color="gray"> por favor me ajuda</font>
        </div>
</body>
</html>