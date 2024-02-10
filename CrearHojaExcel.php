<?php
//Fecha actual
date_default_timezone_set('GMT');
$fecha= date("d-M-Y");

//Composer
require __DIR__ . "/vendor/autoload.php";

//Librerias
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Style;

//Crear un nuevo archivo
$spreadsheet = new Spreadsheet();

//Propiedades del archivo
$spreadsheet->getProperties()->setCreator('Sistemas')
    ->setTitle('Reporte de Herramientas Blaster')
    ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.');

//Informacion de la campaña
$spreadsheet->setActiveSheetIndex(0);
$spreadsheet->getActiveSheet()
    ->setTitle('Resumen')
    ->setCellValue('A1', 'Reporte de Herramientas Blaster')
    ->setCellValue('A2', $fecha)
    ->setCellValue('A3', 'Campaña Isla 5');

 $spreadsheet->getActiveSheet()->getStyle('A1:A3')->getFont()->setBold(true)->setSize(18);

//Encabezados del resumen
$spreadsheet->getActiveSheet()
    ->mergeCells('C5:L5')
    ->mergeCells('C6:D6')
    ->mergeCells('E6:I6')
    ->mergeCells('J6:L6')
    ->setCellValue('C5', 'RESUMEN DE LA CAMPAÑA ISLA 5')
    ->setCellValue('C6', 'IDENTIFICADORES')
    ->setCellValue('E6', 'FECHAS')
    ->setCellValue('J6', 'METRICAS POR HORA')
    ->setCellValue('C7', 'ID de Campaña')
    ->setCellValue('D7', 'Nombre de Campaña')
    ->setCellValue('E7', 'Hora de Inicio')
    ->setCellValue('F7', 'Hora Fin')
    ->setCellValue('G7', 'Primer Llamada')
    ->setCellValue('H7', 'Ultima Llamada')
    ->setCellValue('I7', 'Telefono de Contacto')
    ->setCellValue('J7', 'Total de Creditos')
    ->setCellValue('K7', 'Telefonos Programadas')
    ->setCellValue('L7', 'Llamadas Exitosas');

$spreadsheet->getActiveSheet()->getStyle('C5:L5')->getFont()->setBold(true)->setSize(20);
$spreadsheet->getActiveSheet()->getStyle('C6:L6')->getFont()->setBold(true)->setSize(12);
$spreadsheet->getActiveSheet()->getStyle('C5:L5')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('C6:D6')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('E6:I6')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('J6:L6')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getStyle('C7')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('D7')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('E7')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('F7')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('G7')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('H7')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('I7')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('J7')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('K7')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('L7')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('C5:L7')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('9FD5D1');
$spreadsheet->getActiveSheet()->getStyle('C5:L7')->getFont()->getColor()->setRGB('FFFFFF');

