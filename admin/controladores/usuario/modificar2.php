
<?php 
session_start(); 
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){ 
        header("Location: /GestionDeUsuarios/public/vista/login.html"); 
        } 
?>


<!DOCTYPE html>
<html>
<head>  
        <meta charset=”utf-8” />
        <title>ACTUALIZAR DATOS </title>
        <script src="../../../js/cargarImagen.js" type="text/javascript">  </script>
        <link href="../../../estyles/ct_layout2.css" rel= "stylesheet" />
        <link href="../../../estyles/estilo2.css" rel="stylesheet"/>
        <link href="../../../estyles/titulos.css" rel="stylesheet"/>
        <link href="../../../estyles/imagenes.css" rel="stylesheet"/>
        <link href="../../../estyles/estilo.css" rel="stylesheet">
        
         
                
</head>

<body>
                  <?php 
                    //CONEXION A LA BASE DE DATOS
                    include '../../../config/conexionBD.php';
                    //RECUPERO EL CORREO DEL USUARIO INGRESADO

                    $usuario=$_SESSION['user']; 
 
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
                        <li><a href="../../vista/usuario/paginaUsuario.php">INICIO</a></li>
                       
                                <?php 
                                 $usuario = $resultarr["usu_correo"];
                                 $cad1 = "../../vista/usuario/enviarCorreo.php?usuario=";
                                 $final1 = $cad1 . $usuario;

                                ?>
                        <li><a href="<?php echo $final1 ?>">NUEVO MENSAJE</a></li>

                                <?php 
                                 $codigo = $resultarr["usu_codigo"];
                                 $cad1 = "../../vista/usuario/listaMensajesEnviados.php?usuario=";
                                 $final = $cad1 . $usuario;

                                 ?>


                        <li><a href= "<?php echo $final ?>" >MENS. ENVIADOS </a></li>

                        <li><a >MI CUENTA</a>
                            <ul>     
                                 <?php 
                                 $codigo = $resultarr["usu_codigo"];
                                 $cad1 = "../../vista/usuario/modificar2.php?codigo=";
                                 $cad2 = $codigo;
                                 $final1 = $cad1 . $cad2;

                                 $cad3 = "../../vista/usuario/cambiar_contrasena2.php?codigo=";
                                 $final2= $cad3 . $cad2;

                                 $cad4 = "../../vista/usuario/eliminar2.php?codigo=";
                                 $final3= $cad4 . $cad2;


                                 ?>
                                    <li><a href= "<?php echo $final1 ?>" >DATOS </a></li>

                                    
                                    <li><a href= "<?php echo $final3 ?>" >ELIMINAR </a></li>


                                    <li><a href="<?php echo $final2 ?>"> CONTRASEÑA </a></li>
                            </ul>
                         </li>
                        
                         <li><a href='../../../public/vista/login.html' >CERRAR SESIÓN </a>
                        
                     </ul>
                </nav>
        </div>  

<!--PARA MOSTEA  LA LISTA DE CORREOS-->
<div >
    
    <article>
                  <h1>ACTUALIZAR LOS DATOS  </h1>

                  <body> 
<?php 
//incluir conexión a la base de datos 
include '../../../config/conexionBD.php';

$codigo = $resultarr["usu_codigo"];

$cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
$nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
$apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null; 
$direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null; 
$telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]): null;
$correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
$fechaNacimiento = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]): null; 

date_default_timezone_set("America/Guayaquil"); 
$fecha = date('Y-m-d H:i:s', time()); 

$sql = "UPDATE usuario " . 
        "SET usu_cedula = '$cedula', " . 
        "usu_nombres = '$nombres', " . 
        "usu_apellidos = '$apellidos', " . 
        "usu_direccion = '$direccion', " . 
        "usu_telefono = '$telefono', " . 
        "usu_correo = '$correo', " . 
        "usu_fecha_nacimiento = '$fechaNacimiento', " . 
        "usu_fecha_modificacion = '$fecha' " . 
        "WHERE usu_codigo = $codigo"; 
        
if ($conn->query($sql) === TRUE) {
     echo "DATOS ACTUALIZADOS CORRECTAMENTE<br>"; 
} else { 
    echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>"; 
} 

            



$conn->close(); 

?> 


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


















































