<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Productos extends CI_Controller
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
    $data['page'] = 'Productos/index';
    $data['titulo'] = 'Productos';
    $data['breadcrumbs'] = [
      [
        'name'  =>  'Inicio',
        'url'   => base_url()
      ], [
        'name'    => 'Tablero',
        'url'   => base_url('dashboard')
      ], [
        'name'    => 'Todos los productos',
        'url'   => base_url('productos')
      ]
    ];
    $data['btn']  = [
      [
        'titulo' => 'Añadir producto',
        'id' => 'add-product',
        'url' => base_url('productos/add')
      ],
      [
        'titulo' => 'Importar productos',
        'id' => 'import-product',
        'url' => base_url('productos/add#import')
      ]
    ];

    $data['productos'] = $this->Productos_model->all();

    if (isset($this->session->username)) {
      $this->load->view('Template/content', $data);
    } else {
      redirect(base_url('login'));
    }
  }

  public function add()
  {
    $data['page'] = 'Productos/add';
    $data['titulo'] = 'Añadir poducto';
    $data['breadcrumbs'] = [
      [
        'name'  =>  'Inicio',
        'url'   => base_url()
      ], [
        'name'    => 'Tablero',
        'url'   => base_url('dashboard')
      ], [
        'name'    => 'Productos',
        'url'   => base_url('productos')
      ], [
        'name'    => 'Añadir producto',
        'url'   => base_url('productos/add')
      ]
    ];
    $data['btn']  = [
      [
        'titulo' => 'Importar productos',
        'id' => 'import-product',
        'url' => base_url('productos/add#import')
      ]
    ];

    if (isset($this->session->username)) {
      $this->load->view('Template/content', $data);
    } else {
      redirect(base_url('login'));
    }
  }

  public function edit($var)
  {
    $data['page'] = 'Productos/edit';
    $data['titulo'] = 'Editar poducto';
    $data['breadcrumbs'] = [
      [
        'name'  =>  'Inicio',
        'url'   => base_url()
      ], [
        'name'    => 'Tablero',
        'url'   => base_url('dashboard')
      ], [
        'name'    => 'Productos',
        'url'   => base_url('productos')
      ], [
        'name'    => 'Editar producto',
        'url'   => base_url('productos/add')
      ]
    ];
    $data['btn']  = [
      [
        'titulo' => 'Añadir producto',
        'id' => 'add-product',
        'url' => base_url('productos/add')
      ]
    ];

    $data['producto'] = $this->Productos_model->get_producto($var);

    if (isset($this->session->username)) {
      $this->load->view('Template/content', $data);
    } else {
      redirect(base_url('login'));
    }
  }

  public function guardar($var)
  {
    $datos['producto']    = $_POST['name'];
    $datos['sku']         = $_POST['sku'];
    $datos['stock']       = $_POST['stock'];
    $datos['precio']       = $_POST['precio'];
    $datos['stock_min']   = $_POST['stockmin'];
    $datos['descripcion'] = $_POST['description'];

    if ($var == 'edit') {
      $datos['id_producto'] = $_POST['id_producto'];
    }
    
    return $this->Productos_model->guardar($datos);
  }

  public function vender(){
    $data['id_producto']     = $_POST['id_producto'];
    $data['precio']          = $_POST['precio'];
    $data['fecha']           = date("Y-m-d H:i:s");
    return $this->Productos_model->vender($data);
  }
}


/* End of file Productos.php */
/* Location: ./application/controllers/Productos.php */