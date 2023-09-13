
<!-- Slider -->
<div id="myCarousel" class="carousel slide" data-ride="carousel" style="margin-top: 64px;">

    <!-- Capas -->
    <div class="carousel-inner" role="listbox">

        <!-- Capa 1 -->
        <div class="item active">
            <img src="<?php echo $_SESSION['public'] ?>/img/slider1.jpg" alt="Palacio Real" width="100%" style="filter: brightness(80%);">
            <div class="carousel-caption">
                <p style="margin: 0px;"><b>¿Buscas una agencia inmobiliaria que <br> no te trate como a uno más?</b></p>
                <button onclick="window.location.href='<?php echo $_SESSION['home'] ?>acerca-de'" class="custom-btn-1 btn-1"><b>Mas</b></button>
            </div>
        </div>

        <!-- Capa 2 -->
        <div class="item">
            <img src="<?php echo $_SESSION['public'] ?>/img/slider2.jpg" alt="Habitacion" width="100%" style="filter: brightness(90%);">
            <div class="carousel-caption">
                <p style="margin: 0px;"><b>Escucha los consejos de nuestros expertos interioristas que te aconsejaran como puedes llevar a cabo reformas para potenciar el valor de tu inmueble.</b></p>
                <button onclick="window.location.href='<?php echo $_SESSION['home'] ?>contacto'" class="custom-btn-2 btn-2"><b>Contáctanos</b></button>
            </div>
        </div>

        <!-- Capa 3 -->
        <div class="item">
            <img src="<?php echo $_SESSION['public'] ?>/img/slider3.jpg" alt="Oficina" width="100%" style="filter: brightness(70%);">
            <div class="carousel-caption">
                <p style="margin: 0px;"><b>Realizamos una búsqueda exhaustiva para encontrar una oficina con las características que requiera tu empresa.</b></p>
                <button onclick="window.location.href='<?php echo $_SESSION['home'] ?>acerca-de'" class="custom-btn-3 btn-3"><b>Mas</b></button>
            </div>
        </div>
    </div>

    <!-- Boton Derecho e Izquierdo -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>



<!-- Entradilla -->
<div class="entradilla">
    <p>¿Que buscas?</p>
</div>
<div class="contenedor">
    <div class="barra"></div>
</div>



