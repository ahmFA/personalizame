<?php

class Lineap_model extends CI_Model{
	
	public function crear($id_pedido, $id_producto, $precio_unidad, $coste_unidad, $unidades){
		
		$lp = R::dispense('lineap');
		$pedido = R::load('pedido', $id_pedido);
		$producto = R::load('producto', $id_producto);
		
		$pedido -> ownLineaplist[] = $lp;
		$producto -> ownLineaplist[] = $lp;
		
		$lp->precio_unidad = $precio_unidad;
		$lp->coste_unidad = $coste_unidad;
		$lp->unidades = $unidades;
		$lp->fecha = strftime("%Y/%m/%d");

		R::store($pedido);
		R::store($producto);
		R::close();
		
	}
	
	public function getPorCampos($id_pedido){
		return R::find('lineap','where pedido_id = ?',[$id_pedido]);
	}
	
}