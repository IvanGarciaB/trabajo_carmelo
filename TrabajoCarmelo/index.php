
<?php include('header.php'); ?>

<!-- Contenido específico de la página -->

<h1>Bienvenido a mi página</h1>
<p>Contenido de la página...</p>

<?php
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

// Consulta SQL para obtener todos los posts
$sql = "SELECT * FROM post ORDER BY fecha DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar los posts
    while($row = $result->fetch_assoc()) {
        mostrarPost($row);
    }
} else {
    echo "No hay posts disponibles.";
}

// Cerrar la conexión
$conn->close();
?>

<?php include('footer.php'); ?>

<?php
function mostrarPost($row) {
    echo "<div>";
    echo "<h2>" . $row["titulo"] . "</h2>";
    echo "<p>" . $row["noticia"] . "</p>";

    // Mostrar la imagen (asegúrate de ajustar el código según la estructura de tus archivos y rutas)
    echo "<img src='" . $row["imagen"] . "' alt='Imagen del post'>";

    echo "<p>Fecha: " . $row["fecha"] . "</p>";
    echo "</div>";
}
?>
