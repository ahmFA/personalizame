	<header id="page-top">
		<div class="wrap-header">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						
						<div class="intro-text">
							<div class="intro-lead-in">Bienvenido a Personalízame!</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </header>
 
 <section class="box-content box-style">
			<div class="container-fluid">
				<div class="row heading">
					 <div class="col-lg-12">
	                    <h2>Mis productos</h2>
						
	                </div>
				</div>
<script type="text/javascript" src="<?=base_url()?>assets/js/serialize.js" ></script>
<script type="text/javascript">
/*
var conexion;

	function accionAJAX() {
		document.getElementById("idBanner_carrito").innerHTML = conexion.responseText;
	}

	function envioCarrito(num) {
		conexion = new XMLHttpRequest();
		form = 'idFormCarrito'+num;
		var datosSerializados = serialize(document.getElementById(form));
		conexion.open('POST', '<?=base_url() ?>usuario/anadirCarrito', true);
		conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
		conexion.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		conexion.send(datosSerializados);
		conexion.onreadystatechange = function() {
			if (conexion.readyState==4 && conexion.status==200) {
				accionAJAX();
			}
		}
	}
	*/
</script>

<script type="text/javascript">
	
	function validarCantidad(num){
		var elemento = 'cantidad'+num;
		var valido = false;
		var miCantidad = document.getElementById(elemento).value;
		//1 o 2 digitos
		if(/^([1-9])|([0-9][1-9])$/.test(miCantidad)){
			valido = true;
		}
		return valido;
	}
	
	function validarTodo(num){
		var formulario = 'idFormCarrito'+num;
		//Cantidad
		var valCantidad = validarCantidad(num);
		
		//Si todo esta a TRUE hace el submit
		if(valCantidad){
			document.getElementById(formulario).submit();
			//envioCarrito();
		}	
		else{
			//mensaje de error
			document.getElementById("idBanner_carrito").innerHTML ="<div class=\"container alert alert-danger col-xs-5\"> <strong>ERROR</strong> Cantidad incorrecta</div>";

			//eliminar otros mensajes de aviso que pudiese haber en pantalla 
			if(document.getElementById("idMensajeBanner") != null){
				document.getElementById("idMensajeBanner").parentNode.removeChild(document.getElementById("idMensajeBanner"));
			}
		}
	}

</script>

 
	<?php if ($body['mensaje'] != ""):?>
	<div id="idMensajeBanner" class="container alert alert-success col-xs-6">
  		<strong><?= $body['mensaje'] ?></strong>
	</div>
	<?php endif;?>


	<div class="row">
		<div class="col-md-12">
			<div id="idBanner_carrito"></div>
		</div>
	</div>	
 	
	
	<div class="row m-t-25">
	
<div id="user" class="col-md-12" >
  <div class="panel panel-primary panel-table animated slideInDown">
   <div class="panel-heading " style="padding:5px;">
        <div class="row">
       
        <div class="col col-xs-4 col-xs-offset-4 text-center">
            <h1 class="panel-title" style="padding: 10px;">Productos guardados por <?= $_SESSION['nick']?></h1>
        </div>
        </div>
    </div>
  <div role="tabpanel" class="tab-pane " id="thumb">
        <div class="row">
        <div class="col-md-12">
        <?php $contador = 1?>
        <?php foreach ($body['productos'] as $producto): ?>
			 		
        <div class="ok">
         <div class="col-md-3">
         <div class="panel panel-default panel-thumb">
  			<div class="panel-heading">
    			<h3 class="panel-title"><?= $producto['articulo']->nombre?>, <?= $producto['talla']->nombre?>, <?= $producto['color']->nombre?></h3>
  			</div>
  			<div class="panel-body avatar-card">
   			 <img style="margin:20px auto;" src="../../../../img/productos/<?= $producto['imagen_producto']?>">
 			</div>
            <div class="panel-footer">
               <!-- <a href="#" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
               <a href="#" class="btn btn-warning" title="ban"><i class="fa fa-shopping-cart"> Añadir al carrito</i></a>
               <a href="#" class="btn btn-danger"  title="delete"><i class="fa fa-trash" ></i></a> -->
               <form id="idFormCarrito<?=$contador?>" action="<?=base_url()?>usuario/anadirCarrito" method="post" style="display: inline-block">
					<input type="hidden" name="id_producto" value="<?= $producto['id']?>">
					<input type="hidden" name="id_articulo" value="<?= $producto['articulo_id']?>">
					<input type="hidden" name="id_talla" value="<?= $producto['talla_id']?>">
					<input type="hidden" name="id_color" value="<?= $producto['color_id']?>">
					<label>Unid.</label><input type="text" id="cantidad<?=$contador?>" name="cantidad" size="1" maxlength="2" value="1">
					<input class="btn btn-warning" id="idBotonEnviar" type="button" value="Añadir al carrito" onclick="validarTodo(<?=$contador?>)">
			   </form>
               
               <form id="idFormRemove" action="<?=base_url()?>usuario/borrarProducto" method="post" style="display: inline-block">
					<input type="hidden" name="id_producto" value="<?= $producto['id']?>">
					<input type="hidden" name="mensajeBanner" value="Producto eliminado">
					<button class="btn btn-danger" onclick="function f() {document.getElementById('idFormRemove').submit();}"><i class="fa fa-trash" ></i></button>
				</form>
            </div>
         </div>
		 </div>
       </div>
       <?php $contador++;?>
     <?php endforeach;?> 	

       
       </div>
      </div>
      </div><!-- END id="thumb" --></div>
      </div><!-- END tab-content --> 
    </div>
   
   <div class="panel-footer text-center">
   		<ul class="pagination">
	 <!--  <li ><a>«</a></li>
		   <li class="active"><a href="#">1</a></li>
           <li ><a href="#">2</a></li>
           <li ><a href="#">3</a></li>
		   <li ><a>»</a></li> -->	 
		    <?= $botones ?>
         </ul> 
        
   </div>
  </div><!--END panel-table-->
  </div>
</div>

      
      
      
</div>
</div>
</section>


<script type="text/javascript">
function filter($state){
	var x   = document.getElementsByClassName($state);
	var btn = document.getElementById($state);

	if (btn.className == "btn"){
	    btn.className = btn.dataset.class;
		for (i = 0; i < x.length; i++) {x[i].className = " animated fadeInLeft "+$state;}
		}
		else{ 
		for (i = 0; i < x.length; i++) {x[i].className = " animated fadeOutRight "+$state;}
		 btn.className = "btn";
		}

	}
</script>
