<?php
/* class Tamano_model
 * @author Luis
 * @packcage application\models
 */
class Tamano_model extends CI_Model{
	/*
	 * busca si el nombre ya existe entre las fuentes
	 */
	private function existeNombre($nombre) {
		return  R::findOne('tamano','nombre = ?',[$nombre]) != null ? true : false;
	}

	/*
	 * guarda (o No guarda) el tamaño en base de datos y devuelve el status 0,-1 para indicarle al cotroller el mensaje a mostrar
	 */
	public function crear($nombre){
		$status = 0;
		if (!$this->existeNombre($nombre)) {
			$tamano = R::dispense('tamano');

			$tamano -> nombre = $nombre;
			
			R::store($tamano);
			R::close();
		}
		else {
			$status = -1;
		}
		return $status;
	}

	/*
	 * recuperar todos los tamaños
	 */
	public function getTodos() {
		$tamanos = R::findAll('tamano','order by nombre');

		return  $tamanos;
	}

	/*
	 * recuperar un tamaño por su id
	 */
	public function getPorId($id){
		return R::load('tamano',$id);
	}

	/*
	 * recuperar tamanos que cumplen el filtro
	 */
	public function getFiltrados($filtroNombre){
		return R::find('tamano','where nombre like ? order by nombre',['%'.$filtroNombre.'%']);
	}
	
	/*
	 * Lista un número determinado de tamaños
	 */
	public function getFiltradosConLimite($filtroNombre, $inicio){
		return R::find('tamano','where nombre like ? order by nombre LIMIT ?,5',['%'.$filtroNombre.'%', $inicio]);
	}
	
	/*
	 * Borrar el tamaño que se indique
	 */
	public function borrar($idTamano){
		$tamano = R::load('tamano', $idTamano);
		R::trash($tamano);
		R::close();
	}

	public function modificar($idTamano,$nombre){
		$tamano = R::load('tamano',$idTamano);

		$tamano -> nombre = $nombre;

		R::store($tamano);
		R::close();
	}

}
?>