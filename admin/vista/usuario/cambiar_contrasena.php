
<!DOCTYPE html> 
<html>
<head>
<meta charset="UTF-8">
<link href="../../../estyles/estilo.css" rel="stylesheet">

 <title>Modificar datos de persona</title>
 </head> 
 <body> 
     <?php 
     $codigo = $_GET["codigo"]; 
     ?> 
     
     <form id="formulario01" method="POST" action="../../controladores/usuario/cambiar_contrasena.php"> 
     <legend><Strong>ACTUALIZAR SU CONTRASEÑA </Strong> </legend> <br> 
     <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" /> 
     
     <label for="cedula">Contraseña Actual (*)</label> 
     <input type="password" id="contrasena1" name="contrasena1" value="" required placeholder="Ingrese su contraseña actual ..."/> <br> 
     
     
     <label for="cedula">Contraseña Nueva (*)</label> 
     <input type="password" id="contrasena2" name="contrasena2" value="" required placeholder="Ingrese su contraseña nueva ..."/> <br> 
     
     <div class="button">

            <br> 
                <button type="submit">Cambiar Contraseña</button>
                
                <button type="reset" onclick="history.back()" >Cancelar</button>
                
            </div>

     </form> 
    
     
</body> 
</html>