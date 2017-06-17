<?php

class Lineap extends CI_Controller{
	
	public function listar(){
		$id_pedido = $_POST['id_pedido'];
		$this->load->model('lineap_model');
		
		$datos['body']['lineasp'] = $this->lineap_model->getPorCampos($id_pedido);
		enmarcar($this, 'lineap/listar', $datos);
	}	
}

?>