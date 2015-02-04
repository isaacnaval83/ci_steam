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
}