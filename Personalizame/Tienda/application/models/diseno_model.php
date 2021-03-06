<?php
/* class Diseno_model
 * @author Luis
 * @packcage application\models
 */
class Diseno_model extends CI_Model{
	/*
	 * crear el diseño
	 */
	public function crear($id_usuario,$nombre_diseno,$comentario_diseno,$ubicacion,$id_imagen,$tamano_imagen,$tamano_imagen_ancho,$tamano_imagen_alto,$rotacion_imagen,$img_coordenada_x,$img_coordenada_y,$img_profundidad_z,$id_texto,$fecha_alta,$fecha_baja,$motivo_baja,$disponible,$id_sesion){
		$diseno = R::dispense('diseno');
		$user = R::load('usuario', $id_usuario);
		
		$user -> ownDisenolist[] = $diseno;

		$diseno -> nombre_diseno = $nombre_diseno;
		$diseno -> comentario_diseno = $comentario_diseno;
		$diseno -> ubicacion = $ubicacion;
		$diseno -> tamano_imagen = $tamano_imagen;
		$diseno -> tamano_imagen_ancho = $tamano_imagen_ancho;
		$diseno -> tamano_imagen_alto= $tamano_imagen_alto;
		$diseno -> rotacion_imagen = $rotacion_imagen;
		$diseno -> img_coordenada_x = $img_coordenada_x;
		$diseno -> img_coordenada_y = $img_coordenada_y;
		$diseno -> img_profundidad_z = $img_profundidad_z;

		$diseno -> fecha_alta = $fecha_alta;
		$diseno -> fecha_baja = $fecha_baja;
		$diseno -> motivo_baja = $motivo_baja;
		$diseno -> disponible = $disponible;
		$diseno -> id_sesion = $id_sesion;
		
		//el valor cero es el por defecto que le doy en controller cuando no se utiliza ese elemento
		if($id_imagen > 0){
			$imagen = R::load('imagen', $id_imagen);
			$imagen -> xownDisenolist[] = $diseno;
			R::store($imagen);
			$precioI = $imagen->precio;
			$costeI = $imagen->coste;
		}else{
			$precioI = 0;
			$costeI = 0;
		}
		
		if($id_texto > 0){
			$texto = R::load('texto', $id_texto);
			$texto -> xownDisenolist[] = $diseno;  
			R::store($texto);
			$precioT = $texto->precio;
			$costeT = $texto->coste;
		}else{
			$precioT = 0;
			$costeT = 0;
		}

		$diseno -> precio = $precioI + $precioT;
		$diseno -> coste = $costeI + $costeT;
		
		R::store($user);
		R::store($diseno);
		R::close();
	}

	/*
	 * recuperar todos los diseños
	 */
	public function getTodos() {
		$disenos = R::findAll('diseno','where disponible = "Si" order by id');

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
		return R::find('diseno','where nombre_diseno like ? and usuario_id like ? and disponible = "Si" order by id',['%'.$filtroNombreDiseno.'%','%'.$filtroUsuario.'%']);
	}

	/*
	 * Borrar el diseño que se indique
	 */
	public function borrar($id_diseno){
		$diseno = R::load('diseno', $id_diseno);
		
		$diseno -> disponible = "No";
		$diseno -> fecha_baja = strftime("%Y/%m/%d");
		$diseno -> motivo_baja = "Administrador"; //si fuese el propio usuario se indicaría "Usuario"
		R::store($diseno);
		R::close();
	}

	public function modificar($id_diseno,$nombre_diseno,$comentario_diseno,$ubicacion,$id_imagen,$tamano_imagen,$rotacion_imagen,$img_coordenada_x,$img_coordenada_y,$img_profundidad_z,$id_texto){
		$diseno = R::load('diseno',$id_diseno);

		$diseno -> nombre_diseno = $nombre_diseno;
		$diseno -> comentario_diseno = $comentario_diseno;
		$diseno -> ubicacion = $ubicacion;
		$diseno -> tamano_imagen = $tamano_imagen;
		$diseno -> rotacion_imagen = $rotacion_imagen;
		$diseno -> img_coordenada_x = $img_coordenada_x;
		$diseno -> img_coordenada_y = $img_coordenada_y;
		$diseno -> img_profundidad_z = $img_profundidad_z;
		
		$imagen = R::load('imagen', $id_imagen);
		$texto = R::load('texto', $id_texto);
		
		$imagen -> xownDisenolist[] = $diseno; 
		$texto -> xownDisenolist[] = $diseno;  
		
		$diseno -> precio = $imagen->precio + $texto->precio;
		$diseno -> coste = $imagen->coste + $texto->coste;
		
		R::store($imagen);
		R::store($texto);
		R::store($diseno);
		R::close();
	}
	
	//cuando inserto los datos necesito recuperar el id que le han asignado para pasarlo a otro bean, asi lo recupero
	public function getPorCampos($id_usuario,$id_sesion,$nombre_diseno,$ubicacion){
		return R::findOne('diseno','where nombre_diseno = ? and ubicacion = ? and (usuario_id = ? or id_sesion = ?)',[$nombre_diseno,$ubicacion,$id_usuario,$id_sesion]);
	}
}
?>