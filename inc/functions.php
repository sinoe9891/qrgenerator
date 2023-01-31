<?php
date_default_timezone_set('America/Tegucigalpa');

	function obtenerTipo($tabla = null) {
		include 'conexion.php';
		try {
			return $conn->query("SELECT * FROM {$tabla}");

		} catch(Exception $e) {
			echo "Error! : " . $e->getMessage();
			return false;
		}
	};
	function obtenerEvento($id = null) {
		include 'conexion.php';
		try {
			return $conn->query("SELECT * FROM eventos WHERE id_evento = {$id}");

		} catch(Exception $e) {
			echo "Error! : " . $e->getMessage();
			return false;
		}
	};
