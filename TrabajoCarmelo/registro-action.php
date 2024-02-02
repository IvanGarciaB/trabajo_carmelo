<?php
$correo = $_POST['correo'];
$contraseña = $_POST['contraseña'];
$rol = $_POST['rol'];

$opciones = [
    'cost' => 12, // Mayor costo = mayor seguridad, pero mayor tiempo de procesamiento
];
$hash = password_hash($contraseña, PASSWORD_BCRYPT, $opciones);

$conexion = new PDO('pgsql:host=localhost;dbname=usuarios;user=postgres;password=curso');

$sql = "INSERT INTO usuarios (correo, contraseña, rol) VALUES (:correo, :password, :rol)";

$stmt = $conexion->prepare($sql);
$stmt->bindParam(':correo', $correo);
$stmt->bindParam(':password', $hash);
$stmt->bindParam(':rol', $rol);

try {
    if ($stmt->execute()) {
        echo "Registro creado exitosamente";
    } else {
        echo "Error al crear el registro: " . $stmt->errorInfo()[2];
    }
} catch (PDOException $e) {
    echo "Error de PDO: " . $e->getMessage();
}
?>
