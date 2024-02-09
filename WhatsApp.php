<?php
require_once ('vendor/autoload.php'); // if you use Composer
//require_once('ultramsg.class.php'); // if you download ultramsg.class.php
   /// ruta de los archivos con su carpeta
   $path_root=trim($_SERVER['DOCUMENT_ROOT']);
// URL PARA GUARDAR LAS IMAGENES.
    $url_ = "/EnviarCorreo/Archivos/";
/////////// 
$path=$path_root . $url_ . "Prueba-587165905.pdf";
//$data = file_get_contents($path);
//Encodes data base64
//$img_base64 =  base64_encode($data);  
//urlencode — URL-encodes string  
//$img_base64 =urlencode($img_base64);
////////////
$imagedata = file_get_contents($path);
             // alternatively specify an URL, if PHP settings allow
$base64 = base64_encode($imagedata);

$ultramsg_token="lms42w51dgx3dvpm"; // Ultramsg.com token
$instance_id="instance75322"; // Ultramsg.com instance id
$client = new UltraMsg\WhatsAppApi($ultramsg_token,$instance_id);

$to="+50379516212"; 
$filename="Archivos/Prueba-587165905.pdf"; 
$caption="Documento"; 
$document= $base64; 
$api=$client->sendDocumentMessage($to,$filename,$document,$caption);
var_dump($api);


