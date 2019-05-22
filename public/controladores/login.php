

<?php 
 session_start();

 include '../../config/conexionBD.php';

 $usuario=isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
 $contrasena=isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;

 
  

 $sql="SELECT usu_rol FROM usuario WHERE usu_correo = '$usuario' and usu_password = MD5('$contrasena' ) and  usu_eliminado = 'N'       " ;
 //Enviar una consulta MySQL
 $result=$conn->query($sql); 
//Recupera una fila de resultados como un array asociativo
 $resultarr=mysqli_fetch_assoc($result);
//Obtnemos el valo de una fila especifica
 $attempts = $resultarr["usu_rol"];


 if ($result->num_rows>0) { 
        $_SESSION['isLogged']=TRUE;

        if( $attempts == 'admin' ){
              $_SESSION['admin'] = $usuario;
              $_SESSION['privilegios'] = 'admin';

              header("Location: ../../admin/vista/usuario/index.php");

        } else{

              $_SESSION['user'] = $usuario;
              $_SESSION['privilegios'] = 'user';
              header("Location: ../../admin/vista/usuario/paginaUsuario.php");

        }
        
        
   
 } else {
    header("Location: ../vista/login.html");
     
 }

 $conn->close();

 ?>



 





















