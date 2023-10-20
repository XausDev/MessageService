<?php

include("validationFunc.inc.php");

$to = $_POST['to'];
$subject = $_POST['subject'];
$content = $_POST['content'];

if(!validateEmpty($to, $subject, $content)){
    echo "Todos los campos son obligatorios";
    exit;
}else{
    echo "El mensaje se ha enviado correctamente. ";
    if(!file_exists("./Mensajes".'/'.$to)){
        mkdir("./Mensajes");
        mkdir("./Mensajes".'/'.$to);
    }
}

$folder = "./Mensajes".'/'.$to; 

$filename = $folder.'/'.$to . '_' . date('d-m-Y_H:i:s') . '.txt'; 

$file = fopen($filename, 'w') or die ("Fichero no encontrado");

fwrite($file, "Para: " . $to . "\n");  
fwrite($file, "Asunto: " . $subject . "\n");
fwrite($file, "Contenido: " . $content);
fclose($file);

echo "Mensaje guardado en: " . $filename;

header("Location: index.php");