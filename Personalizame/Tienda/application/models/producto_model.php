<?php
/* class Producto_model
 * @author Luis
 * @packcage application\models
 */
class Producto_model extends CI_Model{
	/*
	 * crear el producto
	 */
	public function crear($id_usuario,$id_articulo,$id_talla,$id_color_base,$id_color_secundario,$id_diseno_front,$id_diseno_back,$nombre_producto,$imagen_producto,$fecha_alta,$fecha_baja,$motivo_baja,$disponible,$id_sesion){
		$producto = R::dispense('producto');
		
		$producto -> id_usuario = $id_usuario;
		$producto -> nombre_producto = $nombre_producto;
		$producto -> imagen_producto = $imagen_producto;
		//$producto -> precio = $precio;
		//$producto -> coste = $coste;
		$producto -> fecha_alta = $fecha_alta;
		$producto -> fecha_baja = $fecha_baja;
		$producto -> motivo_baja = $motivo_baja;
		$producto -> disponible = $disponible;
		$producto -> id_sesion = $id_sesion;
		
		$articulo = R::load('articulo', $id_articulo);
		$talla = R::load('talla', $id_talla);
		$colorB = R::load('color', $id_color_base);
		$colorS = R::load('color', $id_color_secundario);
		$disenoF = R::load('diseno', $id_diseno_front);
		$disenoB = R::load('diseno', $id_diseno_back);
		
		$articulo -> xownProductolist[] = $producto; 
		$talla -> xownProductolist[] = $producto;  
		$colorB -> xownProductolist[] = $producto;
		$colorS -> xownProductolist[] = $producto;
		$disenoF -> xownProductolist[] = $producto;
		$disenoB -> xownProductolist[] = $producto;
		
		$producto -> precio = $disenoF->precio + $disenoB->precio;
		$producto -> coste = $disenoF->coste + $disenoB->coste;
		
		R::store($articulo);
		R::store($talla);
		R::store($colorB);
		R::store($colorS);
		R::store($disenoF);
		R::store($disenoB);
		R::store($producto);
		R::close();
	}

	/*
	 * recuperar todos los productos
	 */
	public function getTodos() {
		$productos = R::findAll('producto','where disponible = "Si" order by id');
		return  $productos;
	}

	/*
	 * recuperar un producto por su id
	 */
	public function getPorId($id){
		return R::load('producto',$id);
	}

	/*
	 * recuperar productos que cumplen el filtro
	 */
	public function getFiltrados($filtroUsuario,$filtroNombreProducto){
		//mirar como hacerlo para los casos en que venga un idUsuario ya que no puede ser Like sino un igual
		return R::find('producto','where nombre_producto like ? and id_usuario like ? and disponible = "Si" order by id',['%'.$filtroNombreProducto.'%','%'.$filtroUsuario.'%']);
	}

	/*
	 * Borrar el producto que se indique
	 */
	public function borrar($id_producto){
		$producto = R::load('producto', $id_producto);
		
		$producto -> disponible = "No";
		$producto -> fecha_baja = strftime("%Y/%m/%d");
		$producto -> motivo_baja = "Administrador"; //si fuese el propio usuario se indicaría "Usuario"
		R::store($producto);
		R::close();
	}

	public function modificar($id_producto,$id_articulo,$id_talla,$id_color_base,$id_color_secundario,$id_diseno_front,$id_diseno_back,$nombre_producto,$imagen_producto){
		$producto = R::load('producto',$id_producto);

		$producto -> nombre_producto = $nombre_producto;
		$producto -> imagen_producto = $imagen_producto;
		
		$articulo -> xownProductolist[] = $producto; 
		$talla -> xownProductolist[] = $producto;  
		$colorB -> xownProductolist[] = $producto;
		$colorS -> xownProductolist[] = $producto;
		$disenoF -> xownProductolist[] = $producto;
		$disenoB -> xownProductolist[] = $producto;
		
		$producto -> precio = $disenoF->precio + $disenoB->precio;
		$producto -> coste = $disenoF->coste + $disenoB->coste;
		
		R::store($articulo);
		R::store($talla);
		R::store($colorB);
		R::store($colorS);
		R::store($disenoF);
		R::store($disenoB);
		R::store($producto);
		R::close();
	}

}
?>