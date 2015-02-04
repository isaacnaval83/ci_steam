<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $data['juegos'] = $this->Juego->destacados();
        $data['noticias'] = $this->Noticia->ultimas();

        $this->load->view('/home/index', $data);
    }
}