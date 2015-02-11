<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Juegos extends CI_Controller {

    public function index()
    {
        $data['juegos']=$this->Juego->extraer_juegos();
        //var_dump($data['juegos'][0]['id']);
       
        //sistema_operativo_por_id_juego();
        foreach ($data['juegos'] as $fila) {
            //$fila['id']
            //var_dump($fila['id']);
            
        }
       
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

        if ($this->session->userdata('usuario'))
        {
            $data['usuario'] = $this->session->userdata('usuario');
            $data['id'] = $this->session->userdata('id');
        }
        
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
                $this->template->load('plantillas/comun', 'juegos/verjuego', $data);
            }
            else
            {
                if ($this->Comentario->crear_comentario($texto_comentario, $juegos_id, $usuarios_id) === FALSE){
                    $data['error'] = "Error: No se ha podico comentar";

                    $this->template->load('plantillas/comun', 'juegos/verjuego', $data);
                }
            }
        }
        else
        {
            $this->template->load('plantillas/comun', 'juegos/verjuego', $data);
        }

        

        if ($data != FALSE)
        {
            $this->template->load('plantillas/comun', 'juegos/verjuego', $data);
        }
        else
        {
            echo 'numero no valido';
        }
    }

    public function comentar()
    {
        
    }

    public function comprar($id)
    {
        
    }
}