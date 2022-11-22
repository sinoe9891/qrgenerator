<?php
date_default_timezone_set('America/Tegucigalpa');

require_once __DIR__ . '/vendor/autoload.php';
$html = '';
$stylesheet = file_get_contents('css/style.css');
// $stylesheet = file_get_contents('https://www.dafontfree.net/embed/Y3VybHotbXQtcmVndWxhciZkYXRhLzI0L2MvMTIwMzc0L0N1cmx6TVQudHRm');
if (isset($_GET['procesar'])) {
	$numboletos = $_GET['numeroboletos'];

	$contador = 1;
	$logo = '../img/logo.png';
	require '../phpqrcode/qrlib.php';
	$dir = '../temp/';
	if (!file_exists($dir))
		mkdir($dir);

	for ($i = 1; $i <= $numboletos; $i++) {
		setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');

		echo "Irz0eWgI9j3jc12sGWHf_" . $i . "<br>";
		$filename = $dir . 'Irz0eWgI9j3jc12sGWHf_' . $i . '.png';

		$tamanio = 10;
		$level = 'M';
		// $frameSize = 1;
		$contenido = 'Irz0eWgI9j3jc12sGWHf_'.$i;

		QRcode::png($contenido, $filename, $level, $tamanio);

		echo '<img src="' . $filename . '" />';




		$html .= '<table>
					<tr class="contenedor">
						<td class="fila">
							<span>
								<img class="logo" src="' . $logo . '" />
							</span>
							<span class="titulo">	
								Título del Evento Título
							</span>
							<span class="codigo">
								<img class="imagen" src="' . $filename . '" />
							</span>
						</td>
					</tr>
				</table>';

		$contador++;
	}

	try {
		// $mpdf = new \Mpdf\Mpdf();
		$mpdf = new \Mpdf\Mpdf(['format' => [254, 254]]);
		$mpdf->WriteHTML($stylesheet, 1);
		$mpdf->WriteHTML('<columns column-count="2" />');
		// $mpdf->WriteHTML($html1);
		// $mpdf->adjustFontDescLineheight = 1;
		$mpdf->SetColumns(1);
		// $mpdf->SetMargins(45, 45, 0);
		$mpdf->AddPageByArray([
			'margin-left' => 0,
			'margin-right' => 0,
			'margin-top' => 0,
			'margin-bottom' => 0,
		]);

		// $mpdf->autoPageBreak = false;
		$mpdf->WriteHTML($html);
		// if ($quiebre) {
		// 	$mpdf->WriteHTML('<columnbreak />');
		// }


		$mpdf->Output("Evento .pdf", "I");
		// $mpdf->Output("Evento .pdf", "F");
		// $mpdf->Output("Evento .pdf", "D");
	} catch (\Mpdf\MpdfException $e) { // Note: safer fully qualified exception 
		//       name used for catch
		// Process the exception, log, print etc.
		echo $e->getMessage();
	}
}
