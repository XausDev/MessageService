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

    <div class="titulo"><h1>Listado de Chats</h1></div>

        <?php
       

            if($_POST["carpeta"]){ //Si se selecciona una carpeta se guarda en la variable de SESSION
                $_SESSION["carpeta_seleccionada"] = $_POST["carpeta"];
            }


            $carpeta = $_SESSION["carpeta_seleccionada"];

            $ficheros = scandir($carpeta);
            //Devuelve un array con todos los ficheros y carpetas que se encuentran dentro del directorio
           
            foreach ($ficheros as $fichero): ?>
                
                    <?php
                    $contenido = fopen("$carpeta/$fichero","r");
                    
                    if(($fichero != ".")&&($fichero != "..")){
                    ?>
                    <div class="mensajesChat">
                        <div class = "fechaChat">
                        <?php
                        $fecha = explode("_",$fichero);
                        echo $fecha[1];
                        echo "  ";
                        $fechahora = explode(".",$fecha[2]);
                        echo $fechahora[0];
                        ?>
                        </div>
                            <?php while(!feof($contenido)){
                                //Para salir del bucle usamos feof, indica cuando se ha acabado el fichero
                                echo fgets($contenido); //Obtenemos linea a linea
                                echo "</br>";
                            }
                            ?>
                        </div>
                    <?php 
                    }
                    fclose ($contenido);
            endforeach;
        ?>
        <form method='post'>
            <input class = "volverChat" type='submit' name='volverIndex' value = 'Volver al Inicio'></input>
            <input class = "volverChat" type='submit' name='volverLista' value = 'Volver al Listado'></input>
        </form>

        <?php

        $volverIndex = $_POST['volverIndex'];
        $volverLista = $_POST['volverLista'];


        if(isset($volverIndex)){
            header("Location: index.php");
        }

        if(isset ($volverLista)){
            session_unset(); //Borrar variables
            header("Location: listaMensajes.php");
        }

        ?>

    </div>

</body>