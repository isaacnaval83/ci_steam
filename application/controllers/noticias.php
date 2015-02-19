<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Noticias extends CI_Controller {

  public function index($nomatches = NULL){
    $noticias = $this->Noticia->todas();

    $data['noticias'] = $this->recortar_noticias($noticias);

    if($nomatches != NULL){
      $data['nomatches'] = $nomatches;
    }

    $this->template->set('titulo', 'Noticias');
    $this->template->load('plantillas/comun', 'noticias/index', $data);

    //$this->load->view('/noticias/index', $data);
  }

  private function recortar_noticias($noticias){
    for($i = 0; $i < count($noticias); $i++){
      if(strlen($noticias[$i]['texto_noticia']) > 200){
        $noticias[$i]['texto_noticia'] = substr($noticias[$i]['texto_noticia'],
                                                                        0, 200);
        $noticias[$i]['texto_noticia'] .= '...';
      }
    }

    return $noticias;

    /*$data['noticias'] = $noticias;
    
    foreach ($data['noticias'] as $key => $value){
      if(strlen($value['texto_noticia']) > 200){
        $value['texto_noticia'] = substr($value['texto_noticia'], 0, 500);
        $value['texto_noticia'] .= '...';
      }
    }*/
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
        $this->template->set('titulo', 'Noticias');
        $this->template->load('plantillas/comun', 'noticias/ver', $data);
        //$this->load->view('noticias/ver', $data);
      }
  }

  public function mostrar_juegos_json(){
    if($this->input->get()){
      $juegos = $this->Juego->juegos_segun_nombre($this->input->post('nombre'));

      echo json_encode($juegos);
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

        $this->template->set('titulo', 'Resultado de Busqueda');
        $this->template->load('plantillas/comun', 'noticias/resultados', $data);
        //$this->load->view('noticias/resultados', $data);
      }else{
        foreach($juegos as $juego){
          $noticias = $this->Noticia->por_juego($juego['id']);
        }

        $noticias = $this->recortar_noticias($noticias);
        $data['noticias'] = $noticias;

        $this->template->set('titulo', 'Resultado de Busqueda');
        $this->template->load('plantillas/comun', 'noticias/resultados', $data);
        //$this->load->view('noticias/resultados', $data); 
      } 
    }

    if($id != NULL){
      $noticias = $this->Noticia->por_juego($id);
      $data['noticias'] = $noticias;

      $this->template->set('titulo', 'Noticias');
      $this->template->load('plantillas/comun', 'noticias/resultados', $data);
      //$this->load->view('noticias/resultados', $data);
    }
  }
}