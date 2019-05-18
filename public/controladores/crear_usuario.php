<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
 <title>Crear Nuevo Usuario</title>
    <style type="text/css" rel="stylesheet">
    .error{
        color: red ;
        font-size: 30px;
    }
    </style>
    
</head>
<body>
 <?php
 //incluir conexión a la base de datos
 include '../../config/conexionBD.php';


 $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;

 $admin=isset($_POST["admin"]) ? trim($_POST["admin"]) : null;
 
 $user=isset($_POST["user"]) ? trim($_POST["user"]) : null; 
 

 $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
 $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
 $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
 $telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]): null;
 $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
 $fechaNacimiento = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]): null;
 $contrasena=isset($_POST["contrasena"])?trim($_POST["contrasena"]) : null;  
 $contr=MD5($contrasena);

 if ($admin == null){
        $rol=$user;
 }else{
        $rol=$admin;
 }
 ///PARA EL ECHIVO DE TIPO FILE
 $archivo=$_FILES["archivo"]["name"]; 


 $sql = "INSERT INTO usuario VALUES (0, '$rol','$cedula','$nombres', '$apellidos', '$direccion', '$telefono',
'$correo','$contr', '$fechaNacimiento', 'N', null, null,'$archivo')";

 if ($conn->query($sql) === TRUE) {
 echo "<p>GUARDADO EXITOSO</p>";
 } else {
 if($conn->errno == 1062){
 echo "<p class='error'>EL USUARIO CON EL NÚMERO LA CÉDULA $cedula YA SE ENCUENTRA REGISTRADO EN EL SISTEMA </p>";
 }else{
 echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
 }
 }
 

 //cerrar la base de datos
 $conn->close();
 
 echo "<a href='../vista/crear_usuario.html'>REGRESAR </a>";
 ?>
 </body>
 </html>