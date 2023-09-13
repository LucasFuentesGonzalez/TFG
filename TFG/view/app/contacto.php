<?php

if(isset($_POST['Enviar'])) { //Guardamos los inputs en estas variables
    $nombre = filter_input(INPUT_POST, 'inputNombre', FILTER_SANITIZE_STRING);
    $apellido = filter_input(INPUT_POST, 'inputApellido', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'inputEmail', FILTER_SANITIZE_STRING);
    $telefono = filter_input(INPUT_POST, 'inputTelefono', FILTER_SANITIZE_STRING);
}

//Comprobamos que se cumplan las condiciones
$re1 = preg_match("/[0-9]/",$nombre);//Patron para comprobar si contiene numeros
$re2 = preg_match("/[0-9]/",$apellido);//Patron para comprobar si contiene numeros
$re3 = preg_match("/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-ZÑa-zñ]+$/",$email);//Patron para comprobar el email
$re4 = preg_match("/^([0-9]{9,9})$/",$telefono);//Patron para comprobar el telefono


//Declaramos las variables para mostrar los errores
$error_nombre = " ";
$error_apellido = " ";
$error_email = " ";
$error_telefono = " ";


//En caso de que se cumplan las codiciones mostraremos los siguientes mensajes
if(isset($_POST['Enviar'])) {
    if ($re1 == 1){$error_nombre = "*El nombre solo puede contener letras<br>";}
    if ($re2 == 1){$error_apellido = "*El apellido solo puede contener letras<br>";}
    if ($re3 == 0){$error_email = "*Introduce un email válido<br>";}
    if ($re4 == 0){$error_telefono = "*Debes introducir 9 numeros<br>";}


    //En caso de que no rellenen los inputs apareceran los siguientes errores
    if (empty($nombre)){$error_nombre = "*Introduce un nombre<br>";}
    if (empty($apellido)){$error_apellido = "*Introduce un apellido<br>";}
    if (empty($email)){$error_email = "*Introduce un email<br>";}
    if (empty($telefono)){$error_telefono = "*Introduce un telefono<br>";}
}

?>
<!-- Formulario -->
<div class="container" style="margin-top: 64px;">
    <div class="row caja-contacto" style="margin-bottom: 80px;">
        <div class="col">
            <div class="contacto-amarillo">
                <p>Contacto</p>
            </div>
            <div class="contacto-hablemos">
                <p>Hey,</p>
                <p>Hablemos</p>
            </div>
        </div>

        <div class="col">
            <form method="post" class="contacto-formulario">

                <div style="margin-top: 80px;">
                    <label for="inputNombre"></label>
                    <p class="error"><?php echo $error_nombre ?></p><!--Mostramos el error de nombre-->
                    <input style="background-color: #FAFAFA; border: 1px solid #C4C4C4; border-radius: 10px; outline: none; height: 40px; width: 350px; font-size: 20px; color: black; margin: 0 0 15px 0; padding: 5px 0 5px 10px;"
                           type="text" class="form-contacto" name="inputNombre" id="inputNombre" placeholder="Nombre" required>
                </div>

                <div>
                    <label for="inputApellido"></label>
                    <p class="error"><?php echo $error_apellido ?></p><!--Mostramos el error de apellido-->
                    <input style="background-color: #FAFAFA; border: 1px solid #C4C4C4; border-radius: 10px; outline: none; height: 40px; width: 350px; font-size: 20px; color: black; margin: 0 0 15px 0; padding: 5px 0 5px 10px;"
                            type="text" class="form-contacto" name="inputApellido" id="inputApellido" placeholder="Apellido" required>
                </div>

                <div>
                    <label for="inputEmail"></label>
                    <p class="error"><?php echo $error_email ?></p><!--Mostramos el error de email-->
                    <input style="background-color: #FAFAFA; border: 1px solid #C4C4C4; border-radius: 10px; outline: none; height: 40px; width: 350px; font-size: 20px; color: black; margin: 0 0 15px 0; padding: 5px 0 5px 10px;"
                            type="text" class="form-contacto" name="inputEmail" id="inputEmail" placeholder="Email" required>
                </div>

                <div>
                    <label for="inputTelefono"></label>
                    <p class="error"><?php echo $error_telefono ?></p><!--Mostramos el error de telefono-->
                    <input style="background-color: #FAFAFA; border: 1px solid #C4C4C4; border-radius: 10px; outline: none; height: 40px; width: 350px; font-size: 20px; color: black; margin: 0 0 10px 0; padding: 5px 0 5px 10px;"
                            type="tel" class="form-contacto" name="inputTelefono" id="inputTelefono" placeholder="Telefono" required>
                </div>

                <div class="form-outline mb-4">
                    <label for="inputTexto"></label>
                    <textarea style="background-color: #FAFAFA; border: 1px solid #C4C4C4; border-radius: 10px; outline: none; height: 140px; width: 362px; font-size: 20px; color: black; margin: 0 0 15px 0; padding: 5px 0 5px 10px;"
                              class="form-control contacto" name="inputTexto" id="inputTexto" rows="4" placeholder="Consulta"></textarea>
                </div>

                <input class="custom-btn-5 btn-5" type="submit" name="Enviar">
            </form>
        </div>
    </div>
</div>

