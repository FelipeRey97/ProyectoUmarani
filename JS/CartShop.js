const kartButton = document.querySelector(".kartButton");
const kartContainer = document.querySelector(".kartOpacity");
const closekartContainer = document.querySelector(".cerrar-carrito")

kartButton.addEventListener('click', ()=>{

    kartContainer.classList.toggle('ocultar',false);
})

closekartContainer.addEventListener('click',()=>{

    kartContainer.classList.toggle('ocultar',true);

})