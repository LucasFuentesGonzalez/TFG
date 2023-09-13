<h3 style="margin: 0 0 20px 15px;">
    <a href="<?php echo $_SESSION['home'] ?>admin" title="Inicio">Inicio</a> <span>| Locales</span>
</h3>

<div class="row">
    <!--Nuevo-->
    <article class="col s12 l6">
        <div class="card horizontal admin">
            <div class="card-stacked">
                <div class="card-content" style="height: 168px;">
                    <i class="grey-text material-icons medium">store</i>
                    <h4 class="grey-text">
                        nuevo local
                    </h4><br><br>
                </div>
                <div class="card-action">
                    <a href="<?php echo $_SESSION['home']."admin/locales/crear" ?>" title="Añadir nuevo local">
                        <i class="material-icons">add_circle</i>
                    </a>
                </div>
            </div>
        </div>
    </article>
    <?php foreach ($datos as $row){ ?>
        <article class="col s12 l6">
            <div class="card horizontal  sticky-action admin">
                <div class="card-stacked">
                    <?php if ($row->imagen){ ?>
                        <div class="card-image">
                            <img src="<?php echo $_SESSION['public']."img/".$row->imagen ?>" alt="<?php echo $row->titulo ?>">
                        </div>
                    <?php } ?>
                    <div class="card-content">
                        <?php if (!$row->imagen){ ?>
                            <i class="grey-text material-icons medium">store</i>
                        <?php } ?>
                        <h4>
                            <?php echo $row->titulo ?>
                        </h4>
                        <strong>URL amigable:</strong> <?php echo $row->slug ?><br>
                    </div>
                    <div class="card-action">
                        <a href="<?php echo $_SESSION['home']."admin/locales/editar/".$row->id ?>" title="Editar">
                            <i class="material-icons">edit</i>
                        </a>
                        <?php $title = ($row->activo == 1) ? "Desactivar" : "Activar" ?>
                        <?php $color = ($row->activo == 1) ? "green-text" : "red-text" ?>
                        <?php $icono = ($row->activo == 1) ? "mood" : "mood_bad" ?>
                        <a href="<?php echo $_SESSION['home']."admin/locales/activar/".$row->id ?>" title="<?php echo $title ?>">
                            <i class="<?php echo $color ?> material-icons"><?php echo $icono ?></i>
                        </a>
                        <?php $title = ($row->home == 1) ? "Quitar de la home" : "Mostrar en la home" ?>
                        <?php $color = ($row->home == 1) ? "green-text" : "red-text" ?>
                        <!--<a href="<?php //echo $_SESSION['home']."admin/locales/home/".$row->id ?>" title="<?php //echo $title ?>">
                            <i class="<?php //echo $color ?> material-icons">home</i>
                        </a>-->
                        <a href="#" class="activator" title="Borrar">
                            <i class="material-icons">delete</i>
                        </a>
                    </div>
                </div>
                <!--Confirmación de borrar-->
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Borrar local<i class="material-icons right">close</i></span>
                    <p>
                        ¿Está seguro de que quiere borrar el local<strong><?php echo $row->titulo ?></strong>?<br>
                        Esta acción no se puede deshacer.
                    </p>
                    <a href="<?php echo $_SESSION['home']."admin/locales/borrar/".$row->id ?>" title="Borrar">
                        <button class="btn waves-effect waves-light" type="button">Borrar
                            <i class="material-icons right">delete</i>
                        </button>
                    </a>
                </div>
            </div>
        </article>
    <?php } ?>
</div>