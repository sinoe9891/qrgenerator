<?php

$numboletos = 20;

require 'phpqrcode/qrlib.php';
$dir = 'temp/';
$pdfs = 'generados/';
$carpeta1 = glob('temp/*');
if (!file_exists($dir) || !file_exists($pdfs)) {
	mkdir($dir);
	mkdir($pdfs);
} else {
	foreach ($carpeta1 as $archivo) {
		if (is_file($archivo))      // Comprobamos que sean ficheros normales, y de ser asi los eliminamos en la siguiente linea
			unlink($archivo);          //Eliminamos el archivo
	}
}
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

// }
?>

<form action="doc/index.php" target="_blank" method="post">
	<label for="first-name-column">Evento</label><br>
	<select class="form-select" name="evento" id="nombreevento" onchange="mi_busqueda();">
		<option name="evento" value="">Seleccionar Evento</option>
		<?php
		$obtenerEventosactivos = obtenerEventosactivos('eventos');
		$obtenerTodo1 = obtenerTipo('eventos');
		if ($obtenerEventosactivos->num_rows > 0) {
			while ($row = $obtenerEventosactivos->fetch_assoc()) {
				$nombre_evento = $row['nombre_evento'];
				$id_evento = $row['id_evento'];
				echo '<option name="evento" value="' . $id_evento . '">' . $nombre_evento . '</option>';
			}
		}
		?>
	</select>
	<?php

	// while ($row1 = $obtenerTodo1->fetch_assoc()) {
	// 	$logoevento = $row1['ruta_logo_evento'];
	// 	echo '<img width="50px" src="' . $logoevento . '" />';
	// }
	?>
	<br><br>




	<label for="cantidad">Rango de Boletos</label><br>
	<!-- <input type="number" style="width:200px" name="numeroboletos" id="numeroboletos" value="10" placeholder="Ingrese cantidad de Boletos"><br> -->
	<input type="number" style="width:200px" name="inicio" id="inicio" placeholder="Ingrese el inicio del código" required><br>
	<input type="number" style="width:200px" name="fin" id="fin" placeholder="Ingrese el fin del código" required><br>
	<br><br>
	<label for="first-name-column">Tipo de Boleto</label><br>



	<select class="form-select" name="zona" id="zona" required>
		<option value="" id="temporalselect">Esperando Evento</option>

	</select>


	<br><br>
	<div class="botones">
		<label for="first-name-column">Tipo de Impresión</label><br>
		<label for="">Boleto Pequeño (2"x4.5")</label>
		<input type="radio" name="tipoboleto" id="" value="pequeno" checked>
		<label for="">Bandas</label>
		<input type="radio" name="tipoboleto" id="" value="banda">
	</div>
	<input type="submit" value="Procesar PDF" name="procesar">

	<a href="http://localhost/personales/BMT/codigo_qr/" target="_blank">Generar Otro Enlace</a>
</form>


<script>
	function mi_busqueda() {
		buscar = document.getElementById('nombreevento').value;
		temporalselect = document.getElementById('temporalselect');

		var parametros = {
			"mi_busqueda": buscar,
			"accion": "4"
		};

		if (temporalselect) {
			temporalselect.style.display = "none";
		}

		$.ajax({
			data: parametros,
			url: 'inc/models/model-autocomplete.php',
			type: 'POST',

			beforesend: function() {
				$('#zona').html("Mensaje antes de Enviar");
			},

			success: function(mensaje) {
				$('#zona').html(mensaje);
				console.log(mensaje);
			}
		});

	}
</script>
<script src="assets/autocomplate/jquery-3.4.1.min.js"></script>