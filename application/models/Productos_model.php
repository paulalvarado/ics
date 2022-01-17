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

  public function vender($data){
    $this->db->insert('ventas', $data);
  }

  /*public function last_ranking(){
    $d = strtotime("-1 week -1 day");
    $start_week = strtotime("last sunday midnight", $d);
    $end_week = strtotime("next saturday", $d);
    $start = date("Y-m-d", $start_week);
    $end = date("Y-m-d", $end_week);
    
    return $this->db->query("SELECT v.id_venta, v.id_producto, COUNT(v.id_producto) AS ventas, p.producto, v.fecha, v.precio AS precio_regular, SUM(v.precio) as total FROM ventas v INNER JOIN productos p ON v.id_producto = p.id_producto WHERE fecha BETWEEN '$start' AND '$end' GROUP BY id_producto ORDER BY `ventas` DESC LIMIT 4;")->result();
  }

  public function last_ranking_id($id){
    $d = strtotime("-1 week -1 day");
    $start_week = strtotime("last sunday midnight", $d);
    $end_week = strtotime("next saturday", $d);
    $start = date("Y-m-d", $start_week);
    $end = date("Y-m-d", $end_week);
    
    return $this->db->query("SELECT v.id_venta, v.id_producto, COUNT(v.id_producto) AS ventas, p.producto, v.fecha, v.precio AS precio_regular, SUM(v.precio) as total FROM ventas v INNER JOIN productos p ON v.id_producto = p.id_producto WHERE (fecha BETWEEN '$start' AND '$end') AND v.id_producto = $id GROUP BY id_producto ORDER BY `ventas` DESC LIMIT 4;")->row();
  }

  public function ranking(){
    $d = strtotime("today");
    $start_week = strtotime("last sunday midnight", $d);
    $end_week = strtotime("next saturday", $d);
    $start = date("Y-m-d", $start_week);
    $end = date("Y-m-d", $end_week);
    $this->db->query("SET GLOBAL sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''))");
    return $this->db->query("SELECT v.id_venta, v.id_producto, COUNT(v.id_producto) AS ventas, p.producto, v.fecha, v.precio AS precio_regular, SUM(v.precio) as total FROM ventas v INNER JOIN productos p ON v.id_producto = p.id_producto WHERE fecha BETWEEN '$start' AND '$end' GROUP BY id_producto ORDER BY `ventas` DESC LIMIT 4;")->result();
  }*/

  // ------------------------------------------------------------------------

}

/* End of file Productos_model.php */
/* Location: ./application/models/Productos_model.php */