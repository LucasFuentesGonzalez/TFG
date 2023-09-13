
<h3 class="noticias-raiz" style="margin-top: 86px;">
    <a href="<?php echo $_SESSION['home'] ?>" title="Inicio">Inicio</a> <span>| Noticias</span>
</h3>
<div style="padding: 30px 30px 30px 10px;">
    <?php foreach ($datos as $row){ ?>
        <article class="inline-block">
            <div class="row card horizontal small">
                <div class="noticias-img">
                    <img class="imagen-carta" src="<?php echo $_SESSION['public']."img/noticias/".$row->imagen ?>" alt="<?php echo $row->titulo ?>">
                </div>
                <div class="noticias-texto">
                    <div>
                        <p class="noticias-titu"><?php echo $row->titulo ?></p>
                        <p class="noticias-entra"><?php echo $row->entradilla ?></p>
                    </div>
                    <div class="noticias-fecha">
                        <p ><?php echo date("d/m/Y", strtotime($row->fecha)) ?></p>
                    </div>
                    <div>
                        <a class="noticias-mas" href="<?php echo $_SESSION['home']."noticia/".$row->slug ?>">Más información</a>
                    </div>
                </div>
            </div>
        </article>
    <?php } ?>
</div>