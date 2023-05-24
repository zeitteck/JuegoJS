<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style/caidaObjetos.css" type="text/css">
    <link href="https://fonts.cdnfonts.com/css/sh-pinscher" rel="stylesheet">
    <title>RecogerObjetos</title>
</head>
<body>

    <!-- fondo de pantalla -->
    <div id="fondoJuego" class="container">

        <!-- PERSONAJE -->
        <div id="personaje" class="personaje"></div>


        <!-- OBJETOS DEL JUEGO -->
        <div id="basura1" class="basura"> </div>
        <div id="basura2" class="basura"> </div>
        <div id="basura3" class="basura"> </div>
        <div id="basura4" class="basura"> </div>
        <div id="fuego" class="fuego"></div>
        <div id="fuego2" class="fuego"></div>



        <!-- COMPLEMENTOS DEL JUEGO -->
        <div id="contador"> </div>
        <div id="puntuacion"> </div>


        <!-- boton de iniciar -->
        <button type="button" id="empezar" class="border 1px">Empezar</button>
        <!-- HAY QUE PONERLO EN EL JUEGO -->
        
        <button type="button" id="salir" class="border 2px"> 
            <a href="../games.php">SALIR</a>
        </button> 
        
       

        <!-- Instrucciones -->
        <dialog id="instrucciones">
            <h1>INSTRUCCIONES</h1>
            <p>
                Puedes moverte en cualquier dirección por todo el mapa <br>
                <img src="../../media/caidaObjetos/teclas.png" /> <br>
                Recoge el máximo de basura posible hasta llegar a los 100 puntos.<br>
                <img src="../../media/caidaObjetos/botellaTuto.png" /> <img src="../../media/caidaObjetos/bananaTuto3.png"/> 
                <img src="../../media/caidaObjetos/papelTuto2.png"/> <img src="../../media/caidaObjetos/botellaVinoTuto2.png"/><br>
                Y sobre todo esquiva el fuego o se te restará puntuación<br>
                <img src="../../media/caidaObjetos/fuegoTuto.png" />
            </p>
            <button onclick="location.close()">Cerrar</button>
        </dialog>


        <!-- Dialogo para finalizacion sumando puntos -->
        <dialog id="dialogoFinalPuntos">
            <h1>¡HAS GANDADO!</h1>
            <p>Has llegado a los 100 puntos ¡¡felicidades!! <br>
                Ahora nos encargaremos nosotros de gestionar los residuos. <br>
                ¿Que quieres hacer?</p>
                "Reset" para jugar otra vez. <br>
                "Volver" para ir a la página de juegos.
            </p>
            <button onclick="location.reload()">Reset</button>
            <button onclick="location.replace('../games.php')">Volver</button>
        </dialog>


        <!-- Dialogo para finalizacion de tiempo -->
        <dialog id="dialogoFinal">
            <h1>HAS PERDIDO :(</h1>
            <p>Se acabo el tiempo compañer@<br><br>
                ¿Que quieres hacer?<br><br>
                "Reset" para jugar otra vez. <br>
                "Volver" para ir a la página de juegos.
            </p>
            <button onclick="location.reload()">Reset</button>
            <button onclick="location.replace('../games.php')">Volver</button>
        </dialog>
    </div>


    <!--  el enlace de javascript se pone aqui, para que las funciones se ejecuten, despues de la carga de los objetos -->

    <script src="./funciones2.js" language="javascript" type="text/javascript"></script>
    <script src="./movPersonaje.js" language="javascript" type="text/javascript"></script>
    <script src="./inicioFinal.js" language="javascript" type="text/javascript"></script>
    <script src="../cookies.js" language="javascript" type="text/javascript"></script>
</body>


</html>