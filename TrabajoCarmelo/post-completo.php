<?php
include('header.php');
// Verifica si se proporcionó un ID en la URL
if (isset($_GET['id'])) {
    $idNoticia = $_GET['id'];

    // Configuración de la conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

    // Consulta SQL para obtener la noticia específica
    $sql = "SELECT * FROM post WHERE id = $idNoticia";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Mostrar el contenido completo de la noticia
        echo "<h2>" . $row["titulo"] . "</h2>";

        // Establecer el tamaño de la imagen a 500x500
        echo "<img src='" . $row["imagen"] . "' alt='Imagen del post' style='max-width: 500px; max-height: 500px;'>";

        echo "<p>" . $row["noticia"] . "</p>";
        echo "<p>Fecha: " . $row["fecha"] . "</p>";
    } else {
        echo "Noticia no encontrada.";
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo "ID de noticia no proporcionado.";
}
?>