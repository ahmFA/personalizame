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
	
	/*
	 * recuperar tamanos que cumplen el filtro
	 */
	public function getFiltrados($filtroNombre){
		return R::find('categoria','where nombre like ? order by nombre',['%'.$filtroNombre.'%']);
	}
	
	/*
	 * Lista un número determinado de tamaños
	 */
	public function getFiltradosConLimite($filtroNombre, $inicio){
		return R::find('categoria','where nombre like ? order by nombre LIMIT ?,5',['%'.$filtroNombre.'%', $inicio]);
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
		if(!$this->existeCategoria($nom)){
			$t = R::load('categoria', $id);
			$t->nombre = $nom;
	
			R::store($t);
			R::close();
			return true;
		}else{
			return false;
		}
	}
	
	//cuando inserto los datos necesito recuperar el id que le han asignado para pasarlo a otro bean, asi lo recupero
	public function getPorNombre($nombre){
		return R::findOne('categoria','where nombre = ? ',[$nombre]);
	}
}

?>