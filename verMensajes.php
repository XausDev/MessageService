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

    $carpeta = $_POST["carpeta"];

    $ficheros = scandir($carpeta);//Devuelve un array con todos los ficheros y carpetas que se encuentran dentro del directorio

    foreach ($ficheros as $fichero):
        $contenido = fopen("$carpeta/$fichero","r");
        while(!feof($contenido)){ //Para salir del bucle usamos feof, indica cuando se ha acabado el fichero
            echo fgets($contenido); //Obtenemos linea a linea
            echo "</br>";
        }
        fclose ($contenido);
    endforeach;
    
?>
</body>