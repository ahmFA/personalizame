<?php
session_start();
/* class Producto
 * @author Luis
 * @packcage application\controllers
 */
class Producto extends CI_Controller{
	/*
	 * muestra el formulario de crear producto
	 */
	public function crear(){
		$this->load->model('fuente_model');
		$this->load->model('tamano_model');
		$this->load->model('color_model');
		$this->load->model('articulo_model');
		$this->load->model('categoria_model');
		$this->load->model('imagen_model');
		$datos ['body'] ['colores'] = $this->color_model->getTodos();
		$datos ['body'] ['fuentes'] = $this->fuente_model->getTodos();
		$datos ['body'] ['tamanos'] = $this->tamano_model->getTodos();
		$datos ['body'] ['articulos'] = $this->articulo_model->listar();
		$datos ['body'] ['imagenes'] = $this->imagen_model->listar();
		$datos ['body'] ['categorias'] = $this->categoria_model->listar();
		
		enmarcar($this,'producto/crear',$datos);
	}
	
	/*
	 * recoge datos del formulario y los pasa al modelo
	 */
	public function crearPost() { //AJAX
		$id_usuario = $_POST['id_usuario'];
		$id_articulo = $_POST['id_articulo'];
		$id_talla = $_POST['id_talla'];
		$id_color_base = $_POST['id_color_base'];
		$img_front_id =  $_POST['img_front_id'];
		$img_front_rotacion = $_POST['img_front_rotacion'];
		$img_front_coordenada_x = $_POST['img_front_coordenada_x'];
		$img_front_coordenada_y = $_POST['img_front_coordenada_y'];
		$img_front_tamano = $_POST['img_front_tamano'];
		$img_front_tamano_ancho = $_POST['img_front_tamano_ancho'];
		$img_front_tamano_alto = $_POST['img_front_tamano_alto'];
		$img_front_profundidad_z = $_POST['img_front_profundidad_z'];
		$img_back_id =  $_POST['img_back_id'];
		$img_back_rotacion = $_POST['img_back_rotacion'];
		$img_back_coordenada_x = $_POST['img_back_coordenada_x'];
		$img_back_coordenada_y = $_POST['img_back_coordenada_y'];
		$img_back_tamano = $_POST['img_back_tamano'];
		$img_back_tamano_ancho = $_POST['img_back_tamano_ancho'];
		$img_back_tamano_alto = $_POST['img_back_tamano_alto'];
		$img_back_profundidad_z = $_POST['img_back_profundidad_z'];
		$txt_front_id_fuente = $_POST['txt_front_id_fuente'];
		$txt_front_id_color = $_POST['txt_front_id_color'];
		$txt_front_rotacion = $_POST['txt_front_rotacion'];
		$txt_front_coordenada_x = $_POST['txt_front_coordenada_x'];
		$txt_front_coordenada_y = $_POST['txt_front_coordenada_y'];
		$txt_front_texto_ancho = $_POST['txt_front_texto_ancho'];
		$txt_front_texto_alto = $_POST['txt_front_texto_alto'];
		$txt_front_tamano_fuente = $_POST['txt_front_tamano_fuente'];
		$txt_front_fuente = $_POST['txt_front_fuente'];
		$txt_front_datos = $_POST['txt_front_datos'];
		$txt_front_color = $_POST['txt_front_color'];
		$txt_back_id_fuente = $_POST['txt_back_id_fuente'];
		$txt_back_id_color = $_POST['txt_back_id_color'];
		$txt_back_rotacion = $_POST['txt_back_rotacion'];
		$txt_back_coordenada_x = $_POST['txt_back_coordenada_x'];
		$txt_back_coordenada_y = $_POST['txt_back_coordenada_y'];
		$txt_back_texto_ancho = $_POST['txt_back_texto_ancho'];
		$txt_back_texto_alto = $_POST['txt_back_texto_alto'];
		$txt_back_tamano_fuente = $_POST['txt_back_tamano_fuente'];
		$txt_back_fuente = $_POST['txt_back_fuente'];
		$txt_back_datos = $_POST['txt_back_datos'];
		$txt_back_color = $_POST['txt_back_color'];
		$fecha_alta = strftime("%Y/%m/%d");  //fecha actual en Formato(YYYY/MM/DD)
		$fecha_baja = ""; // será vacio al darse de alta
		$motivo_baja = ""; // será vacio al darse de alta
		$disponible = "Si"; // los diseños al crearse estarán disponibles, pasa a NO al darlos de baja
		$id_sesion = $_POST['id_sesion']; // para tener un id único en caso de que el usuario no se loguee y sea Invitado
		
		
		$var_time = strftime("%Y%m%d%H%M%S"); //se añade al nombre de los diferentes elementos como dato unico para que no se repitan
		
		$this->load->model('texto_model');
		//precio y coste de los textos 
		$txt_precio = 1;
		$txt_coste = 0.5;
		
		//Los textos son opcionales por lo que podrian venir vacios solo se hace insert si vienen datos
		if (!empty($txt_front_datos)){
			$this->texto_model->crear($id_usuario,$txt_front_datos,$txt_front_tamano_fuente,$txt_front_id_fuente,
					$txt_front_rotacion,$txt_front_texto_alto,$txt_front_texto_ancho,$txt_front_id_color,$txt_front_coordenada_x,
					$txt_front_coordenada_y,$txt_precio,$txt_coste,$fecha_alta,$fecha_baja,$motivo_baja,$disponible,$id_sesion);		
			
			//usando usuario o sesion recuperar el id que le ha otorgado al texto para pasarselo al diseño 
			$datosTextoF = $this->texto_model->getPorCampos($id_usuario,$id_sesion,$txt_front_datos);
			$id_texto_front = $datosTextoF->id;
			
			echo("TEXTO F: ".$id_texto_front);
		}
		

		if (!empty($txt_back_datos)){
			$this->texto_model->crear($id_usuario,$txt_back_datos,$txt_back_tamano_fuente,$txt_back_id_fuente,
				$txt_back_rotacion,$txt_back_texto_alto,$txt_back_texto_ancho,$txt_back_id_color,$txt_back_coordenada_x,
				$txt_back_coordenada_y,$txt_precio,$txt_coste,$fecha_alta,$fecha_baja,$motivo_baja,$disponible,$id_sesion);
		
			//usando usuario o sesion recuperar el id que le ha otorgado al texto para pasarselo al diseño
			$datosTextoB = $this->texto_model->getPorCampos($id_usuario,$id_sesion,$txt_back_datos);
			$id_texto_back = $datosTextoB->id;
		
			echo("TEXTO B: ".$id_texto_back);
		}
		
		
		$this->load->model('diseno_model');		
		//$img_front_tamano_ancho
		//$img_front_tamano_alto //guardo AnchoxAlto si hace falta separarlo coger estas variables y crear los campos
		
		
		//Los disenos son opcionales por lo que podrian venir vacios solo se hace insert si vienen datos
		if (!empty($txt_front_datos) || !empty($img_front_id)){
			$nombre_diseno = 'dis_f_'.$id_usuario.'_'.$var_time.'.png';
			$comentario_diseno ="";
			$ubicacion = "Delantera";
			
			$this->diseno_model->crear($id_usuario,$nombre_diseno,$comentario_diseno,$ubicacion,
					$img_front_id,$img_front_tamano,$img_front_rotacion,$img_front_coordenada_x,$img_front_coordenada_y,
					$img_front_profundidad_z,$id_texto_front,$fecha_alta,$fecha_baja,$motivo_baja,$disponible,$id_sesion);
	
			//usando nombre,ubicacion, usuario o sesion recuperar el id que le ha otorgado al texto para pasarselo al diseño
			$datosDisenoF = $this->diseno_model->getPorCampos($id_usuario,$id_sesion,$nombre_diseno,$ubicacion);
			$id_diseno_front = $datosDisenoF->id;
			
			echo("DISENO F: ".$id_diseno_front);
		}
		
		if (!empty($txt_back_datos) || !empty($img_back_id)){
			$nombre_diseno = 'dis_b_'.$id_usuario.'_'.$var_time.'.png';
			$comentario_diseno ="";
			$ubicacion = "Trasera";
			$this->diseno_model->crear($id_usuario,$nombre_diseno,$comentario_diseno,$ubicacion,
					$img_back_id,$img_back_tamano,$img_back_rotacion,$img_back_coordenada_x,$img_back_coordenada_y,
					$img_back_profundidad_z,$id_texto_back,$fecha_alta,$fecha_baja,$motivo_baja,$disponible,$id_sesion);
			
			//usando nombre,ubicacion, usuario o sesion recuperar el id que le ha otorgado al texto para pasarselo al diseño
			$datosDisenoB = $this->diseno_model->getPorCampos($id_usuario,$id_sesion,$nombre_diseno,$ubicacion);
			$id_diseno_back = $datosDisenoB->id;
			
			echo("DISENO B: ".$id_diseno_back);
		}
		
		
		//nombre del producto e imagen a guardar
		$nombre_producto = 'prod_'.$id_usuario.'_'.$var_time; 
		$imagen_producto = $nombre_producto.'.png';  //nombre de imagen al guardarse
		
		//++++++++++ para guardar imagen en servidor ++++++++++
		$canvas_final_binario = $_POST['canvas_final_binario'];
		
		if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/img/productos/')){
			mkdir($_SERVER['DOCUMENT_ROOT'].'/img/productos/');
		}
			
