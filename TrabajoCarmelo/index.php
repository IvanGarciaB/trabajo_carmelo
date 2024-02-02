<?php include('header.php'); ?>

<style>
    .posts-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .card {
        border: 1px solid #ccc;
        padding: 15px;
        width: 300px; /* Puedes ajustar el ancho según tus preferencias */
    }

    .post-image {
        max-width: 100%; /* La imagen se ajustará al ancho de su contenedor */
        height: auto;
    }

    .read-more {
        display: block;
        margin-top: 10px;
        color: #007bff; /* Puedes cambiar el color según tu preferencia */
        cursor: pointer;
    }
</style>

<!-- Contenido específico de la página -->

<h1>Bienvenido a mi página</h1>
<p>Contenido de la página...</p>

<div class="posts-container">
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
        // Mostrar los posts en cards
        while($row = $result->fetch_assoc()) {
            mostrarPost($row);
        }
    } else {
        echo "No hay posts disponibles.";
    }

    // Cerrar la conexión
    $conn->close();
    ?>
</div>

<?php include('footer.php'); ?>

<?php
function mostrarPost($row) {
    echo "<div class='card'>";
    echo "<h2>" . $row["titulo"] . "</h2>";

    // Truncar el texto de noticia a 75 caracteres
    $noticia = strlen($row["noticia"]) > 75 ? substr($row["noticia"], 0, 75) . "..." : $row["noticia"];

    echo "<p>" . $noticia . "</p>";

    // Mostrar la imagen con un tamaño controlado
    echo "<img src='" . $row["imagen"] . "' alt='Imagen del post' class='post-image'>";

    echo "<p>Fecha: " . $row["fecha"] . "</p>";

    // Agregar botón "Leer más" que lleva al post completo
    echo "<a href='post-completo.php?id=" . $row["id"] . "' class='read-more'>Leer más</a>";

    echo "</div>";
}
?>

