<?php


if(isset($_POST['submit']))
{
    // print_r('Nome: ' . $_POST['nome']);
    // print_r('<br>');
    // print_r('Telefone: ' . $_POST['telefone']);
    // print_r('<br>');
    // print_r('cep: ' . $_POST['cep']);
    // print_r('<br>');
    // print_r('cpf: ' . $_POST['cpf']);
    // print_r('<br>');
    // print_r('Data de nascimento: ' . $_POST['data_nascimento']);
    // print_r('<br>');
    // print_r('Email: ' . $_POST['email']);
    // print_r('<br>');
    // print_r('Sexo: ' . $_POST['genero']);
    // print_r('<br>');
    // print_r('Endereço: ' . $_POST['endereco']);

    include_once('config.php');

    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $cpf = $_POST['cpf'];
    $data_nasc = $_POST['data_nascimento'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $sexo = $_POST['genero'];
    $endereco = $_POST['endereco'];

    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,senha,email,telefone,sexo,data_nasc,endereco) 
    VALUES ('$nome','$telefone','$cep ','$cpf ','$data_nasc','$email ','$senha','$sexo','$endereco')");

    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="cabecalho">
    <div class="fiotao">
        <img src="img/individuo.png" alt="" class="cab_img">
        <h1 class="cab_tit">INDIVIDEO GAMER </h1>
        <P class="cab_slogan">bem vindo
        </P>
        </div>
    </header>
    <table id="tab">
        <tr id="tr">
            <td>
            <div id="div2">
                <a href=form.php>
                    <div id="div2a" >
                    <P><br>novo por aqui?<br>clique aqui para cadastrar<br></P>
                </div> </a>
            
                <a href=form2.php>
                    <div id="div2b" >
                    <p><br>já possui conta né?<br>clique aqui para logar<br></p>
                </div></a>
            
                <a href=form3.php>
                    <div id="div2c" >
                        <p><br>quer entrar como anonimo?<br>clique aqui para apenas entrar<br></p>
                    </div>
                </a>
            </div>
            <div id="div2">
                <a href=ofertas.php>
                    <div id="div2a" >
                    <P><br>veja as ofertas?<br>obtenha produtos que estão em oferta<br></P>
                </div> </a>
        </td>
        <td>
            <div id="divcapi">
                <img src="img/caipivara.png" id="capi">
            </div>
        </td>
            
    </table>  
    <div id="div3">
        |Luis Gabriel C. Ph.|n°14|<br>|Arthur Bertolini|n°4|<br>|Adrian Phellipe S Rhoden|n°2|<br>|3° dev. sist.|colegio prof. victorio|<font color="gray"> por favor me ajuda</font>
        </div>

</body>
</html>