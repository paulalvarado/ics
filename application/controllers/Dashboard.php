<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Dashboard
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Dashboard extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Productos_model');
    if (!isset($this->session->username)) {
      redirect(base_url('login'));
    }
  }

  public function index()
  {
    $data['page'] = 'Dashboard/index';
    $data['titulo'] = 'Tablero';
    $data['breadcrumbs'] = [
      [
        'name'  =>  'Inicio',
        'url'   => base_url()
      ], [
        'name'    => 'Tablero',
        'url'   => base_url('dashboard')
      ]
    ];
    $data['productos'] = $this->Productos_model->all();

    if (isset($this->session->username)) {
      $this->load->view('Template/content', $data);
    }else{
      redirect(base_url('login'));
    }
  }

}


/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */