//variable para el juego,
let juego = false;
let puntuacion=0;
let tiempo=19;


// Elementos 
const basura1 = document.getElementById("basura1");
const basura2 = document.getElementById("basura2");
const basura3 = document.getElementById("basura3");
const basura4 = document.getElementById("basura4");
const fuego = document.getElementById("fuego");
const fuego2 = document.getElementById("fuego2");
const personaje = document.getElementById("personaje");

const contador = document.getElementById("contador");
const score = document.getElementById("puntuacion");


// variables de dialogos de finalización y tutorial
var dialogo = document.getElementById("dialogoFinal");
var dialogoPuntos = document.getElementById("dialogoFinalPuntos");
var tutorial = document.getElementById("instrucciones");


//botonera
const botonIniciar = document.getElementById("empezar");

//velocidad para el movimiento del personaje
const velocidad = 25; // utilizamos este valor y hacemos los ajustes correspondientes con el mapa y personaje y que sean multiples

// para el random 
const IMAGENES = [
    "url('../../media/caidaObjetos/bananaGif.gif')", 
    "url('../../media/caidaObjetos/botellaPlastico.gif')", 
    "url('../../media/caidaObjetos/botellaPng.gif')", 
    "url('../../media/caidaObjetos/papelFinal3.gif')"
];



//funcion para que los productos caigan en un intervalo de tiempo
setInterval(function () { 
    if (juego) { // si el juego está activo se realiza el movimiento - poner juego a secas es true

        //variables
        const basura1top = parseInt(window.getComputedStyle(basura1).getPropertyValue("top")); // obtenemos los valores de los CSS con getComputedStyle
        const basura2top = parseInt(window.getComputedStyle(basura2).getPropertyValue("top"));
        const basura3top = parseInt(window.getComputedStyle(basura3).getPropertyValue("top"));
        const basura4top = parseInt(window.getComputedStyle(basura4).getPropertyValue("top"));
        const fuegotop = parseInt(window.getComputedStyle(fuego).getPropertyValue("top"));
        const fuego2top = parseInt(window.getComputedStyle(fuego2).getPropertyValue("top"));
        let posiciontopnueva1;
        let posiciontopnueva2;
        let posiciontopnueva3;
        let posiciontopnueva4;
        let posiciontopfuego;
        let posiciontopfuego2;
        let move;

        if (basura1top < 450) {
            posiciontopnueva1 = basura1top + randomSpeed(); // las velocidades no varian mucho
            basura1.style.top = posiciontopnueva1 + 'px';
        } else if (basura1top >= 450) { // si supera los 450, la imagen pasa a posicionarse en la posicion 0px
            basura1.style.top = '0px';
            move = getRandomNumber(); // posicion nueva en eje x
            basura1.style.left = move + 'px'; // posicion desde la izquierda (suma de la posicion random + px )
            basura1.style.backgroundImage = getRandomImage(); // obtendremos una imagen de basura aleatoria del array de imagenes
        }


        if (basura2top < 450) {
            posiciontopnueva2 = basura2top + randomSpeed();
            basura2.style.top = posiciontopnueva2 + 'px';
        } else if (basura2top >= 450) {
            basura2.style.top = '0px';
            move = getRandomNumber();
            basura2.style.left = move + 'px';
            basura2.style.backgroundImage = getRandomImage();
        }


        if (basura3top < 450) {
            posiciontopnueva3 = basura3top + randomSpeed();
            basura3.style.top = posiciontopnueva3 + 'px';
        } else if (basura3top >= 450) {
            basura3.style.top = '0px';
            move = getRandomNumber();
            basura3.style.left = move + 'px';
            basura3.style.left = getRandomNumber() + 'px';
            basura3.style.backgroundImage = getRandomImage();
        }

        if (basura4top < 450) {
            posiciontopnueva4 = basura4top + randomSpeed();
            basura4.style.top = posiciontopnueva4 + 'px';
        } else if (basura4top >= 450) {
            basura4.style.top = '0px';
            move = getRandomNumber();
            basura4.style.left = move + 'px';
            basura4.style.left = getRandomNumber() + 'px';
            basura3.style.backgroundImage = getRandomImage();
        }


        if (fuegotop < 450) {
            posiciontopfuego = fuegotop + randomSpeed();
            fuego.style.top = posiciontopfuego + 'px';
        } else if (fuegotop >= 450) {
            fuego.style.top = '0px';
            move = getRandomNumber();
            fuego.style.left = move  + 'px';
        }


        if (fuego2top < 450) {
            posiciontopfuego2 = fuego2top + randomSpeed();
            fuego2.style.top = posiciontopfuego2 + 'px';
        } else if (fuego2top >= 450) {
            fuego2.style.top = '0px';
            move = getRandomNumber();
            fuego2.style.left = move + 'px';
        }
    }
}, 50); //lapso de tiempo 50 milisegundos - repetición 


