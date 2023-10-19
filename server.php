<?php

/* EN MAC ----------------------- */


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
        mkdir("./Mensajes/".$to);
    }
}

$folder = "./Mensajes".'/'.$to; 

$filename = $folder.'/'.$to . '_' . date('d-m-Y_H:i:s') . '.txt'; 

$file = fopen($filename, 'w') or die ("Fichero no encontrado");

fwrite($file, "Para: " . $to . "\n");  
fwrite($file, "Asunto: " . $subject . "\n");
fwrite($file, "Contenido: " . $content . "\n");
fclose($file);
 
echo "Mensaje guardado en: " . $filename;

header("Location: index.php");


/* EN WINDOWS -----------------------

include("validationFunc.inc.php");

$to = $_POST['to'];
$subject = $_POST['subject'];
$content = $_POST['content'];

if(!validateEmpty($to, $subject, $content)){
    echo "Todos los campos son obligatorios";
    exit;
}else{
    if(!file_exists("Mensajes".DIRECTORY_SEPARATOR.$to)){
        mkdir("Mensajes".DIRECTORY_SEPARATOR);
        mkdir("Mensajes".DIRECTORY_SEPARATOR.$to);
    }
    echo "El mensaje se ha enviado correctamente. ";
}

$directorio = getcwd();

$folder = "Mensajes".DIRECTORY_SEPARATOR.$to;

$filename = $directorio.DIRECTORY_SEPARATOR.$folder.DIRECTORY_SEPARATOR.$to . '_' . date('d-m-Y_H:i:s') . '.txt';

echo "Directorio ".$directorio."----";
echo "Folder ".$folder."-----";
echo "Filename ".$filename."------";

$file = fopen($filename, 'w') or die ("Fichero no encontrado");

fwrite($file, "Para: " . $to . "\n");  
fwrite($file, "Asunto: " . $subject . "\n");
fwrite($file, "Contenido: " . $content . "\n");
fclose($file);
 
echo "Mensaje guardado en: " . $filename;

header("Location: index.php");*/
