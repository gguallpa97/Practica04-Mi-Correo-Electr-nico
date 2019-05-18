
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulario de contacto</title>
    <link rel="stylesheet" href="../../estyles/estilos.css">
    


</head>
<body>

    <section class="form_wrap">
        <section class="cantact_info">
            <section class="info_title">
                <span class="fa fa-user-circle"></span>
                <h2>ENVIAR SU CORREO <br>ELECTRÓNICO </h2>
            </section>
        </section>

        <form action="../controladores/enviar.php" method="post" class="form_contact">
            
            <h2>DATOS </h2>
            <div class="user_info">
                <label for="fecha">Fecha *</label>
                <input type="date" name="fecha" value="<?php date_default_timezone_set("America/Guayaquil"); echo date("Y-m-d");?>" disabled >

                <label for="remitente">Remitente *</label>
                <input type="text" id="remitente" name="remitente" >

                <label for="destinatario">Destinatario*</label>
                <input type="text" id="destinatario" name="destinatario" >

                <label for="asunto">Asunto*</label>
                <input type="text" id="asunto" name="asunto" >


                <label for="mensaje">Mensaje *</label>
                <textarea id="mensaje" name="mensaje" required> </textarea>

                <input type="submit" value="Enviar Correo " id="btnSend">

                <button type="reset" onclick="history.back()" >Cancelar</button>
            
            </div>
        </form>

    </section>

</body>
</html>