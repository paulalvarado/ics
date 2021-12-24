<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Usuarios_model
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

class Usuarios_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    // 
  }

  public function usuarios(){
    return $this->db->get('usuarios')->result();
  }

  // ------------------------------------------------------------------------

}

/* End of file Usuarios_model.php */
/* Location: ./application/models/Usuarios_model.php */