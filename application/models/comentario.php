<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comentario extends CI_Model
{
  public function crear_comentario($texto_comentario, $juegos_id, $usuarios_id)
  {
    $res = $this->db->query("insert into comentarios (texto_comentario,juegos_id,usuarios_id)
                                 values (?, ?, ?)",
                                 array($texto_comentario, $juegos_id, $usuarios_id));
  }
}