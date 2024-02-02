<!-- registro-action.php -->
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT);

    try {
        $conexion = new PDO('pgsql:host=localhost;dbname=usuarios;user=nombre_usuario;password=contraseña');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO usuarios (correo, contraseña) VALUES (:correo, :contraseña)";
        $stmt = $conexion->prepare($sql);

        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':contraseña', $contraseña);

        $stmt->execute();

        echo "Usuario registrado exitosamente";
    } catch (PDOException $e) {
        echo "Error al registrar usuario: " . $e->getMessage();
    }
}
?>

