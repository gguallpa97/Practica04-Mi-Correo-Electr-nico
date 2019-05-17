





<?php 
 session_start();

 include '../../config/conexionBD.php';

 $usuario=isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
 $contrasena=isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;

 
  

 $sql="SELECT usu_rol FROM usuario WHERE usu_correo = '$usuario' and usu_password = MD5('$contrasena')";
 //Enviar una consulta MySQL
 $result=$conn->query($sql); 
//Recupera una fila de resultados como un array asociativo
 $resultarr=mysqli_fetch_assoc($result);
//Obtnemos el valo de una fila especifica
 $attempts = $resultarr["usu_rol"];


 if ($result->num_rows>0) { 
        $_SESSION['isLogged']=TRUE;
        if( $attempts == 'admin' ){
               
               ?>    
               <form name="miformulario" method="POST"  action="../../admin/vista/usuario/index.php"> 
               <input type="hidden"  id="usuario" name="usuario" value= "<?php echo $usuario ?>"  /> 
               </form>
               <?php 



  
        } else{
              ?>    
              <form name="miformulario" method="POST"  action="../../admin/vista/usuario/paginaUsuario.php"> 
              <input type="hidden"  id="usuario" name="usuario" value= "<?php echo $usuario ?>"  /> 
              </form>
              <?php 

        }
        
        
   
 } else {
    header("Location: ../vista/login.html");
     
 }

 $conn->close();

 ?>



 
 <script type="text/javascript" >
       window.onload=function(){
            // Una vez cargada la página, el formulario se enviara automáticamente.
          document.forms["miformulario"].submit();
          
}

</script>



















