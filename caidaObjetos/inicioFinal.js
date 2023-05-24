// DIALOGO TUTORIAL
tutorial.show();
tutorial.addEventListener ('click', () => tutorial.close()); // acción para cerrar dialogo 


//boton de iniciar - aparicion de objetos

botonIniciar.addEventListener("click", function () {//funcion para empezar juego 
    juego = true;
    botonIniciar.style.visibility = "hidden"; // escondemos boton al hacer click
    basura1.style.display = "block"; // realizamos block para que los objetos sean visibles.
    basura2.style.display = "block";
    basura3.style.display = "block";
    basura4.style.display = "block";
    fuego.style.display = "block";
    fuego2.style.display = "block";
    personaje.style.display = "block";

})



//funcion para terminar juego - ocultamos objetos

function finalJuego() { 

    basura1.style.display = "none";  //al finalizar el juego, los objetos no aparecen en pantalla y el juego pasa a false.
    basura2.style.display = "none";
    basura3.style.display = "none";
    basura4.style.display= "none";
    fuego.style.display = "none";
    fuego2.style.display = "none";
    personaje.style.display = "none";
    juego = false; //Desactivamos juego para su finalización 

}