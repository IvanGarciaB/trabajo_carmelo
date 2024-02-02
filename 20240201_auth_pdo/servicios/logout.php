<?php
echo '<h2>Logout</h2>';
session_start();
session_destroy();
header('location:../vistas/index.php');