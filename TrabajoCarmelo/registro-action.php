<?php
$correo=$_POST['correo'];
$contraseña=$_POST['contraseña'];
$rol=$_POST['rol'];

$opciones = [
    'cost' => 12, // Mayor costo = mayor seguridad, pero mayor tiempo de procesamiento
];
$hash=password_hash($contraseña,PASSWORD_BCRYPT,$opciones);

$conexion=new PDO('mysql:host=localhost;dbname=usuarios','postgres','curso');
//echo var_dump($conexion);
$sql = "INSERT INTO usuarios (correo, contraseña, rol) VALUES (:correo, :password, :rol)";

$stmt = $conexion->prepare($sql);
$stmt->bindParam(':correo', $correo);
$stmt->bindParam(':password', $hash);
$stmt->bindParam(':rol', $rol);

if ($stmt->execute()) {
    echo "Registro creado exitosamente";
} else {
    echo "Error al crear el registro: " . $stmt->errorInfo()[2];
}