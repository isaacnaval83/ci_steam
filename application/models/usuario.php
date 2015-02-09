<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Model
{
	public function id_segun_usuario_password($usuario,$password){

		return $this->id(array('nick' => $usuario,
                               'password' => md5($password)));
	}

	private function id($where)
    {
        $res = $this->db->select('id')->from('usuarios')->where($where)->get();
        return ($res->num_rows() > 0) ? $res->row()->id : FALSE;
    }

    public function crear($usuario,$password,$email){
    	$res = $this->db->query("insert into usuarios (nick,password,email,rol_id)
    							 values (?, md5(?), ?,2)",
    							 array($usuario, $password, $email));
    }

    public function meter_en_validaciones($id,$token){
    	$res = $this->db->query("insert into validaciones_pendientes (usuarios_id,token)
    							 values (?, ?)",
    							 array($id, $token));
    }

  
}