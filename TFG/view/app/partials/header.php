<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Optimiza Real State</title>

    <!--CSS y Materialize-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $_SESSION['public'] ?>css/app.css">

    <!--Boostrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <!--Boostrap scripts-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

    <!--Iconos-->
    <script src="https://kit.fontawesome.com/6531868908.js" crossorigin="anonymous"></script>

</head>

<body>
<nav>
    <div class="nav-wrapper">
        <!--Logo-->
        <a href="<?php echo $_SESSION['home'] ?>" class="brand-logo" title="Inicio">
            <img src="<?php echo $_SESSION['public'] ?>img/Logo.svg" alt="Logo Optimiza">
        </a>
        <!--Botón menú móviles-->
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

        <!--Menú de navegación-->
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li>
                <a href="<?php echo $_SESSION['home'] ?>" style="padding: 0 20px 0 20px;" title="Inicio">Inicio</a>
            </li>
            <li class="nav-servicio">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                   aria-expanded="false" title="Servicios" style="padding: 0 10px 0 20px;">Servicios
                </a>
                <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink" >
                    <li><a class="dropdown-item" href="<?php echo $_SESSION['home'] ?>casas">Casas</a></li>
                    <li><a class="dropdown-item" href="<?php echo $_SESSION['home'] ?>oficinas">Oficinas</a></li>
                    <li><a class="dropdown-item" href="<?php echo $_SESSION['home'] ?>locales">Locales</a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo $_SESSION['home'] ?>noticias" style="padding-left: 15px;" title="Noticias">Noticias</a>
            </li>
            <li>
                <a href="<?php echo $_SESSION['home'] ?>contacto" title="contacto">Contacto</a>
            </li>
            <li>
                <a href="<?php echo $_SESSION['home'] ?>acerca-de" title="Acerca de">Acerca de</a>
            </li>
            <li>
                <a href="<?php echo $_SESSION['home'] ?>admin" title="Panel de administración"
                   target="_blank" class="texto-amarillo">Admin</a>
            </li>
        </ul>
    </div>
</nav>



<!--Menú de navegación móvil-->
<ul class="sidenav" id="mobile-demo">
    <li>
        <a href="<?php echo $_SESSION['home'] ?>" title="Inicio">Inicio</a>
    </li>
    <li>
        <a title="Servicios">Servicios</a>
    </li>
    <li>
        <a href="<?php echo $_SESSION['home'] ?>noticias" title="Noticias">Noticias</a>
    </li>
    <li>
        <a href="<?php echo $_SESSION['home'] ?>contacto" title="contacto">Contacto</a>
    </li>
    <li>
        <a href="<?php echo $_SESSION['home'] ?>acerca-de" title="Acerca de">Acerca de</a>
    </li>
    <li>
        <a href="<?php echo $_SESSION['home'] ?>admin" title="Panel de administración"
           target="_blank" class="grey-text"> Admin </a>
    </li>
</ul>

