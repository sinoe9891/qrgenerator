<?php

$numboletos = 20;

require 'phpqrcode/qrlib.php';
$dir = 'temp/';
if (!file_exists($dir))
	mkdir($dir);
include 'inc/conexion.php';
include 'inc/functions.php';
// for ($i=1; $i < $numboletos; $i++) { 
// 	echo "Irz0eWgI9j3jc12sGWHf_" . $i . "<br>";
// 	$filename = $dir.'Irz0eWgI9j3jc12sGWHf_'.$i.'.png';

// 	$tamanio = 10;
// 	$level = 'M';
// 	$frameSize = 1;
// 	$contenido = 'Irz0eWgI9j3jc12sGWHf_1';

// 	QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);

// 	echo '<img src="'.$filename.'" />';
// }
?>

<form action="doc/index.php" target="_blank" method="post">
	<label for="first-name-column">Evento</label><br>
	<select class="form-select" name="evento" id="evento">
		<?php
		$obtenerTodo = obtenerTipo('eventos');
		if ($obtenerTodo->num_rows > 0) {
			while ($row = $obtenerTodo->fetch_assoc()) {
				$nombre_evento = $row['nombre_evento'];
				$id_evento = $row['id_evento'];

				echo '<option name="evento" value="' . $id_evento . '">' . $nombre_evento . '</option>';
			}
		}
		?>
	</select><br><br>
	<label for="cantidad">Cantidad de Boletos</label>
	<input type="number" style="width:200px" name="numeroboletos" id="numeroboletos" value="10" placeholder="Ingrese cantidad de Boletos"><br>
	<input type="number" style="width:200px" name="inicio" id="inicio" placeholder="Ingrese el inicio del código"><br>
	<input type="number" style="width:200px" name="fin" id="fin" placeholder="Ingrese el inicio del código"><br>
	<br><br>
	<label for="first-name-column">Evento</label><br>
	<select class="form-select" name="zona" id="zona">
		<?php
		$obtenerTodo = obtenerTipo('tipoacceso');
		if ($obtenerTodo->num_rows > 0) {
			while ($row = $obtenerTodo->fetch_assoc()) {
				$usuario_name = $row['nombreacceso'];
				$id_user = $row['id_tipoacceso'];

				echo '<option name="zona" value="' . $usuario_name . '">' . $usuario_name . '</option>';
			}
		}
		?>
	</select><br><br>
	<input type="submit" value="Procesar PDF" name="procesar">

	<a href="http://localhost/personales/BMT/codigo_qr/" target="_blank">Generar Otro Enlace</a>
</form>