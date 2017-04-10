<?php

class Talla_model extends CI_Model{

	public function existeTalla($nombre){
		return R::findOne('talla', 'where nombre = ?', [$nombre]) ? true : false;
	}

	public function crearTalla($nombre, $disponible){
		if(!$this->existeTalla($nombre)){
			$t = R::dispense('talla');
			$t->nombre = $nombre;
			$t->disponible = $disponible;
			R::store($t);
			R::close();
			return true;
		}else{
			return false;
		}
	}

	public function listar(){
		return R::findAll('talla');
	}

	public function borrar($idTalla){
		$t = R::load('talla', $idTalla);
		R::trash($t);
		R::close();
	}

	public function getTallaById($id){
		return R::load('talla', $id);
	}

	public function editar($id, $nom, $disponible){
		$t = R::load('talla', $id);
		$t->nombre = $nom;
		$t->disponible = $disponible;

		R::store($t);
		R::close();
	}
}

?>