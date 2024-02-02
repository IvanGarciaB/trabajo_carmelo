<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: registro.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Formulario con Tailwind</title>
</head>
<body class="bg-gray-200 p-8">

<div class="max-w-md mx-auto bg-white rounded p-8 shadow-md">
    <h2 class="text-2xl font-bold mb-4">Formulario de Ejemplo</h2>

    <form action="post-action.php" method="post">
        <div class="mb-4">
            <label for="titulo" class="block text-gray-700 text-sm font-bold mb-2">Título</label>
            <input type="text" name="titulo" id="titulo" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="noticia" class="block text-gray-700 text-sm font-bold mb-2">Contenido de la noticia</label>
            <textarea name="texto" id="texto" rows="4" class="w-full px-4 py-2 border rounded-md resize-none focus:outline-none focus:border-blue-500"></textarea>
        </div>

        <div class="mb-4">
            <label for="imagen" class="block text-gray-700 text-sm font-bold mb-2">URL de la Imagen</label>
            <input type="url" name="imagen" id="imagen" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none">Enviar</button>
        </div>
    </form>

</div>

</body>
</html>
