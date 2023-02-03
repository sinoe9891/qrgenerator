<?php
date_default_timezone_set('America/Tegucigalpa');

	function obtenerTipo($id = null) {
		include 'conexion.php';
		try {
			return $conn->query("SELECT * FROM tipoacceso WHERE evento_id = {$id}");

		} catch(Exception $e) {
			echo "Error! : " . $e->getMessage();
			return false;
		}
	};
	function obtenerEventosactivos($tabla = null) {
		include 'conexion.php';
		try {
			return $conn->query("SELECT * FROM {$tabla} WHERE estado = 'activo'");

		} catch(Exception $e) {
			echo "Error! : " . $e->getMessage();
			return false;
		}
	};
	function obtenerTodo($tabla = null) {
		include 'conexion.php';
		try {
			return $conn->query("SELECT * FROM {$tabla}  order by creado desc");

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
	function obtenerEventoPrecio($id = null, $boleto = null) {
		include 'conexion.php';
		try {
			return $conn->query("SELECT * FROM eventos a, tipoacceso b, precios c WHERE a.id_evento = {$id} and b.id_tipoacceso = {$boleto} and c.id_tipoboleto = {$boleto};");

		} catch(Exception $e) {
			echo "Error! : " . $e->getMessage();
			return false;
		}
	};
