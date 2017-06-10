.objeto{
	z-index: -200; 
	background-repeat: no-repeat; 
	background-image: url(../../../../img/articulos/<?=$body['articulo']->nombre_imagen?>);
	background-color: <?=$body['color']?>; 
}
.fondo{
	position: absolute;	
	z-index: -201; 
	background-color: blue; 
}
#marco_back,#marco_front{
	position: absolute;
	margin-left: 100px;    
    margin-top: 50px;
    
}
#canvas_back,#canvas_front{
	position: absolute;
	border: 1px solid blue;
}
.hidden{
	visible: none;
	z-index: -300;
}

.objeto_final{
	z-index: -200; 
	background-color: white; 
}
#marco_final{
	position: absolute;
	margin-left: 0px;    
    margin-top: 0px;
}
#canvas_final{
	position: absolute;
	border: 1px solid blue;
}