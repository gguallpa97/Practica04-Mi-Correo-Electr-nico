
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
        <title>ELIMINAR USUARIO  </title>
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

                                 $cad4 = "eliminar2.php?codigo=";
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
                  <h1>ELIMINAR USUARIO   </h1>

                  <?php 
     $codigo = $resultarr["usu_codigo"];
    
    $sql = "SELECT * FROM usuario where usu_codigo=$codigo"; 
    
    include '../../../config/conexionBD.php'; 
    $result = $conn->query($sql); 
    if ($result->num_rows > 0) { 
        while($row = $result->fetch_assoc()) { 
        ?> 
            
            
            <form id="formulario01" method="POST" action="../../controladores/usuario/eliminar.php"> 
            <legend><Strong> ELIMINACIÓN DE UN USUARIO</Strong> </legend> <br> 
            <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" /> 
            
            <label for="cedula">Cedula (*)</label> 
            <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" disabled/> <br> 

            <label for="nombres">Nombres (*)</label> 
            <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"]; ?>" disabled/> <br> 
            
            <label for="apellidos">Apelidos (*)</label>
            <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"]; ?>" disabled/> <br> 
            
            <label for="direccion">Dirección (*)</label> 
            <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"]; ?>" disabled/> <br> 
            
            <label for="telefono">Teléfono (*)</label> 
            <input type="text" id="telefono" name="telefono" value="<?php echo $row["usu_telefono"]; ?>" disabled/> <br> 
            
            <label for="fecha">Fecha Nacimiento (*)</label> 
            <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["usu_fecha_nacimiento"]; ?>" disabled/> <br> 
            
            <label for="correo">Correo electrónico (*)</label> 
            <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" disabled/> <br> 
            
            
            <div class="button">

            <br> 
                <button type="submit">Eliminar</button>
                
              
                

            </div>
             
        
            </form> 
            <?php 
            } 
            } else { 
                echo "<p>Ha ocurrido un error inesperado !</p>";    
                 echo "<p>" . mysqli_error($conn) . "</p>"; 
            } 
            $conn->close(); 
            
        ?> 

    </article>

</div>

<footer>

        <p >&copy; TODOS LOS DERECHOS RESERVADOS</p>
        <p ></Strong> Franklin Gustavo Guallpa Giñin  <Strong> </p>
        <p ></Strong> 2019 <Strong> </p>
</footer>

</body>
</html>

























<!DOCTYPE html> 
<html> 
    <head>
    <meta charset="UTF-8"> 
    <title>Eliminar datos de persona</title>
    <link href="../../../estyles/estilo.css" rel="stylesheet">

|| </head> 
<body> 
    <?php 
    $codigo = $_GET["codigo"]; 

    $sql = "SELECT * FROM usuario where usu_codigo=$codigo"; 
    
    include '../../../config/conexionBD.php'; 
    $result = $conn->query($sql); 
    if ($result->num_rows > 0) { 
        while($row = $result->fetch_assoc()) { 
        ?> 
            
            
            <form id="formulario01" method="POST" action="../../controladores/usuario/eliminar.php"> 
            <legend><Strong> ELIMINACIÓN DE UN USUARIO</Strong> </legend> <br> 
            <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" /> 
            
            <label for="cedula">Cedula (*)</label> 
            <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" disabled/> <br> 

            <label for="nombres">Nombres (*)</label> 
            <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"]; ?>" disabled/> <br> 
            
            <label for="apellidos">Apelidos (*)</label>
            <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"]; ?>" disabled/> <br> 
            
            <label for="direccion">Dirección (*)</label> 
            <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"]; ?>" disabled/> <br> 
            
            <label for="telefono">Teléfono (*)</label> 
            <input type="text" id="telefono" name="telefono" value="<?php echo $row["usu_telefono"]; ?>" disabled/> <br> 
            
            <label for="fecha">Fecha Nacimiento (*)</label> 
            <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo $row["usu_fecha_nacimiento"]; ?>" disabled/> <br> 
            
            <label for="correo">Correo electrónico (*)</label> 
            <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" disabled/> <br> 
            
            
            <div class="button">

            <br> 
                <button type="submit">Eliminar</button>
                
                <button type="reset" onclick="history.back()" >Cancelar</button>
                

            </div>
             
        
            </form> 
            <?php 
            } 
            } else { 
                echo "<p>Ha ocurrido un error inesperado !</p>";    
                 echo "<p>" . mysqli_error($conn) . "</p>"; 
            } 
            $conn->close(); 
            
        ?> 
        
    </body> 
    
    </html>