// MOVIMIENTO DE PERSONAJE

// variables movimineto teclado 
let teclaApretadas = []; 


//FUNCIONES PARA PARAR EL MOVIMIENTO 

//esto se utiliza para mantenerse en movimiento, mientras las teclas estan apretadas (true) y si no estan apretadas pasan a (false)

document.addEventListener("keydown", function ({key}){ //HTML DOM ELEMENT KEYDOWN // funcion sin nombre //apretar tecla
    teclaApretadas[key] = true;
});

document.addEventListener("keyup", function ({key}) { //soltar 
    teclaApretadas[key] = false;
});




//MOVIMIENTOS DEL PERSONAJE

// arrowFunction con flecha para reducir codigo, limitamos el movimiento para no salir de mapa

const arriba = () => {
    const posicionTopPersonaje = parseInt(window.getComputedStyle(personaje).getPropertyValue("top")); //pasamos estos valores a INT
    // console.log(posicionTopPersonaje); // ESTO ESTÁ PARA SABER SI VA BIEN LAS POSICIONES, ES OPCIONAL TENERLO EN EL CODIGO- SE COMPRUEBA EN CONSOLA
    if (posicionTopPersonaje >=25) {
        const posicionNueva = posicionTopPersonaje - velocidad;
        personaje.style.top = posicionNueva + 'px';
        }
    }


const abajo = () => {
    const posicionTopPersonaje = parseInt(window.getComputedStyle(personaje).getPropertyValue("top"));
    // console.log(posicionTopPersonaje); // ESTO ESTÁ PARA SABER SI VA BIEN LAS POSICIONES, ES OPCIONAL TENERLO EN EL CODIGO 
    if (posicionTopPersonaje <= 405) {
            const posicionNueva = posicionTopPersonaje + velocidad;
            personaje.style.top = posicionNueva + 'px';
        }
    }


const derecha = () => {
    const posicionesPersonaje = parseInt(window.getComputedStyle(personaje).getPropertyValue("left"));
    // console.log(posicionesPersonaje); // ESTO ESTÁ PARA SABER SI VA BIEN LAS POSICIONES, ES OPCIONAL TENERLO EN EL CODIGO 
    if (posicionesPersonaje <= 725) { //esto resultado, es de la resta del personaje - ancho mapa
            const posicionNueva = posicionesPersonaje + velocidad;
            personaje.style.left = posicionNueva + 'px';      
    }
}

const izquierda = () => {
    const posicionesPersonaje = parseInt(window.getComputedStyle(personaje).getPropertyValue("left"));
    // console.log(posicionesPersonaje); // ESTO ESTÁ PARA SABER SI VA BIEN LAS POSICIONES, ES OPCIONAL TENERLO EN EL CODIGO 
    if (posicionesPersonaje >= 25) {
            const posicionNueva = posicionesPersonaje - velocidad;
            personaje.style.left = posicionNueva + 'px';
        
    }
}


// aqui hacemos callback  porque estamos llamando a la funcion arrowfuntion.

setInterval(function () {
    if (juego) { 
        if (teclaApretadas["ArrowUp"] ) {
            arriba()
        };
        if (teclaApretadas["ArrowDown"] ) {
            abajo();
        };
        if (teclaApretadas["ArrowRight"]) {
            derecha();
        };
        if (teclaApretadas["ArrowLeft"] ) {
            izquierda();
        }
    }
}, 100); 

// cada 100 milisegundos, repite la accion de movimiento (esto puede influir en la velocidad). - 100 es un intervalo ideal para una velocidad normal del personaje