<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    try {
        $conexion = new PDO('pgsql:host=localhost;dbname=usuarios;user=postgres;password=curso');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM usuarios WHERE correo = :correo";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':correo', $correo);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($contraseña, $usuario['contraseña'])) {
            // Inicio de sesión exitoso
            $_SESSION['usuario_id'] = $usuario['id'];
            echo "Inicio de sesión exitoso. Bienvenido, " . $correo;
        } else {
            echo "Credenciales incorrectas. Intenta de nuevo.";
        }
    } catch (PDOException $e) {
        echo "Error de PDO: " . $e->getMessage();
    }
}
?>
