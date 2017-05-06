<?php
/* class Diseno_model
 * @author Luis
 * @packcage application\models
 */
class Diseno_model extends CI_Model{
	/*
	 * crear el diseño
	 */
	public function crear($id_usuario,$nombre_diseno,$comentario_diseno,$ubicacion,$id_imagen,$tamano_imagen,$rotacion_imagen,$coordenada_x,$coordenada_y,$profundidad_z,$id_texto,$precio,$coste,$fecha_alta,$fecha_baja,$motivo_baja,$disponible,$id_sesion){
		$diseno = R::dispense('diseno');
		
		$diseno -> id_usuario = $id_usuario;
		$diseno -> nombre_diseno = $nombre_diseno;
		$diseno -> comentario_diseno = $comentario_diseno;
		$diseno -> ubicacion = $ubicacion;
		$diseno -> tamano_imagen = $tamano_imagen;
		$diseno -> rotacion_imagen = $rotacion_imagen;
		$diseno -> coordenada_x = $coordenada_x;
		$diseno -> coordenada_y = $coordenada_y;
		$diseno -> profundidad_z = $profundidad_z;
		$diseno -> precio = $precio;
		$diseno -> coste = $coste;
		$diseno -> fecha_alta = $fecha_alta;
		$diseno -> fecha_baja = $fecha_baja;
		$diseno -> motivo_baja = $motivo_baja;
		$diseno -> disponible = $disponible;
		$diseno -> idSesion = $idSesion;
		
		$imagen = R::load('imagen', $id_imagen);
		$texto = R::load('texto', $id_texto);
		
		$imagen -> xownDisenolist[] = $diseno; 
		$texto -> xownDisenolist[] = $diseno;  
		
		R::store($imagen);
		R::store($texto);
		R::store($diseno);
		R::close();
	}

	/*
	 * recuperar todos los diseños
	 */
	public function getTodos() {
		$disenos = R::findAll('diseno','order by id');

		return  $disenos;
	}

	/*
	 * recuperar un diseño por su id
	 */
	public function getPorId($id){
		return R::load('diseno',$id);
	}

	/*
	 * recuperar diseños que cumplen el filtro
	 */
	public function getFiltrados($filtroUsuario,$filtroNombreDiseno){
		//mirar como hacerlo para los casos en que venga un idUsuario ya que no puede ser Like sino un igual
		return R::find('diseno','where nombre_diseno like ? and id_usuario like ? order by id',['%'.$filtroNombreDiseno.'%','%'.$filtroUsuario.'%']);
	}

	/*
	 * Borrar el texto que se indique
	 */
	public function borrar($id_diseno){
		$diseno = R::load('diseno', $id_diseno);
		
		$diseno -> disponible = "No";
		$diseno -> fecha_baja = strftime("%Y/%m/%d");
		$diseno -> motivo_baja = "Administrador"; //si fuese el propio usuario se indicaría "Usuario"
		R::store($diseno);
		R::close();
	}

	public function modificar($id_diseno,$nombre_diseno,$comentario_diseno,$ubicacion,$id_imagen,$tamano_imagen,$rotacion_imagen,$coordenada_x,$coordenada_y,$profundidad_z,$id_texto){
		$diseno = R::load('diseno',$id_diseno);

		$texto -> nombre_diseno = $nombre_diseno;
		$texto -> comentario_diseno = $comentario_diseno;
		$texto -> ubicacion = $ubicacion;
		$diseno -> tamano_imagen = $tamano_imagen;
		$diseno -> rotacion_imagen = $rotacion_imagen;
		$diseno -> coordenada_x = $coordenada_x;
		$diseno -> coordenada_y = $coordenada_y;
		$diseno -> profundidad_z = $profundidad_z;
		
		$imagen = R::load('imagen', $id_imagen);
		$texto = R::load('texto', $id_texto);
		
		$imagen -> xownDisenolist[] = $diseno; 
		$texto -> xownDisenolist[] = $diseno;  
		
		R::store($imagen);
		R::store($texto);
		R::store($diseno);
		R::close();
	}

}
?>