<?php
$correo=$_POST['correo'];
$contraseña=$_POST['contraseña'];

$opciones = [
    'cost' => 12, // Mayor costo = mayor seguridad, pero mayor tiempo de procesamiento
];
$hash=password_hash($contraseña,PASSWORD_BCRYPT,$opciones);

$conexion=new PDO('mysql:host=localhost;dbname=test','root','');
//echo var_dump($conexion);
$sql = "INSERT INTO usuariosdaw (correo, contraseña) VALUES (:correo, :password)";

$stmt = $conexion->prepare($sql);
$stmt->bindParam(':correo', $correo);
$stmt->bindParam(':password', $hash);

if ($stmt->execute()) {
    echo "Registro creado exitosamente";
} else {
    echo "Error al crear el registro: " . $stmt->errorInfo()[2];
}