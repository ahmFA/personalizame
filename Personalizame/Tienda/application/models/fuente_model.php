<?php
/* class Fuente_model
 * @author Luis
 * @packcage application\models
 */
class Fuente_model extends CI_Model{
	/*
	 * busca si el nombre ya existe entre las fuentes
	 */
	private function existeNombre($nombre) {
		return  R::findOne('fuente','nombre = ?',[$nombre]) != null ? true : false;
	}

	/*
	 * guarda (o No guarda) la fuente en base de datos y devuelve el status 0,-1 para indicarle al cotroller el mensaje a mostrar
	 */
	public function crear($nombre){
		$status = 0;
		if (!$this->existeNombre($nombre)) {
			$fuente = R::dispense('fuente');

			$fuente -> nombre = $nombre;
			
			R::store($fuente);
			R::close();
		}
		else {
			$status = -1;
		}
		return $status;
	}

	/*
	 * recuperar todas las tipos de fuente
	 */
	public function getTodos() {
		$fuentes = R::findAll('fuente','order by nombre');

		return  $fuentes;
	}

	/*
	 * recuperar una fuente por su id
	 */
	public function getPorId($id){
		return R::load('fuente',$id);
	}

	/*
	 * recuperar fuentes que cumplen el filtro
	 */
	public function getFiltrados($filtroNombre){
		return R::find('fuente','where nombre like ? order by nombre',['%'.$filtroNombre.'%']);
	}
	
	/*
	 * Lista un número determinado de tamaños
	 */
	public function getFiltradosConLimite($filtroNombre, $inicio){
		return R::find('fuente','where nombre like ? order by nombre LIMIT ?,5',['%'.$filtroNombre.'%', $inicio]);
	}

	/*
	 * Borrar la fuente que se indique
	 */
	public function borrar($idFuente){
		$fuente = R::load('fuente', $idFuente);
		R::trash($fuente);
		R::close();
	}

	public function modificar($idFuente,$nombre){
		$fuente = R::load('fuente',$idFuente);

		$fuente -> nombre = $nombre;

		R::store($fuente);
		R::close();
	}

}
?>