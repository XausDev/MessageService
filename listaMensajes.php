<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Listado Mensajes</title>
    
</head>
<body>

    <?php //Si existe la variable de SESSION "carpeta_seleccionada" mostrará esta
    session_start();
    if(isset($_SESSION['carpeta_seleccionada'])){
        $carpeta = $_SESSION['carpeta_seleccionada'];
        header("Location: verMensajes.php?id={$_POST["carpeta_selecionada"]}");//Vamos a la pagina "verMensajes" con la carpeta seleccionada
        exit;
    }
    ?>

    <div class ="fondo">

        <div class="titulo"><h1>Listado de Destinatarios</h1></div>
        
        <?php
            $directorioMensajes = "Mensajes";
            $carpetas = array_filter(glob($directorioMensajes."/*"),"is_dir");

        if(empty($carpetas)) {  ?>
                <h3><?php echo "No hay chats activos";?></h3>
        <?php
        } else {
                
            foreach($carpetas as $carpeta): ?>

            <form class="formLista" action="verMensajes.php" method="POST">
                <button name="carpeta" value="<?php echo $carpeta; ?>">
                    <?php echo basename($carpeta); ?> 
                </button>
            </form>
        <?php endforeach; 
        } 
        ?>
        
        <div class = "volver"><a href="index.php">Volver al Inicio</a></div>

    </div>

</body>