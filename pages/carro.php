
<?php
include_once('config.php');

if ($conexao->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") 
 {
    // Receber os dados do formulário
    $modelo = $_POST['modelo'];
    $marca = $_POST['marca'];
    $ano = $_POST['ano'];
    $cor = $_POST['cor'];
    $placa = $_POST['placa'];
    $km = $_POST['km'];
    $combustivel = $_POST['combustivel'];

    // Upload da imagem
    $target_dir = "imagem/"; // Diretório para salvar as imagens
    $target_file = $target_dir . basename($_FILES["imagem"]["name"]);
    $uploadOk = 1;
    // ... (verificações de segurança: tipo de arquivo, tamanho, etc.)

    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) {
            // Inserir os dados no banco de dados
            $sql = "INSERT INTO carros (modelo, marca, ano, cor, placa, km, combustivel, imagem) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("ssiissss", $modelo, $marca, $ano, $cor, $placa, $km, $combustivel, $target_file);
            if ($stmt->execute()) {
                echo "Carro cadastrado com sucesso!";
            } else {
                echo "Erro ao cadastrar o carro: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Erro ao enviar a imagem.";
        }
    } else {
        echo "Houve um erro no upload da imagem.";
    }
}

$conexao->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Carros</title>
    <link rel="stylesheet" href="carro.css">
</head>
<body>
    <h2>Cadastro de Carro</h2>
    <form action="carro.php" method="post" enctype="multipart/form-data">
        <label for="modelo">Modelo:</label>
        <input type="text" id="modelo" name="modelo" required><br>

        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" required><br>

        <label for="ano">Ano:</label> 

        <input type="number" id="ano" name="ano" required><br>

        <label for="cor">Cor:</label>
        <input type="text" id="cor" name="cor" required><br>

        <label for="placa">Placa:</label>
        <input type="text" id="placa" name="placa" required><br> 


        <label for="km">Quilometragem:</label>
        <input type="number" id="km" name="km" required><br>

        <label for="combustivel">Combustível:</label>
        <select name="combustivel" id="combustivel">
            <option value="gasolina">Gasolina</option>
            <option value="diesel">Diesel</option> 

            <option value="flex">Flex</option>
            <option value="eletrico">Elétrico</option>
        </select><br>

        <label for="imagem">Imagem do Carro:</label>
        <input type="file" name="imagem" id="imagem" required><br>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>