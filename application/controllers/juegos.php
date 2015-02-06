<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Juegos extends CI_Controller {

    public function index()
    {

    }

    public function ver($id = null)
    {


        $data['juego'] = $this->Juego->juego_por_id($id);
        $data['so'] = $this->Juego->sistema_operativo_por_id_juego($id);
        if ($data != FALSE) {
            $this->load->view('juegos/verjuego', $data);
        }
        else
        {
            echo 'numero no valido';
        }

    }





/*
    public function comentar(id)
    {

    }

    public function comprar(id)
    {
        
    }*/
}