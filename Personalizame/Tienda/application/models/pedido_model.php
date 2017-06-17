<?php

class Pedido_model extends CI_Model{
	
	public function crear($usuario, $direccion, $importe, $persona, $contacto, $numref){
		
		$p = R::dispense('pedido');
		$user = R::load('usuario', $usuario);
		
		$user -> ownPedidolist[] = $p;
		$p->nick_user = $user->nick;
		$p->num_ref = $numref;
		$p->direccion = $direccion;
		$p->persona = $persona;
		$p->contacto =$contacto;
		$p->fecha = strftime("%Y/%m/%d");;
		$p->importe = $importe;
		$p->fecha_entrega = '';
		$p->estado = 'Pendiente';
		R::store($user);
		R::close();
		
	}
	
	public function listarConLimite($inicio, $cuantos){
		return R::findAll('pedido', 'LIMIT ?,5',[$inicio]);
	}
	
	/*
	 * recuperar pedidoes que cumplen el filtro
	 */
	public function getFiltrados($filtroNick, $filtroEstado){
		return R::find('pedido','where nick_user like ? and estado like ? order by fecha desc',['%'.$filtroNick.'%', '%'.$filtroEstado.'%']);
	}
	
	/*
	 * Lista un número determinado de pedidoes
	 */
	public function getFiltradosConLimite($filtroNick, $filtroEstado ,$inicio){
		return R::find('pedido','where nick_user like ? and estado like ? order by fecha desc LIMIT ?,5',['%'.$filtroNick.'%', '%'.$filtroEstado.'%' ,$inicio]);
	}
	
	public function getPedidoById($id){
		return R::load('pedido', $id);
	}
	
	public function editar($id, $direccion, $estado){
	
		$p = R::load('pedido', $id);
	
		$p->direccion = $direccion;
		$p->estado = $estado;
		if($estado == 'Entregado'){
			$p->fecha_entrega = strftime("%Y/%m/%d");
		}

		R::store($p);
		R::close();
	}
	
	public function getPorCampos($id_usuario,$pedido_numref){
		return R::findOne('pedido','where num_ref = ? and usuario_id = ?',[$pedido_numref,$id_usuario]);
	}
	
}

?>