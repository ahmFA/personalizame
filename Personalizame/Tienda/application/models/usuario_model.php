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
			$usuario -> password = $password; // mirar como funciona encriptado md5($password);
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
	public function getPorId($id){
		return R::load('usuario',$id);
	}
	
	/*
	 * recuperar los usuarios que cumplen el filtro
	 */
	public function getFiltrados($filtroNick,$filtroNombre,$filtroMail,$filtroEstado){
		return R::find('usuario','where nick like ? and (nombre like ? or apellido1 like ? or apellido2 like ?) and (mail1 like ? or mail2 like ?) and estado like ? order by perfil,nick',['%'.$filtroNick.'%','%'.$filtroNombre.'%','%'.$filtroNombre.'%','%'.$filtroNombre.'%','%'.$filtroMail.'%','%'.$filtroMail.'%','%'.$filtroEstado.'%']);
	}
	
	/*
	 * dar de Baja el usuario que se indique
	 */
	public function estadoBaja($idUsuario){
		$usuario = R::load('usuario', $idUsuario);
		$usuario -> estado = "Baja";
		$usuario -> fecha_baja = strftime("%Y/%m/%d");  //fecha actual en Formato(YYYY/MM/DD)
		$usuario -> motivo_baja = "Administrador"; //si fuese el propio usuario se indicaría "Usuario"
		R::store($usuario);
		R::close();
	}
	
	/*
	 * Volver a dar de Alta el usuario que se indique
	 */
	public function estadoAlta($idUsuario){
		$usuario = R::load('usuario', $idUsuario);
		$usuario -> estado = "Alta";
		$usuario -> fecha_baja = "";
		$usuario -> motivo_baja = "";
		R::store($usuario);
		R::close();
	}
	
	public function modificar($idUsuario,$nick,$password,$perfil,$nombre,$apellido1,$apellido2,$telefono1,$telefono2,$mail1,$mail2,$comentario_contacto,$direccion,$cp,$localidad,$provincia,$pais,$comentario_direccion){
		$usuario = R::load('usuario',$idUsuario);
		
		$usuario -> nick = $nick;
		$usuario -> password = $password; // mirar como funciona encriptado md5($password);
		$usuario -> perfil = $perfil;
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
		
		R::store($usuario);
		R::close();
	}
	
	public function comprobarCredenciales($mail,$password){
		return R::findOne('usuario','mail1 = ? and password = ? and estado = "Alta"',[$mail,$password]);
	}
}
?>