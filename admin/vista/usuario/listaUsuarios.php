
<?php 
session_start(); 
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $_SESSION['privilegios'] === 'user'  ){ 
        header("Location: /GestionDeUsuarios/public/vista/login.html"); 
        } 
?>


<!DOCTYPE html>
<html>
<head>  
        <meta charset=”utf-8” />
        <title>USUARIOS</title>
        <script src="../../../js/cargarImagen.js" type="text/javascript">  </script>
        <link href="../../../estyles/ct_layout2.css" rel= "stylesheet" />
        <link href="../../../estyles/estilo2.css" rel="stylesheet"/>
        <link href="../../../estyles/titulos.css" rel="stylesheet"/>
        <link href="../../../estyles/imagenes.css" rel="stylesheet"/>
         
                
</head>

<body>
                  <?php 
                    //CONEXION A LA BASE DE DATOS
                    include '../../../config/conexionBD.php';
                    //RECUPERO EL CORREO DEL USUARIO INGRESADO

                    $usuario=$_SESSION['admin']; 
 
                    $sql="SELECT * FROM usuario WHERE usu_correo = '$usuario' ";
                     //Enviar una consulta MySQL
                     $result=$conn->query($sql); 
                      //Recupera una fila de resultados como un array asociativo
                    $resultarr=mysqli_fetch_assoc($result);
                    //Obtnemos el valo de una fila especifico
                    
                    ?>

                    
        <div id ="contenido">  
                <nav > 
                    <ul class="nav" >
                        <li><a href="index.php">INICIO</a></li>
                        
                        <li><a href="listaUsuarios.php">USUARIOS</a></li>

                        <li><a  >MI CUENTA</a>
                            <ul>     
                                 <?php 
                                 $codigo = $resultarr["usu_codigo"];
                                 $cad1 = "modificar.php?codigo=";
                                 $cad2 = $codigo;
                                 $final1 = $cad1 . $cad2;

                                 $cad3 = "cambiar_contrasena.php?codigo=";
                                 $final2= $cad3 . $cad2;

                                 ?>
                                    
                                    <li><a href= "<?php echo $final1 ?>" >DATOS  </a></li>

                                
                                    <li><a href="<?php echo $final2 ?>"> CONTRASEÑA  </a></li>


                            </ul>
                         </li>
                        
                         <li><a href='../../../public/vista/login.html' >CERRAR SESIÓN </a>
                        
                     </ul>
                </nav>
        </div>  

<!--PARA MOSTEA  LA LISTA DE CORREOS-->
<div >
    
    <article>
                  <h1>LISTA DE USUARIOS </h1>
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

 $sql = "SELECT * FROM usuario where usu_rol = 'user' and  usu_eliminado = 'N'"; 
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
        echo " <td> <a href='eliminarUsuario.php?codigo=" . $row['usu_codigo'] . "'>Eliminar</a> </td>";
        echo " <td> <a href='modificarUsuario.php?codigo=" . $row['usu_codigo'] . "'>Modificar</a> </td>"; 
        echo " <td> <a href='cambiar_Contrasena_Usuario.php?codigo=" . $row['usu_codigo'] . "'>Cambiar contraseña</a> </td>";

    } 
} else { 
    echo "<tr>"; 
    echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>"; 
    echo "</tr>"; 
} 
        $conn->close(); 


        ?>
    </table> 
        </body> 

    </article>

</div>

<footer>

        <p >&copy; TODOS LOS DERECHOS RESERVADOS</p>
        <p ></Strong> Franklin Gustavo Guallpa Giñin  <Strong> </p>
        <p ></Strong> 2019 <Strong> </p>
</footer>

</body>
</html>






















