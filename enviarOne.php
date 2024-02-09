<?php   
   /// ruta de los archivos con su carpeta
   $path_root=trim($_SERVER['DOCUMENT_ROOT']);
// URL PARA GUARDAR LAS IMAGENES.
    $url_ = "/EnviarCorreo/Archivos/";
    $url_img = "/EnviarCorreo/img/logo_cerz.png";
    $SistemaSiscarad = "C:/wamp64/www/siscarad/public/img/fotos/";
    $url_respaldo_fotos = "d:/registro_academico/img/fotos/";
    $random = rand();
// cambiar a utf-8.
    header("Content-Type: text/html; charset=UTF-8");
//
    //Capturo los datos enviados por POST desde el formulario
    $email               = $_REQUEST["email"]; 
    $nombreCompleto      = $_REQUEST["nombre"];
//

if (move_uploaded_file($_FILES["file"]["tmp_name"], $path_root . $url_ .$_FILES['file']['name'])) {
    // Capturar nombre temporal.
        $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $nombreArchivo = "Prueba-".$random.".".$extension;
    //  renombrar archivo y la ubicación por defecto.
        rename($path_root.$url_.$_FILES['file']['name'],$path_root.$url_.$nombreArchivo);
} 
// ARMAR EL BODY
    $contenidoBody = "<img src='img/logo_cerz.png' height='90' width='340' alt='PHPMailer rocks'>";
    $body2 = $contenidoBody;
//
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//
require 'vendor/autoload.php';
//
$mail = new PHPMailer(true);
//
try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'carlos.wilfredo.cerna@clases.edu.sv';
    $mail->Password = 'Sebastian019789132';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Destinatarios
    $mail->setFrom('carlos.wilfredo.cerna@clases.edu.sv', 'Carlos Cerna');
    $mail->addAddress($email, 'Destinatario YonYon');

    // Contenido
    $mail->isHTML(true);
    $mail->Subject = mb_convert_encoding('Boleta de Calificación',"ISO-8859-1","UTF-8");
    $mail->Body    = mb_convert_encoding('Enviado por Registro Académico.',"ISO-8859-1","UTF-8");
    $mail->AltBody = 'Enviado por Registro Académico.';
    // Agregar ARchivo Adjunto.
    $mail->AddAttachment($path_root.$url_.$nombreArchivo);
    $mail->AddAttachment($path_root.$url_img);
    // Eviar correo.
    $mail->send();
    echo "El mensaje ha sido enviado al @mail: $email a nombre de: $nombreCompleto";
    echo "<br>";
    echo "../EnviarCorreo/Archivos/".$nombreArchivo;
} catch (Exception $e) {
    echo 'El mensaje no se pudo enviar. Error: ', $mail->ErrorInfo;
}

?>