<?php
$correo=$_POST['correo'];
$contraseña=$_POST['contraseña'];

$conexion=new PDO('mysql:host=localhost;dbname=test','root','');
$sql = "SELECT correo, contraseña FROM usuariosdaw WHERE correo = :correo";

$stmt = $conexion->prepare($sql);
$stmt->bindParam(':correo',$correo);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    // Verificar si la contraseña coincide utilizando password_verify
    if (password_verify($contraseña, $result['contraseña'])) {
        session_start();
        $_SESSION['usuario'] = $correo;
        header('Location:../vistas/privado.php');
    } else {
        echo '<p>Usuario no válido</p>';
        echo '<a href="registro.php">Alta de usuarios</a>';
    }//cierra else
}//cierra primer if