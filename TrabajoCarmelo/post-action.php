<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: registro.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recupera los datos del formulario
    $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : '';
    $noticia = isset($_POST['noticia']) ? $_POST['noticia'] : '';
    $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : '';

    // Validación de datos (puedes agregar más validaciones según tus necesidades)

    // Obtén la fecha y hora actual
    $fechaActual = date('Y-m-d H:i:s');

    // Conexión a la base de datos
    $conexion = new PDO('mysql:host=localhost;dbname=test', 'root', '');

    if (!$conexion) {
        die('Error de conexión a la base de datos');
    }

    // Prepara la consulta SQL para insertar los datos en la tabla
    $sql = "INSERT INTO post (titulo, noticia, imagen, fecha) VALUES (:titulo, :noticia, :imagen, :fecha)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':titulo', $titulo);
    $stmt->bindParam(':noticia', $noticia);
    $stmt->bindParam(':imagen', $imagen);
    $stmt->bindParam(':fecha', $fechaActual);

    // Ejecuta la consulta
    if ($stmt->execute()) {
        echo "Información enviada correctamente";
    } else {
        echo "Error al enviar la información: " . implode(' ', $stmt->errorInfo());
    }

    // Cierra la conexión
    $conexion = null;
}
?>
