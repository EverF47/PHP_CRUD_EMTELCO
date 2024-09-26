<?php

$conexion=new mysqli("localhost","root","","censo");
$conexion->set_charset("utf8");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$nombre_archivo = 'personas_exportadas.csv';


header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="' . $nombre_archivo . '"');


$output = fopen('php://output', 'w');

fputcsv($output, array('ID', 'DNI', 'NOMBRE', 'FECNAC', 'DIR', 'TFNO'));

$resultado = $conexion->query("SELECT * FROM tbl_personas");
if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        fputcsv($output, $fila);
    }
}

fclose($output);
exit();
?>
