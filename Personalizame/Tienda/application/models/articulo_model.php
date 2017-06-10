<?php

class Articulo_model extends CI_Model{
	
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
	
	public function existeArticulo($nombre){
		return R::findOne('articulo', 'where nombre = ?', [$nombre]) ? true : false;
	}
	
	public function crearArticulo($nombre, $nomImagen,$precio, $coste, $descuento, $disponible, $fecha_alta, $id_colores, $id_tallas){
		if(!$this->existeArticulo($nombre)){
			$a = R::dispense('articulo');
			$a->nombre = $nombre;
			$a->nombre_imagen = $nomImagen;
			$a->precio = $precio;
			$a->coste = $coste;
			$a->descuento = $descuento;
			$a->disponible = $disponible;
			$a->fecha_alta = $fecha_alta;
			
			if($id_colores != ''){
				foreach ($id_colores as $idcolor){
				
					$a-> sharedColorList[] = R::load('color', $idcolor);
				}
			}
			
			if($id_tallas != ''){
				foreach ($id_tallas as $idtalla){
				
					$a-> sharedTallaList[] = R::load('talla', $idtalla);
				}
			}
			R::store($a);
			R::close();
			return true;
		}else{
			return false;
		}
	}
	
	public function listar(){
		return R::findAll('articulo');
	}
	
	public function listarConLimite($inicio, $cuantos){
		return R::findAll('articulo', 'LIMIT ?,5',[$inicio]);
	}
	
	/*
	 * recuperar los articulos que cumplen el filtro
	 */
	public function getFiltrados($filtroNombre,$filtroImagen){
		return R::find('articulo','where nombre like ? and nombre_imagen like ? order by nombre',['%'.$filtroNombre.'%','%'.$filtroImagen.'%']);
	}
	
	/*
	 * Lista un número determinado de artículos
	 */
	public function getFiltradosConLimite($filtroNombre,$filtroImagen, $inicio){
		return R::find('articulo','where nombre like ? and nombre_imagen like ? order by nombre LIMIT ?,5',['%'.$filtroNombre.'%','%'.$filtroImagen.'%', $inicio]);
	}
	
	public function borrar($idArticulo){
		$a = R::load('articulo', $idArticulo);
		R::trash($a);
		R::close();	
	}
	
	public function getArticuloById($id){
		return R::load('articulo', $id);
	}
	
	public function editar($id, $nombre, $nomImagen, $precio, $coste, $descuento,  $disponible, $ids_colores, $ids_tallas){
		
			$a = R::load('articulo', $id);
			if($nombre == $a->nombre || !$this->existeArticulo($nombre)){
				$a->nombre = $nombre;
				$a->nombre_imagen = $nomImagen;
				$a->precio = $precio;
				$a->coste = $coste;
				$a->descuento = $descuento;
				$a->disponible = $disponible;
				$a->sharedColorList = [];
				if($ids_colores != ''){
					foreach ($ids_colores as $idColor){
						$a->sharedColorList[] = R::load('color', $idColor);
					}
				}
					
				$a->sharedTallaList = [];
				if($ids_tallas != ''){
					foreach ($ids_tallas as $idTalla){
						$a->sharedTallaList[] = R::load('talla', $idTalla);
					}
				}
					
				R::store($a);
				R::close();
				return true;
			}else{
				return false;
			}	
				
	}
	
	public function mostrarTallas($id_articulo){
		$tallas = R::findAll('articulo_talla','where articulo_id = ? order by id',[$id_articulo]);
		return $tallas;
	}
	
	public function mostrarColores($id_articulo){
		$colores = R::findAll('articulo_color','where articulo_id = ? order by id',[$id_articulo]);
		return $colores;
	}
}

?>