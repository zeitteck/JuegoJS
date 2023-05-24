<!-- cambiar el nombre de la BBDD a "echotel" y crear un usuario para que solo pueda hacer inserts y editar con usuario "user" y pass "123456" -->
<script type="text/javascript" src="../data/cookies.js" type="module"></script>
<?php

function openBd()
{
    $servername = "localhost";
    $username = "root";
    $password = "6466";

    $connection = new PDO("mysql:host=$servername;dbname=echotel", $username, $password);
    // set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connection->exec("set names utf8");

    return $connection;
}

function disconnect()
{
    return null;
};

function insertPuntuacion($user, $idGame, $puntuacion, $tiempo)
{
    $dateTime = "now()";
    //Se inicia la conexion con la BDD
    $connection = openBd();
    //Se preara la sentencia insert
    $sentenceContent = "insert into puntuacion (Usuario_idUsuario, Juego_idJuego, Puntuacion,TiempoJuego,FechaHora) values ($user, $idGame, $puntuacion, $tiempo, $dateTime)";
    $sentence = $connection->prepare($sentenceContent);
    $sentence->execute();
    $connection = disconnect();
}

function updateGame($idGame, $user, $puntuacion, $tiempo)
{
    $dateTime = date('d-m-y h:i:s');
    //Se inicia la conexion con la BDD
    $connection = openBd();
    //Se preara la sentencia insert
    $sentenceContent = "update puntuacion set Puntuacion=:puntuacion,TiempoJuego=:tiempo, FechaHora=:dateTime WHERE Usuario_idUsuario=:user AND Juego_idJuego=:idGame;";
    $sentence = $connection->prepare($sentenceContent);
    //Se asignan a los parametros de mySql el valor de las variables que se pasan como parametro en la función.
    $sentence->bindParam(':user', $user);
    $sentence->bindParam(':idGame', $idGame);
    $sentence->bindParam(':puntuacion', $puntuacion);
    $sentence->bindParam(':tiempo', $tiempo);
    $sentence->bindParam(':dateTime', $dateTime);
    //Se ejecuta la sentencia para hacer el insert
    $sentence->execute();

    $connection = disconnect();
    //se modifica el valor de la cookie que contiene el juego actual.

}
//SE OBTIENE EL JUEGO MÁS ABANZADO AL QUE SE HA JUGADO SOLO PASANDO EL USER COMO PARAMETRO
function selectGame($user)
{
    //Se inicia la conexion con la BDD
    $connection = openBd();
    //Se preara la sentencia insert
    $sentenceContent = "select MAX(Juego_idJuego) from puntuacion WHERE Usuario_idUsuario=:user;";
    $sentence = $connection->prepare($sentenceContent);
    //Se asignan a los parametros de mySql el valor de las variables que se pasan como parametro en la función.
    $sentence->bindParam(':user', $user);
    //Se ejecuta la sentencia para hacer el insert
    $sentence->execute();
    $idJuego = $sentence->fetchAll(PDO::FETCH_ASSOC);
    $connection = disconnect();
    $data = $idJuego[0]['MAX(Juego_idJuego)'];
    //se modifica el valor de la cookie que contiene el juego actual.
    setcookie("games", $data, time() + 3600 * 30, "/");
    return $data;
}
//DADO EL USUARIO Y JUEGO INDICADO SE OBTIENE el juego actual
function selectGameUser($user, $game)
{
    //Se inicia la conexion con la BDD
    $connection = openBd();
    //Se preara la sentencia insert
    $sentenceContent = "select * from puntuacion WHERE Usuario_idUsuario=:user AND Juego_idJuego=:game;";
    $sentence = $connection->prepare($sentenceContent);
    //Se asignan a los parametros de mySql el valor de las variables que se pasan como parametro en la función.
    $sentence->bindParam(':user', $user);
    $sentence->bindParam(':game', $game);
    //Se ejecuta la sentencia para hacer el insert
    $sentence->execute();
    $tablaPuntuacion = $sentence->fetchAll(PDO::FETCH_ASSOC);
    $connection = disconnect();
    //se modifica el valor de la cookie que contiene el juego actual.
    return $tablaPuntuacion;
}
//AÑADE DATOS DEL USUARIO REGISTRADO EN EL FORMULARIO A LA BBDD
// function insertRegistro($Correo, $Nombre, $Apellido, $Contrasena, $NombreUsuario)
// {
//     //Se inicia la conexion con la BDD
//     $connection = openBd();
//     //Se preara la sentencia insert
//     $sentenceContent  = "insert into usuario (Correo, Nombre, Apellido, Contrasena, NombreUsuario) 
//      values (:Correo, :Nombre, :Apellido, :Contrasena, :NombreUsuario)";
//     $sentence = $connection->prepare($sentenceContent);
//     //Se asignan parametros
//     $sentence->bindParam(':Correo', $Correo);
//     $sentence->bindParam(':Nombre', $Nombre);
//     $sentence->bindParam(':Apellido', $Apellido);
//     $sentence->bindParam(':Contrasena', $Contrasena);
//     $sentence->bindParam(':NombreUsuario', $NombreUsuario);
//     //Se ejecuta la sentencia 
//     $sentence->execute();
//     $connection = disconnect();
// }


