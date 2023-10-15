<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Práctica UF1 M06</title>
    
</head>
<body>
    <?php
        $directorioMensajes = "Mensajes";
        $carpetas = array_filter(glob($directorioMensajes."/*"),"is_dir");
    ?>

    <div class="titulo"><h1>Listado de Destinatarios</h1></div>

    <?php foreach($carpetas as $carpeta): ?>

        <form class="formLista" action="verMensajes.php" method="POST">
            <button name="carpeta" value="<?php echo $carpeta; ?>">
                <?php echo basename($carpeta); ?> 
            </button>
        </form>

    <?php endforeach; ?>

    

    

</body>