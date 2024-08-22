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
            <h1 class="cab_tit">INDIVIDEO GAMER        </h1>
            <P class="cab_slogan">bem vindo
            </P>
            </div>
        </header>
        
        <table id="tab2">
            
            <td id="demoimg">
                <img src="img/monitor.jpeg" id="demo">
                <Div id="name">
                    <br>
                    <font size="5px">Monitor</font>
                </Div>
                <Div id="opcoes">
                    <div id="itens">
                Resolução <select>
                    <option>
                        HD(720) R$249,99
                    </option>
                    <option>
                        1080 R$499,99
                    </option>
                    <option>
                        2K R$749,99
                    </option>
                    <option>
                        4k R$1999,99
                    </option>
                    <option>
                        1p R$9999,99
                    </option>
                </select></div><br>
                </Div>
             </td>
             
        
        </table>
        <br> 
    </header>
    <div id="div3">
        |Luis Gabriel C. Ph.|n°14|<br>|Arthur Bertolini|n°4|<br>|Adrian Phellipe S Rhoden|n°2|<br>|3° dev. sist.|colegio prof. victorio|<font color="gray"> por favor me ajuda</font>
    </div>
</body>
</html>