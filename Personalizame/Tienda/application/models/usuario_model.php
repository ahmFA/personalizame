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
	public function getPorId($id){
		return R::load('usuario',$id);
	}
	
	/*
	 * recuperar los usuarios que cumplen el filtro
	 */
	public function getFiltrados($filtroNick,$filtroNombre){
		return R::find('usuario','where nick like ? and (nombre like ? or apellido1 like ? or apellido2 like ?) order by nick',['%'.$filtroNick.'%','%'.$filtroNombre.'%','%'.$filtroNombre.'%','%'.$filtroNombre.'%']);
	}
	
	/*
	 * borrar (dar de baja) el usuario que se indique
	 */
	public function borrar($idUsuario){
		$usuario = R::load('usuario', $idUsuario);
		$usuario -> estado = "Baja";
		$usuario -> fecha_baja = strftime("%Y/%m/%d");  //fecha actual en Formato(YYYY/MM/DD)
		$usuario -> motivo_baja = "Administrador"; //si fuese el propio usuario se indicaría "Usuario"
		R::store($usuario);
		R::close();
	}
	
	public function modificar($idUsuario,$dni,$tlf,$nombre,$apellidos,$direccion,$ids_fpago){
	
		$cli = R::load('cliente',$idUsuario);
		$cli->dni = $dni;
		$cli->tlf = $tlf;
		$cli->nombre = $nombre;
		$cli->apellidos = $apellidos;
		$cli->direccion = $direccion;
			
		$cli->sharedFpagoList = []; // vacío lista forma de pago del cliente
	
		foreach ($ids_fpago as $id_fpago) {
			$cli->sharedFpagoList[] = R::load('fpago',$id_fpago); //asigno nuevos valores marcados
		}
			
		R::store($cli);
		R::close();
	}
	
}
?>