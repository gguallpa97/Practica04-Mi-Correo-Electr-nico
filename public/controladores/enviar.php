<?php  

// Llamando a los campos
date_default_timezone_set("America/Guayaquil"); 
$fecha = date('Y-m-d H:i:s', time()); 
$remitente = $_POST['remitente'];
$destinatario = $_POST['destinatario'];
$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

include '../../config/conexionBD.php';

$sql="SELECT usu_rol FROM usuario WHERE usu_correo = '$destinatario' ";
//Enviar una consulta MySQL
$result=$conn->query($sql); 
//Recupera una fila de resultados como un array asociativo
$resultarr=mysqli_fetch_assoc($result);
//Obtnemos el valo de una fila especifica
$attempts = $resultarr["usu_rol"];

if($attempts == 'admin'){
       echo "NO SE PUEDE ENVIAR , EL CORREO PERTENECE A UN USUARIO ADMINISTRADOR ";
      // echo "<a href='../vista/enviarCorreo.php'>REGRESAR </a>";
}else{

// Datos para el correo
$carta = "Fecha: $fecha \n";
$carta .= "De: $remitente \n";
$carta .= "Mensaje: $mensaje";

// Enviando Mensaje
//mail($destinatario, $asunto, $carta);


$sql = "INSERT INTO correos VALUES (0,'$fecha', '$remitente','$destinatario','$asunto', '$mensaje')";

if ($conn->query($sql) === TRUE) {
    echo "MENSAJE ENVIADO CON ÉXITO ";
    //echo "<a href='../vista/enviarCorreo.php'>REGRESAR </a>";
   /// header('Location:../vista/enviarCorreo.php');

    } else {
        
    echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
    }


}













?>
