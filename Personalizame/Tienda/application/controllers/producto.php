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
		/*
		$this->load->model('diseno_model');
		$this->load->model('articulo_model');
		$datos ['body'] ['disenos'] = $this->diseno_model->getTodos();
		$datos ['body'] ['articulos'] = $this->articulo_model->listar();
		enmarcar($this,'producto/crear',$datos);
		*/
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
		//$id_color_secundario = $_POST['id_color_secundario']; //era para camisetas de rayas
		$id_diseno_front = $_POST['id_diseno_front'];
		$id_diseno_back = $_POST['id_diseno_back'];
		$nombre_producto = $_POST['nombre_producto'];
		$imagen_producto = $_POST['imagen_producto'];  //imagen del producto ya terminado  
		//$precio = $_POST['precio']; //suma precio de diseños
		//$coste = $_POST['coste']; //suma costes de diseños 
		$fecha_alta = strftime("%Y/%m/%d");  //fecha actual en Formato(YYYY/MM/DD)
		$fecha_baja = ""; // será vacio al darse de alta
		$motivo_baja = ""; // será vacio al darse de alta
		$disponible = "Si"; // los diseños al crearse estarán disponibles, pasa a NO al darlos de baja
		$id_sesion = $_POST['id_sesion']; // para tener un id único en caso de que el usuario no se loguee y sea Invitado
		
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