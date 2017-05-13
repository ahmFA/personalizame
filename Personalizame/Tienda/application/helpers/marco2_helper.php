<?php
function enmarcar2($controlador, $rutaVista, $datos = []) {
	if (session_status () == PHP_SESSION_NONE) {session_start ();}
	if (isset ( $_SESSION ['nombreUsuario'] )) {
		$datos ['header'] ['usuario'] ['nombre'] = $_SESSION ['nombreUsuario'];
	}
	$controlador->load->view ( 'templates2/head',$datos );
	$controlador->load->view ( 'templates2/header', $datos );
	$controlador->load->view ( 'templates2/nav', $datos );
	$controlador->load->view ( $rutaVista, $datos );
	$controlador->load->view ( 'templates2/footer', $datos );
	$controlador->load->view ( 'templates2/end' );
}
?>