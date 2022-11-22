<?php
	
	$numboletos = 20;
	
	require 'phpqrcode/qrlib.php';
	$dir = 'temp/';
	if(!file_exists($dir))
		mkdir($dir);
	
	for ($i=1; $i < $numboletos; $i++) { 
		echo "Irz0eWgI9j3jc12sGWHf_" . $i . "<br>";
		$filename = $dir.'Irz0eWgI9j3jc12sGWHf_'.$i.'.png';
		
		$tamanio = 10;
		$level = 'M';
		$frameSize = 1;
		$contenido = 'Irz0eWgI9j3jc12sGWHf_1';
	
		QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);
		
		echo '<img src="'.$filename.'" />';
	}
	?>

	<form action="doc/index.php">
	<label for="cantidad">Cantidad de Boletos</label>	
	<input type="number" name="numeroboletos" id="numeroboletos" placeholder="Ingrese cantidad de Boletos">
	<input type="submit" value="Procesar PDF" name="procesar" >
	</form>


