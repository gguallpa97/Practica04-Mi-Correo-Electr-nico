
<?php 
session_start(); 
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE || $_SESSION['privilegios'] === 'admin' ){ 
        header("Location: /GestionDeUsuarios/public/vista/login.html"); 
        } 
?>


<!DOCTYPE html>
<html>
<head>  


        <meta charset=”utf-8” />
        <title>MENSAJES ENVIADOS </title>
        <script src="../../../js/ajax.js" type="text/javascript">  </script>
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
                        <li><a href="paginaUsuario.php">INICIO</a></li>
                       
                                <?php 
                                 $usuario = $resultarr["usu_correo"];
                                 $cad1 = "enviarCorreo.php?usuario=";
                                 $final1 = $cad1 . $usuario;

                                ?>
                        <li><a href="<?php echo $final1 ?>">NUEVO MENSAJE</a></li>

                                <?php 
                                 $codigo = $resultarr["usu_codigo"];
                                 $cad1 = "listaMensajesEnviados.php?usuario=";
                                 $final = $cad1 . $usuario;

                                 ?>


                        <li><a href= "<?php echo $final ?>" >MENS. ENVIADOS </a></li>

                        <li><a >MI CUENTA</a>
                            <ul>     
                                 <?php 
                                 $codigo = $resultarr["usu_codigo"];
                                 $cad1 = "modificar2.php?codigo=";
                                 $cad2 = $codigo;
                                 $final1 = $cad1 . $cad2;

                                 $cad3 = "cambiar_contrasena2.php?codigo=";
                                 $final2= $cad3 . $cad2;

                                 $cad4 = "eliminar.php?codigo=";
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
        
  
    
         <article>
                   <h1>MENSAJES ENVIADOS </h1>
                  
                   <?php 

//CONEXION A LA BASE DE DATOS
include '../../../config/conexionBD.php';

        $usuario=$_SESSION['user'];

 
?>

               <form  onkeyup="return buscarPorCedula2()">

                   <input type="hidden" id="usuario" name="usuario" value="<?php echo $usuario ?>" /> 
                  
                   <input type="text"  id="caja_busqueda2" name="caja_busqueda2"  value="%" placeholder="Buscar por destinatario " >

                   </form>
                   <div  id="informacion" ><b> </b></div>
                   <br>

                   
<!--
   <body> 
   <table border = 1 style="width:100%"> 
       <tr> 
           <th>Fecha</th> 
           <th>Destinatario</th> 
           <th>Asunto</th> 
           <th>Mensaje</th> 
           </tr> 
           
<?php 

$sql = "SELECT * FROM correos where usu_remitente= '$usuario' order by usu_fecha  desc "; 



$result = $conn->query($sql); 

if ($result->num_rows > 0) { 
   
   while($row = $result->fetch_assoc()){ 
       echo "<tr>"; 
       echo " <td>" . $row["usu_fecha"] . "</td>";
       echo " <td>" . $row['usu_destinatario'] . "</td>"; 
       echo " <td>" . $row['usu_asunto'] . "</td>"; 
       echo " <td> <a href='../../controladores/usuario/leerMensaje.php?mensaje=" . $row['usu_mensaje'] . "'>Leer</a> </td>";

   } 
} else { 
   echo "<tr>"; 
   echo " <td colspan='7'> NO EXISTEN CORREOS ENVIADOS POR EL USUARIO </td>"; 
   echo "</tr>"; 
} 
       $conn->close(); 

       
      
       ?>

           




       

       
       
   </table> 
   </body> 
-->
       
        </article>



        </div>

        <footer>

        <p >&copy; TODOS LOS DERECHOS RESERVADOS</p>
        <p ></Strong> Franklin Gustavo Guallpa Giñin  <Strong> </p>
        <p ></Strong> 2019 <Strong> </p>
                    
        </footer>
    
</body>
</html>

<script type="text/javascript" >
       window.onload=function(){
            // Una vez cargada la página, el formulario se enviara automáticamente.
            setTimeout('buscarPorCedula2()',1);
          
}

</script>
