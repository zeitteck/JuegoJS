<?php
error_reporting(0);
//Abrimos sesion
session_start();

//Se relaciona con la BBDD
include './php_librarys/db.php';

include './lang/es.php';
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./style/web.css">
    <link rel="stylesheet" href="./terceros/bootstrap-5.2.1-dist/css/bootstrap.min.css">
    <script src="./terceros/bootstrap-5.2.1-dist/js/bootstrap.bundle.min.js"></script>

    <title>Index</title>
</head>

<body class="m-0 p-0">
    <!-- Navbar -->
    <?php include_once("./data/navbar.php"); ?>
    
    

    <!-- Content landing -->
    <div class="container mt-5 rounded-5">
        <div class="row row-cols-2 ">

            <div class="col rounded-5 " id="imagenHotel"></div>

            <div class="col ps-4 pe-4">
                <div class="col text-center mb-3" id="titulo"><img src="./media/logoPrueba.png" alt="">
                </div>
                <div class="col mb-5 mt-5" id="description">

                    <p class="text-center">
                        <?php echo $lang['title'] ?>
                    </p>

                    <p>
                        <?php echo $lang['text'] ?>
                    </p>
                </div>
                <div id="ranking" class="col mb-3 rounded-5" id="accesoJuego" style="height:200px;">
                    <div class="row"></div>
                    <div class="row mt-3">
                        <div class="mt-5  text-center">
                            <a class="" href="./data/games.php" id="ranking">
                                <?php echo $lang['butonLand'] ?>
                            </a>
                        </div>
                    </div>
                    <div class="row"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- <footer class="position-absolute bottom-0">
        
    </footer> -->

    <script src="./lang/include.js"></script>

</body>

</html>