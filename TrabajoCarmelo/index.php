<?php include('header.php'); ?>

    <!-- Contenido específico de la página -->

    <h1>Bienvenido a mi página</h1>
    <p>Contenido de la página...</p>

<?php
// Consulta SQL para obtener todos los posts
$sql = "SELECT * FROM new_table ORDER BY fecha DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar los posts
    while($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h2>" . $row["titulo"] . "</h2>";
        echo "<p>" . $row["noticia"] . "</p>";

        // Mostrar la imagen (asegúrate de ajustar el código según la estructura de tus archivos y rutas)
        echo "<img src='" . $row["imagen"] . "' alt='Imagen del post'>";

        echo "<p>Fecha: " . $row["fecha"] . "</p>";
        echo "</div>";
    }
} else {
    echo "No hay posts disponibles.";
}

// Cerrar la conexión
$conn->close();
?>


<?php include('footer.php'); ?>