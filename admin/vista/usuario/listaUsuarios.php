
<!DOCTYPE html> 
<html> 
<head> 
    <meta charset="UTF-8"> 
    <title>Lista de Usuarios </title> 
    <link href="../../../estyles/ct_layout2.css" rel= "stylesheet" />
    <link href="../../../estyles/estilo.css" rel="stylesheet">

</head> 
    <body> 
    <table border = 1 style="width:100%"> 
        <tr> 
            <th>Cedula</th> 
            <th>Nombres</th> 
            <th>Apellidos</th> 
            <th>Dirección</th> 
            <th>Telefono</th> 
            <th>Correo</th> 
            <th>Fecha Nacimiento</th> 
            <th>Eliminar</th>
            <th>Modificar</th> 
            <th>Cambiar Contraseña</th> 
            </tr> 
            
<?php 

 //CONEXION A LA BASE DE DATOS
 include '../../../config/conexionBD.php';

 $sql = "SELECT * FROM usuario where usu_rol = 'user'  "; 
 $result = $conn->query($sql); 
 if ($result->num_rows > 0) { 
    
    while($row = $result->fetch_assoc()){ 
        echo "<tr>"; 
        echo " <td>" . $row["usu_cedula"] . "</td>";
        echo " <td>" . $row['usu_nombres'] ."</td>"; 
        echo " <td>" . $row['usu_apellidos'] . "</td>"; 
        echo " <td>" . $row['usu_direccion'] . "</td>"; 
        echo " <td>" . $row['usu_telefono'] . "</td>"; 
        echo " <td>" . $row['usu_correo'] . "</td>"; 
        echo " <td>" . $row['usu_fecha_nacimiento'] . "</td>"; 
        echo " <td> <a href='eliminar.php?codigo=" . $row['usu_codigo'] . "'>Eliminar</a> </td>";
        echo " <td> <a href='modificar.php?codigo=" . $row['usu_codigo'] . "'>Modificar</a> </td>"; 
        echo " <td> <a href='cambiar_contrasena.php?codigo=" . $row['usu_codigo'] . "'>Cambiar contraseña</a> </td>";
    } 
} else { 
    echo "<tr>"; 
    echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>"; 
    echo "</tr>"; 
} 
        $conn->close(); 

        
       
        ?>

        <div class="button">
            
                <button type="reset" onclick="history.back()" >CANCELAR</button>
                <br>
            </div>

        

        
        
    </table> 
    </body> 
</html>