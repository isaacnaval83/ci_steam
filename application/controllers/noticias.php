<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias extends CI_Controller {

  public function index($nomatches = NULL){
    $noticias = $this->Noticia->todas();

    for($i = 0; $i < count($noticias); $i++){
      if(strlen($noticias[$i]['texto_noticia']) > 200){
        $noticias[$i]['texto_noticia'] = substr($noticias[$i]['texto_noticia'],
                                                                        0, 200);
        $noticias[$i]['texto_noticia'] .= '...';
      }
    }

    $data['noticias'] = $noticias;
    
    foreach ($data['noticias'] as $key => $value){
      if(strlen($value['texto_noticia']) > 200){
        $value['texto_noticia'] = substr($value['texto_noticia'], 0, 500);
        $value['texto_noticia'] .= '...';
      }
    }

    if($nomatches != NULL){
      $data['nomatches'] = $nomatches;
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

  public function ver_noticias_juegos($id = NULL){
    if($this->input->post('buscar')){
      $nombre = $this->input->post('juego');
      $juegos = $this->Juego->juegos_segun_nombre($nombre);

      if(empty($juegos)){
        $nomatches = $nombre;
        redirect('noticias/index/'.$nomatches);
      }

      if(count($juegos) > 1){
        $data['juegos'] = $juegos;
        $this->load->view('noticias/resultados', $data);
      }else{
        foreach($juegos as $juego){
          $noticias[] = $this->Noticia->por_juego($juego['id']);
        }

      $data['noticias'] = $noticias;

      $this->load->view('noticias/resultados', $data); 
      } 
    }

    if($id != NULL){
      $noticias = $this->Noticia->por_juego($id);
      $data['noticias'] = $noticias;

      $this->load->view('noticias/resultados', $data);
    }
  }
}