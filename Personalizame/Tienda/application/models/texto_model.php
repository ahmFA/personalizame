<?php
/* class Texto_model
 * @author Luis
 * @packcage application\models
 */
class Texto_model extends CI_Model{
	/*
	 * crear el texto
	 */
	public function crear($idUsuario,$datos_texto,$tamano_fuente,$id_fuente,$rotacion,$texto_alto,$texto_ancho,$id_color,$coordenada_x,$coordenada_y,$precio,$coste,$fecha_alta,$fecha_baja,$motivo_baja,$disponible,$idSesion){
		$texto = R::dispense('texto');
		$user = R::load('usuario', $idUsuario);
		
		$user -> ownTextolist[] = $texto;
		
		$texto -> datos_texto = $datos_texto;
		$texto -> tamano_fuente = $tamano_fuente;
		//$texto -> idFuente = $idFuente;
		$texto -> rotacion = $rotacion;
		//$texto -> idColor = $idColor;
		$texto -> coordenada_x = $coordenada_x;
		$texto -> texto_alto = $texto_alto;
		$texto -> texto_ancho = $texto_ancho;
		$texto -> coordenada_y = $coordenada_y;
		$texto -> precio = $precio;
		$texto -> coste = $coste;
		$texto -> fecha_alta = $fecha_alta;
		$texto -> fecha_baja = $fecha_baja;
		$texto -> motivo_baja = $motivo_baja;
		$texto -> disponible = $disponible;
		$texto -> idSesion = $idSesion;
		
		//$tamano = R::load('tamano', $idTamano);
		$fuente = R::load('fuente', $id_fuente);
		$color = R::load('color', $id_color);
		
		//$tamano -> xownTextolist[] = $texto; 
		$fuente -> xownTextolist[] = $texto; 
		$color -> xownTextolist[] = $texto; 
		
		R::store($user);
		R::store($color);
		R::store($fuente);
		//R::store($tamano);
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
		return R::find('texto','where datos_texto like ? and usuario_id like ? order by id',['%'.$filtroDatosTexto.'%','%'.$filtroUsuario.'%']);
	}
	
	/*
	 * Lista un número determinado de tamaños
	 */
	public function getFiltradosConLimite($filtroUsuario,$filtroDatosTexto, $inicio){
		return R::find('texto','where datos_texto like ? and usuario_id like ? order by id LIMIT ?,5',['%'.$filtroDatosTexto.'%','%'.$filtroUsuario.'%' ,$inicio]);
	}

	/*
	 * Borrar el texto que se indique
	 */
	public function borrar($id_texto){
		$texto = R::load('texto', $id_texto);
		R::trash($texto);
		R::close();
	}

	public function modificar($id_texto,$datos_texto,$tamano_fuente,$id_fuente,$rotacion,$texto_alto,$texto_ancho,$id_color,$coordenada_x,$coordenada_y,$disponible){
		$texto = R::load('texto',$id_texto);

		$texto -> datos_texto = $datos_texto;
		$texto -> tamano_fuente = $tamano_fuente;
		//$texto -> idFuente = $idFuente;
		$texto -> rotacion = $rotacion;
		//$texto -> idColor = $idColor;
		$texto -> texto_alto = $texto_alto;
		$texto -> texto_ancho = $texto_ancho;
		$texto -> coordenada_x = $coordenada_x;
		$texto -> coordenada_y = $coordenada_y;
		$texto -> disponible = $disponible;
		
		//$tamano = R::load('tamano', $idTamano);
		$fuente = R::load('fuente', $id_fuente);
		$color = R::load('color', $id_color);
		
		//$tamano -> xownTextolist[] = $texto;
		$fuente -> xownTextolist[] = $texto;
		$color -> xownTextolist[] = $texto;
		
		R::store($color);
		R::store($fuente);
		//R::store($tamano);
		R::store($texto);

		R::close();
	}

	//cuando inserto los datos necesito recuperar el id que le han asignado para pasarlo a otro bean asi lo recupero
	public function getPorCampos($id_usuario,$id_sesion,$txt_datos){
		return R::findOne('texto','where datos_texto = ? and (usuario_id = ? or id_sesion = ?)',[$txt_datos,$id_usuario,$id_sesion]);
	}
}
?>