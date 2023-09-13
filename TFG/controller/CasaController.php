<?php
namespace App\Controller;

use App\Helper\ViewHelper;
use App\Helper\DbHelper;
use App\Model\Casa;


class CasaController
{
    var $db;
    var $view;

    function __construct()
    {
        //Conexión a la BBDD
        $dbHelper = new DbHelper();
        $this->db = $dbHelper->db;

        //Instancio el ViewHelper
        $viewHelper = new ViewHelper();
        $this->view = $viewHelper;
    }

    //Listado de casas
    public function index(){

        //Permisos
        $this->view->permisos("casas");

        //Recojo las casas de la base de datos
        $rowset = $this->db->query("SELECT * FROM casas");

        //Asigno resultados a un array de instancias del modelo
        $casas = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)){
            array_push($casas,new Casa($row));
        }

        $this->view->vista("admin","casas/index", $casas);

    }

    //Para activar o desactivar
    public function activar($id){

        //Permisos
        $this->view->permisos("casas");

        //Obtengo la casa
        $rowset = $this->db->query("SELECT * FROM casas WHERE id='$id' LIMIT 1");
        $row = $rowset->fetch(\PDO::FETCH_OBJ);
        $casa = new Casa($row);

        if ($casa->activo == 1){

            //Desactivo la casa
            $consulta = $this->db->exec("UPDATE casas SET activo=0 WHERE id='$id'");

            //Mensaje y redirección
            ($consulta > 0) ? //Compruebo consulta para ver que no ha habido errores
                $this->view->redireccionConMensaje("admin/casas","green","La casa <strong>$casa->titulo</strong> se ha desactivado correctamente.") :
                $this->view->redireccionConMensaje("admin/casas","red","Hubo un error al guardar en la base de datos.");
        }

        else{

            //Activo la casa
            $consulta = $this->db->exec("UPDATE casas SET activo=1 WHERE id='$id'");

            //Mensaje y redirección
            ($consulta > 0) ? //Compruebo consulta para ver que no ha habido errores
                $this->view->redireccionConMensaje("admin/casas","green","La casa <strong>$casa->titulo</strong> se ha activado correctamente.") :
                $this->view->redireccionConMensaje("admin/casas","red","Hubo un error al guardar en la base de datos.");
        }

    }

    public function borrar($id){

        //Permisos
        $this->view->permisos("casas");

        //Obtengo la casa
        $rowset = $this->db->query("SELECT * FROM casas WHERE id='$id' LIMIT 1");
        $row = $rowset->fetch(\PDO::FETCH_OBJ);
        $casa = new Casa($row);

        //Borro la casa
        $consulta = $this->db->exec("DELETE FROM casas WHERE id='$id'");

        //Borro la foto asociada
        $archivo = $_SESSION['public']."img/casas/".$casa->foto;
        $texto_foto = "";
        if (is_file($archivo)){
            unlink($archivo);
            $texto_foto = " y se ha borrado la foto asociada";
        }

        //Mensaje y redirección
        ($consulta > 0) ? //Compruebo consulta para ver que no ha habido errores
            $this->view->redireccionConMensaje("admin/casas","green","La casa se ha borrado correctamente$texto_foto.") :
            $this->view->redireccionConMensaje("admin/casas","red","Hubo un error al guardar en la base de datos.");

    }

    public function crear(){

        //Permisos
        $this->view->permisos("casas");

        //Creo un nuevo usuario vacío
        $casa = new Casa();

        //Llamo a la ventana de edición
        $this->view->vista("admin","casas/editar", $casa);

    }

    public function editar($id){

        //Permisos
        $this->view->permisos("casas");

        //Si ha pulsado el botón de guardar
        if (isset($_POST["guardar"])){

            //Recupero los datos del formulario
            $titulo = filter_input(INPUT_POST, "titulo", FILTER_SANITIZE_STRING);
            $distrito = filter_input(INPUT_POST, "distrito", FILTER_SANITIZE_STRING);
            $precio = filter_input(INPUT_POST, "precio", FILTER_SANITIZE_STRING);
            $metros = filter_input(INPUT_POST, "metros", FILTER_SANITIZE_STRING);
            $habitaciones = filter_input(INPUT_POST, "habitaciones", FILTER_SANITIZE_STRING);
            $planta = filter_input(INPUT_POST, "planta", FILTER_SANITIZE_STRING);
            $autor = filter_input(INPUT_POST, "autor", FILTER_SANITIZE_STRING);
            $descripcion = filter_input(INPUT_POST, "descripcion", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            //Genero slug (url amigable)
            $slug = $this->view->getSlug($titulo);

            //Foto
            $foto_recibida = $_FILES['foto'];
            $foto = ($_FILES['foto']['name']) ? $_FILES['foto']['name'] : "";
            $foto_subida = ($_FILES['foto']['name']) ? '/var/www/html'.$_SESSION['public']."img/casas/".$_FILES['foto']['name'] : "";
            $texto_img = ""; //Para el mensaje

            if ($id == "nuevo"){

                //Creo una nueva casa
                $consulta = $this->db->exec("INSERT INTO casas 
                    (titulo, slug, distrito, precio, metros, habitaciones, planta, descripcion, foto, autor) VALUES 
                    ('$titulo','$slug','$distrito','$precio','$metros','$habitaciones','$planta','$descripcion','$foto','$autor')");

                //Subo la Foto
                if ($foto){
                    if (is_uploaded_file($foto_recibida['tmp_name']) && move_uploaded_file($foto_recibida['tmp_name'], $foto_subida)){
                        $texto_img = " La foto se ha subido correctamente.";
                    }
                    else{
                        $texto_img = " Hubo un problema al subir la foto.";
                    }
                }

                //Mensaje y redirección
                ($consulta > 0) ?
                    $this->view->redireccionConMensaje("admin/casas","green","La casa <strong>$titulo</strong> se creado correctamente.".$texto_img) :
                    $this->view->redireccionConMensaje("admin/casas","red","Hubo un error al guardar en la base de datos.");
            }
            else{

                //Actualizo la casa
                $this->db->exec("UPDATE casas SET 
                    titulo='$titulo', distrito='$distrito', precio='$precio', metros='$metros', 
                    habitaciones='$habitaciones', planta='$planta', autor='$autor', descripcion='$descripcion' WHERE id='$id'");

                //Subo y actualizo la foto
                if ($foto){
                    if (is_uploaded_file($foto_recibida['tmp_name']) && move_uploaded_file($foto_recibida['tmp_name'], $foto_subida)){
                        $texto_img = " La foto se ha subido correctamente.";
                        $this->db->exec("UPDATE casas SET foto='$foto' WHERE id='$id'");
                    }
                    else{
                        $texto_img = " Hubo un problema al subir la foto.";
                    }
                }

                //Mensaje y redirección
                $this->view->redireccionConMensaje("admin/casas","green","La casa <strong>$titulo</strong> se guardado correctamente.".$texto_img);


            }
        }

        //Si no, obtengo casa y muestro la ventana de edición
        else{

            //Obtengo la casa
            $rowset = $this->db->query("SELECT * FROM casas WHERE id='$id' LIMIT 1");
            $row = $rowset->fetch(\PDO::FETCH_OBJ);
            $casa = new Casa($row);

            //Llamo a la ventana de edición
            $this->view->vista("admin","casas/editar", $casa);
        }

    }

}