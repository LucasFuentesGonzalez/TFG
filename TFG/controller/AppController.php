<?php
namespace App\Controller;

use App\Helper\ViewHelper;
use App\Helper\DbHelper;
use App\Model\Noticia;
use App\Model\Casa;
use App\Model\Oficina;
use App\Model\Local;

class AppController
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

    public function index(){

        //Consulta a la bbdd
        //$rowset = $this->db->query("SELECT * FROM noticias WHERE activo=1 AND home=1 ORDER BY fecha DESC");

        //Asigno resultados a un array de instancias del modelo
        /*$noticias = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)){
            array_push($noticias,new Noticia($row));
        }*/

        //Llamo a la vista
        $this->view->vista("app", "index"/*, $noticias*/);
    }

    public function acercade(){

        //Llamo a la vista
        $this->view->vista("app", "acerca-de");

    }

    public function contacto(){

        //Llamo a la vista
        $this->view->vista("app", "contacto");

    }

    /* ------------------- noticias ------------------- */

    public function noticias(){

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM noticias WHERE activo=1 ORDER BY fecha DESC");

        //Asigno resultados a un array de instancias del modelo
        $noticias = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)){
            array_push($noticias,new Noticia($row));
        }

        //Llamo a la vista
        $this->view->vista("app", "noticias", $noticias);

    }

    public function noticia($slug){

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM noticias WHERE activo=1 AND slug='$slug' LIMIT 1");

        //Asigno resultado a una instancia del modelo
        $row = $rowset->fetch(\PDO::FETCH_OBJ);
        $noticia = new Noticia($row);

        //Llamo a la vista
        $this->view->vista("app", "noticia", $noticia);

    }

    /* ------------------- casas ------------------- */

    public function casas(){

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM casas WHERE activo=1");

        //Asigno resultados a un array de instancias del modelo
        $casas = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)){
            array_push($casas,new Casa($row));
        }

        //Llamo a la vista
        $this->view->vista("app", "casas", $casas);

    }

    public function casa($slug){

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM casas WHERE activo=1 AND slug='$slug' LIMIT 1");

        //Asigno resultado a una instancia del modelo
        $row = $rowset->fetch(\PDO::FETCH_OBJ);
        $casa = new Casa($row);

        //Llamo a la vista
        $this->view->vista("app", "casa", $casa);

    }

    /* ------------------- oficinas ------------------- */

    public function oficinas(){

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM oficinas WHERE activo=1");

        //Asigno resultados a un array de instancias del modelo
        $oficinas = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)){
            array_push($oficinas,new Oficina($row));
        }

        //Llamo a la vista
        $this->view->vista("app", "oficinas", $oficinas);

    }

    public function oficina($slug){

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM oficinas WHERE activo=1 AND slug='$slug' LIMIT 1");

        //Asigno resultado a una instancia del modelo
        $row = $rowset->fetch(\PDO::FETCH_OBJ);
        $oficina = new Oficina($row);

        //Llamo a la vista
        $this->view->vista("app", "oficina", $oficina);

    }

    /* ------------------- locales ------------------- */

    public function locales(){

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM locales WHERE activo=1");

        //Asigno resultados a un array de instancias del modelo
        $locales = array();
        while ($row = $rowset->fetch(\PDO::FETCH_OBJ)){
            array_push($locales,new Local($row));
        }

        //Llamo a la vista
        $this->view->vista("app", "locales", $locales);

    }

    public function local($slug){

        //Consulta a la bbdd
        $rowset = $this->db->query("SELECT * FROM locales WHERE activo=1 AND slug='$slug' LIMIT 1");

        //Asigno resultado a una instancia del modelo
        $row = $rowset->fetch(\PDO::FETCH_OBJ);
        $local = new Local($row);

        //Llamo a la vista
        $this->view->vista("app", "local", $local);

    }

}