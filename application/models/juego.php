<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Juego extends CI_Model
{
    //funcion que extrae todos los juegos
    public function extraer_juegos(){

        //$res=$this->db->query("select * from juegos");
       // $res=$this->db->select('*')->from('juegos')->get();
       /* $res=$this->db->query("
            select j.id, j.titulo, j.descripcion, j.fecha_lanzamiento, j.precio, j.destacado,
                    so.nombre_so
            from juegos as j, sistemas_operativos as so;
            ");
        */
        $res=$this->db->query("
            select j.id, j.titulo, j.descripcion, j.fecha_lanzamiento, j.precio, j.destacado,
                    des.nombre_desarrollador, mul.url
            from juegos as j, desarrolladores as des, multimedia as mul
            where des.id=j.desarrollador_id and j.id=mul.juegos_id;
        ");
        
        return ($res->num_rows()>0) ? $res->result_array() : FALSE;

    }
    public function juego_por_id($id)
    {

    	$res = $this->db->query("select j.id, j.titulo, j.caratula, j.descripcion, j.fecha_lanzamiento, j.precio, d.nombre_desarrollador, m.url 
                                from juegos j, desarrolladores d, multimedia m 
                                where j.id = m.juegos_id and j.id=d.id and j.id = ?", array($id));
                              
        return ($res->num_rows() > 0) ? $res->row_array() : FALSE;
    }

    public function sistema_operativo_por_id_juego($id)
    {
    	$res = $this->db->query("select so.nombre_so 
                                from juegos j, juegos_so js, sistemas_operativos so 
                                where j.id=js.juegos_id and js.so_id=so.id and j.id = ?", array($id));
  
                                      
        return ($res->num_rows() > 0) ? $res->result_array() : FALSE;
    }  

    public function juegos_segun_nombre($nombre)
    {
      $nombre = '%'.$nombre.'%';      
      $res = $this->db->query("select *
                                 from juegos
                                where titulo ilike ?", [$nombre]);

      return $res->result_array();
    }

    public function destacados()
    {
        return $this->db->from('vista_juegos')->where('destacado','true')
        ->get()->result_array();
    }
}
