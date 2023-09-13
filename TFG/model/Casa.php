<?php
namespace App\Model;

class Casa
{
    //Variables o atributos
    var $id;
    var $titulo;
    var $slug;
    var $distrito;
    var $precio;
    var $metros;
    var $habitaciones;
    var $planta;
    var $descripcion;
    var $foto;
    var $activo;
    var $autor;

    function __construct($data=null){

        $this->id = ($data) ? $data->id : null;
        $this->slug = ($data) ? $data->slug : null;
        $this->titulo = ($data) ? $data->titulo : null;
        $this->distrito = ($data) ? $data->distrito : null;
        $this->precio = ($data) ? $data->precio : null;
        $this->metros = ($data) ? $data->metros : null;
        $this->habitaciones = ($data) ? $data->habitaciones : null;
        $this->planta = ($data) ? $data->planta : null;
        $this->descripcion = ($data) ? $data->descripcion : null;
        $this->foto = ($data) ? $data->foto : null;
        $this->activo = ($data) ? $data->activo : null;
        $this->autor = ($data) ? $data->autor : null;

    }

}