//NUEVA FUNCIÓN PARA EL FORMULARIO
function insertRegistro($Correo, $Contrasena, $NombreUsuario)
{
    //Se inicia la conexion con la BDD
    $connection = openBd();
    //Se preara la sentencia insert
    $sentenceContent  = "insert into usuario (Correo, Contrasena, NombreUsuario) 
     values (:Correo, :Contrasena, :NombreUsuario)";
    $sentence = $connection->prepare($sentenceContent);
    //Se asignan parametros
    $sentence->bindParam(':Correo', $Correo);
    $sentence->bindParam(':Contrasena', $Contrasena);
    $sentence->bindParam(':NombreUsuario', $NombreUsuario);
    //Se ejecuta la sentencia 
    $sentence->execute();
    $connection = disconnect();
}

//EDICIÓN DEL USER EN LA PÁGINA EDIT PERFIL
function editPerfil($user, $Correo, $Nombre, $Apellido, $Contrasena, $NombreUsuario)
{ 
    //Se inicia la conexion con la BDD
    $connection = openBd();
    //Se preara la sentencia de update
    $sentenceContent  = "update usuario set Correo = :Correo, Nombre = :Nombre, Apellido = :Apellido, 
    Contrasena = :Contrasena, NombreUsuario = :NombreUsuario WHERE idUsuario=:user";
    $sentence = $connection->prepare($sentenceContent);
    //Se asignan parametros
    $sentence->bindParam(':user', $user);
    $sentence->bindParam(':Correo', $Correo);
    $sentence->bindParam(':Nombre', $Nombre);
    $sentence->bindParam(':Apellido', $Apellido);
    $sentence->bindParam(':Contrasena', $Contrasena);
    $sentence->bindParam(':NombreUsuario', $NombreUsuario);
    //Se ejecuta la sentencia 
    $sentence->execute();
    $connection = disconnect();
}

//SELECCION DE DATOS DEL USER PARA PODERSE EDITAR EL PERFIL
function selectDatosBBDD($user)
{
    //Se inicia la conexion con la BDD
    $connection = openBd();
    //Se preara la sentencia de select
    $sentenceContent  = "select Correo, Nombre, Apellido, Contrasena, NombreUsuario from usuario WHERE idUsuario=:user";
    $sentence = $connection->prepare($sentenceContent);
    //Se asignan parametros
    $sentence->bindParam(':user', $user);
    //Se ejecuta la sentencia 
    $sentence->execute();
    $resultado = $sentence->fetchAll();
    $connection = disconnect();
    //Nos devuelve los datos leccionados
    return $resultado;

}

//PARA MOSTRAR NOMBRE DEL USER EN LA NAVBAR
function mostrarNombre($user)
{
    //Se inicia la conexion con la BDD
    $connection = openBD();
    //Se preara la sentencia de select
    $sentenciaNombre = "select NombreUsuario from usuario  where idUsuario=:user";
    $sentencia = $connection->prepare($sentenciaNombre);
    //Se asignan parametros
    $sentencia->bindParam(':user', $user);
    //Se ejecuta la sentencia 
    $sentencia->execute();
    $resultado = $sentencia->fetchAll();
    $connection = disconnect();
    //Nos devuelve el nombre del User que se encuentra en la sesion actual
    return $resultado[0]['NombreUsuario'];
}

//PARA HACER LA COMPARACIÓN DEL TIPO DE USUARIO - DEPENDE DE TIPO SALEN OPCIONES DISTINTAS EN EL NAVBAR
function tipoUser($user)
{
    //Se inicia la conexion con la BDD
    $connection = openBD();
    //Se preara la sentencia de select
    $sentenciaNombre = "select TipoUsuario from usuario  where idUsuario=:user";
    $sentencia = $connection->prepare($sentenciaNombre);
    //Se asignan parametros
    $sentencia->bindParam(':user', $user);
    //Se ejecuta la sentencia 
    $sentencia->execute();
    $resultado = $sentencia->fetchAll();
    $connection = disconnect();
    //Nos devuelve el tipo del Usuario
    return $resultado[0]['TipoUsuario'];
}

//SELECT PARA MOSTRAR LOS DATOS PARA EL RANKING PERSONAL
function selectRankingPersonal($user)
{
    //Se inicia la conexion con la BDD
    $connection = openBd();
    //Se preara la sentencia de select
    $sentenciaPersonal = " select puntuacion.Puntuacion, puntuacion.TiempoJuego, juego.Nombre
    from puntuacion 
    join juego on juego.idJuego  =  puntuacion.Juego_idJuego
    where Usuario_idUsuario=:user;  ";
    $sentencia = $connection->prepare($sentenciaPersonal);
    //Se asignan parametros
    $sentencia->bindParam(':user', $user);
    //Se ejecuta la sentencia 
    $sentencia->execute();
    $resultado = $sentencia->fetchAll();
    $connection = disconnect();
    //Nos devuelve un array con los datos que seleccionamos
    return $resultado;

}

