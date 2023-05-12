<?php
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
    $hostDB = '127.0.0.1';
    $nombreDB = 'atenciones';
    $usuarioDB = 'root';
    $contrasenyaDB = '';
    
    // Conecta con base de datos
    $hostPDO = "mysql:host=$hostDB;dbname=$nombreDB;";
    $miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
    
    // Prepara INSERT
    $miInsert = $miPDO->prepare(
        'INSERT INTO atenciones (usuario, fecha, coordinacion, rc, telefono, email, tipo_atencion, asunto, observaciones) VALUES (
                                :usuario, :fecha, :coordinacion, :rc, :telefono, :email, :tipoatencion; :asunto, :observaciones)' );
    
    // Ejecuta INSERT con los datos
    $miInsert->execute(
        array(
            'usuario' => $usuario,
            'fecha' => $mysqldate,
            'coordinacion' => $coordinacion,
            'rc' => $rc, 
            'telefono' => $telefono, 
            'email' => $mail,
            'tipo_atencion' => $tipoatencion,
            'asunto' => $asunto,
            'observaciones' => $observaciones,
        )
    );
    // Redireccionamos a Leer
    //header('Location: ./');
}
?>