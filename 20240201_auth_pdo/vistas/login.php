<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Login de usuarios</title>
</head>
<body class="p-8">
<h2 class="text-3xl font-bold mb-4">Login de usuarios</h2>
<form method="post" action="../servicios/login-action.php">
    <input type="email" name="correo" class="border p-2 mb-2" placeholder="Correo">
    <input type="password" name="contraseña" class="border p-2 mb-2" placeholder="Contraseña">
    <input type="submit" value="Acceder" class="bg-blue-500 text-white p-2 cursor-pointer">
</form>
</body>
</html>
