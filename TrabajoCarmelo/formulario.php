
<!-- formulario.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
</head>
<body>
    <h2>Registro de Usuarios</h2>
    <form action="registro-action.php" method="post">
        <label for="correo">Correo electrónico:</label>
        <input type="email" name="correo" required>

        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contraseña" required>

        <button type="submit">Registrar</button>
    </form>
</body>
</html>
