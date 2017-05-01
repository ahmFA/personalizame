<?php

class Color_model extends CI_Model{

	public function existeColor($nombre){
		return R::findOne('color', 'where nombre = ?', [$nombre]) ? true : false;
	}

	public function crearColor($nombre, $valor){
		if(!$this->existeColor($nombre)){
			$c = R::dispense('color');
			$c->nombre = $nombre;
			$c->valor = $valor;
			R::store($c);
			R::close();
			return true;
		}else{
			return false;
		}
	}

	public function listar(){
		return R::findAll('color');
	}
	
	public function listarConLimite($inicio, $cuantos){
		return R::findAll('color', 'LIMIT ?,5',[$inicio]);
	}

	public function borrar($idColor){
		$c = R::load('color', $idColor);
		R::trash($c);
		R::close();
	}

	public function getColorById($id){
		return R::load('color', $id);
	}

	public function editar($id, $nom, $valor){
		$c = R::load('color', $id);
		$c->nombre = $nom;
		$c->valor = $valor;

		R::store($c);
		R::close();
	}
}

?>