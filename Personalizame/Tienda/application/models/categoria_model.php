<?php

class Categoria_model extends CI_Model{

	public function existeCategoria($nombre){
		return R::findOne('categoria', 'where nombre = ?', [$nombre]) ? true : false;
	}

	public function crearCategoria($nombre){
		if(!$this->existeCategoria($nombre)){
			$t = R::dispense('categoria');
			$t->nombre = $nombre;
			R::store($t);
			R::close();
			return true;
		}else{
			return false;
		}
	}

	public function listar(){
		return R::findAll('categoria');
	}
	
	public function listarConLimite($inicio, $cuantos){
		return R::findAll('categoria', 'LIMIT ?,5',[$inicio]);
	}

	public function borrar($idCategoria){
		$t = R::load('categoria', $idCategoria);
		R::trash($t);
		R::close();
	}

	public function getCategoriaById($id){
		return R::load('categoria', $id);
	}

	public function editar($id, $nom){
		$t = R::load('categoria', $id);
		$t->nombre = $nom;

		R::store($t);
		R::close();
	}
}

?>