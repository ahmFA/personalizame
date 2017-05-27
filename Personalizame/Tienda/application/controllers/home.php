<?php
session_start();
class Home extends CI_Controller {
	public function index() {
		$this->load->view('home');
	}
	
	public function indexAdmin(){
		$this->load->model('usuario_model');
		$datos['usuario'] =  $this->usuario_model->getPorId($_SESSION['idUsuario']);
		enmarcar($this,'homeAdmin', $datos);
	}
	
}
?>