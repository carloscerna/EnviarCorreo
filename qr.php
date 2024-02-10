    <?php
    $path_root=trim($_SERVER['DOCUMENT_ROOT']);

    include 'phpqrcode/qrlib.php';
    $text = "192.168.0.101/EnviarCorreo/Archivos/Prueba-2026452645.pdf";
    $data = $path_root . "/EnviarCorreo/ImagenQr/" . "imagen.png";
    QRcode::png($text, $data);
 
   "<img src='$data' alt='Archivo' width='150px;' heigth='150px;'>"
    ?>
