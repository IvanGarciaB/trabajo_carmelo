<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location:login.php');
}

$conexion = new PDO('mysql:host=localhost;dbname=test', 'root', '');

// Recuperar la información almacenada en la base de datos al iniciar sesión
$sqlInfo = "SELECT id, info FROM usuariosdaw WHERE correo = :usuario";
$stmtInfo = $conexion->prepare($sqlInfo);
$stmtInfo->bindParam(':usuario', $_SESSION['usuario']);
$stmtInfo->execute();
$resultInfo = $stmtInfo->fetch(PDO::FETCH_ASSOC);

// Actualizar la variable de sesión con la información recuperada
if ($resultInfo && isset($resultInfo['info'])) {
    $_SESSION['destino'] = $resultInfo['info'];
    $_SESSION['id_usuario'] = $resultInfo['id'];
}

// Se comprueba si se ha enviado un formulario para elegir una ciudad
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ciudad'])) {
    $ciudadElegida = $_POST['ciudad'];

    // Actualizar preferencias del usuario
    $sqlPreferenciasUpdate = "INSERT INTO preferencias (id_usuario, ciudad) VALUES (:id_usuario, :ciudad)
                              ON DUPLICATE KEY UPDATE ciudad = :ciudad";
    $stmtPreferenciasUpdate = $conexion->prepare($sqlPreferenciasUpdate);
    $stmtPreferenciasUpdate->bindParam(':id_usuario', $_SESSION['id_usuario']);
    $stmtPreferenciasUpdate->bindParam(':ciudad', $ciudadElegida);
    $stmtPreferenciasUpdate->execute();

    // Actualizar la variable de sesión
    $_SESSION['ciudad_preferida'] = $ciudadElegida;

    // Actualizar la información en la base de datos
    $sqlUpdate = "UPDATE usuariosdaw SET info = :ciudad WHERE correo = :usuario";
    $stmtUpdate = $conexion->prepare($sqlUpdate);
    $stmtUpdate->bindParam(':ciudad', $ciudadElegida);
    $stmtUpdate->bindParam(':usuario', $_SESSION['usuario']);
    $stmtUpdate->execute();

    // Actualizar la variable de sesión
    $_SESSION['destino'] = $ciudadElegida;
}
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Zona privada</title>
</head>
<body class="p-8">
<h2 class="text-3xl font-bold mb-4">Zona privada</h2>
<a href="../servicios/logout.php" class="text-blue-500 hover:underline mr-4">Salir de sesión</a>

<?php
// Mostrar la ciudad seleccionada si existe
if (isset($_SESSION['destino'])) {
    echo '<h2 class="text-2xl">Ciudad seleccionada: ' . $_SESSION['destino'] . '</h2>';
    echo '<p class="text-green-500">Sigues interesado en visitar esta ciudad</p>';
} else {
    echo '<p class="text-red-500">No has elegido una ciudad todavía</p>';
}
?>

<form method="post" action="" class="mt-4">
    <label for="ciudad" class="block text-sm font-medium text-gray-700">Selecciona una ciudad:</label>
    <select name="ciudad" class="border p-2 mb-2">
        <option value="praga">Praga</option>
        <option value="paris">París</option>
        <!-- Agrega más opciones según sea necesario -->
    </select>
    <input type="submit" value="Elegir ciudad" class="bg-blue-500 text-white p-2 cursor-pointer">
</form>
</body>
</html>
