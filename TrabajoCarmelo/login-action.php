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

        if ($usuario) {
            // Verificar si la contraseña coincide utilizando password_verify
            if (password_verify($contraseña, $usuario['contraseña'])) {
                session_start();
                $_SESSION['usuario'] = $correo;
                header('creacion-post.php');
            } else {
                echo '<p>Usuario no válido</p>';
                echo '<a href="registro.php">Alta de usuarios</a>';
            }
        } else {
            echo '<p>Usuario no encontrado</p>';
            echo '<a href="registro.php">Alta de usuarios</a>';
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
