<?php

class Imagen extends CI_Controller{

	public function crear(){
		$this->load->model('categoria_model');
		$datos['categorias'] = $this->categoria_model->listar();
		enmarcar($this, 'imagen/crear', $datos);
	}

	public function crearPost(){
		$id_user = $_POST['id_usuario'];
		$nombre = $_POST['nombre'];
		$nomImagen = $_FILES['imagen']['name'];
		$tamanoImagen = $_FILES['imagen']['size'];
		$tipoImagen = $_FILES['imagen']['type'];
		$comentario = $_POST['comentario'];
		$descuento = $_POST['descuento'];
		$precio = 5;
		$coste = 2;
		$fecha_alta = strftime("%Y/%m/%d");
		$fecha_baja = "";
		$motivo_baja = "";
		$disponible = $_POST['disponible'];
		$categorias = $_POST['id_categorias'];
		
		$this->load->model('imagen_model');
		$imagenAceptada = $this->imagen_model->validarImagen($nomImagen, $tamanoImagen,$tipoImagen);
		//if($imagenAceptada){
		
			if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/img/imagenes/')){
				mkdir($_SERVER['DOCUMENT_ROOT'].'/img/imagenes/');
			}
			
			$directorio = $_SERVER['DOCUMENT_ROOT'].'/img/imagenes/';
			move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$nomImagen);
	
			$this->load->model('imagen_model');
			$status = null;
			$status = $this->imagen_model->crearImagen($id_user,$nombre, $nomImagen, $comentario, $descuento, $precio, $coste, $fecha_alta, $fecha_baja, $motivo_baja, $disponible, $categorias);
			/*
			 * Si no se ha metido en la base de datos (ya sea porque ya existe o por causa ajena)
			 * se informa del error al administrador.
			 */
			if($status){
				//$this->listar();
				$datos['onload']['alert'] = 'mostrarAlert()';
				enmarcar($this,'imagen/crear', $datos);
			}else{
				$datos['onload']['alert'] = 'mostrarAlert()';
				enmarcar($this,'imagen/crear', $datos);
			}
			
		//}
	}

	public function listar(){
		$filtroNombre = isset($_REQUEST['filtroNombre']) ? $_REQUEST['filtroNombre'] : '';
		$filtroImagen = isset($_REQUEST['filtroImagen']) ? $_REQUEST['filtroImagen'] : '';
		$mensajeBanner = isset($_POST['mensajeBanner']) ? $_POST['mensajeBanner'] : '';
		
		$this->load->model('imagen_model');
		$imagenes = $this->imagen_model->getFiltrados($filtroNombre, $filtroImagen);
		$datos['body']['filtroNombre'] = $filtroNombre;
		$datos['body']['filtroImagen'] = $filtroImagen;
		$datos['body']['mensajeBanner'] = $mensajeBanner;
		
		
		$tamanio_pagina = 5;
		$pagina = isset($_REQUEST['pagina'])? $_REQUEST['pagina']: 1;
		$num_imagenes = count($imagenes);
		$total_paginas = ceil($num_imagenes/$tamanio_pagina);
		$inicio = ($pagina-1)*$tamanio_pagina;
		$botones = '';
		
		for($i = 1; $i<= $total_paginas; $i++){
			if($i == $pagina){
				$botones .= '<li class="active" aria-disabled="false" aria-selected="false"><a
						data-page="'.$i.'" class="button">'.$i.'</a></li>';
			}else{
				$botones .= '<li aria-disabled="false" aria-selected="false"><a
						data-page="'.$i.'" class="button" href="?pagina='.$i.'">'.$i.'</a></li>';
			}
		
		}
		
		$datos['previo'] = ($pagina == 1)? 'disabled': '';
		$datos['next'] = ($pagina == $total_paginas)? 'disabled': '';
		
		$datos['botones'] = $botones;
		$datos['paginaAnt'] = $pagina-1;
		$datos['paginaSig'] = $pagina+1;
		
		$datos['imagenes'] = $this->imagen_model->getFiltradosConLimite($filtroNombre, $filtroImagen,$inicio);
		enmarcar($this, 'imagen/listar', $datos);
	}

	public function borrar(){
		$tamanio_pagina = 5;
		$pagina = isset($_REQUEST['pagina'])? $_REQUEST['pagina']: 1;
		$this->load->model('imagen_model');
		$imagenes = $this->imagen_model->listar();
		$num_imagenes = count($imagenes);
		$total_paginas = ceil($num_imagenes/$tamanio_pagina);
		$inicio = ($pagina-1)*$tamanio_pagina;
		$botones = '';
		
		for($i = 1; $i<= $total_paginas; $i++){
			if($i == $pagina){
				$botones .= '<li class="active" aria-disabled="false" aria-selected="false"><a
						data-page="'.$i.'" class="button">'.$i.'</a></li>';
			}else{
				$botones .= '<li aria-disabled="false" aria-selected="false"><a
						data-page="'.$i.'" class="button" href="?pagina='.$i.'">'.$i.'</a></li>';
			}
		
		}
		
		$datos['previo'] = ($pagina == 1)? 'disabled': '';
		$datos['next'] = ($pagina == $total_paginas)? 'disabled': '';
		
		$datos['botones'] = $botones;
		$datos['paginaAnt'] = $pagina-1;
		$datos['paginaSig'] = $pagina+1;
		
		$datos['imagenes'] = $this->imagen_model->listarConLimite($inicio, $tamanio_pagina);
		
		enmarcar($this, 'imagen/borrar', $datos);
	}

	public function borrarPost(){
		$this->load->model('imagen_model');
		$idImagenes = $_POST['idImagenes'];
		foreach ($idImagenes as $idimagen){
			$imagen = $this->imagen_model->getImagenById($idimagen);
			$fichero = $_SERVER['DOCUMENT_ROOT'].'/img/imagenes/'.$imagen['nombre'];
			/*
			 * No me da permisos para borrar la carpeta.
			 * Lo he intentado de diversas formas pero no nada.
			 * Tengo que preguntar a Alberto.
			 */
			if(file_exists($fichero)){
				chmod($_SERVER['DOCUMENT_ROOT'].'/img/imagenes/', 777);
				unlink($fichero);
			}
			$this->imagen_model->borrar($idimagen);
		}
		/*
		 * Aquí se borraría la antigua imagen.
		 */
		//$directorio = $_SERVER['DOCUMENT_ROOT'].'/img/imagenes/';
		//chmod($directorio.$nomImagen, 666);
		//unlink($fichero);

		enmarcar($this, 'imagen/borrarPost');
	}

	public function editar(){
		$datos['body']['filtroNombre'] = isset($_POST['filtroNombre']) ? $_POST['filtroNombre'] : '';
		$datos['body']['filtroImagen'] = isset($_POST['filtroImagen']) ? $_POST['filtroImagen'] : '';
		$datos['body']['mensajeBanner'] = isset($_POST['mensajeBanner']) ? $_POST['mensajeBanner'] : '';
		$idimagen = $_REQUEST['idImagen'];
		$this->load->model('imagen_model');
		$this->load->model('categoria_model');
		$datos['categorias'] = $this->categoria_model->listar();
		$datos['imagen'] = $this->imagen_model->getimagenById($idimagen);
		enmarcar($this, 'imagen/editar', $datos);
	}

	public function editarPost(){
		$id = $_POST['id_imagen'];
		$this->load->model('imagen_model');
		$img = $this->imagen_model->getImagenById($id);
		$nomImagen = !empty($_FILES['nueva']['name']) ? $_FILES['nueva']['name']:$img['nombreImagen'];
		$tamanoImagen = !empty($_FILES['nueva']['size']) ? $_FILES['nueva']['size']: null;
		$tipoImagen = !empty($_FILES['nueva']['type']) ? $_FILES['nueva']['type']: null;
		$nombre = $_POST['nombre'];
		$comentario = $_POST['comentario'];
		$descuento = $_POST['descuento'];
		$precio = $_POST['precio'];
		$coste = $_POST['coste'];
		$disponible = $_POST['disponible'];
		$idCategorias = $_POST['id_categorias'];
		
		$imagenValida = true;
		//if($tamanoImagen != null && $tipoImagen != null){
			$imagenValida = $this->imagen_model->validarImagen($nomImagen, $tamanoImagen, $tipoImagen);
		//}
		
		//if($imagenValida){
			$this->imagen_model->editar($id, $nombre, $nomImagen, $comentario, $descuento,$precio,$coste, $disponible, $idCategorias);
			
			if(!empty($_FILES['nueva']['name'])){
				$directorio = $_SERVER['DOCUMENT_ROOT'].'/img/imagenes/';
				move_uploaded_file($_FILES['nueva']['tmp_name'],$directorio.$nomImagen);
				/*
				 * Aquí se borraría la antigua imagen.
				 */
				//chmod($directorio.$nomImagen, 666);
				//unlink($fichero);
			}
			
				
		//}
		
			enmarcar($this, 'imagen/borrarPost');
	}
}

?>