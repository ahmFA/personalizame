<?php

class Pedido extends CI_Controller{
	
	public function listar(){
		$this->load->model('pedido_model');
		//$this->pedido_model->crear(39,'C/Murillo', 15);
		
		$filtroNick = isset($_REQUEST['filtroNick']) ? $_REQUEST['filtroNick'] : '';
		$filtroEstado = isset($_REQUEST['filtroEstado']) ? $_REQUEST['filtroEstado'] : '';
		$mensajeBanner = isset($_POST['mensajeBanner']) ? $_POST['mensajeBanner'] : '';
		
		
		$pedidos = $this->pedido_model->getFiltrados($filtroNick, $filtroEstado);
		$datos['body']['filtroNick'] = $filtroNick;
		$datos['body']['filtroEstado'] = $filtroEstado;
		$datos['body']['mensajeBanner'] = $mensajeBanner;
		
		$tamanio_pagina = 5;
		$pagina = isset($_REQUEST['pagina'])? $_REQUEST['pagina']: 1;
		$num_pedidos = count($pedidos);
		$total_paginas = ceil($num_pedidos/$tamanio_pagina);
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
		$datos['next'] = ($pagina == $total_paginas) || ($num_pedidos == 0)? 'disabled': '';
		
		$datos['botones'] = $botones;
		$datos['paginaAnt'] = $pagina-1;
		$datos['paginaSig'] = $pagina+1;
		
		$datos['pedidos'] = $this->pedido_model->getfiltradosConLimite($filtroNick,$filtroEstado,$inicio);
		
		enmarcar($this, 'pedidos/listar', $datos);
	}
	

	public function editar(){
		$datos['body']['mensajeBanner'] = isset($_POST['mensajeBanner']) ? $_POST['mensajeBanner'] : '';
		$idPedido = $_REQUEST['idPedido'];
		$this->load->model('pedido_model');
		$datos['pedido'] = $this->pedido_model->getPedidoById($idPedido);
		enmarcar($this, 'pedidos/editar', $datos);
	}
	
	public function editarPost(){
		$id = $_POST['id_pedido'];
		$datos['body']['id'] = $_POST['id_pedido'];
		$this->load->model('pedido_model');
		$this->pedido_model->editar($id,$_POST['direccion'], $_POST['estado']);
			
		$this->load->view('pedidos/XmodificarPost',$datos);
	}
	
	
}

?>