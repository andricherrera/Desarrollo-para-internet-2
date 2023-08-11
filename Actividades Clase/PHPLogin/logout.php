<?php
session_start();
session_destroy();
// Redirige hacia la pagina principal:
header('Location: index.html');
?>