//FUNCION DE SELECT NOMBRES DE LA BD (NO TOCAR, ANTES HABLAR CON POL);
function selectNombres()
{

    $conexion = openBD();
    $sentenciaNombres =
        "
        SELECT Nombre FROM usuario
        INNER JOIN puntuacion ON puntuacion.Usuario_idUsuario=usuario.idUsuario
        order by puntuacion.Puntuacion desc
        ";

    $sentencia = $conexion->prepare($sentenciaNombres);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $conexion = disconnect();

    return $resultado;
}

function selectTopTenTimeGameOne()
{

    $conexion = openBD();

    $sentenciaNombres = "select Nombre FROM usuario";

    $sentencia = $conexion->prepare($sentenciaNombres);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $conexion = disconnect();

    return $resultado;
}


//seleccion para iniciar en el login de usuario. 
function selectLogin($user, $contrasena)
{

    //Se inicia la conexion con la BDD
    $connection = openBd();

    // $sentenceText = "select * from usuario where NombreUsuario=:userName and Contrasena=:contrasenaUsuario";
    $sentenceText = "select idUsuario from usuario where NombreUsuario=:userName and Contrasena=:contrasenaUsuario";
    $sentence = $connection->prepare($sentenceText);
    $sentence->bindParam(':userName', $user);
    $sentence->bindParam(':contrasenaUsuario', $contrasena);
    $sentence->execute();
    $ListUsers = $sentence->fetchAll(PDO::FETCH_ASSOC); // me devuelve el resultado de la select del arrayAsociativo.

    //desconectamos sesion.
    $connection = disconnect();

    return $ListUsers;
}


//funcion para borrar usuario en administracion

function deleteuser($user)
{
    //Se inicia la conexion con la BDD
    $connection = openBd();
    //Se preara la sentencia delete
    $sentenceContent = "delete from usuario where idUsuario=:id;";
    $sentence = $connection->prepare($sentenceContent);
    //Se asignan a los parametros de mySql el valor de las variables que se pasan como parametro en la función.
    $sentence->bindParam(':id', $user);
    //Se ejecuta la sentencia para hacer el insert
    $sentence->execute();
    $tablaPuntuacion = $sentence->fetchAll(PDO::FETCH_ASSOC);
    $connection = disconnect();
    header('Location: ../data/adUsuarios.php');
}


// para seleccionar solo los usuarios
function selectAdministracion()
{

    $connection = openBd();

    // $sentenciaNombres = "select * from usuario";
    $sentenciaNombres = "select * from usuario where TipoUsuario=3";
    $sentencia = $connection->prepare($sentenciaNombres);
    $sentencia->execute();
    $resultado = $sentencia->fetchAll();
    $connection = disconnect();

    return $resultado;
}


function saveImageUrl($user, $url)
{
    //Se inicia la conexion con la BDD
    $connection = openBd();
    //Se preara la sentencia insert
    $sentenceContent = "update usuario set PP=:url WHERE idUsuario=$user";
    $sentence = $connection->prepare($sentenceContent);  
    $sentence->bindParam(':url', $url);
    //Se ejecuta la sentencia para hacer el insert
    $sentence->execute();
    $connection = disconnect();
    //se modifica el valor de la cookie que contiene el juego actual.
}

function selectImage($user)
{
    $connection = openBD();

    $sentenciaNombre = "select PP from usuario  where idUsuario=$user";

    $sentencia = $connection->prepare($sentenciaNombre);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $connection = disconnect();
    return $resultado[0]['PP'];
}

// para selecionar solo los admins
function selectSuperAdmin()
{
    $connection = openBd();
    $sentenciaNombres = "select * from usuario where TipoUsuario=1 or TipoUsuario=2";// esto es para obtener los usuarios y administradores
    $sentencia = $connection->prepare($sentenciaNombres);
    $sentencia->execute();
    $resultado = $sentencia->fetchAll();
    $connection = disconnect();
    return $resultado;
}


//EDICIÓN DEL USER EN LA PÁGINA EDIT PERFIL
function editTipo($id, $tipo)
{ 
    //Se inicia la conexion con la BDD
    $connection = openBd();
    //Se preara la sentencia de update
    $sentenceContent  = "update usuario set TipoUsuario=? WHERE idUsuario=?";
    $sentence = $connection->prepare($sentenceContent);
    //Se asignan parametros
    // $sentence->bindParam(':idUsuario', $id);
    // $sentence->bindParam(':TipoUsuario', $tipo);
    //Se ejecuta la sentencia 
    $sentence->execute([$tipo, $id]);
    $connection = disconnect();
}

?>