//Datos de la base
while ($row=mysqli_fetch_array($consulta)) {
$spreadsheet->getActiveSheet()
    ->setCellValue('C'.$fila, $row['Id_Campana'])
    ->setCellValue('D'.$fila, $row['Campana'])
    ->setCellValue('E'.$fila, $row['Hora_Inicio'])
    ->setCellValue('F'.$fila, $row['Hora_Fin'])
    ->setCellValue('G'.$fila, $row['PrimerLlamada'])
    ->setCellValue('H'.$fila, $row['UltimaLlamada'])
    ->setCellValue('I'.$fila, $row['CallerId'])
    ->setCellValue('J'.$fila, $row['TotalCredito'])
    ->setCellValue('K'.$fila, $row['TotalTelefono'])
    ->setCellValue('L'.$fila, $row['LlamadasExitosas']);

$spreadsheet->getActiveSheet()->getStyle('C'.$fila.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('D'.$fila.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('E'.$fila.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('F'.$fila.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('G'.$fila.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('H'.$fila.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('I'.$fila.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('J'.$fila.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('K'.$fila.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('L'.$fila.'')->getAlignment()->setHorizontal('center');
$fila++;
}
$fila1 = $fila + 1;
$fila2 = $fila1 + 1;
$fila3 = $fila2 + 1;

//Encabezados Formulas
$spreadsheet->getActiveSheet()
    ->mergeCells('C'.$fila1.':L'.$fila1.'')
    ->mergeCells('C'.$fila2.':D'.$fila2.'')
    ->mergeCells('E'.$fila2.':F'.$fila2.'')
    ->mergeCells('G'.$fila2.':H'.$fila2.'')
    ->mergeCells('I'.$fila2.':J'.$fila2.'')
    ->mergeCells('K'.$fila2.':L'.$fila2.'')
    ->setCellValue('C'.$fila1.'', 'METRICAS TOTALES')
    ->setCellValue('C'.$fila2.'', 'Total de Campañas')
    ->setCellValue('E'.$fila2.'', 'Total de Creditos')
    ->setCellValue('G'.$fila2.'', 'Total de Telefonos')
    ->setCellValue('I'.$fila2.'', 'Llamadas Exitosas')
    ->setCellValue('K'.$fila2.'', 'Llamadas Fallidas');

$spreadsheet->getActiveSheet()->getStyle('C'.$fila1.':L'.$fila1.'')->getFont()->setBold(true)->setSize(12);
$spreadsheet->getActiveSheet()->getStyle('C'.$fila1.':L'.$fila1.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('C'.$fila2.':D'.$fila2.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('E'.$fila2.':F'.$fila2.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('G'.$fila2.':H'.$fila2.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('I'.$fila2.':J'.$fila2.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('K'.$fila2.':L'.$fila2.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('C'.$fila1.':L'.$fila2.'')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('9FD5D1');
$spreadsheet->getActiveSheet()->getStyle('C'.$fila1.':L'.$fila2.'')->getFont()->getColor()->setRGB('FFFFFF');

//Formulas
$fila4 = $fila - 1;
$spreadsheet->getActiveSheet()
    ->mergeCells('C'.$fila3.':D'.$fila3.'')
    ->mergeCells('E'.$fila3.':F'.$fila3.'')
    ->mergeCells('G'.$fila3.':H'.$fila3.'')
    ->mergeCells('I'.$fila3.':J'.$fila3.'')
    ->mergeCells('K'.$fila3.':L'.$fila3.'')
    ->setCellValue('C'.$fila3.'', '=COUNTA(C8:C'.$fila4.')')
    ->setCellValue('E'.$fila3.'', '=SUMPRODUCT(J8:J'.$fila4.')')
    ->setCellValue('G'.$fila3.'', '=SUMPRODUCT(K8:K'.$fila4.')')
    ->setCellValue('I'.$fila3.'', '=SUMPRODUCT(L8:L'.$fila4.')')
    ->setCellValue('K'.$fila3.'', '=(G'.$fila3.'- I'.$fila3.')');

$spreadsheet->getActiveSheet()->getStyle('C'.$fila3.':D'.$fila3.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('E'.$fila3.':F'.$fila3.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('G'.$fila3.':H'.$fila3.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('I'.$fila3.':J'.$fila3.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('K'.$fila3.':L'.$fila3.'')->getAlignment()->setHorizontal('center');

//HOJA DE DETALLE
//Envabezados
$spreadsheet->createSheet();
$spreadsheet->setActiveSheetIndex(1);
$spreadsheet->getActiveSheet()
    ->setTitle('Detalle')
    ->setCellValue('A1', 'ID Campaña')
    ->setCellValue('B1', 'Nombre de la Campaña')
    ->setCellValue('C1', 'Fecha de Registro')
    ->setCellValue('D1', 'Fecha Inicio')
    ->setCellValue('E1', 'Fecha Fin')
    ->setCellValue('F1', 'Hora Inicio')
    ->setCellValue('G1', 'Hora Fin')
    ->setCellValue('H1', 'Telefono de Contacto')
    ->setCellValue('I1', 'ID Credito')
    ->setCellValue('J1', 'Telefono')
    ->setCellValue('K1', 'Primer Llamada')
    ->setCellValue('L1', 'Ultima Llamada')
    ->setCellValue('M1', 'Llamadas Exitosas');

$spreadsheet->getActiveSheet()->getStyle('A1:M1')->getFont()->setBold(true)->setSize(12);
$spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
$spreadsheet->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('B1')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('C1')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('D1')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('E1')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('F1')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('G1')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('H1')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('I1')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('J1')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('K1')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('L1')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('M1')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('A1:M1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('9FD5D1');
$spreadsheet->getActiveSheet()->getStyle('A1:M1')->getFont()->getColor()->setRGB('FFFFFF');
$spreadsheet->getActiveSheet()->freezePane('A2');

//Impresion de datos desde la base
while ($row1=mysqli_fetch_array($consulta1)) {
$spreadsheet->getActiveSheet()
    ->setCellValue('A'.$fila5, $row1['Id_Campana'])
    ->setCellValue('B'.$fila5, $row1['Campana'])
    ->setCellValue('C'.$fila5, $row1['Fecha_Registro'])
    ->setCellValue('D'.$fila5, $row1['Fecha_Inicio'])
    ->setCellValue('E'.$fila5, $row1['Fecha_Fin'])
    ->setCellValue('F'.$fila5, $row1['Hora_Inicio'])
    ->setCellValue('G'.$fila5, $row1['Hora_Fin'])
    ->setCellValue('H'.$fila5, $row1['CallerId'])
    ->setCellValue('I'.$fila5, $row1['Id_Credito'])
    ->setCellValue('J'.$fila5, $row1['Telefono'])
    ->setCellValue('K'.$fila5, $row1['PrimerLlamada'])
    ->setCellValue('L'.$fila5, $row1['UltimaLlamada'])
    ->setCellValue('M'.$fila5, $row1['LlamadasExitosas']);

$spreadsheet->getActiveSheet()->getStyle('A'.$fila5.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('B'.$fila5.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('C'.$fila5.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('D'.$fila5.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('E'.$fila5.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('F'.$fila5.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('G'.$fila5.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('H'.$fila5.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('I'.$fila5.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('J'.$fila5.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('K'.$fila5.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('L'.$fila5.'')->getAlignment()->setHorizontal('center');
$spreadsheet->getActiveSheet()->getStyle('M'.$fila5.'')->getAlignment()->setHorizontal('center');
$fila5++;
}

//Generar archivo Excel
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Reporte Blaster Isla 5.xlsx"');
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');



/*Congelar fila1
$spreadsheet->getActiveSheet()->freezePane('A2');
*/
?>