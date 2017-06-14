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

<!-- Modal -->
  <div class="modal fade" id="formAvisoCarrito" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><?= $body['mensajeModal'] ?></h4>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
<?php if(!empty($body['modal'])):?>
	<script type="text/javascript">
		$(document).ready(function(){

			$('#formAvisoCarrito').modal('show');

		});
		
	</script>
<?php endif; ?>

<!-- 
	<div class="row">
		<div class="col-md-12">
			<div id="idBanner_carrito"></div>
		</div>
	</div>	
 -->	
	
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
        <?php foreach ($body['productos'] as $producto): ?>
			 		
        <div class="ok">
         <div class="col-md-3">
         <div class="panel panel-default panel-thumb">
  			<div class="panel-heading">
    			<h3 class="panel-title"><?= $producto['articulo']->nombre?>, <?= $producto['talla']->nombre?>, <?= $producto['color']->nombre?></h3>
  			</div>
  			<div class="panel-body avatar-card">
   			 <img src="../../../../img/productos/<?= $producto['imagen_producto']?>">
 			</div>
            <div class="panel-footer">
               <!-- <a href="#" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i></a>
               <a href="#" class="btn btn-warning" title="ban"><i class="fa fa-shopping-cart"> Añadir al carrito</i></a>
               <a href="#" class="btn btn-danger"  title="delete"><i class="fa fa-trash" ></i></a> -->
               <form id="idFormCarrito" action="<?=base_url()?>usuario/anadirCarrito" method="post">
					<input type="hidden" name="id_producto" value="<?= $producto['id']?>">
					<input type="hidden" name="id_articulo" value="<?= $producto['articulo_id']?>">
					<input type="hidden" name="id_talla" value="<?= $producto['talla_id']?>">
					<input type="hidden" name="id_color" value="<?= $producto['color_id']?>">
					<label>Unid.</label><input type="text" name="cantidad" size="2" value="1">
					<input class="btn btn-warning" id="idBotonEnviar" type="submit" value="Añadir al carrito">
			   </form>
               
               <form id="idFormRemove" action="<?=base_url()?>usuario/borrarProducto" method="post">
					<input type="hidden" name="id_producto" value="<?= $producto['id']?>">
					<button class="btn btn-danger" onclick="function f() {document.getElementById('idFormRemove').submit();}"><i class="fa fa-trash" ></i></button>
				</form>
            </div>
         </div>
		 </div>
       </div>
     <?php endforeach;?> 	

       
       </div>
      </div>
      </div><!-- END id="thumb" --></div>
      </div><!-- END tab-content --> 
    </div>
   
   <div class="panel-footer text-center">
   		<ul class="pagination">
	 	  <li ><a>«</a></li>
		   <li class="active"><a href="#">1</a></li>
           <li ><a href="#">2</a></li>
           <li ><a href="#">3</a></li>
		   <li ><a>»</a></li>
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
