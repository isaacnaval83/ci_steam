<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Juegos extends CI_Controller {

    public function index()
    {
        $data['juegos']=$this->Juego->extraer_juegos();
        //var_dump($data['juegos'][0]['id']);
        $auxiliar1 = array();
        $auxiliar2 = array();
        $auxiliar3 = array();
        foreach ($data['juegos'] as $fila) {

            $res2=$this->Juego->sistema_operativo_por_id_juego($fila['id']);
            array_push($auxiliar1, $res2);
            $res3=$this->Juego->generos_por_id($fila['id']);
            array_push($auxiliar2, $res3);
            $res4=$this->Juego->comentarios_por_id_juego($fila['id']);
            array_push($auxiliar3, $res4);

        }
         //var_dump($auxiliar3);
        $data['so']=$auxiliar1;
        $data['generos']=$auxiliar2;
        $data['comentarios']=$auxiliar3;
       //var_dump($data['so'][0][1]);
        if ($data!=FALSE) {
           $this->load->view('juegos/index.php',$data);
        }else{
            echo "Error";
        }
    } 


    public function ver($id = null)
    {
        if ($this->Juego->juego_por_id($id) != FALSE)
        {
            $data['juego'] = $this->Juego->juego_por_id($id);

            $data['screenshots']=$this->Juego->screens_por_id($id);
            $data['so'] = $this->Juego->sistema_operativo_por_id_juego($id);
            //$data['comentarios'] = $this->Comentario->ver_comentarios($id);

            if ($this->session->userdata('usuario'))
            {
                $data['usuario'] = $this->session->userdata('usuario');
                $data['id'] = $this->session->userdata('id');
            }

            if ($this->input->post('comentar'))
            {
                $nserie = $this->session->userdata('form_nserie');

                //var_dump($nserie);
                //var_dump($this->input->post('nserie')); die();

                if ($this->input->post('nserie') != $nserie) {
                    $this->session->set_userdata('form_nserie', $this->input->post('nserie'));
                    $texto_comentario = $this->input->post('texto_comentario');

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
                        //$this->Comentario->crear_comentario($texto_comentario, $juego_id, $usuarios_id);
                        $this->Comentario->crear_comentario($texto_comentario, $id, $data['id']);
                    }
                }                
            }
            $data['comentarios'] = $this->Comentario->ver_comentarios($id);
            $this->template->set('titulo', 'Juego');
            $this->template->load('plantillas/comun', 'juegos/verjuego', $data);
            
        }
        else
        {
            echo 'numero no valido';
        }
        
    }

   /* public function comentar()
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
       /* else
        {
            $this->ver($juego_id);
        }*/

        /*redirect('juegos/ver/'.$juego_id);
        //redirect('juegos/'.$juego_id);
    }*/

    public function comprar($id)
    {
        
    }
}