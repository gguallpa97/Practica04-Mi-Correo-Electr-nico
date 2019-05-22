
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
        <title>NUEVO MENSAJE</title>
        <script src="../../../js/ajax.js" type="text/javascript">  </script>
        <link href="../../../estyles/ct_layout2.css" rel= "stylesheet" />
        <link href="../../../estyles/estilo2.css" rel="stylesheet"/>
        <link href="../../../estyles/titulos.css" rel="stylesheet"/>
        <link href="../../../estyles/imagenes.css" rel="stylesheet"/>
        <link rel="stylesheet" href="../../../estyles/estilos.css">
                
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
        
  
    
         <article>
                   
                   <body>

<?php 
    $usuario = $_GET["usuario"]; 
?>

    <section class="form_wrap">
        <section class="cantact_info">
            <!--
            <section class="info_title">
            
                
            <span class="fa fa-user-circle"></span>
                <h2>ENVIAR SU CORREO <br>ELECTRÓNICO </h2>
            </section>
            -->
        </section>

        <form action="../../controladores/usuario/enviar.php" method="post" class="form_contact">
            
        <!--<h2>DATOS </h2>-->    
        
            <div class="user_info">
                <label for="fecha">Fecha *</label>
                <input type="date" name="fecha" value="<?php date_default_timezone_set("America/Guayaquil"); echo date("Y-m-d");?>" disabled >

                <label for="remitente">Remitente *</label>
                <input type="email" id="remitente" name="remitente" value="<?php  echo $usuario ?>"  >

                <label for="destinatario">Destinatario*</label>
                <input type="email" id="destinatario" name="destinatario" >

                <label for="asunto">Asunto*</label>
                <input type="text" id="asunto" name="asunto" >


                <label for="mensaje">Mensaje *</label>
                <textarea id="mensaje" name="mensaje" required> </textarea>

                <input type="submit" value="Enviar Correo " id="btnSend">

            
            
            </div>
        </form>

    </section>

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
