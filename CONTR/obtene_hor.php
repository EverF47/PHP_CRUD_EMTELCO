<?php
include '../MOL/conexion.php'; 

$fecha = $_POST['fecha'];

if (empty($fecha)) {
    echo 'Fecha no recibida';
    exit;
}
$result = $conexion->query("select * from horarios where fecha='$fecha' AND estado='disponible'");

if ($result->num_rows > 0) {
    $options = '';
    while ($horario = $result->fetch_object()) {
        $options .= "<option value='{$horario->id}'>{$horario->hora_inicio} - {$horario->hora_fin}</option>";
    }
    echo $options;
} else {
    echo 'No hay horarios disponibles';
}
?>
