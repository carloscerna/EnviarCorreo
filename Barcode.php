<?php
$path_root=trim($_SERVER['DOCUMENT_ROOT']);

include $path_root . '/EnviarCorreo/barcode/barcode.php';

$generador = new barcode_generator();
$format = "svg+xml";
$symbology = "qr";
//$data = "http://201.247.47.81/acomtus/login.php";
$data = "www.google.com";
$options = "";

/* Generate SVG markup and write to standard output. */
header('Content-Type: text/html');
header('Content-Type: image/svg+xml');

$svg = $generator->render_svg("qr", "HOla", "");
echo $svg;