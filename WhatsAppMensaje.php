<?php
require_once ('vendor/autoload.php'); // if you use Composer
//require_once('ultramsg.class.php'); // if you download ultramsg.class.php
   /// ruta de los archivos con su carpeta
   $path_root=trim($_SERVER['DOCUMENT_ROOT']);
// URL PARA GUARDAR LAS IMAGENES.
    $url_ = "/EnviarCorreo/Archivos/";
    //For existing phone numbers: 
    $numero_telefono = "+50379516212";
    $texto = "Hola";
    echo "<a href=\https:\\whatsapp://send?phone=$numero_telefono&text=$texto\>Mensaje";
    //For non existing phone numbers: 
    echo "<a href=\https://api.whatsapp.com/send?phone=$numero_telefono&text=$texto\>Mensaje 2";


