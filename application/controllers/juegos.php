<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Juegos extends CI_Controller {

    public function index()
    {
        $data['juegos']=$this->Juego->extraer_juegos();
       // var_dump($data['juegos']);
        if ($data!=FALSE) {
           $this->load->view('juegos/index.php',$data);
        }else{
            echo "Error";
        }
    }


    public function ver($id = null)
    {
        $data['juego'] = $this->Juego->juego_por_id($id);
        $data['so'] = $this->Juego->sistema_operativo_por_id_juego($id);
        if ($data != FALSE)
        {
            $this->load->view('juegos/verjuego', $data);
        }
        else
        {
            echo 'numero no valido';
        }
    }

    public function comentar()
    {
        if ($this->input->post('comentar'))
        {
            $texto_comentario = $this->input->post('texto_noticia');
            $juegos_id = $this->input->post('id');

            $reglas = array(
                         array(
                          'field' => 'texto_noticia',
                          'label' => 'Comentario',
                          'rules' => 'trim|required|max_length[500]'
                         )
                      );

            $this->form_validation->set_rules($reglas);

            if ($this->session->userdata('id'))
            {
                $data['usuarios_id'] = $this->session->userdata('id');
            }

            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('juegos/comentar');
            }
            else
            {
                if ($this->Comentario->crear_comentario($texto_comentario, $juegos_id, $usuarios_id) === FALSE){
                    $data['error'] = "Error: No se ha podico comentar";

                    $this->load->view('juegos/comentar',$data);
                }
            }
        }
        else
        {
            $this->load->view('juegos/comentar');
        }
    }

    public function comprar($id)
    {
        
    }
}