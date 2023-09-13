<?php
namespace App;

//Inicializo sesión para poder traspasar variables entre páginas
session_start();

//Incluyo los controladores que voy a utilizar para que seran cargados por Autoload
use App\Controller\AppController;
use App\Controller\NoticiaController;
use App\Controller\UsuarioController;
use App\Controller\CasaController;
use App\Controller\OficinaController;
use App\Controller\LocalController;

/*
 * Asigno a sesión las rutas de las carpetas public y home, necesarias tanto para las rutas como para
 * poder enlazar imágenes y archivos css, js
 */
$_SESSION['public'] = '/TFG/public/';
$_SESSION['home'] = $_SESSION['public'].'index.php/';


//Defino y llamo a la función que autocargará las clases cuando se instancien
spl_autoload_register('App\autoload');

function autoload($clase,$dir=null){

    //Directorio raíz de mi proyecto
    if (is_null($dir)){
        $dirname = str_replace('/public', '', dirname(__FILE__));
        $dir = realpath($dirname);
    }

    //Escaneo en busca de la clase de forma recursiva
    foreach (scandir($dir) as $file){
        //Si es un directorio (y no es de sistema) accedo y
        //busco la clase dentro de él
        if (is_dir($dir."/".$file) AND substr($file, 0, 1) !== '.'){
            autoload($clase, $dir."/".$file);
        }
        //Si es un fichero y el nombr conicide con el de la clase
        else if (is_file($dir."/".$file) AND $file == substr(strrchr($clase, "\\"), 1).".php"){
            require($dir."/".$file);
        }
    }

}

//Para invocar al controlador en cada ruta
function controlador($nombre=null){

    switch($nombre){
        default: return new AppController;
        case "noticias": return new NoticiaController;
        case "usuarios": return new UsuarioController;
        case "casas": return new CasaController;
        case "oficinas": return new OficinaController;
        case "locales": return new LocalController;
    }

}

//Quito la ruta de la home a la que me están pidiendo
$ruta = str_replace($_SESSION['home'], '', $_SERVER['REQUEST_URI']);

//Encamino cada ruta al controlador y acción correspondientes
switch ($ruta){

    //Front-end
    case "":
    case "/":
        controlador()->index();
        break;
    case "acerca-de":
        controlador()->acercade();
        break;
    case "noticias":
        controlador()->noticias();
        break;
    case (strpos($ruta,"noticia/") === 0):
        controlador()->noticia(str_replace("noticia/","",$ruta));
        break;
    case "contacto":
        controlador()->contacto();
        break;
    case "casas":
        controlador()->casas();
        break;
    case (strpos($ruta,"casa/") === 0):
        controlador()->casa(str_replace("casa/","",$ruta));
        break;
    case "oficinas":
        controlador()->oficinas();
        break;
    case (strpos($ruta,"oficina/") === 0):
        controlador()->oficina(str_replace("oficina/","",$ruta));
        break;
    case "locales":
        controlador()->locales();
        break;
    case (strpos($ruta,"local/") === 0):
        controlador()->local(str_replace("local/","",$ruta));
        break;



    //Back-end
    case "admin":
    case "admin/entrar":
        controlador("usuarios")->entrar();
        break;
    case "admin/salir":
        controlador("usuarios")->salir();
        break;
    case "admin/usuarios":
        controlador("usuarios")->index();
        break;
    case "admin/usuarios/crear":
        controlador("usuarios")->crear();
        break;
    case (strpos($ruta,"admin/usuarios/editar/") === 0):
        controlador("usuarios")->editar(str_replace("admin/usuarios/editar/","",$ruta));
        break;
    case (strpos($ruta,"admin/usuarios/activar/") === 0):
        controlador("usuarios")->activar(str_replace("admin/usuarios/activar/","",$ruta));
        break;
    case (strpos($ruta,"admin/usuarios/borrar/") === 0):
        controlador("usuarios")->borrar(str_replace("admin/usuarios/borrar/","",$ruta));
        break;



    //Noticias
    case "admin/noticias":
        controlador("noticias")->index();
        break;
    case "admin/noticias/crear":
        controlador("noticias")->crear();
        break;
    case (strpos($ruta,"admin/noticias/editar/") === 0):
        controlador("noticias")->editar(str_replace("admin/noticias/editar/","",$ruta));
        break;
    case (strpos($ruta,"admin/noticias/activar/") === 0):
        controlador("noticias")->activar(str_replace("admin/noticias/activar/","",$ruta));
        break;
    case (strpos($ruta,"admin/noticias/home/") === 0):
        controlador("noticias")->home(str_replace("admin/noticias/home/","",$ruta));
        break;
    case (strpos($ruta,"admin/noticias/borrar/") === 0):
        controlador("noticias")->borrar(str_replace("admin/noticias/borrar/","",$ruta));
        break;



    //Casas
    case "admin/casas":
        controlador("casas")->index();
        break;
    case "admin/casas/crear":
        controlador("casas")->crear();
        break;
    case (strpos($ruta,"admin/casas/editar/") === 0):
        controlador("casas")->editar(str_replace("admin/casas/editar/","",$ruta));
        break;
    case (strpos($ruta,"admin/casas/activar/") === 0):
        controlador("casas")->activar(str_replace("admin/casas/activar/","",$ruta));
        break;
    case (strpos($ruta,"admin/casas/home/") === 0):
        controlador("casas")->home(str_replace("admin/casas/home/","",$ruta));
        break;
    case (strpos($ruta,"admin/casas/borrar/") === 0):
        controlador("casas")->borrar(str_replace("admin/casas/borrar/","",$ruta));
        break;



    //Oficinas
    case "admin/oficinas":
        controlador("oficinas")->index();
        break;
    case "admin/oficinas/crear":
        controlador("oficinas")->crear();
        break;
    case (strpos($ruta,"admin/oficinas/editar/") === 0):
        controlador("oficinas")->editar(str_replace("admin/oficinas/editar/","",$ruta));
        break;
    case (strpos($ruta,"admin/oficinas/activar/") === 0):
        controlador("oficinas")->activar(str_replace("admin/oficinas/activar/","",$ruta));
        break;
    case (strpos($ruta,"admin/oficinas/home/") === 0):
        controlador("oficinas")->home(str_replace("admin/oficinas/home/","",$ruta));
        break;
    case (strpos($ruta,"admin/oficinas/borrar/") === 0):
        controlador("oficinas")->borrar(str_replace("admin/oficinas/borrar/","",$ruta));
        break;



    //Locales
    case "admin/locales":
        controlador("locales")->index();
        break;
    case "admin/locales/crear":
        controlador("locales")->crear();
        break;
    case (strpos($ruta,"admin/locales/editar/") === 0):
        controlador("locales")->editar(str_replace("admin/locales/editar/","",$ruta));
        break;
    case (strpos($ruta,"admin/locales/activar/") === 0):
        controlador("locales")->activar(str_replace("admin/locales/activar/","",$ruta));
        break;
    case (strpos($ruta,"admin/locales/home/") === 0):
        controlador("locales")->home(str_replace("admin/locales/home/","",$ruta));
        break;
    case (strpos($ruta,"admin/locales/borrar/") === 0):
        controlador("locales")->borrar(str_replace("admin/locales/borrar/","",$ruta));
        break;


    case (strpos($ruta,"admin/") === 0):
        controlador("usuarios")->entrar();
        break;

    //Resto de rutas
    default:
        controlador()->index();

}