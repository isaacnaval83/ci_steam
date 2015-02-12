<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function login()
    {
    	if ($this->input->post('login')){
    		$usuario = $this->input->post('usuario');
    		$password = $this->input->post('password');

    		if ($this->loguear($usuario,$password) == TRUE){
    			redirect("/home/index");
    		}
    		else{
    			$data['error'] = true;
    			$this->load->view('usuarios/login', $data);
    		}
    	}else{
    		$this->load->view('usuarios/login');
    	}
    }

    private function loguear($usuario,$password){

    	$id = $this->Usuario->id_segun_usuario_password($usuario,$password);

    	if ($id !== FALSE){
    		$this->session->set_userdata('usuario', $usuario);
    		$this->session->set_userdata('id',$id);
    		return TRUE; 
    	}
    	else{
    		return FALSE;
    	}
    }

    public function logout()
    {
    	$this->session->sess_destroy();
        redirect('/usuarios/login');
    }

    public function singup()
    {
        if ($this->input->post('singup')){
            $usuario = $this->input->post('usuario');
            $password = $this->input->post('password');
            $confirm_password = $this->input->post('confirm_password');
            $email = $this->input->post('email');


            $reglas = array(
                array(
                      'field' => 'usuario',
                      'label' => 'Usuario',
                      'rules' => 'trim|required|max_length[15]|is_unique[usuarios.nick]'
                    ),
                array(
                      'field' => 'password',
                      'label' => 'Contraseña',
                      'rules' => 'trim|required|matches[confirm_password]'
                    ),
                array(
                      'field' => 'confirm_password',
                      'label' => 'Confirmar Contraseña',
                      'rules' => 'trim|required' 
                    ),
                array(
                      'field' => 'email',
                      'label' => 'Email',
                      'rules' => 'trim|required|max_length[32]|valid_email'
                    )
                );

            $this->form_validation->set_rules($reglas);

            if ($this->form_validation->run() == FALSE){
                $this->load->view('usuarios/singup');

            }
            else{
                if ($this->Usuario->crear($usuario,$password,$email) === FALSE){
                    $data['error'] = "Error: No se ha creado el usuario";
                    $this->load->view('usuarios/singup',$data);
                }
                else{
                    $id = $this->Usuario->id_segun_usuario_password($usuario,$password);
                    $token = md5(rand());
                    $this->Usuario->meter_en_validaciones($id,$token);
                    $this->enviarCorreo($email);
                    $this->Usuario->borrar_validacion($id);
                    //select * from usuarios join validaciones_pendientes on usuarios.id = validaciones_pendientes.usuarios_id where usuarios.valido = false;
                    $this->loguear($usuario,$password);
                    redirect("/home/index");
                }
            }
        }
        else
        {
            $this->load->view('usuarios/singup');
        }
       
    }

    public function enviarCorreo($email){
        $config['protocol'] = 'sendmail';
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['validate'] = FALSE;

        $this->load->library('email',$config);
        $this->email->set_newline('\r\n');

        $this->email->from('iesdonana@gmail.com');
        $this->email->to($email);
        $this->email->subject('Prueba');
        $this->email->message('<a href="http://localhost/ci_steam/index.php/home/index">Confirmar validacion</a>');
        $this->email->send();

        echo $this->email->print_debugger();

    }
}