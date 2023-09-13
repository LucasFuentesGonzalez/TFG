<h3 style="margin-left: 15px;">
    <a href="<?php echo $_SESSION['home'] ?>admin" title="Inicio">Inicio</a> <span>| </span>
    <a href="<?php echo $_SESSION['home'] ?>admin/oficinas" title="Oficinas">Oficinas</a> <span>| </span>
    <?php if ($datos->id){ ?>
        <span>Editar <?php echo $datos->titulo ?></span>
    <?php } else { ?>
        <span>Nueva oficina</span>
    <?php } ?>
</h3>
<div class="row">
    <?php $id = ($datos->id) ? $datos->id : "nuevo" ?>
    <form class="col s12" method="POST" enctype="multipart/form-data" action="<?php echo $_SESSION['home'] ?>admin/oficinas/editar/<?php echo $id ?>">
        <div class="col m12 l6">
            <div class="row">
                <div class="input-field col s12">
                    <input id="titulo" type="text" name="titulo" value="<?php echo $datos->titulo ?>">
                    <label for="titulo">Título</label>
                </div>
                <div class="input-field col s12">
                    <input id="distrito" type="text" name="distrito" value="<?php echo $datos->distrito ?>">
                    <label for="distrito">Distrito</label>
                </div>
                <div class="input-field col s12">
                    <input id="precio" type="text" name="precio" value="<?php echo $datos->precio ?>">
                    <label for="precio">Precio</label>
                </div>
                <div class="input-field col s12">
                    <input id="metros" type="text" name="metros" value="<?php echo $datos->metros ?>">
                    <label for="metros">Metros</label>
                </div>
                <div class="input-field col s12">
                    <input id="preciometros" type="text" name="preciometros" value="<?php echo $datos->preciomes ?>">
                    <label for="preciometros">Precio/metros</label>
                </div>
                <div class="input-field col s12">
                    <input id="planta" type="text" name="planta" value="<?php echo $datos->planta ?>">
                    <label for="planta">Planta</label>
                </div>
            </div>
        </div>


        <div class="col m12 l6">
            <div class="file-field input-field">
                <div class="btn">
                    <span>Imagen</span>
                    <input type="file" name="foto">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>
            <?php if ($datos->foto){ ?>
                <img class="img-editar" src="<?php echo $_SESSION['public']."img/oficinas/".$datos->foto ?>" alt="<?php echo $datos->titulo ?>">
            <?php } ?>
        </div>


        <div class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input id="autor" type="text" name="autor" value="<?php echo $datos->autor ?>">
                    <label for="autor">Autor</label>
                </div>
                <div class="input-field col s12">
                    <textarea id="descripcion" class="materialize-textarea" name="descripcion"><?php echo $datos->descripcion ?></textarea>
                    <label for="descripcion">Descripcion</label>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="input-field col s12" style="margin: 0 0 100px 15px;">
                <a href="<?php echo $_SESSION['home'] ?>admin/oficinas" title="Volver">
                    <button class="btn waves-effect waves-light" type="button">Volver
                        <i class="material-icons right">replay</i>
                    </button>
                </a>
                <button class="btn waves-effect waves-light" type="submit" name="guardar">Guardar
                    <i class="material-icons right">save</i>
                </button>
            </div>
        </div>
    </form>
</div>