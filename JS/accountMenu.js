const accountButton = document.querySelector(".accountButton");
const menuCuentaContainer = document.querySelector(".accountOpacity");
const cerrarmenuCuenta = document.querySelector(".cerrar-menuCuenta");

accountButton.addEventListener('click', ()=>{

    menuCuentaContainer.classList.toggle('ocultar',false);
})

cerrarmenuCuenta.addEventListener('click',()=>{

    menuCuentaContainer.classList.toggle('ocultar',true);

})