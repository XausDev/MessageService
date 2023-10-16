
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Formulario de envio de mensaje</title>
    
</head>
<body>
    <form class="fondo" name='Formulario' action='server.php' method='post'>
    <div><h2>Envia tu mensaje</h2></div>
        <div>
            <label for="to">Para:</label>
            <input type="text" id="to" name="to">
        </div>

        <div>  
            <label for="subject">Asunto:</label>
            <input type="text" id="subject" name="subject">
        </div>

        <div>
            <label for="content">Contenido:</label>      
            <textarea id="content" name="content"></textarea>
        </div>
        <button type='submit' name='send'>Enviar</button>
    
    </form>
</body>
</html>