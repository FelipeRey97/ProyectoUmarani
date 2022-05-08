 
const searchButton = document.querySelector(".searchButton");
const searchContainer = document.querySelector(".searchOpacity");
const closesearchContainer = document.querySelector(".cerrar-buscador")

searchButton.addEventListener('click', ()=>{

    searchContainer.classList.toggle('ocultar',false);
})

closesearchContainer.addEventListener('click',()=>{

    searchContainer.classList.toggle('ocultar',true);

})
