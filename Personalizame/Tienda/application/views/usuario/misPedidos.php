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
	                    <h2>Mis pedidos</h2>
						
	                </div>
				</div>
				
<script type="text/javascript">
var conexion;

function accionConAJAX() { 
	document.getElementById("idBanner_lineas").innerHTML = conexion.responseText;
}

function crearLineas($id_pedido) {
	conexion = new XMLHttpRequest();

	var datos = "id_pedido="+$id_pedido;
	
	conexion.open('POST', '<?=base_url() ?>usuario/misPedidosPost', true);
	conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	conexion.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	conexion.send(datos);
	conexion.onreadystatechange = function() {
		if (conexion.readyState==4 && conexion.status==200) {
			accionConAJAX();
		}
	}
	
}
</script>	

<!-- Modal -->
  <div class="modal fade" id="formLineasPedido" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Desglose del Pedido</h4>
        </div>
        <div class="modal-body">
		               <div id="idBanner_lineas"></div>
        </div>
        <div class="modal-footer">
		<button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
      
    </div>
  </div>
	
	
			
	<div class="row m-t-25">


<div id="user" class="col-md-12" >
  <div class="panel panel-primary panel-table animated slideInDown">
   <div class="panel-heading " style="padding:5px;">
        <div class="row">
        <div class="col col-xs-4 col-xs-offset-4 text-center">
            <h1 class="panel-title">Pedidos realizados por <?= $_SESSION['nick']?></h1>
        </div>

        </div>
    </div>
   <div class="panel-body">
     <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="list">
       <table class="table table-striped table-bordered table-list">
        <thead>
         <tr>
         	<th></th>
            <th>Referencia</th>
            <th>Fecha Pedido</th>
            <th>Dirección</th>
            <th>Importe</th>
            <th>Fecha Entrega</th>
            <th>Estado</th>
          </tr> 
         </thead>
         <tbody>

         <?php foreach ($body['pedidos'] as $pedido): ?>
          <tr>
          	 <th><a class="btn btn-info" data-toggle="modal" href="#formLineasPedido" onclick="crearLineas(<?= $pedido['id']?>);"><span class="glyphicon glyphicon-info-sign"></span></a></th>
             <td><?= $pedido['id']."_".$pedido['num_ref']?></td>
             <td><?= $pedido['fecha']?></td>
             <td><?= $pedido['direccion']?></td>
             <td style="text-align: right"><?= $pedido['importe']."€"?></td>
             <td><?= $pedido['fecha_entrega']?></td>
             <?php if($pedido['estado'] == "Pendiente"):?>
             <td><span class="label label-warning"><?= $pedido['estado']?></span></td>
             <?php else:?>
			 <td><span class="label label-success"><?= $pedido['estado']?></span></td>	 			
			 <?php endif;?>
          </tr>

    	  <?php endforeach;?> 
          </tbody>
        </table>
      </div><!-- END id="list" -->

       
     </div><!-- END tab-content --> 
    </div>
   
   <div class="panel-footer text-center">
   	<!-- 
   		<ul class="pagination">
	 	  <li ><a>«</a></li>
		   <li class="active"><a href="#">1</a></li>
           <li ><a href="#">2</a></li>
           <li ><a href="#">3</a></li>
		   <li ><a>»</a></li>
         </ul> -->
         <a class="btn btn-info" href="<?=base_url() ?>usuario/perfil">Volver</a>
         
   </div>
  </div><!--END panel-table-->
</div>
</div>
</div>
</section>
