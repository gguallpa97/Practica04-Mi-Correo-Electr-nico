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
        <title>Pagina Usuario</title>
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
                    $usuario=$_POST["usuario"]; 
 
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
                        <li><a >INICIO</a></li>
                        
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
        
  
			
        <div id = "lateral">
            
                <?php 
                $imagen = $resultarr["usu_imagen"];
                $carpeta = "../../../images/"; 
                $ruta= $carpeta . $imagen;     

                ?>
                    <!--PARA COLOCAR LA IMAGEN DE NUESTRO USUARIO-->
            <img  class="centrarImagen"src="<?php echo $ruta ?>" alt="" />
                
                <?php

                $nombres = $resultarr["usu_nombres"];
                $apellidos = $resultarr["usu_apellidos"];
                $nombreCompleto=$nombres. '  '.$apellidos;
                ?>
                            
            <h1> <?php echo $nombreCompleto?> </h1>

        </div>
            
          



<!--PARA MOSTEA  LA LISTA DE CORREOS-->
<div >
    
    <article>
                  <h1>MENSAJES ELECTRÓNICOS </h1>
        <body> 
            <table border = 1 style="width:100%"> 
                <tr> 
                <th>Fecha/Hora</th> 
                <th>Remitente</th> 
                <th>Destinatario</th> 
                <th>Asunto</th> 
                <th>Eliminar Mensaje</th>
                </tr> 
        
                <!--PARA LISTAR LOS CORREOS-->       
                <?php 

                //CONEXION A LA BASE DE DATOS
                    //include '../../../config/conexionBD.php';

                    $sql = "SELECT * FROM correos order by usu_codigo desc"; 
 
                    $result = $conn->query($sql); 

                    if ($result->num_rows > 0) { 
    
                    while($row = $result->fetch_assoc()){ 
                    echo "<tr>"; 
                    echo " <td>" . $row["usu_fecha"] . "</td>";
                    echo " <td>" . $row['usu_remitente'] . "</td>"; 
                    echo " <td>" . $row['usu_destinatario'] . "</td>"; 
                    echo " <td>" . $row['usu_asunto'] . "</td>"; 
                    echo " <td> <a href='../../controladores/usuario/eliminarMensaje.php?codigo=" . $row['usu_codigo'] . "'>Eliminar</a> </td>";
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

    </article>

</div>

<footer>

        <p >&copy; TODOS LOS DERECHOS RESERVADOS</p>
        <p ></Strong> Franklin Gustavo Guallpa Giñin  <Strong> </p>
        <p ></Strong> 2019 <Strong> </p>
</footer>

</body>
</html>






















