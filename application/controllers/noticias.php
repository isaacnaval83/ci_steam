<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias extends CI_Controller {

    public function index()
    {
      $data['noticias'] = $this->Noticia->todas();

      foreach ($data['noticias'] as $key => $value) {
        $texto = $value['texto_noticia'];

        var_dump($value); die();

        if(strlen($value['texto_noticia']) > 200){
          $value['texto_noticia'] = substr($value['texto_noticia'], 0, 500);
          $value['texto_noticia'] .= '...';
        }
      }

      $this->load->view('/noticias/index', $data);
    } 

    public function ver($id)
    {
		if ($id == NULL)
    {
			redirect('noticias/index');
		}

		$data = $this->Noticia->buscar_noticias_por_id($id);
        
        if ($data != FALSE) 
        {
            $this->load->view('noticias/ver', $data);
        }
    }
}