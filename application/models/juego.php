<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Juego extends CI_Model
{
    public function juego_por_id($id)
    {

    	$res = $this->db->query("select j.id, j.titulo, j.caratula, j.descripcion, j.fecha_lanzamiento, j.precio, d.nombre_desarrollador from juegos j, desarrolladores d where j.id=d.id and j.id = ?", array($id));
                              
        return ($res->num_rows() > 0) ? $res->row_array() : FALSE;
    }



    public function sistema_operativo_por_id_juego($id)
    {


    	$res = $this->db->query("select so.nombre_so from juegos j, juegos_so js, sistemas_operativos so where j.id=js.juegos_id and js.so_id=so.id and j.id = ?", array($id));
  
                                      
        return ($res->num_rows() > 0) ? $res->result_array() : FALSE;
    }







    public function ddd($id)
    {
//        $res = $this->db->query("select * from peliculas where id = ?",
//                                array($id));

    	$res = $this->db->query("select j.id, j.titulo, j.caratula, j.descripcion, j.fecha_lanzamiento, j.precio, so.nombre_so, d.nombre_desarrollador from juegos j, desarrolladores d, juegos_so js, sistemas_operativos so where j.id=d.id and j.id=js.juegos_id and js.so_id=so.id and j.id = ?", array($id));
  
        //$res = $this->db->where('id', $id)->get('peliculas');
                                      
        return ($res->num_rows() > 0) ? $res->row_array() : FALSE;
    }


   
}