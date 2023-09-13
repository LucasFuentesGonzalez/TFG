
<h3 class="noticias-raiz" style="margin-top: 86px;">
    <a href="<?php echo $_SESSION['home'] ?>" title="Inicio">Inicio</a> <span>| </span>
    <a href="<?php echo $_SESSION['home'] ?>casas" title="Casas">Casas</a> <span>| </span>
    <span><?php echo $datos->titulo ?></span>
</h3>

<div class="row noticia-caja" style="margin: 0px;">
    <article class="col s12">
        <div class="row card horizontal large" style="margin-bottom: 150px;">
            <div class="card-image">
                <img class="servicio-img" style="width: 750px;" src="<?php echo $_SESSION['public']."img/casas/".$datos->foto ?>" alt="<?php echo $datos->titulo ?>">
            </div>

            <div class="servicio-texto">
                <h4 class="servicio-titu"><?php echo $datos->titulo ?></h4>
                <p class="servicio-dis">Casa en <?php echo $datos->distrito ?></p>
                <p class="servicio-precio"><?php echo $datos->precio ?> €</p>
                <div class="row" style="width: 350px;">
                    <p class="col servicio-metro"><i class="fa-solid fa-cube"></i><?php echo $datos->metros ?> m²</p>
                    <p class="col servicio-habs"><i class="fa-solid fa-bed"></i><?php echo $datos->habitaciones ?> habs</p>
                    <p class="col servicio-planta"><i class="fa-solid fa-building"></i><?php echo $datos->planta ?>ª Planta</p>
                </div>
                <p class="servicio-descr"><?php echo $datos->descripcion ?></p>
                <br>
                <div class="row" style="width: 50%;">
                    <div class="col">
                        <button onclick="window.location.href='<?php echo $_SESSION['home'] ?>contacto'" class="custom-btn-6 btn-6"><b><i class="fa-solid fa-envelope"></i>Contacto</b></button>
                    </div>
                    <div class="col">
                        <button class="custom-btn-7 btn-7"><b><i class="fa-solid fa-phone"></i>987-654-321</b></button>
                    </div>
                </div>
            </div>
        </div>
    </article>
</div>