<?php
session_start();

if ($_SERVER["localhost"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Conexión a la base de datos (ya tienes este código)
    require_once 'db_connect.php';

    // Consulta para verificar las credenciales del administrador
    $sql = "SELECT * FROM admin_users WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Inicio de sesión exitoso
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin_dashboard.php"); // Redirige al panel de administrador
        exit();
    } else {
        // Credenciales inválidas
        $error_message = "Correo electrónico o contraseña incorrectos";
    }
}
?>
