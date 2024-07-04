<?php
include 'conexion.php';
include 'motor.php';

$id = $_POST['id'];
$accion = $_POST['accion'];

if ($accion == "prestar") {
    $sql = "UPDATE libros SET disponibles = disponibles - 1, prestados = prestados + 1 WHERE id = $id AND disponibles > 0";
} elseif ($accion == "devolver") {
    $sql = "UPDATE libros SET disponibles = disponibles + 1, prestados = prestados - 1 WHERE id = $id AND prestados > 0";
}

if ($conn->query($sql) === TRUE) {
    echo "Registro actualizado exitosamente";
} else {
    echo "Error actualizando el registro: " . $conn->error;
}

$conn->close();

header("Location: index.php");
?>
