<?php

class Articulo_model extends CI_Model{
	
	public function validarImagen($nombreImagen, $tamanoImagen, $tipoImagen){
		if($nombreImagen != null && $tamanoImagen <= 200000){
			
			if (($tamanoImagen == "image/gif")
					|| ($tamanoImagen == "image/jpeg")
					|| ($tamanoImagen == "image/jpg")
					|| ($tamanoImagen == "image/png")){
				return true;
			}else{
				return false;
			}
		}
	}
	
	
}

?>