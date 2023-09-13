
<h3 class="noticias-raiz" style="margin-top: 86px;">
    <a href="<?php echo $_SESSION['home'] ?>" title="Inicio">Inicio</a> <span>| Oficinas</span>
</h3>
<div style="padding: 30px 30px 30px 55px;">
    <div class="row">
        <div class="col">

            <div class="row" >
                <div class="col servicios-filtro" style="padding-top: 8px;">
                    <p>Distrito</p>
                </div>
                <div class="col servicios-filtro" style="padding-top: 8px; border-color: #FFB345;">
                    <p>Filtros <i class="fa-solid fa-angle-down"></i></p>
                </div>
                <div class="col servicios-filtro" style="padding-top: 8px;">
                    <p>Precio</p>
                </div>
                <div class="col servicios-filtro" style="padding-top: 8px;">
                    <p>Metros</p>
                </div>
            </div>
            <hr>

            <div class="row" style="width: 40%; margin-left: 30px;">
                <div class="col servicios-opcion">
                    <p>Comprar</p>
                </div>
                <div class="col servicios-opcion">
                    <p>Alquilar</p>
                </div>
                <div class="col servicios-opcion">
                    <p>Obra Nueva</p>
                </div>
            </div>
            <hr>

            <div class="servicios-ordenar">
                <p><i class="fa-solid fa-arrow-down-short-wide"></i>Ordenar por: <i class="fa-solid fa-angle-down"></i></p>
            </div>

            <div class="col servicios-barra">
                <?php foreach ($datos as $row){ ?>
                    <article>
                        <div class="row card horizontal small">
                            <div class="row">
                                <div class="col">
                                    <img class="servicios-img" src="<?php echo $_SESSION['public']."img/oficinas/".$row->foto ?>" alt="<?php echo $row->titulo ?>">
                                </div>

                                <div class="col">
                                    <div class="servicios-texto">
                                        <p class="servicios-titu"><?php echo $row->titulo ?></p>
                                        <p class="servicios-dis">Oficina en <?php echo $row->distrito ?></p>
                                        <p class="servicios-precio"><?php echo $row->precio ?> €</p>
                                        <div class="row servicios-iconos">
                                            <div class="col">
                                                <p class="servicios-preciomes"><i class="fa-solid fa-sack-dollar"></i><?php echo $row->preciomes ?> €/m²</p>
                                            </div>
                                            <div class="col">
                                                <p class="servicios-metro"><i class="fa-solid fa-cube"></i><?php echo $row->metros ?> m²</p>
                                            </div>
                                            <div class="col">
                                                <p class="servicios-planta"><i class="fa-solid fa-building"></i><?php echo $row->planta ?>º Planta</p>
                                            </div>
                                        </div>

                                        <div>
                                            <a class="servicios-mas" href="<?php echo $_SESSION['home']."oficina/".$row->slug ?>">Más información</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php } ?>
            </div>
        </div>
        <div class="col">
            <div id="map-container-google-1" class="z-depth-1-half map-container" style="width: 98%; margin: 10px 100px 0 10px;">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d12145.815734425658!2d-3.71305035!3d40.443089!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2ses!4v1653676441148!5m2!1ses!2ses"
                        width="100%" height="970px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</div>