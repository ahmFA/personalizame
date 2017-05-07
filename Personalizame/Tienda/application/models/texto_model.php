<?php
/* class Texto_model
 * @author Luis
 * @packcage application\models
 */
class Texto_model extends CI_Model{
	/*
	 * crear el texto
	 */
	public function crear($idUsuario,$datosTexto,$idTamano,$idFuente,$rotacion,$idColor,$coordenadaX,$coordenadaY,$precio,$coste,$fecha_alta,$fecha_baja,$motivo_baja,$disponible,$idSesion){
		$texto = R::dispense('texto');
		
		$texto -> idUsuario = $idUsuario;
		$texto -> datosTexto = $datosTexto;
		//$texto -> idTamano = $idTamano;
		//$texto -> idFuente = $idFuente;
		$texto -> rotacion = $rotacion;
		//$texto -> idColor = $idColor;
		$texto -> coordenadaX = $coordenadaX;
		$texto -> coordenadaY = $coordenadaY;
		$texto -> precio = $precio;
		$texto -> coste = $coste;
		$texto -> fecha_alta = $fecha_alta;
		$texto -> fecha_baja = $fecha_baja;
		$texto -> motivo_baja = $motivo_baja;
		$texto -> disponible = $disponible;
		$texto -> idSesion = $idSesion;
		
		$tamano = R::load('tamano', $idTamano);
		$fuente = R::load('fuente', $idFuente);
		$color = R::load('color', $idColor);
		
		$tamano -> xownTextolist[] = $texto; 
		$fuente -> xownTextolist[] = $texto; 
		$color -> xownTextolist[] = $texto; 
		
		R::store($color);
		R::store($fuente);
		R::store($tamano);
		R::store($texto);
		R::close();
	}

	/*
	 * recuperar todos los textos
	 */
	public function getTodos() {
		$textos = R::findAll('texto','order by id');

		return  $textos;
	}

	/*
	 * recuperar un texto por su id
	 */
	public function getPorId($id){
		return R::load('texto',$id);
	}

	/*
	 * recuperar textos que cumplen el filtro
	 */
	public function getFiltrados($filtroUsuario,$filtroDatosTexto){
		//mirar como hacerlo para los casos en que venga un idUsuario ya que no puede ser Like sino un igual
		return R::find('texto','where datos_texto like ? and id_usuario like ? order by id',['%'.$filtroDatosTexto.'%','%'.$filtroUsuario.'%']);
	}
	
	/*
	 * Lista un número determinado de tamaños
	 */
	public function getFiltradosConLimite($filtroUsuario,$filtroDatosTexto, $inicio){
		return R::find('texto','where datos_texto like ? and id_usuario like ? order by id LIMIT ?,5',['%'.$filtroDatosTexto.'%','%'.$filtroUsuario.'%' ,$inicio]);
	}

	/*
	 * Borrar el texto que se indique
	 */
	public function borrar($idTexto){
		$texto = R::load('texto', $idTexto);
		R::trash($texto);
		R::close();
	}

	public function modificar($idTexto,$datosTexto,$idTamano,$idFuente,$rotacion,$idColor,$coordenadaX,$coordenadaY,$disponible){
		$texto = R::load('texto',$idTexto);

		$texto -> datosTexto = $datosTexto;
		//$texto -> idTamano = $idTamano;
		//$texto -> idFuente = $idFuente;
		$texto -> rotacion = $rotacion;
		//$texto -> idColor = $idColor;
		$texto -> coordenadaX = $coordenadaX;
		$texto -> coordenadaY = $coordenadaY;
		$texto -> disponible = $disponible;
		
		$tamano = R::load('tamano', $idTamano);
		$fuente = R::load('fuente', $idFuente);
		$color = R::load('color', $idColor);
		
		$tamano -> xownTextolist[] = $texto;
		$fuente -> xownTextolist[] = $texto;
		$color -> xownTextolist[] = $texto;
		
		R::store($color);
		R::store($fuente);
		R::store($tamano);
		R::store($texto);

		R::close();
	}

}
?>