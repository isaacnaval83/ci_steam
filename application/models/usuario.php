<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Model
{
	public function id_segun_nick_y_password($nick,$password){
		return $this->id(array('nick' => $nick,
                               'password' => md5($password)));
	}

	private function id($where)
    {
        $res = $this->db->select('id')->from('usuarios')->where($where)->get();
        return ($res->num_rows() > 0) ? $res->row()->id : FALSE;
    }
}