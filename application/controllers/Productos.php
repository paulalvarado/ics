<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Productos extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Productos_model');
  }

  public function index()
  {
    $data['page'] = 'productos/index';
    $data['titulo'] = 'Products';
    $data['breadcrumbs'] = ['Home', 'Dashboard', 'Products'];
    $data['btn']  = [
      [
        'titulo' => 'Add products',
        'id' => 'add-product'
      ],
      [
        'titulo' => 'Import products',
        'id' => 'import-product'
      ]
    ];

    $data['productos'] = $this->Productos_model->all();

    if (isset($this->session->username)) {
      $this->load->view('template/content', $data);
    } else {
      redirect(base_url('login'));
    }
  }

  public function guardar()
  {
    $datos['producto']        = $_POST['name'];
    $datos['sku']         = $_POST['sku'];
    $datos['stock']       = $_POST['stock'];
    $datos['cantidad']    = $_POST['cantidad'];
    $datos['stock_min']    = $_POST['stockmin'];
    $datos['descripcion'] = $_POST['description'];

    $this->Productos_model->guardar($datos);
  }
}


/* End of file Productos.php */
/* Location: ./application/controllers/Productos.php */