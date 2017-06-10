<?php

class Imagen_model extends CI_Model{

	public function validarImagen($nombreImagen, $tamanoImagen, $tipoImagen){
		if($nombreImagen != null && $tamanoImagen <= 200000){
				
			if (($tipoImagen == "image/gif")
					|| ($tipoImagen == "image/jpeg")
					|| ($tipoImagen == "image/jpg")
					|| ($tipoImagen == "image/png")){
						return true;
			}else{
				return false;
			}
		}
	}

	public function existeImagen($nombreImagen, $nombre){
		return R::findOne('imagen', 'where nombre_imagen = ? or nombre = ?', [$nombreImagen, $nombre]) ? true : false;
	}

	public function crearImagen($id_user,$nombre, $nomImagen, $comentario, $descuento, $precio, $coste, $fecha_alta, $fecha_baja, $motivo_baja, $disponible, $id_categorias){
		if(!$this->existeImagen($nomImagen, $nombre)){
			$i = R::dispense('imagen');
			$usuario = R::load('usuario', $id_user);
			$usuario->ownImagenList[] = $i;
			$i->nombre = $nombre;
			$i->nombre_imagen = $nomImagen;
			$i->comentario = $comentario;
			$i->descuento = $descuento;
			$i->precio = $precio;
			$i->coste = $coste;
			$i->fecha_alta = $fecha_alta;
			$i->fecha_baja = $fecha_baja;
			$i->motivo_baja = $motivo_baja;
			$i->disponible = $disponible;
			foreach ($id_categorias as $idcat){
					
				$i-> sharedCategoriaList[] = R::load('categoria', $idcat);
			}
			
			R::store($usuario);
			R::store($i);
			R::close();
			return true;
		}else{
			return false;
		}
	}

	public function listar(){
		return R::findAll('imagen');
	}
	
	public function listarConLimite($inicio, $cuantos){
		return R::findAll('imagen', 'LIMIT ?,5',[$inicio]);
	}
	
	/*
	 * recuperar las imágenes que cumplen el filtro
	 */
	public function getFiltrados($filtroNombre,$filtroImagen){
		return R::find('imagen','where nombre like ? and nombre_imagen like ? order by nombre',['%'.$filtroNombre.'%','%'.$filtroImagen.'%']);
	}
	
	/*
	 * Lista un número determinado de imágenes
	 */
	public function getFiltradosConLimite($filtroNombre,$filtroImagen, $inicio){
		return R::find('imagen','where nombre like ? and nombre_imagen like ? order by nombre LIMIT ?,5',['%'.$filtroNombre.'%','%'.$filtroImagen.'%', $inicio]);
	}

	public function borrar($idImagen){
		$i = R::load('imagen', $idImagen);
		R::trash($i);
		R::close();
	}

	public function getImagenById($id){
		return R::load('imagen', $id);
	}
	
	public function existeNombreImagen($nombreImagen){
		return R::findOne('imagen', 'where nombre_imagen = ?', [$nombreImagen]) ? true : false;
	}
	
	public function existeNombre($nombre){
		return R::findOne('imagen', 'where nombre = ?', [$nombre]) ? true : false;
	}

	public function editar($id,$nombre, $nomImagen, $comentario, $descuento,$precio,$coste, $disponible, $ids_categorias){
		
			$i = R::load('imagen', $id);
			if(($nomImagen == $i->nombre_imagen || !$this->existeNombreImagen($nomImagen)) && ($nombre == $i->nombre || !$this->existeNombre($nombre))){
				$i->nombre = $nombre;
				$i->nombre_imagen = $nomImagen;
				$i->comentario = $comentario;
				$i->descuento = $descuento;
				$i->precio = $precio;
				$i->coste = $coste;
				$i->disponible = $disponible;
				$i->sharedCategoriaList = [];
				
				$i->sharedCategoriaList = [];
				foreach ($ids_categorias as $idcat){
					$i->sharedCategoriaList[] = R::load('categoria', $idcat);
				}
		
				R::store($i);
				R::close();
				return true;
			}else{
				return false;
			}
	}
	
	//cuando inserto los datos necesito recuperar el id que le han asignado para pasarlo a otro bean, asi lo recupero
	public function getPorCampos($id_usuario,$img_fichero){
		return R::findOne('imagen','where nombre_imagen = ? and usuario_id = ? ',[$img_fichero,$id_usuario]);
	}
	
	//devuelve todas las imagenes que pertenecen a una categoria
	public function	getImagenesCategoria($id_categoria){
		$imagenes = R::findAll('categoria_imagen','where categoria_id = ? order by id',[$id_categoria]);
		return $imagenes;
	}
}

?>