<?php
include_once './conexionBD.php';

// Comprobamos si recibimos datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recogemos variables
    $fecha = (isset($_POST['fecha'])) ? $_POST['fecha'] : '';
    $mysqldate =  date('Y-m-d',strtotime($_POST['fecha']));
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
    $coordinacion = (isset($_POST['coordinacion'])) ? $_POST['coordinacion'] : '';
    $telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
    $mail = (isset($_POST['email'])) ? $_POST['email'] : '';

    $siniestro = (isset($_POST['siniestro'])) ? $_POST['siniestro'] : '';
    $tipoatencion = (isset($_POST['tipoatencion'])) ? $_POST['tipoatencion'] : '';
    $asunto = (isset($_POST['asunto'])) ? $_POST['asunto'] : '';
    $rc = (isset($_POST['rc'])) ? $_POST['rc'] : '';
    $observaciones = (isset($_POST['observaciones'])) ? $_POST['observaciones'] : '';
    
    // Variables
    $hostDB = 'localhost';
    $nombreDB = 'atenciones';
    $usuarioDB = 'user';
    $contrasenyaDB = 'password';
    
    // Conecta con base de datos
    $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
    $consulta =  "INSERT INTO atenciones (usuario, fecha, coordinacion, rc, telefono, 
        email, tipo_atencion, asunto, observaciones) VALUES (
        '$usuario', '$fecha', '$coordinacion', '$rc', '$telefono',
        '$mail', '$tipoatencion', '$asunto', '$observaciones);";

    // $consulta = "INSERT INTO usuarios (usuario, telefono, mail, rol, password) VALUES ('$usuario', '$telefono', '$mail', '$rol', '$pw') ";		
    $miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);

    $objeto = new Conexion();
    $conexion = $objeto->Conectar();
    
    // Prepara INSERT
    //$miInsert = $miPDO->prepare($consulta);
    $resultado = $conexion->prepare($consulta);
    $resultado->execute(); 
    
    // Ejecuta INSERT con los datos
    //$miInsert->execute(); 

    if($resultado){
        //header("Location: index.php");
        echo "Entra a TRUE";
    }else{
        echo "Error";
    }
    // Redireccionamos a Leer
    //header('Location: ./');
}
?>