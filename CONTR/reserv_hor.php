<?php
include '../MOL/conexion.php';

$horario_id = $_POST['hora']; 

echo "ID del horario seleccionado: $horario_id <br>";

$sql = $conexion->query("UPDATE horarios SET estado = 'ocupado' WHERE id = '$horario_id'");

if ($sql) {
    echo "Horario reservado con éxito.";
} else {
    echo "Error al reservar el horario.";
}
?>
