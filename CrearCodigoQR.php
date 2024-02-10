<?php

// ruta de los archivos con su carpeta
    $path_root=trim($_SERVER['DOCUMENT_ROOT']);
// require qrcode
    require "vendor/autoload.php";

    use Endroid\QrCode\QrCode;
    use Endroid\QrCode\Writer\PngWriter;
    use Endroid\QrCode\Color\Color;
    use Endroid\QrCode\Label\Label;
    use Endroid\QrCode\Label\Alignment\LabelAlignmentLeft;
    use Endroid\QrCode\Logo\Logo;
    use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
    use Endroid\QrCode\Label\Font\Font;
// POST
    $textqr=$_POST['textqr'];//Recibo la variable pasada por post
    $sizeqr=$_POST['sizeqr'];//Recibo la variable pasada por post
//  label
    $label = Label::create("ACOMTUS, S.A. DE C.V.")
            ->setTextColor(new Color(255,0,0))
            ->setAlignment(new LabelAlignmentLeft)
            ;
            
// logo
   $logo = Logo::create("img/acomtus.png")
            ->setResizeToWidth(75)
            ;
// qr wirte y opciones.
    $qr_code = QrCode::create($textqr)
                ->setSize(200)
                ->setMargin(2)
                ->setForegroundColor(new Color(0,53,250))
                ->setBackgroundColor(new Color(255,255,255))
                ->setErrorCorrectionLevel(new ErrorCorrectionLevelHigh)
                ;
//
    $writer = new PngWriter;
    $result = $writer->write($qr_code, $logo, $label);
//  guardar Qr-Code.
    $result->saveToFile("img/logo.png");
//  header
    header("Content-Type: " . $result->getMimeType());
//  resultado.
    $imageData = base64_encode($result->getString());//Codifico la imagen usando base64_encode
//  enviar datos.
    echo '<img src="data:image/png;base64,'.$imageData.'">';
