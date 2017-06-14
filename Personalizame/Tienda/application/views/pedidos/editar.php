<!-- <script type="text/javascript" src="<?=base_url()?>assets/js/serialize.js" ></script>  -->
<script type="text/javascript">
var conexion = '';
function modificarPedido() {
	conexion = new XMLHttpRequest();

	//var datosSerializados = serialize(document.getElementById("idFormPedido"));
	var datos = 'id_pedido='+document.getElementById('id_pedido').value+'&direccion='+document.getElementById('dir').value+'&estado='+document.getElementById('estado').value;
	conexion.open('POST', '<?=base_url() ?>pedido/editarPost', true);
	conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	conexion.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	conexion.send(datos);
	conexion.onreadystatechange = function() {
		if (conexion.readyState==4 && conexion.status == 200) {
			document.getElementById('idBanner').innerHTML = conexion.responseText;
		}
	}
}

function comprobarPedido(){

	var direccion = document.getElementById('dir').value;

	var valDir = validarDireccion();
	
		function validarDireccion(){
			if(direccion == ''){
				document.getElementById('dir').classList.add('has-error');
				return false;
			}else{
				document.getElementById('dir').classList.remove('has-error');
				return true;
			}
		}

		if(valDir){
			//return true;
			modificarPedido();
		}
		else{
			document.getElementById('idBanner').innerHTML ='<div class="alert alert-danger" role="alert">ERROR: Rellena todos los campos obligatorios.</div>';
			//return false;
		}
	
}


</script>



<div class="card">
	<div class="card-header">
		<h2>Edita la imagen</h2>
	</div>
	<div class="row">
	<div class="col-sm-7">
	<div id="idBanner" class="p-l-10"></div>
	</div>
	</div>
	<form role="form" id="idFormPedido" method="post">
		<div class="card-body card-padding">
			<input type="hidden" id="id_pedido" name="idPedido" value="<?=$pedido['id'];?>">
			
			<div class="row">
				<div class="col-sm-12">
					
				<div class="col-sm-6">
					<div class="cp-container">
						<div class="form-group fg-line" id="nombre-form">
							<label for="nombre">Nick</label> <input type="text"
								class="form-control input-sm" id="usuario" name="usuario"
								value="<?=$pedido['usuario']->nick; ?>" readonly="readonly">
						</div>
					</div>
					
			
				</div>
				<div class="col-sm-6">
					<div class="cp-container">
						<div class="form-group fg-line" id="nombre-form">
							<label for="nombre">Fecha de realización del pedido</label> <input type="text"
								class="form-control input-sm" id="fecha" name="fecha"
								value="<?=$pedido['fecha']; ?>" readonly="readonly">
						</div>
					</div>
					
			
				</div>
				
				<div class="col-sm-6">
					<div class="cp-container">
						<div class="form-group fg-line" id="nombre-form">
							<label for="nombre">Dirección de entrega</label> <input type="text"
								class="form-control input-sm" id="dir" name="direccion"
								value="<?=$pedido['direccion']; ?>">
						</div>
					</div>
			
				</div>
				<div class="col-sm-6">
					<div class="cp-container">
				<div class="form-group fg-line">
							<label>Estado actual del pedido</label>
								 <p class="f-500 c-black m-b-15" id="select-form"></p>
                                    
                                    <select class="selectpicker" name="estado" id="estado">
												<?php $estados[0] = 'Pendiente'; $estados[1] = 'Entregado';?>
												<?php foreach ($estados as $estado):?>
												<?php if($pedido->estado == $estado):?>
													<option value="<?=$estado ?>" selected="selected"> <?=$estado?></option>
													<?php else:?>
													<option value="<?=$estado ?>"> <?=$estado?></option>
												<?php endif;?>
												<?php endforeach;?>
                                    </select>
						</div>
					</div>
				</div>		
			
			   </div>		
			</div>

			<div class="row">
				<div class="col-sm-offset-5 col-sm-2 p-t-25">
				<input id="idBotonEnviar" class="btn-block" type="button" onclick="comprobarPedido()" value="GUARDAR" style="background-color: #2196f3; color: #fff; text-size:14px;">
				</div>
			</div>
		</div>
	</form>
	
</div>

</div>
</section>

