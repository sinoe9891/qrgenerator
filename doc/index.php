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
				// echo $id_evento;
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
			$codigoqr = $dir . 'Irz0eWgI9j3jc12sGWHf_' . $i . '.png';

			$tamanio = 10;
			$level = 'M';
			// $frameSize = 1;
			$contenido = '667izEOrhH98uGUVbSCJ_' . $i;
			$id_codigo = '667izEO_' . $i;

			QRcode::png($contenido, $codigoqr, $level, $tamanio);

			// echo '<img src="' . $codigoqr . '" />';
			$html .= '<table>
			<tr class="contenedor">
			<td class="fila">
			<span>
			<img class="logo" src="' . $logo . '" />
			</span>
			<span class="codigo">
			<img class="imagen" src="' . $codigoqr . '" />
			</span>
			<span class="titulo">	
			<img class="imagen_logo" src="../' . $ruta_logo_evento . '" />
			</span>
			
			</td>
			<td class="fila">
			<span class="titulozona" style="margi-top:-30px;font-size: 30px;font-weight: 800;">' . $zona . '</span>	
			<span class="titulo">
			' . $id_codigo . '
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
		require '../inc/conexion.php';

		$numboletos = $_POST['numeroboletos'];
		$zona = $_POST['zona'];
		$evento = $_POST['evento'];
		$inicio = $_POST['inicio'];
		$fin = $_POST['fin'];
		$contador = 1;
		$logo = '../img/logo.png';
		$logo_evento = '../img/logo_evento.png';
		// echo $evento;
		$obtenerTodo = $conn->query("SELECT * FROM eventos a, tipoacceso b, precios c WHERE a.id_evento = '{$evento}' and b.id_tipoacceso = '{$zona}' and c.id_tipoboleto = '{$zona}';");
		$htmlHeader = ' <div style="margin:0;padding:0;">'

			. '<div style="margin:0;padding:0;"><center style="padding:0;height:400px;margin-top:-500px;margin-left:75px;"><img style="" src="img/fondo.jpg" width="100%" height="100%" /></center></div>'

			. '</div>';
		if ($obtenerTodo->num_rows > 0) {
			while ($row = $obtenerTodo->fetch_assoc()) {
				// $htmlHeader = '<center style="margin-top:-500px;margin-left:100.24px;border:1px solid red;height:1344px;"><img src="img/fondo.jpg" width="1344px;" style="margin:0;padding:0;border:1px solid red;"/></center>';
				$nombre_evento = $row['nombre_evento'];
				$ruta_logo_evento = $row['ruta_logo_evento'];
				$id_evento = $row['id_evento'];
				$precio = $row['precio'];
				$nombre_acceso = $row['nombreacceso'];
				$id_evento_fb = $row['id_evento_fb'];
				// echo $nombre_acceso;
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
			// echo $contadornumeros;
			// echo "Irz0eWgI9j3jc12sGWHf_" . $i . "<br>";
			$codigoqr = $dir . $id_evento_fb . '_' . $i . '.png';
			echo $codigoqr;
			$tamanio = 10;
			$level = 'M';
			// $frameSize = 1;
			$codigocorto = substr($id_evento_fb, 0, -13);
			$contenido =  $codigocorto . '_' . $i;
			echo $contenido;


			$id_codigo = $codigocorto . '_' . $i;

			QRcode::png($contenido, $codigoqr, $level, $tamanio);

			// echo '<img src="' . $codigoqr . '" />';
			$html .= '<table>
					<tr class="contenedor">
						<td class="codo">
							<span class="codocontainer">
							<img class="logo_evento" src="../' . $ruta_logo_evento . '" />
							<img class="imagen" src="' . $codigoqr . '" />
							<span class="titulozona" style="margi-top:-430px;font-size: 10px;font-weight: 800;">' . $nombre_acceso . '</span>
							<span class="titulozona" style="margi-top:-430px;font-size: 10px;font-weight: 800;text-align: center;">' . $id_codigo . '</span>
							</span>
						</td>
						<td class="fila2" >
							<img style="margi-top:130px;" class="imagen" src="' . $codigoqr . '" />
						</td>
						<td class="fila">
								<p class="precio" style="font-size: 15px;font-weight: 800;">L. ' . $precio . '</p>	
								<p class="titulozona" style="margi-top:-430px;font-size: 20px;font-weight: 800;">' . $nombre_acceso . '</p>	
														
								<span class="titulo">
									' . $id_codigo . '
								</span>
						</td>

					</tr>
				</table>';
			$contador++;
			// echo $contador;
			// $mpdf = new \Mpdf\Mpdf();
			$mpdf = new \Mpdf\Mpdf([
				'format' => [137.16, 50.8],
				'margin_left' => 5,
				'margin_right' => 0,
				'margin_top' => 55,
				'margin_bottom' => 10,
				'margin_header' => 0,
				'margin_footer' => 0
			]);
			$mpdf->SetHTMLHeader($htmlHeader);
			$mpdf->WriteHTML($stylesheet, 1);

			$mpdf->AddPageByArray([
				'margin-left' => 0,
				'margin-right' => 0,
				'margin-top' => 0,
				'margin-bottom' => 0,
			]);

			$mpdf->SetDisplayMode('fullpage');
			$mpdf->autoPageBreak = true;
			$mpdf->WriteHTML($html);
			// if ($quiebre) {
			// 	$mpdf->WriteHTML('<columnbreak />');
			// }


			// $mpdf->Output("Zona $nombrezona .pdf", "I");
			$mpdf->Output("$inicio - $fin - Zona $nombre_acceso.pdf", "F");
			header('Location:'. $inicio.' - '.$fin.' - Zona ' . $nombre_acceso .'.pdf');
			// $mpdf->Output("$inicio - $fin - Zona $nombre_acceso .pdf", "D");
		}
	}
} elseif (isset($_POST['boletopequeno'])) {
	header('Location: ../index.php');
}
