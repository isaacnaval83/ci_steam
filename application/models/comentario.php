<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comentario extends CI_Model
{
  public function crear_comentario($texto_comentario, $juego_id, $usuarios_id)
  {
    $res = $this->db->query("insert into comentarios (texto_comentario,juegos_id,usuarios_id)
                                 values (?, ?, ?)",
                                 array($texto_comentario, $juego_id, $usuarios_id));
  }

  public function ver_comentarios($id)
  {
    $res = $this->db->query('select c.*, u.nick
                             from comentarios c join usuarios u 
                                  on usuarios_id=u.id
                             where juegos_id = ?',
                             array($id));
                                      
    return $res->result_array();
  }
}