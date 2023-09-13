<?php
namespace App\Controller;

use App\Helper\ViewHelper;
use App\Helper\DbHelper;
use App\Model\Oficina;


class OficinaController
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

    //Listado de oficinas
    public function index(){

        //Permisos
        $this->view->permisos("oficinas");

        //Recojo las oficinas de la base de datos
        $rowset = $this->db->query("SELECT * FROM oficinas");

        //Asigno resultados a un array de instancias del modelo
        $oficinas = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)){
            array_push($oficinas,new Oficina($row));
        }

        $this->view->vista("admin","oficinas/index", $oficinas);

    }

    //Para activar o desactivar
    public function activar($id){

        //Permisos
        $this->view->permisos("oficinas");

        //Obtengo la oficina
        $rowset = $this->db->query("SELECT * FROM oficinas WHERE id='$id' LIMIT 1");
        $row = $rowset->fetch(\PDO::FETCH_OBJ);
        $oficina = new Oficina($row);

        if ($oficina->activo == 1){

            //Desactivo la oficina
            $consulta = $this->db->exec("UPDATE oficinas SET activo=0 WHERE id='$id'");

            //Mensaje y redirección
            ($consulta > 0) ? //Compruebo consulta para ver que no ha habido errores
                $this->view->redireccionConMensaje("admin/oficinas","green","La oficina <strong>$oficina->titulo</strong> se ha desactivado correctamente.") :
                $this->view->redireccionConMensaje("admin/oficinas","red","Hubo un error al guardar en la base de datos.");
        }

        else{

            //Activo la oficina
            $consulta = $this->db->exec("UPDATE oficinas SET activo=1 WHERE id='$id'");

            //Mensaje y redirección
            ($consulta > 0) ? //Compruebo consulta para ver que no ha habido errores
                $this->view->redireccionConMensaje("admin/oficinas","green","La oficina <strong>$oficina->titulo</strong> se ha activado correctamente.") :
                $this->view->redireccionConMensaje("admin/oficinas","red","Hubo un error al guardar en la base de datos.");
        }

    }

    public function borrar($id){

        //Permisos
        $this->view->permisos("oficinas");

        //Obtengo la oficina
        $rowset = $this->db->query("SELECT * FROM oficinas WHERE id='$id' LIMIT 1");
        $row = $rowset->fetch(\PDO::FETCH_OBJ);
        $oficina = new Oficina($row);

        //Borro la oficina
        $consulta = $this->db->exec("DELETE FROM oficinas WHERE id='$id'");

        //Borro la imagen asociada
        $archivo = $_SESSION['public']."img/oficinas/".$oficina->foto;
        $texto_foto = "";
        if (is_file($archivo)){
            unlink($archivo);
            $texto_foto = " y se ha borrado la foto asociada";
        }

        //Mensaje y redirección
        ($consulta > 0) ? //Compruebo consulta para ver que no ha habido errores
            $this->view->redireccionConMensaje("admin/oficinas","green","La oficina se ha borrado correctamente$texto_foto.") :
            $this->view->redireccionConMensaje("admin/oficinas","red","Hubo un error al guardar en la base de datos.");

    }

    public function crear(){

        //Permisos
        $this->view->permisos("oficinas");

        //Creo un nuevo usuario vacío
        $oficina = new Oficina();

        //Llamo a la ventana de edición
        $this->view->vista("admin","oficinas/editar", $oficina);

    }

    public function editar($id){

        //Permisos
        $this->view->permisos("oficinas");

        //Si ha pulsado el botón de guardar
        if (isset($_POST["guardar"])){

            //Recupero los datos del formulario
            $titulo = filter_input(INPUT_POST, "titulo", FILTER_SANITIZE_STRING);
            $distrito = filter_input(INPUT_POST, "distrito", FILTER_SANITIZE_STRING);
            $precio = filter_input(INPUT_POST, "precio", FILTER_SANITIZE_STRING);
            $metros = filter_input(INPUT_POST, "metros", FILTER_SANITIZE_STRING);
            $preciomes = filter_input(INPUT_POST, "preciomes", FILTER_SANITIZE_STRING);
            $planta = filter_input(INPUT_POST, "planta", FILTER_SANITIZE_STRING);
            $autor = filter_input(INPUT_POST, "autor", FILTER_SANITIZE_STRING);
            $descripcion = filter_input(INPUT_POST, "descripcion", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            //Genero slug (url amigable)
            $slug = $this->view->getSlug($titulo);

            //Foto
            $foto_recibida = $_FILES['foto'];
            $foto = ($_FILES['foto']['name']) ? $_FILES['foto']['name'] : "";
            $foto_subida = ($_FILES['foto']['name']) ? '/var/www/html'.$_SESSION['public']."img/oficinas/".$_FILES['foto']['name'] : "";
            $texto_img = ""; //Para el mensaje

            if ($id == "nuevo"){

                //Creo una nueva oficina
                $consulta = $this->db->exec("INSERT INTO oficinas 
                    (titulo, slug, distrito, precio, metros, preciomes, planta, descripcion, foto, autor) VALUES 
                    ('$titulo','$slug','$distrito','$precio','$metros','$preciomes','$planta','$descripcion','$foto','$autor')");

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
                    $this->view->redireccionConMensaje("admin/oficinas","green","La oficina <strong>$titulo</strong> se creado correctamente.".$texto_img) :
                    $this->view->redireccionConMensaje("admin/oficinas","red","Hubo un error al guardar en la base de datos.");
            }
            else{

                //Actualizo la oficina
                $this->db->exec("UPDATE oficinas SET 
                    titulo='$titulo', distrito='$distrito', precio='$precio', metros='$metros', 
                    preciomes='$preciomes', planta='$planta', autor='$autor', descripcion='$descripcion' WHERE id='$id'");

                //Subo y actualizo la foto
                if ($foto){
                    if (is_uploaded_file($foto_recibida['tmp_name']) && move_uploaded_file($foto_recibida['tmp_name'], $foto_subida)){
                        $texto_img = " La foto se ha subido correctamente.";
                        $this->db->exec("UPDATE oficinas SET foto='$foto' WHERE id='$id'");
                    }
                    else{
                        $texto_img = " Hubo un problema al subir la foto.";
                    }
                }

                //Mensaje y redirección
                $this->view->redireccionConMensaje("admin/oficinas","green","La oficina <strong>$titulo</strong> se guardado correctamente.".$texto_img);

            }
        }

        //Si no, obtengo oficina y muestro la ventana de edición
        else{

            //Obtengo la oficina
            $rowset = $this->db->query("SELECT * FROM oficinas WHERE id='$id' LIMIT 1");
            $row = $rowset->fetch(\PDO::FETCH_OBJ);
            $oficina = new Oficina($row);

            //Llamo a la ventana de edición
            $this->view->vista("admin","oficinas/editar", $oficina);
        }

    }

}