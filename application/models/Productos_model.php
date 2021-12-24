<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Productos_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Productos_model extends CI_Model
{

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function all()
  {
    return $this->db->get('productos')->result();
  }
  public function get_producto($var)
  {
    $this->db->where('id_producto', $var);
    return $this->db->get('productos')->row();
  }


  public function guardar($datos)
  {
    if (isset($datos['id_producto']) || $datos['id_producto'] != '') {
      $this->db->where('id_producto', $datos['id_producto']);
      $this->db->update('productos', $datos);
    } else {
      $this->db->insert('productos', $datos);
    }
    return $this->db->affected_rows();
  }

  // ------------------------------------------------------------------------

}

/* End of file Productos_model.php */
/* Location: ./application/models/Productos_model.php */