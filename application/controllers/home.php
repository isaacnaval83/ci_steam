<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        if ($this->session->userdata('id'))
        {
            $data['usuario_id'] = $this->session->userdata('id');
            $data['biblioteca'] = $this->Usuario->biblioteca($data['usuario_id']);
        }

        $data['juegos'] = $this->Juego->destacados();
        $data['noticias'] = $this->Noticia->ultimas();

        $this->load->view('/home/index', $data);
    }
}