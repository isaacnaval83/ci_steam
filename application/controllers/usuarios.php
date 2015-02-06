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
        
    }
}