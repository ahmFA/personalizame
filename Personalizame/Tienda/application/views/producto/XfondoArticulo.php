.objeto{
	z-index: -200; 

}
.fondo{
	position: absolute;	
}
#marco_back,#marco_front{
	position: absolute;
	margin-left: 100px;    
    margin-top: 50px;
    
}
#canvas_back,#canvas_front{
	position: absolute;
	border: 1px solid silver;
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
.fliph-horizontal{
    -webkit-transform: scaleX(-1);
    -moz-transform: scaleX(-1);
    transform: scaleX(-1);
    filter: FlipH;
    -ms-filter: "FlipH";
}