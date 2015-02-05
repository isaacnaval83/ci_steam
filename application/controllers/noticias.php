<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias extends CI_Controller {

    public function index()
    {
      $data['noticias'] = $this->Noticia->todas();

      $this->load->view('/noticias/index', $data);
    } 

    public function ver($id)
    {
		if ($id == NULL)
    {
			redirect('noticias/index');
		}

		$data = $this->Noticias->buscar_noticias_por_id($id);
        
        if ($data != FALSE) 
        {
            $this->load->view('noticias/ver', $data);
        }
    }
}