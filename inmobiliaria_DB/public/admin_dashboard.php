<?php
session_start();

// Verificar si el administrador está autenticado
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login_admin.php");
    exit();
}

// Resto del código para el panel de administrador
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir y sanitizar datos del formulario
    $tipo = $_POST['tipo'];
    $descripcion = $_POST['descripcion'];
    // Otros campos

    // Validaciones de datos (puedes agregar aquí)

    // Consulta SQL para insertar el inmueble
    $sql = "INSERT INTO inmueble (tipo, descripcion, ...) VALUES ('$tipo', '$descripcion', ...)";
    // Ejecutar consulta y manejar errores
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_property'])) {
    $property_id = $_POST['property_id'];

    // Consulta SQL para eliminar el inmueble
    $sql = "DELETE FROM inmueble WHERE idInmueble = $property_id";
    // Ejecutar consulta y manejar errores
}
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_property'])) {
    $property_id = $_POST['property_id'];
    $new_description = $_POST['new_description'];

    // Consulta SQL para actualizar el inmueble
    $sql = "UPDATE inmueble SET descripcion = '$new_description' WHERE idInmueble = $property_id";
    // Ejecutar consulta y manejar errores
}
?>
<?php
// Consulta SQL para obtener todos los inmuebles disponibles
$sql = "SELECT * FROM inmueble WHERE disponible = 1";
// Ejecutar consulta y mostrar resultados
?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['buy_property'])) {
    $property_id = $_POST['property_id'];

    // Consulta SQL para marcar el inmueble como comprado
    $sql = "UPDATE inmueble SET disponible = 0 WHERE idInmueble = $property_id";
    // Ejecutar consulta y manejar errores
}
?>
