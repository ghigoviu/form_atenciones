<?php
// Variables
$hostDB = '127.0.0.1';
$nombreDB = 'atenciones';
$usuarioDB = 'user';
$contrasenyaDB = 'password';
// Conecta con base de datos
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
// Prepara SELECT
$miConsulta = $miPDO->prepare('SELECT * FROM atenciones;');
// Ejecuta consulta
$miConsulta->execute();

?>