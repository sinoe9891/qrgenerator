<?php
include '../conexion.php';
include '../functions.php';

if ($_POST['mi_busqueda'] != "") {
	$mi_busqueda = $_POST['mi_busqueda'];
	$obtenerTodo = obtenerTipo($mi_busqueda);
	if ($obtenerTodo->num_rows > 0) {
		echo '<option value="">Seleccionar Tipo</option>';
		while ($row = $obtenerTodo->fetch_assoc()) {
			$nombre_localidad = $row['nombreacceso'];
			$id_boleto = $row['id_tipoacceso'];
			echo '<option name="zona" value="' . $id_boleto . '">' . $nombre_localidad . '</option>';
		}
	}
}