// Aparicion aleatoria de objetos - no servirá para la aparicion del objeto en el eje x de top dentro del mapa
function getRandomNumber() {
    const min = 100; 
    const max = 600;
    return Math.floor(Math.random() * max) + min;
}


//Funcion para la aparicion de imagenes aleatorias.
function getRandomImage() { 
    const numAleatorioImg = Math.floor(Math.random() * IMAGENES.length); //imagenes guardadas en un array
    return IMAGENES[numAleatorioImg];  //return de imagen aleatoria guardada en el array
}


//Funcion para la velocidad de caida
function randomSpeed() { 
    min = 5;
    max = 15;

    let randomSpeed = Math.floor(Math.random() * (max - min + 1)) + min;
    return randomSpeed; // devuelve rango de velocidad random
}



//DETECCIÓN DE COLISIÓN
setInterval(function deteccioncolision() {

    //personaje
    const personajeW=personaje.offsetWidth; //ancho del elemento = offsetwidth
    const personajeH=personaje.offsetHeight;//altura del elemento
    const personajeL=personaje.offsetLeft //posicion de referencia a la izquierda
    const personajeT=personaje.offsetTop; // posicion de referencia desde arriba

    //basura1
    const basura1W = basura1.offsetWidth;
    const basura1H = basura1.offsetHeight;
    const basura1L = basura1.offsetLeft;
    const basura1T = basura1.offsetTop;

    //basura2
    const basura2W = basura2.offsetWidth;
    const basura2H = basura2.offsetHeight;
    const basura2L = basura2.offsetLeft;
    const basura2T = basura2.offsetTop;

    //basura3
    const basura3W = basura3.offsetWidth;
    const basura3H = basura3.offsetHeight;
    const basura3L = basura3.offsetLeft;
    const basura3T = basura3.offsetTop;

    //basura4
    const basura4W = basura4.offsetWidth;
    const basura4H = basura4.offsetHeight;
    const basura4L = basura4.offsetLeft;
    const basura4T = basura4.offsetTop;

    //fuego
    const fuegoW= fuego.offsetWidth;
    const fuegoH = fuego.offsetHeight;
    const fuegoL = fuego.offsetLeft;
    const fuegoT = fuego.offsetTop;

    const fuego2W = fuego2.offsetWidth;
    const fuego2H = fuego2.offsetHeight;
    const fuego2L = fuego2.offsetLeft;
    const fuego2T = fuego2.offsetTop;

//funcion para la colision con objetos
//condicion para iniciar el juego 
if(juego){
    
    // vamos a comprobar que haya una colision con basura1
    if ((personajeL + personajeW) > basura1L && personajeL < (basura1L + basura1W) // horizontal
        && (personajeT + personajeH) > basura1T && personajeT < (basura1T + basura1H)) { //vertical

        // hacemos que desaparezca al realizar colisicion
        if (puntuacion < 100) {
            puntuacion = puntuacion + 5;
        }

            basura1.style.top = '0px';
            basura1.style.left = getRandomNumber() + 'px';
            basura1.style.backgroundImage = getRandomImage();//recoremos la funcion para cambio de imagenes 
    }

    // vamos a comprobar que haya una colision con basura2
    if ((personajeL + personajeW) > basura2L && personajeL < (basura2L + basura2W)
        && (personajeT + personajeH) > basura2T && personajeT < (basura2T + basura2H)) {

        // hacemos que desaparezca al realizar colisicion
        if (puntuacion < 100) {
            puntuacion = puntuacion + 5;
        }

            basura2.style.top = '0px';
            basura2.style.left = getRandomNumber() + 'px';
            basura2.style.backgroundImage = getRandomImage();//recoremos la funcion para cambio de imagenes 
    }


    // comprobamos que haya colision con basura3
    if ((personajeL + personajeW) > basura3L && personajeL < (basura3L + basura3W)
        && (personajeT + personajeH) > basura3T && personajeT < (basura3T + basura3H)) {
        
        // hacemos que desaparezca al realizar colisicion
        if (puntuacion < 100) {
        puntuacion = puntuacion + 5;
        } 

        basura3.style.top = '0px';
        basura3.style.left = getRandomNumber() + 'px';
        basura3.style.backgroundImage = getRandomImage();//recoremos la funcion para cambio de imagenes 
    }


    // comprobamos que haya colision con basura4
    if ((personajeL + personajeW) > basura4L && personajeL < (basura4L + basura4W)
        && (personajeT + personajeH) > basura4T && personajeT < (basura4T + basura4H)) {
        
        // hacemos que desaparezca al realizar colisicion
        if (puntuacion < 100) {
        puntuacion = puntuacion + 5;
        } 

        basura4.style.top = '0px';
        basura4.style.left = getRandomNumber() + 'px';
        basura4.style.backgroundImage = getRandomImage();//recoremos la funcion para cambio de imagenes 
    }
    

    //comprobamos colision con el fuego
        if ((personajeL + personajeW) > fuegoL && personajeL < (fuegoL + fuegoW)
        && (personajeT + personajeH) > fuegoT && personajeT < (fuegoT + fuegoH)) {
        
    // hacemos que desaparezca al realizar colisicion
        if (puntuacion < 100 && puntuacion >= 5) {
        puntuacion = puntuacion - 5; // restamos 5 puntos
        }

        fuego.style.top = '0px';
        fuego.style.left = getRandomNumber() + 'px';
    }


        if ((personajeL + personajeW) > fuego2L && personajeL < (fuego2L + fuego2W)
        && (personajeT + personajeH) > fuego2T && personajeT < (fuego2T + fuego2H)) {
        
        // hacemos que desaparezca al realizar colisicion
        if (puntuacion < 100 && puntuacion >= 5) {
        puntuacion = puntuacion - 5; //restamos 5 puntos
            }
        fuego2.style.top = '0px';
        fuego2.style.left = getRandomNumber() + 'px';  
    }
    }
});



//funcion para tiempo

const tiempojuego = setInterval(function () {
    if (juego) {
        tiempo--;
        contador.innerHTML = "Tiempo <br> " + tiempo;
        if (tiempo <= 0) {
            
            clearInterval(tiempojuego); //paramos ejecucion 
            dialogo.show(); // mostramos dialog
            finalJuego();  //  y finalizamos juego callb
        }   
    }    
}, 1000); // milisegundos



//función para la puntuación

intervalopuntuacion = setInterval(function () {
    document.getElementById("puntuacion").innerHTML = "Puntuación <br>" + puntuacion;
    if (puntuacion >= 100) {
        
        clearInterval(intervalopuntuacion);
        // Mensaje final
        
        dialogoFinalPuntos.show(); 
        // utilizacino de funcion para finalizar ejecución de codigo 
        
        finalJuego();
        createCookieStats("stats", 3, puntuacion, tiempo);
        
    }
}, 100);