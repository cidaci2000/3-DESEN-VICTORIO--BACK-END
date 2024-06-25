<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <link rel="stylesheet" type="text/css" href="carrinho.css">
</head>
<body>

<div class="container">
    <div class="logo"></div>
    <h1>Carrinho de Compras</h1>
    <form action="#" method="post" class="cart-items">
        <div class="item">
            <img src="produto1.jpg" alt="Produto 1">
            <div class="item-details">
                <h2>Nome do Produto 1</h2>
                <p>Preço: R$50.00</p>
                <label for="quantity1">Quantidade:</label>
                <input type="number" id="quantity1" name="quantity1" min="1" value="1">
            </div>
        </div>
        <!-- Outros itens do carrinho -->
    </form>
    <div class="cart-total">
        <h2>Total:</h2>
        <p>R$50.00</p>
    </div>
    <button class="checkout-button">Finalizar Compra</button>
</div>

</body>
</html>
