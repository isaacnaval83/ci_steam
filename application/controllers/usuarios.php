<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function login()
    {
    	if ($this->input->post('login')){
    		$nick = $this->input->post('nick');
    		$password = $this->input->post('password');

    		if ($this->loguear($nick,$password) == TRUE){
    			redirect("/juego/index");
    		}
    		else{
    			$data['error'] = true;
    			$this->load->view('usuarios/login', $data);
    		}
    	}
    	else{
    		$this->load->view('usuarios/login');
    	}
    }

    private function loguear($nick,$password){
    	$id = $this->Usuario->id_segun_nick_y_password($nick,$password);

    	if ($id !== FALSE){
    		$this->session->set_userdata('nick', $nick);
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