<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Juego extends CI_Model 
{
    public function destacados()
    {
        return $this->db->from('juegos')->where('destacado','true')
               ->get()->result_array());
    }
}