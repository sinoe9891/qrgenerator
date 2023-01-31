<?php
date_default_timezone_set('America/Tegucigalpa');

require_once __DIR__ . '/vendor/autoload.php';
$html = '';
// var_dump($_POST);
// $stylesheet = file_get_contents('https://www.dafontfree.net/embed/Y3VybHotbXQtcmVndWxhciZkYXRhLzI0L2MvMTIwMzc0L0N1cmx6TVQudHRm');
if (isset($_POST['procesar'])) {
	if ($_POST['tipoboleto'] == 'banda') {
		$stylesheet = file_get_contents('css/style.css');
		
		
		require '../phpqrcode/qrlib.php';
		require '../inc/functions.php';
		
		$numboletos = $_POST['numeroboletos'];
		$zona = $_POST['zona'];
		$evento = $_POST['evento'];
		$inicio = $_POST['inicio'];
		$fin = $_POST['fin'];
		$contador = 1;
		$logo = '../img/logo.png';
		$logo_evento = '../img/logo_evento.png';
		// echo $evento;
		$obtenerTodo = obtenerEvento($evento);
		if ($obtenerTodo->num_rows > 0) {
			while ($row = $obtenerTodo->fetch_assoc()) {
				$nombre_evento = $row['nombre_evento'];
				$ruta_logo_evento = $row['ruta_logo_evento'];
				$id_evento = $row['id_evento'];
				echo $id_evento;
			}
		}
		// echo $ruta_logo_evento;
		
		$dir = '../temp/';
		if (!file_exists($dir))
		mkdir($dir);
		$contadornumeros = 0;
		for ($i = $inicio; $i <= $fin; $i++) {
			setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
			$contadornumeros++;
			echo $contadornumeros;
			// echo "Irz0eWgI9j3jc12sGWHf_" . $i . "<br>";
			$filename = $dir . 'Irz0eWgI9j3jc12sGWHf_' . $i . '.png';
			
			$tamanio = 10;
			$level = 'M';
			// $frameSize = 1;
			$contenido = '667izEOrhH98uGUVbSCJ_' . $i;
			$contenido1 = '667izEO_' . $i;
			
			QRcode::png($contenido, $filename, $level, $tamanio);
			
			// echo '<img src="' . $filename . '" />';
			$html .= '<table>
			<tr class="contenedor">
			<td class="fila">
			<span>
			<img class="logo" src="' . $logo . '" />
			</span>
			<span class="codigo">
			<img class="imagen" src="' . $filename . '" />
			</span>
			<span class="titulo">	
			<img class="imagen_logo" src="../' . $ruta_logo_evento . '" />
			</span>
			
			</td>
			<td class="fila">
			<span class="titulozona" style="margi-top:-30px;font-size: 30px;font-weight: 800;">' . $zona . '</span>	
			<span class="titulo">
			' . $contenido1 . '
			</span>
			</td>
			
			</tr>
			</table>';
			$contador++;
			// echo $contador;
			// $mpdf = new \Mpdf\Mpdf();
			$mpdf = new \Mpdf\Mpdf(['format' => [254, 254]]);
			$mpdf->WriteHTML($stylesheet, 1);
			if ($contadornumeros == 10) {
				$html .= '<p style="page-break-after:always;">';
				// $html .= "<pagebreak />";
				$contadornumeros = 0;
				// $mpdf->WriteHTML($html);
			} else {
			}
			// $mpdf->WriteHTML('<columns column-count="2" />');
			// $mpdf->WriteHTML($html1);
			// $mpdf->adjustFontDescLineheight = 1;
			// $mpdf->SetColumns(1);
			// $mpdf->SetMargins(0, 0, 0);
			$mpdf->AddPageByArray([
				'margin-left' => 0,
				'margin-right' => 0,
				'margin-top' => 0,
				'margin-bottom' => 0,
			]);
			
			$mpdf->autoPageBreak = true;
			$mpdf->WriteHTML($html);
			// if ($quiebre) {
				// 	$mpdf->WriteHTML('<columnbreak />');
				// }
				
				
				// $mpdf->Output("Zona $nombrezona .pdf", "I");
				$mpdf->Output("$inicio - $fin - Zona $zona .pdf", "F");
				// $mpdf->Output("Zona $nombrezona.pdf", "D");
			}
		} elseif ($_POST['tipoboleto'] == 'pequeno') {
			$stylesheet = file_get_contents('css/style_pequeno.css');
			require '../phpqrcode/qrlib.php';
			require '../inc/functions.php';
			
			$numboletos = $_POST['numeroboletos'];
			$zona = $_POST['zona'];
			$evento = $_POST['evento'];
			$inicio = $_POST['inicio'];
			$fin = $_POST['fin'];
			$contador = 1;
		$logo = '../img/logo.png';
		$logo_evento = '../img/logo_evento.png';
		// echo $evento;
		$obtenerTodo = obtenerEvento($evento);
		$htmlHeader = ' <div>'

		. '<div><center style="margin-top:-500px;margin-left:100.24px"><img src="img/fondo.jpg" width="100%" height="100%" /></center></div>'

		. '</div>';
		if ($obtenerTodo->num_rows > 0) {
			while ($row = $obtenerTodo->fetch_assoc()) {
				// $htmlHeader = '<center style="margin-top:-500px;margin-left:100.24px;border:1px solid red;height:1344px;"><img src="img/fondo.jpg" width="1344px;" style="margin:0;padding:0;border:1px solid red;"/></center>';
				$nombre_evento = $row['nombre_evento'];
				$ruta_logo_evento = $row['ruta_logo_evento'];
				$id_evento = $row['id_evento'];
				echo $id_evento;
			}
		}
		// echo $ruta_logo_evento;

		$dir = '../temp/';
		if (!file_exists($dir))
			mkdir($dir);
		$contadornumeros = 0;
		for ($i = $inicio; $i <= $fin; $i++) {
			setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
			$contadornumeros++;
			echo $contadornumeros;
			// echo "Irz0eWgI9j3jc12sGWHf_" . $i . "<br>";
			$filename = $dir . 'Irz0eWgI9j3jc12sGWHf_' . $i . '.png';

			$tamanio = 10;
			$level = 'M';
			// $frameSize = 1;
			$contenido = '667izEOrhH98uGUVbSCJ_' . $i;
			$contenido1 = '667izEO_' . $i;

			QRcode::png($contenido, $filename, $level, $tamanio);

			// echo '<img src="' . $filename . '" />';
			$html .= '<table>
					<tr class="contenedor">
						<td class="codo">
							<span class="codocontainer">
								<img class="logo" src="' . $logo . '" />
								<img class="imagen" src="' . $filename . '" />
								' . $contenido1 . '
							</span>
						</td>
						<td class="fila">
							<span class="titulozona" style="margi-top:-230px;font-size: 30px;font-weight: 800;">' . $zona . '</span>	
							<span class="titulo">
								' . $contenido1 . '
							</span>
						</td>

					</tr>
				</table>';
			$contador++;
			// echo $contador;
			// $mpdf = new \Mpdf\Mpdf();
			$mpdf = new \Mpdf\Mpdf(['format' => [137.16, 50.8]]);
			$mpdf->SetHTMLHeader($htmlHeader);
			$mpdf->WriteHTML($stylesheet, 1);
			// if ($contadornumeros == 10) {
			// 	$html .= '<p style="page-break-after:always;">';
			// 	// $html .= "<pagebreak />";
			// 	$contadornumeros = 0;
			// 	// $mpdf->WriteHTML($html);
			// } else {
			// }
			// $mpdf->WriteHTML('<columns column-count="2" />');
			// $mpdf->WriteHTML($html1);
			// $mpdf->adjustFontDescLineheight = 1;
			// $mpdf->SetColumns(1);
			// $mpdf->SetMargins(0, 0, 0);
			$mpdf->AddPageByArray([
				'margin-left' => 0,
				'margin-right' => 0,
				'margin-top' => 0,
				'margin-bottom' => 0,
			]);

			$mpdf->autoPageBreak = true;
			$mpdf->WriteHTML($html);
			// if ($quiebre) {
			// 	$mpdf->WriteHTML('<columnbreak />');
			// }


			$mpdf->Output("Zona $nombrezona .pdf", "I");
			// $mpdf->Output("$inicio - $fin - Zona $zona .pdf", "F");
			// $mpdf->Output("Zona $nombrezona.pdf", "D");
		}
	}
} elseif (isset($_POST['boletopequeno'])) {
	header('Location: ../index.php');
}
