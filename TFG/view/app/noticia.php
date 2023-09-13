
<h3 class="noticias-raiz" style="margin-top: 86px;">
    <a href="<?php echo $_SESSION['home'] ?>" title="Inicio">Inicio</a> <span>| </span>
    <a href="<?php echo $_SESSION['home'] ?>noticias" title="Noticias">Noticias</a> <span>| </span>
    <span><?php echo $datos->titulo ?></span>
</h3>

<div class="noticia-caja">
    <article>
        <div class="row card" >
            <div class="card-image imagen-noticia" style="margin: 0 auto;">
                <img src="<?php echo $_SESSION['public']."img/noticias/".$datos->imagen ?>" alt="<?php echo $datos->titulo ?>">
                <div class="noticia-titu"><?php echo $datos->titulo ?></div>
            </div>

            <div class="noticia-texto">
                <p><?php echo $datos->entradilla ?></p>
                <p><?php echo $datos->texto ?></p>
                <br>
                <p>
                    <strong>Fecha</strong>: <?php echo date("d/m/Y", strtotime($datos->fecha)) ?>
                    <strong>Autor</strong>: <?php echo $datos->autor ?>
                </p>
            </div>
        </div>
    </article>
</div>