<?php
$ruta = isset($vuelveBorrar) ? $vuelveBorrar : 'listar';
header("Location:".base_url()."categoria/".$ruta);

?>