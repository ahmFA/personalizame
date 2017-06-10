<?php
session_start();
/* class Diseno
 * @author Luis
 * @packcage application\controllers
 */
class Diseno extends CI_Controller{
	/*
	 * muestra el formulario de crear diseño
	 */
	public function crear(){
		$this->load->model('texto_model');
		$this->load->model('imagen_model');
		$datos ['body'] ['textos'] = $this->texto_model->getTodos();
		$datos ['body'] ['imagenes'] = $this->imagen_model->listar();
		enmarcar($this,'diseno/crear',$datos);
	}
	
	/*
	 * recoge datos del formulario y los pasa al modelo
	 */
	public function crearPost() { //AJAX
		$id_usuario = $_POST['id_usuario'];
		$nombre_diseno = $_POST['nombre_diseno'];
		$comentario_diseno = $_POST['comentario_diseno'];
		$ubicacion = $_POST['ubicacion'];
		$id_imagen = $_POST['id_imagen'];
		$tamano_imagen = $_POST['tamano_imagen'];
		$tamano_imagen_ancho = $_POST['tamano_imagen_ancho'];
		$tamano_imagen_alto = $_POST['tamano_imagen_alto'];
		$rotacion_imagen = $_POST['rotacion_imagen'];
		$img_coordenada_x = $_POST['img_coordenada_x'];
		$img_coordenada_y = $_POST['img_coordenada_y'];
		$img_profundidad_z = $_POST['img_profundidad_z'];
		$id_texto = $_POST['id_texto'];
		//$precio = $_POST['precio']; //precio de imagen + texto
		//$coste = $_POST['coste']; //coste de imagen + texto 
		$fecha_alta = strftime("%Y/%m/%d");  //fecha actual en Formato(YYYY/MM/DD)
		$fecha_baja = ""; // será vacio al darse de alta
		$motivo_baja = ""; // será vacio al darse de alta
		$disponible = "Si"; // los diseños al crearse estarán disponibles, pasa a NO al darlos de baja
		$id_sesion = $_POST['id_sesion']; // para tener un id único en caso de que el usuario no se loguee y sea Invitado
		
		//++++++++++ para guardar imagen en servidor ++++++++++
		$canvas_binario = $_POST['canvas_binario'];
		
		if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/img/disenos/')){
			mkdir($_SERVER['DOCUMENT_ROOT'].'/img/disenos/');
		}
			
		$directorio = $_SERVER['DOCUMENT_ROOT'].'/img/disenos/';
		//move_uploaded_file($_FILES['diseno']['tmp_name'],$directorio.$nombre_diseno);
		
		// Filter out the headers (data:,) part.
		$filteredData=substr($canvas_binario, strpos($canvas_binario, ",")+1);
		// Need to decode before saving since the data we received is already base64 encoded
		$decodedData=base64_decode($filteredData);
		
		// store in server
		$fic_name = $id_usuario.'diseno'.rand(1000,9999).'.png';
		$fp = fopen($directorio.$fic_name, 'wb');
		$ok = fwrite( $fp, $decodedData);
		fclose( $fp );
		
		//+++++++++++++++++++++++++++++++++++++++++++++++++++
		
		$this->load->model('diseno_model');
		$this->diseno_model->crear($id_usuario,$nombre_diseno,$comentario_diseno,$ubicacion,$id_imagen,$tamano_imagen,$tamano_imagen_ancho,$tamano_imagen_alto,$rotacion_imagen,$img_coordenada_x,$img_coordenada_y,$img_profundidad_z,$id_texto,$fecha_alta,$fecha_baja,$motivo_baja,$disponible,$id_sesion);
		$datos['body']['nombre_diseno'] = $nombre_diseno;
		$this->load->view('diseno/XcrearPost',$datos);

	}
		
	public function listar() {
		$this->listarPost();
	}
	
	public function listarPost() {
		$filtroNombreDiseno = isset($_POST['filtroNombreDiseno']) ? $_POST['filtroNombreDiseno'] : '';
		$filtroUsuario = isset($_POST['filtroUsuario']) ? $_POST['filtroUsuario'] : '';
		$mensajeBanner = isset($_POST['mensajeBanner']) ? $_POST['mensajeBanner'] : '';
		
		$this->load->model('diseno_model');
		$datos['body']['disenos'] = $this->diseno_model->getFiltrados($filtroUsuario,$filtroNombreDiseno);
		$datos['body']['filtroNombreDiseno'] = $filtroNombreDiseno;
		$datos['body']['filtroUsuario'] = $filtroUsuario;
		$datos['body']['mensajeBanner'] = $mensajeBanner;
	
		enmarcar($this, 'diseno/listar', $datos);
	}
	
	public function borrar() {
		$this->listarPost();
	}
	
	public function borrarPost() {
		$id_diseno = $_POST['id_diseno'];
	
		$this->load->model('diseno_model');
		$this->diseno_model->borrar($id_diseno);
		//llamo a listarPost para que mantenga el mismo filtro y se vea la modificacion
		$this->listarPost();
	}
	
	public function modificar() {
		$this->listarPost();
	}
	
	public function modificarPost() {
		$id_diseno = $_POST['id_diseno'];
		$filtroNombreDiseno = isset($_POST['filtroNombreDiseno']) ? $_POST['filtroNombreDiseno'] : '';
		$filtroUsuario = isset($_POST['filtroUsuario']) ? $_POST['filtroUsuario'] : '';
		$mensajeBanner = isset($_POST['mensajeBanner']) ? $_POST['mensajeBanner'] : '';
		
		$this->load->model('diseno_model');
		$datos['body']['diseno'] = $this->diseno_model->getPorId($id_diseno);
	
		$this->load->model('texto_model');
		$this->load->model('imagen_model');
		$datos ['body'] ['textos'] = $this->texto_model->getTodos();
		$datos ['body'] ['imagenes'] = $this->imagen_model->listar();
		
		//los siguientes datos solo van para mantener el filtro y mostrar despues el resultado
		$datos['body']['filtroNombreDiseno'] = $filtroNombreDiseno;
		$datos['body']['filtroUsuario'] = $filtroUsuario;
		$datos['body']['mensajeBanner'] = $mensajeBanner;
		
		enmarcar($this, 'diseno/modificar', $datos);
	}
	
	public function modificarPost2() {
		$id_diseno = $_POST['id_diseno'];
		
		$nombre_diseno = $_POST['nombre_diseno'];
		$comentario_diseno = $_POST['comentario_diseno'];
		$ubicacion = $_POST['ubicacion'];
		$id_imagen = $_POST['id_imagen'];
		$tamano_imagen = $_POST['tamano_imagen'];
		$rotacion_imagen = $_POST['rotacion_imagen'];
		$img_coordenada_x = $_POST['img_coordenada_x'];
		$img_coordenada_y = $_POST['img_coordenada_y'];
		$img_profundidad_z = $_POST['img_profundidad_z'];
		$id_texto = $_POST['id_texto'];
		//$precio = $_POST['precio']; //precio de imagen + texto
		//$coste = $_POST['coste']; //coste de imagen + texto		
		
		$this->load->model('diseno_model');
		$this->diseno_model->modificar($id_diseno,$nombre_diseno,$comentario_diseno,$ubicacion,$id_imagen,$tamano_imagen,$rotacion_imagen,$img_coordenada_x,$img_coordenada_y,$img_profundidad_z,$id_texto,$precio,$coste);
		//llamo a listarPost para que mantenga el mismo filtro y se vea que ha modificado el usuario
		$this->listarPost();
	}
}
?>