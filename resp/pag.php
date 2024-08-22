<?php

if(isset($_POST['submit']))
{
    // print_r('Nome: ' . $_POST['nome']);
    // print_r('<br>');
    // print_r('Email: ' . $_POST['email']);
    // print_r('<br>');
    // print_r('Telefone: ' . $_POST['telefone']);
    // print_r('<br>');
    // print_r('Sexo: ' . $_POST['genero']);
    // print_r('<br>');
    // print_r('Data de nascimento: ' . $_POST['data_nascimento']);
    // print_r('<br>');
    // print_r('Endereço: ' . $_POST['endereco']);

    include_once('config.php');

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];
    $sexo = $_POST['genero'];
    $data_nasc = $_POST['data_nascimento'];
    $endereco = $_POST['endereco'];

    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,senha,email,telefone,sexo,data_nasc,endereco) 
    VALUES ('$nome','$senha','$email','$telefone','$sexo','$data_nasc','$endereco')");

    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="cabecalho">
        <div class="fiotao">
            <a href="form3.php"><button>voltar</button></a>
            <br>
            <img src="img/individuo.png" alt="" class="cab_img">
            <h1 class="cab_tit">individeo gamer
            </h1>
            <P class="cab_slogan">bem vindo
            </P>
            </div>
        </header>
        <div id="div2f"><br>
            <fieldset id="borda">
            <legend id="title">agora que já escolheu seus produtos<br><b>vamos pagar</b></legend>
        <label>como vai pagar?</label><br>
        <select>
            <option>
                credito
            </option>
            <option>
                debito
            </option>
            <option>
                pix
            </option>
            <option>
                a vista
            </option>
            <option>
                esmeraldas
            </option>   
        </select><br>
        <label>coloque o número do cartão</label><br>
        <input type="text" placeholder="numero do cartão"><br>        
<label>coloque a senha do cartão</label><br>
<input type="text" placeholder="senha"><br>
<label>coloque o cpf</label> e <label>coloque o cvc</label><br>
<input type="text" placeholder="cpf"> 
<input type="text" placeholder="cvc"><br>
<label>coloque a validade</label><br>
<input type="datetime" placeholder="dd/mm"><br>
<label>pagamento feito?<br> então vamos retirar sua nota</label><br>
<a href="nota.php"><button>retirar</button></a><br>

</fieldset> 
   <br> 
</div>
<div id="div3">
    |Luis Gabriel C. Ph.|n°14|<br>|Arthur Bertolini|n°4|<br>|Adrian Phellipe S Rhoden|n°2|<br>|3° dev. sist.|colegio prof. victorio|<font color="gray"> por favor me ajuda</font>
</div>
</body>
</html>