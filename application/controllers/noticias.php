<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias extends CI_Controller {

    public function index()
    {
      $noticias = $this->Noticia->todas();

      for($i = 0; $i < count($noticias); $i++){
        if(strlen($noticias[$i]['texto_noticia']) > 200){
          $noticias[$i]['texto_noticia'] = substr($noticias[$i]['texto_noticia'], 0, 200);
          $noticias[$i]['texto_noticia'] .= '...';
        }
      }

      $data['noticias'] = $noticias;

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