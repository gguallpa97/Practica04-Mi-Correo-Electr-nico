<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="../../../js/ajax.js" type="text/javascript">  </script>
    <title>CONSULTA DE DATOS DE USUARIO AJAX </title>
</head>
<body>
    
<?php 
///INCLUIR LA CONEXION A LA BASE DE DATOS 
include '../../../config/conexionBD.php'; 

    $usuario= $_GET['usuario'];

    $consulta = $_GET['valorBuscar'];
    
    $salida = "";

    $query = "SELECT * FROM correos WHERE usu_remitente LIKE '$consulta%' and usu_destinatario = '$usuario' order by usu_fecha desc ";
	//echo $query;


    $resultado = $conn->query($query);



    if ($resultado->num_rows>0) {
    	$salida.="<table border=1 class='tabla_datos'>
    			<thead>
    				<tr id='titulo'>
    					<td>FECHA/HORA</td>
                        <td>REMITENTE</td>
    					<td>ASUNTO</td>
    					<td>Leer</td>
    				</tr>

    			</thead>
    			

    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
    		$salida.="<tr>
    					<td>".$fila['usu_fecha']."</td>
    					<td>".$fila['usu_remitente']."</td>
    					<td>".$fila['usu_asunto']."</td>
                        <td> <a href='../../controladores/usuario/leerMensaje.php?mensaje=" .$fila['usu_mensaje']. " '>Leer</a> </td>

    				</tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="NO HAY DATOS :(";
    }


    echo $salida;

    $conn->close();







  ?>