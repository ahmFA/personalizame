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
	public function crear($modal = FALSE){
		//estos valores pueden llegar desde diferentes paginas siendo necesario que aparezcan  
		//ya seleccionados al cargar la vista de la pagina crear producto
		$articuloInicial = isset($_REQUEST['articulo']) ? $_REQUEST['articulo'] : 'Camiseta';
		$categoriaInicial = isset($_REQUEST['categoria']) ? $_REQUEST['categoria'] : 'Animales';
		
		$mensaje = '';
		if($modal){
			$mensaje .= '<span class="alert-success">Producto guardado correctamente</span><br/>';
		}
		$datos ['body']['modal'] = $modal;
		$datos ['body']['mensajeModal'] = $mensaje;
		
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
		$datos ['body'] ['articuloInicial'] = $articuloInicial;
		$datos ['body'] ['categoriaInicial'] = $categoriaInicial;
		
		enmarcar2($this,'producto/crear',$datos);
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
		
		$var_time = strftime("%Y%m%d%H%M%S"); //cadena añadida a los diferentes ficheros para diferenciarlos 
		
		
		/*
		 * ***********************************************************
		 * 		CONTROLAR SI VIENEN TEXTOS Y GESTIONARLOS
		 * ***********************************************************
		 */
		$this->load->model('texto_model');
		//precio y coste de los textos en caso de tener que añadirlos
		$txt_precio = 1;
		$txt_coste = 0.5;
		
		//Los textos son opcionales por lo que podrian venir vacios solo se hace insert si vienen con datos
		if (!empty($txt_front_datos)){
			$this->texto_model->crear($id_usuario,$txt_front_datos,$txt_front_tamano_fuente,$txt_front_id_fuente,
					$txt_front_rotacion,$txt_front_texto_alto,$txt_front_texto_ancho,$txt_front_id_color,$txt_front_coordenada_x,
					$txt_front_coordenada_y,$txt_precio,$txt_coste,$fecha_alta,$fecha_baja,$motivo_baja,$disponible,$id_sesion);		
			
			//usando usuario o sesion recuperar el id que le ha otorgado al texto para pasarselo al diseño 
			$datosTextoF = $this->texto_model->getPorCampos($id_usuario,$id_sesion,$txt_front_datos);
			$id_texto_front = $datosTextoF->id;
			
		}else{
			$id_texto_front = 0;
		}
		//echo("TEXTO F: ".$id_texto_front);

		if (!empty($txt_back_datos)){
			$this->texto_model->crear($id_usuario,$txt_back_datos,$txt_back_tamano_fuente,$txt_back_id_fuente,
				$txt_back_rotacion,$txt_back_texto_alto,$txt_back_texto_ancho,$txt_back_id_color,$txt_back_coordenada_x,
				$txt_back_coordenada_y,$txt_precio,$txt_coste,$fecha_alta,$fecha_baja,$motivo_baja,$disponible,$id_sesion);
		
			//usando usuario o sesion recuperar el id que le ha otorgado al texto para pasarselo al diseño
			$datosTextoB = $this->texto_model->getPorCampos($id_usuario,$id_sesion,$txt_back_datos);
			$id_texto_back = $datosTextoB->id;
				
		}else{
			$id_texto_back = 0;
		}
		//echo("TEXTO B: ".$id_texto_back);
		
		// ****************** Fin Control Textos ********************
		
		/*
		 * ***********************************************************
		 * 		CONTROLAR SI VIENEN IMAGENES Y GESTIONARLAS
		 * ***********************************************************
		 */
		
		//si la imagen es de las nuestras llegará aqui con un ID asignado , si llega con un numero menor a cero es que es del usuario y debemos guardarla
		$img_precio = 5; //precio y coste de las imagenes
		$img_coste = 2;
		$img_comentario = "";
		$img_descuento = 0;
		
		$this->load->model('imagen_model');
		$this->load->model('categoria_model');
		
		//echo("ID IMG USER F in: ".$img_front_id);
		if($img_front_id < 0){
	
				/*
		 	 	 * *********************************************************************************
				 * 	CONTROLAR Y GESTIONARLAS CATEGORIA MIS IMAGENES PARA LAS AGREGADAS POR USUARIO
				 * *********************************************************************************
				 */
				
				//comprobar si exite la categoria Mis Imágenes
				//si no existe la creo y recupero su id para la inserción posterior de imagenes
				$misImagenes = $this->categoria_model->getPorNombre("Mis Imágenes");
				if($misImagenes != null){
					$id_categorias[] = $misImagenes->id;
					//echo("Mis imagenes SI existia");
				}
				else{
					$this->categoria_model->crearCategoria("Mis Imágenes");
					$misImagenes = $this->categoria_model->getPorNombre("Mis Imágenes");
					$id_categorias[] = $misImagenes->id;
					//echo("Mis imagenes NO existia");
				}
				
				// ****************** Fin Control Categoria ********************
			
			$img_nombre = 'img_'.$id_usuario.'_'.$var_time.'_'.rand(1000,9999);
			$img_fichero = $img_nombre.'.png';
			
			//echo("Image F User: "." guardarla y recuperar su id para el diseño");
			$this->imagen_model->crearImagen($id_usuario,$img_nombre, $img_fichero, $img_comentario, $img_descuento, $img_precio, $img_coste, $fecha_alta, $fecha_baja, $motivo_baja, 1, $id_categorias);
			$datosImagenF = $this->imagen_model->getPorCampos($id_usuario,$img_fichero);
			$img_front_id = $datosImagenF->id;
			
			//++++++++++ para guardar imagen del usuario en servidor ++++++++++
			$img_front_datos_binarios = $_POST['img_front_datos_binarios'];
			
			if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/img/imagenes/')){
				mkdir($_SERVER['DOCUMENT_ROOT'].'/img/imagenes/');
			}
				
			$directorio = $_SERVER['DOCUMENT_ROOT'].'/img/imagenes/';
			
			// Filter out the headers (data:,) part.
			$filteredData=substr($img_front_datos_binarios, strpos($img_front_datos_binarios, ",")+1);
			// Need to decode before saving since the data we received is already base64 encoded
			$decodedData=base64_decode($filteredData);
			
			// store in server
			$fp = fopen($directorio.$img_fichero, 'wb');
			$ok = fwrite( $fp, $decodedData);
			fclose( $fp );
			
			//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		}
		//echo("ID IMG USER F out: ".$img_front_id);
		
		
		//echo("ID IMG USER B in: ".$img_back_id);
		if($img_back_id < 0){
				// ****************** Control Categoria ********************
				
				//si no existe la creo y recupero su id para la inserción posterior de imagenes
				$misImagenes = $this->categoria_model->getPorNombre("Mis Imágenes");
				if($misImagenes != null){
					$id_categorias[] = $misImagenes->id;
					//echo("Mis imagenes SI existia");
				}
				else{
					$this->categoria_model->crearCategoria("Mis Imágenes");
					$misImagenes = $this->categoria_model->getPorNombre("Mis Imágenes");
					$id_categorias[] = $misImagenes->id;
					//echo("Mis imagenes NO existia");
				}
				// ****************** Fin Control Categoria ********************
				
			$img_nombre = 'img_'.$id_usuario.'_'.$var_time.'_'.rand(1000,9999);
			$img_fichero = $img_nombre.'.png';
			
			//echo("Image B User: "." guardarla y recuperar su id para el diseño");
			$this->imagen_model->crearImagen($id_usuario,$img_nombre, $img_fichero, $img_comentario, $img_descuento, $img_precio, $img_coste, $fecha_alta, $fecha_baja, $motivo_baja, 1, $id_categorias);
			$datosImagenB = $this->imagen_model->getPorCampos($id_usuario,$img_fichero);
			$img_back_id = $datosImagenB->id;
			
			//++++++++++ para guardar imagen del usuario en servidor ++++++++++
			$img_back_datos_binarios = $_POST['img_back_datos_binarios'];
				
			if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/img/imagenes/')){
				mkdir($_SERVER['DOCUMENT_ROOT'].'/img/imagenes/');
			}
			
			$directorio = $_SERVER['DOCUMENT_ROOT'].'/img/imagenes/';
				
			// Filter out the headers (data:,) part.
			$filteredData=substr($img_back_datos_binarios, strpos($img_back_datos_binarios, ",")+1);
			// Need to decode before saving since the data we received is already base64 encoded
			$decodedData=base64_decode($filteredData);
				
			// store in server
			$fp = fopen($directorio.$img_fichero, 'wb');
			$ok = fwrite( $fp, $decodedData);
			fclose( $fp );
				
			//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		}
		//echo("ID IMG USER B out: ".$img_back_id);
		
		// ****************** Fin Control Imagenes ********************
		
		
		/*
		 * ***********************************************************
		 * 		CONTROLAR SI VIENEN DISEÑOS Y GESTIONARLOS
		 * ***********************************************************
		 */
		
		$this->load->model('diseno_model');				
		//Los disenos son opcionales por lo que podrian venir vacios 
		//solo se hace insert si vienen datos de textos y/o imagenes
		if (!empty($txt_front_datos) || !empty($img_front_id)){
			$nombre_diseno = 'dis_f_'.$id_usuario.'_'.$var_time.'.png';
			$comentario_diseno ="";
			$ubicacion = "Delantera";
			
			$this->diseno_model->crear($id_usuario,$nombre_diseno,$comentario_diseno,$ubicacion,
					$img_front_id,$img_front_tamano,$img_front_tamano_ancho,$img_front_tamano_alto,$img_front_rotacion,$img_front_coordenada_x,$img_front_coordenada_y,
					$img_front_profundidad_z,$id_texto_front,$fecha_alta,$fecha_baja,$motivo_baja,$disponible,$id_sesion);
	
			//usando nombre,ubicacion, usuario o sesion recuperar el id que le ha otorgado al diseño para pasarselo al producto
			$datosDisenoF = $this->diseno_model->getPorCampos($id_usuario,$id_sesion,$nombre_diseno,$ubicacion);
			$id_diseno_front = $datosDisenoF->id;
			
		}else{
			$id_diseno_front = 0;
		}
		//echo("DISENO F: ".$id_diseno_front);
		
		if (!empty($txt_back_datos) || !empty($img_back_id)){
			$nombre_diseno = 'dis_b_'.$id_usuario.'_'.$var_time.'.png';
			$comentario_diseno ="";
			$ubicacion = "Trasera";
			$this->diseno_model->crear($id_usuario,$nombre_diseno,$comentario_diseno,$ubicacion,
					$img_back_id,$img_back_tamano,$img_back_tamano_ancho,$img_back_tamano_alto,$img_back_rotacion,$img_back_coordenada_x,$img_back_coordenada_y,
					$img_back_profundidad_z,$id_texto_back,$fecha_alta,$fecha_baja,$motivo_baja,$disponible,$id_sesion);
			
			//usando nombre,ubicacion, usuario o sesion recuperar el id que le ha otorgado al diseño para pasarselo al producto
			$datosDisenoB = $this->diseno_model->getPorCampos($id_usuario,$id_sesion,$nombre_diseno,$ubicacion);
			$id_diseno_back = $datosDisenoB->id;
			
		}else{
			$id_diseno_back = 0;
		}

		//echo("DISENO B: ".$id_diseno_back);		
		
		// ****************** Fin Control Diseños ********************
		
		/*
		 * ***********************************************************
		 * 		CREACION DEL PRODUCTO ( IMAGEN Y DATOS )
		 * ***********************************************************
		 */
		
		//nombre del producto e imagen a guardar
		$nombre_producto = 'prod_'.$id_usuario.'_'.$var_time; 
		$imagen_producto = $nombre_producto.'.png';  //nombre de imagen al guardarse
		
		//++++++++++ para guardar imagen de producto en servidor ++++++++++
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
		
		//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		
		$this->load->model('producto_model');
		$this->producto_model->crear($id_usuario,$id_articulo,$id_talla,$id_color_base,$id_diseno_front,$id_diseno_back,$nombre_producto,$imagen_producto,$fecha_alta,$fecha_baja,$motivo_baja,$disponible,$id_sesion);
		$datos['body']['nombre_producto'] = $nombre_producto;
		//$this->load->view('producto/XcrearPost',$datos);
		$modal = true;
		$this->crear($modal);
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
		$this->producto_model->borrar($id_producto,$_SESSION['perfil']);
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
	
	public function mostrarElementosArticulo(){ //AJAX
		//Dependiendo del Articulo seleccionado se mostrarán tallas y colores concretos
		$id_articulo = $_POST['id_articulo'];
		$this->load->model('articulo_model');
		
		$datos ['body'] ['tallas'] = $this->articulo_model->mostrarTallas($id_articulo);
		$datos ['body'] ['colores'] = $this->articulo_model->mostrarColores($id_articulo);
		$datos ['body'] ['articulo'] = $this->articulo_model->getArticuloById($id_articulo);
		
		$this->load->view('producto/XcrearElementosArticulo',$datos);
	}
/*	
  	//ahora saco estos datos de otra conexion ajax la dejo comentada por si acaso falla algo 
	public function mostrarFondoArticulo(){ //AJAX
		//Dependiendo del Articulo seleccionado se mostrará el fondo concreto
		$id_articulo = $_POST['id_articulo'];
		$id_color_base = $_POST['id_color_base'];
		$this->load->model('articulo_model');
		
		$datos ['body'] ['articulo'] = $this->articulo_model->getArticuloById($id_articulo);
		$datos ['body'] ['color'] = $id_color_base;
		
		$this->load->view('producto/XfondoArticulo',$datos);
	}
*/	
	public function mostrarListaImagenes(){ //AJAX
		//Dependiendo de la Categoria seleccionada se mostrará lista de imagenes
		$id_categoria = $_POST['id_categoria'];
		$id_usuario = $_POST['id_usuario'];

		$this->load->model('imagen_model');
		$this->load->model('categoria_model');
		
		//compruebo que categoria me piden
		$categoria_seleccionada = $this->categoria_model->getCategoriaById($id_categoria);
		
		if($categoria_seleccionada->nombre != "Mis Imágenes"){
			//seleccionas todos los que hay en esa categoria
			$datos ['body'] ['imagenes'] = $this->imagen_model->getImagenesCategoria($id_categoria);
			$datos ['body'] ['tipo'] = "imagenes_comunes";
		}else{
			//seleccionas solo los que tienen tu id_usuario
			$datos ['body'] ['imagenes'] = $this->imagen_model->getImagenesUsuario($id_usuario);
			$datos ['body'] ['tipo'] = "imagenes_propias";
		}

		$this->load->view('producto/XcrearListaImagenes',$datos);
	}
}
?>