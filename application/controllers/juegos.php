<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Juegos extends CI_Controller {

    public function index()
    {
        $data['juegos']=$this->Juego->extraer_juegos();
        //var_dump($data['juegos'][0]['id']);
       
        //sistema_operativo_por_id_juego();
        $auxiliar1 = array();
        $auxiliar2 = array();
        foreach ($data['juegos'] as $fila) {

            $res2=$this->Juego->sistema_operativo_por_id_juego($fila['id']);
            array_push($auxiliar1, $res2);
            $res3=$this->Juego->generos_por_id($fila['id']);
            array_push($auxiliar2, $res3);

        }
        $data['so']=$auxiliar1;
        $data['generos']=$auxiliar2;
       //var_dump($data['so'][0][1]);
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
        $data['comentarios'] = $this->Comentario->ver_comentarios($id);

        if ($this->session->userdata('usuario'))
        {
            $data['usuario'] = $this->session->userdata('usuario');
            $data['id'] = $this->session->userdata('id');
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
        $texto_comentario = $this->input->post('texto_comentario');
        $juego_id = $this->input->post('juego_id');
        $usuarios_id = $this->session->userdata('id');

        $reglas = array(
                     array(
                      'field' => 'texto_comentario',
                      'label' => 'Comentario',
                      'rules' => 'trim|required|max_length[500]'
                     )
                  );

        $this->form_validation->set_rules($reglas);

        if ($this->form_validation->run() != FALSE)
        {
            $this->Comentario->crear_comentario($texto_comentario, $juego_id, $usuarios_id);
        }

        redirect('juegos/ver/'.$juego_id);
    }

    public function comprar($id)
    {
        
    }
}