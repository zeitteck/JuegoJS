<?php
require_once("./../php_librarys/db.php");


function selectNombresJuegoNara()
{

    $connection = openBd();

    $sentenciaNombres = "select NombreUsuario from usuario join puntuacion on usuario.idUsuario=puntuacion.Usuario_idUsuario where puntuacion.Juego_idJuego='1' order by puntuacion.Puntuacion desc;";

    $sentencia = $connection->prepare($sentenciaNombres);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $connection = disconnect();

    return $resultado;
}
function selectNombresJuegoPol()
{

    $connection = openBd();

    $sentenciaNombres = "select NombreUsuario from usuario join puntuacion on usuario.idUsuario=puntuacion.Usuario_idUsuario where puntuacion.Juego_idJuego='2' order by puntuacion.Puntuacion desc;";

    $sentencia = $connection->prepare($sentenciaNombres);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $connection = disconnect();

    return $resultado;
}
function selectNombresJuegoSergio()
{

    $connection = openBd();

    $sentenciaNombres = "select NombreUsuario from usuario join puntuacion on usuario.idUsuario=puntuacion.Usuario_idUsuario where puntuacion.Juego_idJuego='3' order by puntuacion.Puntuacion desc;";

    $sentencia = $connection->prepare($sentenciaNombres);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $connection = disconnect();

    return $resultado;
}
function selectNombresJuegoJose()
{

    $connection = openBd();

    $sentenciaNombres = "select NombreUsuario from usuario join puntuacion on usuario.idUsuario=puntuacion.Usuario_idUsuario where puntuacion.Juego_idJuego='4' order by puntuacion.Puntuacion desc;";

    $sentencia = $connection->prepare($sentenciaNombres);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $connection = disconnect();

    return $resultado;
}







function selectTimeJuegoNara()
{

    $connection = openBd();

    $sentenciaNombres = "select puntuacion.TiempoJuego from puntuacion where puntuacion.Juego_idJuego='1' order by puntuacion.Puntuacion desc;";

    $sentencia = $connection->prepare($sentenciaNombres);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $connection = disconnect();

    return $resultado;
}
function selectTimeJuegoPol()
{

    $connection = openBd();

    $sentenciaNombres = "select puntuacion.TiempoJuego from puntuacion where puntuacion.Juego_idJuego='2' order by puntuacion.Puntuacion desc;";

    $sentencia = $connection->prepare($sentenciaNombres);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $connection = disconnect();

    return $resultado;
}
function selectTimeJuegoSergio()
{

    $connection = openBd();

    $sentenciaNombres = "select puntuacion.TiempoJuego from puntuacion where puntuacion.Juego_idJuego='3' order by puntuacion.Puntuacion desc;";

    $sentencia = $connection->prepare($sentenciaNombres);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $connection = disconnect();

    return $resultado;
}
function selectTimeJuegoJose()
{

    $connection = openBd();

    $sentenciaNombres = "select puntuacion.TiempoJuego from puntuacion where puntuacion.Juego_idJuego='4' order by puntuacion.Puntuacion desc;";

    $sentencia = $connection->prepare($sentenciaNombres);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $connection = disconnect();

    return $resultado;
}








function selectPointsJuegoNara()
{

    $connection = openBd();

    $sentenciaNombres = "select puntuacion.Puntuacion from puntuacion where puntuacion.Juego_idJuego='1' order by puntuacion.Puntuacion desc;";

    $sentencia = $connection->prepare($sentenciaNombres);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $connection = disconnect();

    return $resultado;
}
function selectPointsJuegoPol()
{

    $connection = openBd();

    $sentenciaNombres = "select puntuacion.Puntuacion from puntuacion where puntuacion.Juego_idJuego='2' order by puntuacion.Puntuacion desc;";

    $sentencia = $connection->prepare($sentenciaNombres);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $connection = disconnect();

    return $resultado;
}
function selectPointsJuegoSergio()
{

    $connection = openBd();

    $sentenciaNombres = "select puntuacion.Puntuacion from puntuacion where puntuacion.Juego_idJuego='3' order by puntuacion.Puntuacion desc;";

    $sentencia = $connection->prepare($sentenciaNombres);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $connection = disconnect();

    return $resultado;
}
function selectPointsJuegoJose()
{

    $connection = openBd();

    $sentenciaNombres = "select puntuacion.Puntuacion from puntuacion where puntuacion.Juego_idJuego='4' order by puntuacion.Puntuacion desc;";

    $sentencia = $connection->prepare($sentenciaNombres);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $connection = disconnect();

    return $resultado;
}





function selectInfoGeneral()
{

    $connection = openBd();

    $sentenciaNombres = "select u.NombreUsuario, result.sumPunts, result.sumTiempo
    from usuario u join  (select puntuacion.Usuario_idUsuario, sum(TiempoJuego) as sumTiempo, sum(puntuacion.Puntuacion) as sumPunts 
    from puntuacion group by puntuacion.Usuario_idUsuario order by sumPunts desc) result
    ON u.idUsuario = result.Usuario_idUsuario
    order by sumPunts desc;";

    $sentencia = $connection->prepare($sentenciaNombres);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $connection = disconnect();

    return $resultado;
}







function selectDatosUserOne()
{

    $connection = openBd();

    $sentenciaNombres = "select usuario.idUsuario, usuario.NombreUsuario from usuario join puntuacion on usuario.idUsuario=puntuacion.Usuario_idUsuario where puntuacion.Juego_idJuego='1' order by puntuacion.Puntuacion desc;";

    $sentencia = $connection->prepare($sentenciaNombres);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $connection = disconnect();

    return $resultado;
}
function selectDatosUserTwo()
{

    $connection = openBd();

    $sentenciaNombres = "select usuario.idUsuario, usuario.NombreUsuario from usuario join puntuacion on usuario.idUsuario=puntuacion.Usuario_idUsuario where puntuacion.Juego_idJuego='2' order by puntuacion.Puntuacion desc;";

    $sentencia = $connection->prepare($sentenciaNombres);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $connection = disconnect();

    return $resultado;
}
function selectDatosUserThree()
{

    $connection = openBd();

    $sentenciaNombres = "select usuario.idUsuario, usuario.NombreUsuario from usuario join puntuacion on usuario.idUsuario=puntuacion.Usuario_idUsuario where puntuacion.Juego_idJuego='3' order by puntuacion.Puntuacion desc;";

    $sentencia = $connection->prepare($sentenciaNombres);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $connection = disconnect();

    return $resultado;
}
function selectDatosUserFour()
{

    $connection = openBd();

    $sentenciaNombres = "select usuario.idUsuario, usuario.NombreUsuario from usuario join puntuacion on usuario.idUsuario=puntuacion.Usuario_idUsuario where puntuacion.Juego_idJuego='4' order by puntuacion.Puntuacion desc;";

    $sentencia = $connection->prepare($sentenciaNombres);
    $sentencia->execute();

    $resultado = $sentencia->fetchAll();

    $connection = disconnect();

    return $resultado;
}

?>