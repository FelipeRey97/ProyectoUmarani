
const showKart = document.querySelector(".kartOpacity");
const closeShowKart = document.querySelector(".cerrar-carrito")
const KartButton = document.querySelector('.kartButton');
var vacio = true;
KartButton.addEventListener('click', ()=>{
    if(vacio === true){

        showKart.classList.toggle("ocultar",true);
    }
    else{

        showKart.classList.toggle("ocultar",false);

    }

});
closeShowKart.addEventListener('click', ()=>{

    showKart.classList.toggle("ocultar");

})


KartButton.addEventListener('click', kartEmpty);
function kartEmpty(event){
    
    if (vacio === true){

        alert("No hay articulos en la cesta");
        
    }
    else if(vacio === false){
        

    }
}


const addToKartButton = document.querySelectorAll(".addToKart");
addToKartButton.forEach((addToKartButton)=>{

addToKartButton.addEventListener('click', addToKartClicked);


});

const kart = document.querySelector('.middle');

//obtener elemento completo al hacer clic en "comprar"

function addToKartClicked(event){
    
    vacio = false;
    function kartEmpty(event){
    
        if (vacio === true){
    
            alert("No hay articulos en la cesta");
            showKart.classList.toggle("ocultar",true);
        }
        
    }
    const button = event.target;
    const item = button.closest(".producto");
    
    
    //obtener elementos por separado, imagen, titulo, precio
    
    const itemTitle = item.querySelector('.titulo').textContent;
    const itemPrice = item.querySelector('.precio').textContent;
    const itemImage = item.querySelector('.image').src;
    
    addItemToShoppingKart(itemTitle,itemPrice,itemImage);
    
    }

    function addItemToShoppingKart(itemTitle,itemPrice,itemImage){

    const elementsTitle = kart.getElementsByClassName('title'); 
    for (let i=0; i < elementsTitle.length; i++){

        if(elementsTitle[i].innerHTML === itemTitle){

            let elementQuantity = elementsTitle[i].parentElement.parentElement.querySelector('.quantity')
            elementQuantity.value++;
            updateShoppingKartTotal();
            return;
        }
    }
        
        // Imprimir elementos obtenidos en la plantilla (mockup) del carrito de compras

    const shoppingKartRow = document.createElement('div');
    const shoppingKartContent = 
    ` <div class="contenedor kartItem">
        <div class="miniatura">
            <img src= ${itemImage} alt="">
        </div>
        <div class="info">
             <h3 class="title">${itemTitle}</h3>
            <br> <p class="price" >${itemPrice}</p>
        </div>
        <form action="" class="cantidad">
             <label for="">Cantidad:</label>
             <input class="quantity" type="number" value="1">
             <a class= "delete" href="#"><i class="far fa-window-close"></i></a>
        </form>
    </div> `
    shoppingKartRow.innerHTML = shoppingKartContent;
    kart.append(shoppingKartRow);   //añadir elemento debajo del anterior.

    //capturar botón para eliminar producto
    
    shoppingKartRow.querySelector(".delete").addEventListener('click', removeShoppingKartItem);
    updateShoppingKartTotal();
    shoppingKartRow.querySelector(".quantity").addEventListener('change', changeQuantityItemKart);
   
}

// Actualizar Precio total del carrito

function updateShoppingKartTotal(){

    // creación de la variable total
   
       let total = 0;
       
       const shoppingKartTotal = document.querySelector('.shopTotal');
     

   
       //selección del producto en el carrito de compras
       const shoppingkartItems = document.querySelectorAll(".kartItem");
       
       //extracción del precio y cantidad de cada producto, se emplea "Number" para cambiar el tipo de dato string
   
       shoppingkartItems.forEach((kartItem) => {
   
         const shoppingkartItemPriceElement = kartItem.querySelector(".price");
   
         const shoppingkartItemPrice = Number (shoppingkartItemPriceElement.textContent.replace('$',''));
         
           const shoppingKartQuantityElement = kartItem.querySelector(".quantity");
          
           const shoppingKartItemQuantity = Number(shoppingKartQuantityElement.value);

   
           total = total + shoppingkartItemPrice * shoppingKartItemQuantity;
           
       });

       //Impresión del total en el contenido HTML.

    shoppingKartTotal.innerHTML = `Total:$ ${total}`;
      console.log(total);

    if (total === 0){

        alert("Se ha vaciado la cesta");
        vacio = true;
         }
    

}


function removeShoppingKartItem(event){

    const buttonClicked = event.target;
    buttonClicked.closest(".kartItem").remove();
    updateShoppingKartTotal();
}

function changeQuantityItemKart(event){

    const input = event.target;
if (input.value <= 1)
{
    input.value =1;
}
updateShoppingKartTotal();
}