		$directorio = $_SERVER['DOCUMENT_ROOT'].'/img/productos/';
		
		// Filter out the headers (data:,) part.
		$filteredData=substr($canvas_final_binario, strpos($canvas_final_binario, ",")+1);
		// Need to decode before saving since the data we received is already base64 encoded
		$decodedData=base64_decode($filteredData);
		
		// store in server
		$fp = fopen($directorio.$imagen_producto, 'wb');
		$ok = fwrite( $fp, $decodedData);
		fclose( $fp );
		
		//+++++++++++++++++++++++++++++++++++++++++++++++++++
		
		$this->load->model('producto_model');
		$this->producto_model->crear($id_usuario,$id_articulo,$id_talla,$id_color_base,$id_diseno_front,$id_diseno_back,$nombre_producto,$imagen_producto,$fecha_alta,$fecha_baja,$motivo_baja,$disponible,$id_sesion);
		$datos['body']['nombre_producto'] = $nombre_producto;
		$this->load->view('producto/XcrearPost',$datos);

	}
		
	public function listar() {
		$this->listarPost();
	}
	
	public function listarPost() {
		$filtroNombreProducto = isset($_POST['filtroNombreProducto']) ? $_POST['filtroNombreProducto'] : '';
		$filtroUsuario = isset($_POST['filtroUsuario']) ? $_POST['filtroUsuario'] : '';
		$mensajeBanner = isset($_POST['mensajeBanner']) ? $_POST['mensajeBanner'] : '';
		
		$this->load->model('producto_model');
		$datos['body']['productos'] = $this->producto_model->getFiltrados($filtroUsuario,$filtroNombreProducto);
		$datos['body']['filtroNombreProducto'] = $filtroNombreProducto;
		$datos['body']['filtroUsuario'] = $filtroUsuario;
		$datos['body']['mensajeBanner'] = $mensajeBanner;
	
		enmarcar($this, 'producto/listar', $datos);
	}
	
	public function borrar() {
		$this->listarPost();
	}
	
	public function borrarPost() {
		$id_producto = $_POST['id_producto'];
	
		$this->load->model('producto_model');
		$this->producto_model->borrar($id_producto);
		//llamo a listarPost para que mantenga el mismo filtro y se vea la modificacion
		$this->listarPost();
	}
	
	public function modificar() {
		$this->listarPost();
	}
	
	public function modificarPost() {
		$id_producto = $_POST['id_producto'];
		$filtroNombreProducto = isset($_POST['filtroNombreProducto']) ? $_POST['filtroNombreProducto'] : '';
		$filtroUsuario = isset($_POST['filtroUsuario']) ? $_POST['filtroUsuario'] : '';
		$mensajeBanner = isset($_POST['mensajeBanner']) ? $_POST['mensajeBanner'] : '';
		
		$this->load->model('producto_model');
		$datos['body']['producto'] = $this->producto_model->getPorId($id_producto);
	
		$this->load->model('diseno_model');
		$this->load->model('articulo_model');
		$datos ['body'] ['disenos'] = $this->diseno_model->getTodos();
		$datos ['body'] ['articulos'] = $this->articulo_model->listar();
		
		//los siguientes datos solo van para mantener el filtro y mostrar despues el resultado
		$datos['body']['filtroNombreProducto'] = $filtroNombreProducto;
		$datos['body']['filtroUsuario'] = $filtroUsuario;
		$datos['body']['mensajeBanner'] = $mensajeBanner;
		
		enmarcar($this, 'producto/modificar', $datos);
	}
	
	public function modificarPost2() {
		$id_producto = $_POST['id_producto'];
		
		/* habilitar para modificar todos los campos
		$id_articulo = $_POST['id_articulo'];
		$id_talla = $_POST['id_talla'];
		$id_color_base = $_POST['id_color_base'];
		//$id_color_secundario = $_POST['id_color_secundario'];  //era para camisetas de rayas
		$id_diseno_front = $_POST['id_diseno_front'];
		$id_diseno_back = $_POST['id_diseno_back'];
		$nombre_producto = $_POST['nombre_producto'];
		$imagen_producto = $_POST['imagen_producto'];
		//$precio = $_POST['precio']; 
		//$coste = $_POST['coste']; 	
		
		$this->load->model('producto_model');
		$this->producto_model->modificar($id_producto,$id_articulo,$id_talla,$id_color_base,$id_diseno_front,$id_diseno_back,$nombre_producto,$imagen_producto);
		*/
		
		//version reducida
		$nombre_producto = $_POST['nombre_producto'];
		$this->load->model('producto_model');
		$this->producto_model->modificar($id_producto,$nombre_producto);
		
		//llamo a listarPost para que mantenga el mismo filtro y se vea que ha modificado el usuario
		$this->listarPost();
	}
	
	
	/*
	  Apaño para que funcione bien con ajax seguramente haya formas mejores de hacerlo
	  cada parte a mostrar deberia estar en su correspondiente model y no en el de producto
	  ya veré cuando todo este mas controlado como colocarlo mejor
	*/
	public function mostrarElementosArticulo(){ //AJAX
		//Dependiendo del Articulo seleccionado se mostrarán tallas y colores concretos
		$id_articulo = $_POST['id_articulo'];
		$this->load->model('producto_model');
		
		$datos ['body'] ['tallas'] = $this->producto_model->mostrarTallas($id_articulo);
		$datos ['body'] ['colores'] = $this->producto_model->mostrarColores($id_articulo);
		$datos ['body'] ['articulo'] = $this->producto_model->getArticulo($id_articulo);
		
		$this->load->view('producto/XcrearElementosArticulo',$datos);
	}
	
	public function mostrarFondoArticulo(){ //AJAX
		//Dependiendo del Articulo seleccionado se mostrará el fondo concreto
		$id_articulo = $_POST['id_articulo'];
		$id_color_base = $_POST['id_color_base'];
		$this->load->model('producto_model');
		
		$datos ['body'] ['articulo'] = $this->producto_model->getArticulo($id_articulo);
		$datos ['body'] ['color'] = $id_color_base;
		
		$this->load->view('producto/XfondoArticulo',$datos);
	}
	
	public function mostrarListaImagenes(){ //AJAX
		//Dependiendo de la Categoria seleccionada se mostrará lista de imagenes
		$id_categoria = $_POST['id_categoria'];
		$this->load->model('producto_model');
	
		$datos ['body'] ['imagenes'] = $this->producto_model->getImagenesCategoria($id_categoria);
	
		$this->load->view('producto/XcrearListaImagenes',$datos);
	}
}
?>