<!-- Servicios -->
<div class="centrar" >
    <div class="container">
        <div class="row" style="margin-left: 10px;">
            <!-- Viviendas -->
            <div class="col">
                <a href=""> <!--Link a Casas-->
                    <div class="servicio1">
                        <a href="<?php echo $_SESSION['home'] ?>casas">
                            <div class="servicio-caja">
                                <p><b>Casas</b></p>
                            </div>
                        </a>
                    </div>
                </a>
            </div>

            <!-- Oficinas -->
            <div class="col">
                <a href=""> <!--Link a Oficinas-->
                    <div class="servicio2">
                        <a href="<?php echo $_SESSION['home'] ?>oficinas">
                            <div class="servicio-caja">
                                <p><b>Oficinas</b></p>
                            </div>
                        </a>
                    </div>
                </a>
            </div>

            <!-- Locales -->
            <div class="col">
                <a href=""> <!--Link a Locales-->
                    <div class="servicio3">
                        <a href="<?php echo $_SESSION['home'] ?>locales">
                            <div class="servicio-caja">
                                <p><b>Locales</b></p>
                            </div>
                        </a>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>


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
<!-- Contacto -->
<div class="contacto" style="background-color: #D9D9D9;">
    <div class="row">
        <div class="col contacto-1caja" style="padding: 40px 80px 0 0;">
            <h3 class="contacto-titu"><b>¿Hablamos?</b></h3>
            <p class="contacto-tex"><b>Consulta sin compromiso.<br>
                Sabemos que cada cliente es distinto y tiene necesidades diferentes. Por eso, no dudes en ponerte en contacto
                con nosotros para contarnos tu proyecto y resolver cualquier duda sobre él. Te ofreceremos la solución que mejor
                se adapte a ti.</b></p>
        </div>

        <div class="col">
            <form method="post" class="formulario-inicio">

                <div class="form-group">
                    <label for="inputNombre"></label>
                    <p class="error"><?php echo $error_nombre ?></p><!--Mostramos el error de nombre-->
                    <input style="background-color: #FAFAFA; border: 1px solid #C4C4C4; border-radius: 10px; outline: none; width: 96%; font-size: 20px; color: black; margin: 0; padding: 5px 5px 5px 10px;"
                           type="text" class="form-contacto" name="inputNombre" id="inputNombre" placeholder="Nombre" required>
                </div>

                <div class="form-group">
                    <label for="inputApellido"></label>
                    <p class="error"><?php echo $error_apellido ?></p><!--Mostramos el error de apellido-->
                    <input style="background-color: #FAFAFA; border: 1px solid #C4C4C4; border-radius: 10px; outline: none; width: 96%; font-size: 20px; color: black; margin: 0; padding: 5px 5px 5px 10px;"
                           type="text" class="form-contacto" name="inputApellido" id="inputApellido" placeholder="Apellido" required>
                </div>

                <div class="form-group">
                    <label for="inputEmail"></label>
                    <p class="error"><?php echo $error_email ?></p><!--Mostramos el error de email-->
                    <input style="background-color: #FAFAFA; border: 1px solid #C4C4C4; border-radius: 10px; outline: none; width: 96%; font-size: 20px; color: black; margin: 0; padding: 5px 5px 5px 10px;"
                           type="text" class="form-contacto" name="inputEmail" id="inputEmail" placeholder="Email" required>
                </div>

                <div class="form-group">
                    <label for="inputTelefono"></label>
                    <p class="error"><?php echo $error_telefono ?></p><!--Mostramos el error de telefono-->
                    <input style="background-color: #FAFAFA; border: 1px solid #C4C4C4; border-radius: 10px; outline: none; width: 96%; font-size: 20px; color: black; margin: 0; padding: 5px 5px 5px 10px;"
                           type="tel" class="form-contacto" name="inputTelefono" id="inputTelefono" placeholder="Telefono" required>
                </div>

                <div class="form-outline mb-4">
                    <label for="inputTexto"></label>
                    <textarea style="background-color: #FAFAFA; border: 1px solid #C4C4C4; border-radius: 10px; outline: none; font-size: 20px; color: black; margin: 0; padding: 5px 5px 5px 10px;"
                              class="form-control contacto" name="inputTexto" id="inputTexto" rows="4" placeholder="Consulta"></textarea>
                </div>

                <input style="margin: 10px 0 10px 25%;" class="custom-btn-4 btn-4" type="submit" name="Enviar">
            </form>
        </div>

    </div>
</div>



<!-- Mas -->
<div>
    <div class="Mas">
        <div class="mas-caja">
            <p class="mas-tex"><b>¿Te interesa el mundo de bienes raíces?</b></p>
            <div style="text-align: center; ">
                <button onclick="window.location.href='<?php echo $_SESSION['home'] ?>acerca-de'" class="custom-btn-1 btn-1"><b>Mas</b></button>
            </div>
        </div>
    </div>
</div>





<!-- Apartado -->
<div class="row" style="padding-right: 20%; margin: 0px;">
    <div class="col-md-4" style="padding: 0;">
        <img src="<?php echo $_SESSION['public'] ?>/img/Stock1.jpg">
    </div>
    <div class="col-md-8 apartado-caja">
        <p class="apartado-titu"><b>¿Eres una empresa?</b></p>
        <p class="apartado-tex"><b>Ofrecemos un servicio a medida para empresas</b></p>
        <div>
            <button onclick="window.location.href='<?php echo $_SESSION['home'] ?>acerca-de'" class="custom-btn-4 btn-4">Mas</button>
        </div>
    </div>
</div>




<main>
<!--<section class="container-fluid">

        <h3>Inicio</h3>
        <div class="row">
            <?php /*foreach ($datos as $row){ ?>
                <article class="col m12 l6">
                    <div class="card horizontal small">
                        <div class="card-image">
                            <img src="<?php echo $_SESSION['public']."img/".$row->imagen ?>" alt="<?php echo $row->titulo ?>">
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <h4><?php echo $row->titulo ?></h4>
                                <p><?php echo $row->entradilla ?></p>
                            </div>
                            <div class="card-info">
                                <p><?php echo date("d/m/Y", strtotime($row->fecha)) ?></p>
                            </div>
                            <div class="card-action">
                                <a href="<?php echo $_SESSION['home']."noticia/".$row->slug ?>">Más información</a>
                            </div>
                        </div>
                    </div>
                </article>
            <?php }*/ ?>
        </div>-->