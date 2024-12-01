const product = [
    {
        id: 0,
        image: 'ficha.webp',
        title: 'Comprar 20 Fichas',
        price: 50,
    },
    {
        id: 1,
        image: 'ficha.webp',
        title: 'Comprar 50 Fichas',
        price: 100,
    },
    {
        id: 2,
        image: 'ficha.webp',
        title: 'Comprar 100 Fichas',
        price: 200,
    },
    {
        id: 1,
        image: 'mesadesinucajpg',
        title: 'Mesa de Sinuca Standard',
        title: 'por hora',
        price: 30,
    },
    {
        id: 1,
        image: 'mesadesinucajpg',
        title: 'Mesa de Sinuca Premium',
        title: 'por hora',
        price: 50,
    },
    {
        id: 1,
        image: 'mesadesinucajpg',
        title: 'Mesa de Sinuca VIP',
        title: 'por hora',
        price: 100,
    }
   
   
];

const categories = [...new Set(product.map((item)=>
    {return item}))]
    let i=0;
document.getElementById('root').innerHTML = categories.map((item)=>
{
    var {image, title, price} = item;
    return(
        `<div class='box'>
        <div class='img-box'>
            <img class='images' src=${image}></img>
        </div>
    <div class='bottom'>
    <p>${title}</p>
    <h2>R$ ${price}.00</h2>`+
    "<button onclick='addtocart("+(i++)+")'>COMPRAR</button>"+
    `</div>
    </div>`
    )
}).join('')

var cart =[];

function addtocart(a){
    cart.push({...categories[a]});
    displaycart();
}
function delElement(a){
    cart.splice(a, 1);
    displaycart();
}

function displaycart(){
    let j = 0, total=0;
    document.getElementById("count").innerHTML=cart.length;
    if(cart.length==0){
        document.getElementById('cartItem').innerHTML = "Seu carrinho está vazio";
        document.getElementById("total").innerHTML = "R$ "+0+".00";
    }
    else{
        document.getElementById("cartItem").innerHTML = cart.map((items)=>
        {
            var {image, title, price} = items;
            total=total+price;
            document.getElementById("total").innerHTML = "R$ "+total+".00";
            return(
                `<div class='cart-item'>
                <div class='row-img'>
                    <img class='rowimg' src=${image}>
                </div>
                <p style='font-size:12px;'>${title}</p>
                <h2 style='font-size: 15px;'>R$ ${price}.00</h2>`+
                "<i class='fa-solid fa-trash' onclick='delElement("+ (j++) +")'></i></div>"
                
            );
        }).join('');
    }
    document.getElementById("cartItem").innerHTML += `<button onclick='createOrder(carrinho.php)'>Inserir Pedidos</button>`;
    
    fetch('config.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(pedidos)
      })
      .then(response => response.json())
      .then(data => {
        console.log('Pedido inserido com sucesso:', data);
        // Limpar o carrinho após o pedido ser inserido
        cart = [];
        displaycart();
      })
      .catch((error) => {
        console.error('Erro ao inserir pedido:', error);
        alert('Ocorreu um erro ao inserir o pedido. Por favor, tente novamente.');
      });
    };
   
    
    


