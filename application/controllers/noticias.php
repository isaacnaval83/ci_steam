<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias extends CI_Controller {

    public function index()
    {
      $data['noticias'] = $this->Noticia->todas();

      $this->load->view('/noticias/noticias', $data);
    } 

    public function ver(id)
    {

    }
}