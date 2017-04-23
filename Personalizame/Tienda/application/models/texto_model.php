<?php
/* class Texto_model
 * @author Luis
 * @packcage application\models
 */
class Tamano_model extends CI_Model{
	/*
	 * crear el texto
	 */
	public function crear($idUsuario,$datosTexto,$idTamano,$idFuente,$rotacion,$idColor,$coordenadaX,$coordenadaY,$precio,$coste,$fecha_alta,$fecha_baja,$motivo_baja,$disponible,$idSesion){

		$texto = R::dispense('texto');

		$texto -> idUsuario = $idUsuario;
		$texto -> datosTexto = $datosTexto;
		$texto -> idTamano = $idTamano;
		$texto -> idFuente = $idFuente;
		$texto -> rotacion = $rotacion;
		$texto -> idColor = $idColor;
		$texto -> coordenadaX = $coordenadaX;
		$texto -> coordenadaY = $coordenadaY;
		$texto -> precio = $precio;
		$texto -> coste = $coste;
		$texto -> fecha_alta = $fecha_alta;
		$texto -> fecha_baja = $fecha_baja;
		$texto -> motivo_baja = $motivo_baja;
		$texto -> disponible = $disponible;
		$texto -> idSesion = $idSesion;
		
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
		//mirar como hacerlo para los casos en que venga un idUsuario ya que no puede ser Like sino =
		return R::find('texto','where datosTexto like ? and idUsuario = ? order by id',['%'.$filtroDatosTexto.'%',$filtroUsuario]);
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
		$texto -> idTamano = $idTamano;
		$texto -> idFuente = $idFuente;
		$texto -> rotacion = $rotacion;
		$texto -> idColor = $idColor;
		$texto -> coordenadaX = $coordenadaX;
		$texto -> coordenadaY = $coordenadaY;
		$texto -> disponible = $disponible;

		R::store($texto);
		R::close();
	}

}
?>