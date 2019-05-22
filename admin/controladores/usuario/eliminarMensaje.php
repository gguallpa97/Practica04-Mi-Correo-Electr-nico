<!DOCTYPE html> 
<html> 
<head> 
    <meta charset="UTF-8"> 
    <title>Eliminar Mensaje</title> 
</head> 
<body> 
<?php 
//incluir conexión a la base de datos 
include '../../../config/conexionBD.php'; 

$codigo = $_GET["codigo"]; 

//Si voy a eliminar físicamente el registro de la tabla 
$sql = "DELETE FROM correos WHERE usu_codigo = '$codigo'"; 

//date_default_timezone_set("America/Guayaquil"); 
//$fecha = date('Y-m-d H:i:s', time()); 

///$sql = "UPDATE usuario SET usu_eliminado = 'S', usu_fecha_modificacion = '$fecha' WHERE usu_codigo = $codigo"; 

if ($conn->query($sql) === TRUE) { 
    //echo "<p>MENSAJE ELIMINADO CON EXITO  </p>"; 
    header("Location: ../../vista/usuario/index.php");

} else {
     echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) . "</p>"; 
} 
$conn->close(); 

?>
<div class="button">

<button type="reset" onclick="history.back()" >REGRESAR</button>
<br>
</div>

</body>
</html>

