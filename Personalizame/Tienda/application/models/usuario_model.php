<?php
/* class Usuario_model
 * @author Luis
 * @packcage application\models
 */
class Usuario_model extends CI_Model{	
	/* 
	 * busca si el nick ya existe entre los usuarios
	 */
	private function existeNick($nick) { 
		return  R::findOne('usuario','nick = ?',[$nick]) != null ? true : false;
	}
	
	/*
	 * guarda (o No guarda) el usuario en base de datos y devuelve el status 0,-1 para indicarle al cotroller el mensaje a mostrar 
	 */
	public function crear($nick,$password,$perfil,$estado,$nombre,$apellido1,$apellido2,$telefono1,$telefono2,$mail1,$mail2,$comentario_contacto,$direccion,$cp,$localidad,$provincia,$pais,$comentario_direccion,$descuento,$fecha_alta,$fecha_baja,$motivo_baja){
		$status = 0;
		if (!$this->existeNick($nick)) {
			$usuario = R::dispense('usuario');
			
			$usuario -> nick = $nick;
			$usuario -> password = $password;
			$usuario -> perfil = $perfil;
			$usuario -> estado = $estado;
			$usuario -> nombre = $nombre;
			$usuario -> apellido1 = $apellido1;
			$usuario -> apellido2 = $apellido2;
			$usuario -> telefono1 = $telefono1;
			$usuario -> telefono2 = $telefono2;
			$usuario -> mail1 = $mail1;
			$usuario -> mail2 = $mail2;
			$usuario -> comentario_contacto = $comentario_contacto;
			$usuario -> direccion = $direccion;
			$usuario -> cp = $cp;
			$usuario -> localidad = $localidad;
			$usuario -> provincia = $provincia;
			$usuario -> pais = $pais;
			$usuario -> comentario_direccion = $comentario_direccion;
			$usuario -> descuento = $descuento;
			$usuario -> fecha_alta = $fecha_alta;
			$usuario -> fecha_baja = $fecha_baja;
			$usuario -> motivo_baja = $motivo_baja;
			
			R::store($usuario);
			R::close();
		}
		else {
			$status = -1;
		}
		return $status;
	}
	
	/*
	 * recuperar todos los usuarios
	 */
	public function getTodos() {
		$usuarios = R::findAll('usuario','order by nick'); 

		return  $usuarios;
	}
	
	/*
	 * recuperar un usuario por su id
	 */
	public function seleccionar($id){
		return R::load('usuario',$id);
	}
}
?>