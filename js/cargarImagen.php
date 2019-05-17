<!DOCTYPE html> 
<html>
     <head> 
     <meta charset="UTF-8"> 
     <title>Modificar datos de persona </title> 
      <script src="js/ajax.js" type="text/javascript">  </script>
     <link href="../../../estyles/estilo.css" rel="stylesheet">
     
     </head> 
<body> 
<?php 
//incluir conexión a la base de datos 
include '../../../config/conexionBD.php';


$imagen = isset($_POST["imagen"]) ? trim($_POST["imagen"]): null;
$correo = isset($_POST["usuario"]) ? trim($_POST["usuario"]): null;

date_default_timezone_set("America/Guayaquil"); 
$fecha = date('Y-m-d H:i:s', time()); 

$sql = "UPDATE usuario " . 
        "SET usu_imagen = '$imagen', " . 
        "usu_fecha_modificacion = '$fecha' " . 
        "WHERE usu_correo = '$correo' "; 

 echo $sql;


 /**       
if ($conn->query($sql) === TRUE) {
     echo "IMAGEN AGREGADA CORRECTAMENTE <br>"; 
} else { 
    echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>"; 
} 
*/ 

$conn->close(); 

?> 
<div class="button">
<button type="reset" onclick="history.back()" >REGRESAR </button>
<br>
</div>

</body> 
</html>