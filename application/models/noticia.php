<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticia extends CI_Model 
{
    public function ultimas()
    {
        $res = $this->db->query('select * 
                                from noticias 
                                order by fecha 
                                limit 5 
                                offset 0');
        return $res->result_array();
    }

    public function todas(){
      $res = $this->db->query('select *
                                 from noticias
                                order by fecha');

      return $res->result_array();
    }

    public function buscar_noticias_por_id(id)
    {
        $res = $this->db->where('id', $id)->get('noticias');
                                      
        return ($res->num_rows() > 0) ? $res->row_array() : FALSE;
    }
}