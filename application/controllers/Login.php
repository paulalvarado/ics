<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Login
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

class Login extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Usuarios_model');
  }

  public function index()
  {
    if (!isset($this->session->username)) {
      $this->load->view('login/login');
    }else{
      redirect(base_url('dashboard'));
    }
  }

  public function login()
  {
    $usuarios = $this->Usuarios_model->usuarios();

    $user = $_POST['username'];
    $pass = md5($_POST['password']);

    $result = [
      'user' => 'Usuario no encontrado',
      'pass' => 'Contraseña incorrecta',
    ];
    foreach ($usuarios as $key => $value) {
      if ($user == $value->username) {
        $result['user'] = 'Usuario encontrado';
      }
      if ($pass == $value->password) {
        $result['pass'] = 'Contraseña correcta';
      }
      if ($result['user'] == 'Usuario encontrado' && $result['pass'] == 'Contraseña correcta'){
        $email = $value->email;
        $nombre = $value->nombre;
        $apellido = $value->apellido;
      }
    }

    if ($result['user'] == 'Usuario encontrado' && $result['pass'] == 'Contraseña correcta') {
      $newdata = array(
        'username'  => $user,
        'nombre'  => $nombre,
        'apellido'  => $apellido,
        'email'     => $email,
        'logged_in' => TRUE
      );

      $this->session->set_userdata($newdata);
    }

    echo json_encode($result);
  }

  public function logout(){
    $this->session->sess_destroy();
    redirect(base_url());
  }
}


/* End of file Login.php */
/* Location: ./application/controllers/Login.php */