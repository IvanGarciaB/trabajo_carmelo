<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: registro.php');
}

$conexion = new PDO('mysql:host=localhost;dbname=test', 'root', '');

// ... (código anterior)

// Se comprueba si se ha enviado un formulario para publicar un post
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['publicar_post'])) {
    $fechaPublicacion = date('Y-m-d');
    $titulo = $_POST['titulo'];
    $noticia = $_POST['noticia'];

    // Subir imagen y obtener la ruta
    $carpetaImagenes = 'imagenes/'; // Ajusta la carpeta según tu estructura de archivos
    $rutaImagen = $carpetaImagenes . basename($_FILES['imagen']['name']);

    move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaImagen);

    // Insertar el post en la base de datos
    $sqlInsertPost = "INSERT INTO new_table (fecha, titulo, noticia, imagen) VALUES (:fecha, :titulo, :noticia, :imagen)";
    $stmtInsertPost = $conexion->prepare($sqlInsertPost);
    $stmtInsertPost->bindParam(':fecha', $fechaPublicacion);
    $stmtInsertPost->bindParam(':titulo', $titulo);
    $stmtInsertPost->bindParam(':noticia', $noticia);
    $stmtInsertPost->bindParam(':imagen', $rutaImagen);
    $stmtInsertPost->execute();
}
?>
<html lang="es">
<head>
    <!-- ... (código anterior) -->
</head>
<body class="p-8">
<h2 class="text-3xl font-bold mb-4">Zona privada</h2>
<a href="../servicios/logout.php" class="text-blue-500 hover:underline mr-4">Salir de sesión</a>

<!-- Formulario para publicar un post -->
<form action="" method="POST" enctype="multipart/form-data">
    <label for="titulo" class="block mb-2">Título:</label>
    <input type="text" name="titulo" id="titulo" class="border rounded p-2 mb-4" required>

    <label for="noticia" class="block mb-2">Noticia:</label>
    <textarea name="noticia" id="noticia" class="border rounded p-2 mb-4" rows="4" required></textarea>

    <label for="imagen" class="block mb-2">Imagen:</label>
    <input type="file" name="imagen" id="imagen" class="mb-4" accept="image/*" required>

    <button type="submit" name="publicar_post" class="bg-blue-500 text-white py-2 px-4 rounded">Publicar Post</button>
</form>
</body>
</html>
