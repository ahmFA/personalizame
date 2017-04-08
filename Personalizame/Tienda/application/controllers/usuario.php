<?php
/* class Usuario
 * @author Luis
 * @packcage application\controllers
 */
class Usuario extends CI_Controller{
	/*
	 * muestra el formulario de crear usuario
	 */
	public function crear(){
		enmarcar($this,'usuario/crear');
	}
	
	/*
	 * muestra la vista de creado OK
	 */
	public function crearOK(){
		enmarcar($this,'usuario/crearOK');
	}
	
	/*
	 * muestra la vista de Error al crear 
	 */
	public function crearERROR(){
		enmarcar($this,'usuario/crearERROR');
	}
	
	/*
	 * recoge datos del formulario y los pasa al modelo
	 */
	public function crearPost() {
		$nick = $_POST['nick'];
		$password = $_POST['password'];
		$perfil = $_POST['perfil'];
		$estado = $_POST['estado'];
		$nombre = $_POST['nombre'];
		$apellido1 = $_POST['apellido1'];
		$apellido2 = $_POST['apellido2'];
		$telefono1 = $_POST['telefono1'];
		/*$telefono2 = $_POST['telefono2'];
		$mail1 = $_POST['mail1'];
		$mail2 = $_POST['mail2'];
		$comentario_contacto = $_POST['comentario_contacto'];
		$direccion = $_POST['direccion'];
		$cp = $_POST['cp'];
		$localidad = $_POST['localidad'];
		$provincia = $_POST['provincia'];
		$pais = $_POST['pais'];
		$comentario_direccion = $_POST['comentario_direccion'];
		$descuento = $_POST['descuento'];
		$fecha_alta = $_POST['fecha_alta'];
		$fecha_baja = $_POST['fecha_baja'];
		$motivo_baja = $_POST['motivo_baja'];*/
		
		$this->load->model('usuario_model');
		//$status = $this->usuario_model->crear($nick,$password,$perfil,$estado,$nombre,$apellido1,$apellido2,$telefono1,$telefono2,$mail1,$mail2,$comentario_contacto,$direccion,$cp,$localidad,$provincia,$pais,$comentario_direccion,$descuento,$fecha_alta,$fecha_baja,$motivo_baja);
		$status = $this->usuario_model->crear($nick,$password,$perfil,$estado,$nombre,$apellido1,$apellido2,$telefono1);
		if ($status>=0) {
			header('Location:'.base_url().'usuario/crearOK');
		}
		else {
			header('Location:'.base_url().'usuario/crearERROR');
		}
	}
}
?>