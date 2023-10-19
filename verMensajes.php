<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Ver Mensajes</title>
</head>

<body>
    <?php
    session_start();
    ?>

    <div class ="fondo">

    <div class="titulo"><h1>Chat con <?php echo basename($carpeta) ?></h1></div>

        <?php

            if($_POST["carpeta"]){ //Si se selecciona una carpeta se guarda en la variable de SESSION
                $_SESSION["carpeta_selecionada"] = $_POST["carpeta"];
            }

            $carpeta = $_POST["carpeta"];

            $ficheros = scandir($carpeta);//Devuelve un array con todos los ficheros y carpetas que se encuentran dentro del directorio
           
            foreach ($ficheros as $fichero): ?>
            <div class="mensajesChat">
                <?php 
                    $contenido = fopen("$carpeta/$fichero","r");
                        while(!feof($contenido)){ //Para salir del bucle usamos feof, indica cuando se ha acabado el fichero
                            echo fgets($contenido); //Obtenemos linea a linea
                            echo "</br>";
                        }
                    fclose ($contenido);
                ?>
            </div>
            <?php
            endforeach;
        ?>

    <div class = "volver"><a href="listaMensajes.php">Volver al Listado</a></div>

    </div>

</body>