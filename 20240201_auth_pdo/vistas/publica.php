<?php
session_start();
echo '<h2>Zona pública</h2>';
echo '<p>Ya sabemos que quieres visitar</p>';
if(isset($_SESSION['destino'])){
    echo $_SESSION['destino'];
}
else{
    echo '<p>Todavía no has elegido destino</p>';
}
