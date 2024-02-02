<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Alta de usuario</title>
</head>
<body class="bg-gray-200 p-8">

<div class="max-w-md mx-auto bg-white rounded p-8 shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Alta de usuario</h2>
    <form method="post" action="../TrabajoCarmelo/registro-action.php">
        <div class="mb-4">
            <label for="correo" class="block text-gray-700 text-sm font-bold mb-2">Correo electrónico</label>
            <input type="email" name="correo" id="correo" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="contraseña" class="block text-gray-700 text-sm font-bold mb-2">Contraseña</label>
            <input type="password" name="contraseña" id="contraseña" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
        </div>
        <div class="mb-4">
            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none">Crear usuario</button>
        </div>
    </form>
    <p class="text-center text-gray-600 text-sm mt-4">
        ¿Ya estás registrado? <a href="login.php" class="text-blue-500">Inicia sesión</a>
    </p>
</div>

</body>
</html>

