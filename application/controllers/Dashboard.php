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

    /*$rank = $this->Productos_model->ranking();
    $rank_result = [];
    $array = [];
    foreach ($rank as $key => $value) {
      $last_sold = $this->Productos_model->last_ranking_id($value->id_producto);
      $rank_result['id_venta']          = $value->id_venta;
      $rank_result['id_producto']       = $value->id_producto;
      $rank_result['ventas']            = $value->ventas;
      $rank_result['porcentaje']        = (100 * $value->ventas) / $last_sold->ventas - (100);
      $rank_result['producto']          = $value->producto;
      $rank_result['fecha']             = $value->fecha;
      $rank_result['precio_regular']    = $value->precio_regular;
      $rank_result['total']             = $value->total;
      $array[] = $rank_result;
    }
    $data['ranking']  = $array;
    $data['last_ranking']  = $this->Productos_model->last_ranking();*/
    $data['productos'] = $this->Productos_model->all();

    if (isset($this->session->username)) {
      $this->load->view('Template/content', $data);
    }else{
      redirect(base_url('login'));
    }
  }

  public function ranking(){
    $rank = $this->Productos_model->ranking();
    $rank_result = [];
    $array = [];
    foreach ($rank as $key => $value) {
      $last_sold = $this->Productos_model->last_ranking_id($value->id_producto);
      $rank_result['id_venta']          = $value->id_venta;
      $rank_result['id_producto']       = $value->id_producto;
      $rank_result['ventas']            = $value->ventas . ' - ' . $last_sold->ventas;
      $rank_result['porcentaje']        = (100 * $value->ventas) / $last_sold->ventas - (100);
      $rank_result['producto']          = $value->producto;
      $rank_result['fecha']             = $value->fecha;
      $rank_result['precio_regular']    = $value->precio_regular;
      $rank_result['total']             = $value->total;
      $array[] = $rank_result;
    }
    
    echo "<pre>";
    print_r($array);
    // print_r($this->Productos_model->ranking());
    echo "</pre>";
  }

}


/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */