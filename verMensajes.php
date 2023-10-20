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
        <form method='post'>
            <input class = "volver" type='submit' name='volverIndex' value = 'Volver al Inicio'></input>
            <input class = "volver" type='submit' name='volverLista' value = 'Volver al Listado'></input>
        </form>

        <?php

        $volverIndex = $_POST['volverIndex'];
        $volverLista = $_POST['volverLista'];

        if(isset($volverIndex)){ ?>
            <a href="index.php">Volver al Inicio</a>
        <?php
        }

        if(isset ($volverLista)){?>
            <a href="listaMensajes.php">Volver al Listado</a>
            <?php
            session_unset(); //Borrar variables
            session_destroy(); //Borrar sesion
        }

        ?>

    </div>

</body>