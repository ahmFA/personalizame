<script type="text/javascript">

			function comprobarModCategoria(){
				var texto = document.getElementById('nombre').value;
				if(isNaN(texto) && texto != ''){
					
					modificarCategoria();
				}else{
					document.getElementById('nombre-form').classList.add('has-error');
					document.getElementById('idBanner').innerHTML ='<div class="alert alert-danger" role="alert">ERROR: Rellena todos los campos y que éstos no sean números</div>';
					
				}
			}

			function modificarCategoria(){
				
				conexion = new XMLHttpRequest();
				
				var nombre = 'nombre='+document.getElementById('nombre').value+'&id='+document.getElementById('id').value;
				conexion.open('POST', '<?=base_url() ?>categoria/editarPost', true);
				conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
				conexion.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				//conexion.send(datosSerializados);
				conexion.send(nombre);
				conexion.onreadystatechange = function() {
					if (conexion.readyState==4 && conexion.status==200) {
						XCategoriaModPost();
					}
				}
			}	

			function XCategoriaModPost() {
				document.getElementById("idBanner").innerHTML = conexion.responseText;

				//comprobacion para ver si borro o no los campos tras una insercion
				var str = conexion.responseText;
				var n = str.includes("ERROR"); //compruebo si la palabra error va en el mensaje
				if (!n){ //si el mensaje a mostrar lleva un error no reseteo los campos para poder modificarlos
					document.getElementById("idForm1").reset();
				}
				
			}
			
		</script>
<div class="card">
	<div class="card-header">
		<h2>Edita la categoria</h2>
	</div>
	<div class="row">
	<div class="col-sm-5">
	<div id="idBanner" class="p-l-10"></div>
	</div>
	</div>
<!-- <form role="form" method="post"
		action="<?= base_url() ?>categoria/editarPost" onsubmit="return comprobarTalla()"> -->	
		<div class="card-body card-padding">
			<input type="hidden" id="id" name="id" value="<?=$categoria['id'];?>">
			<input type="hidden" name="filtroNombre" value="<?= $body['filtroNombre'] ?>">
			<input type="hidden" name="mensajeBanner" value="<?= $body['mensajeBanner'] ?>">
			<div class="row">
				<div class="col-sm-4">
					<div class="cp-container">
						<div class="form-group fg-line" id="nombre-form">
							<label for="nombre">Nombre</label> <input type="text"
								class="form-control input-sm" id="nombre" name="nombre"
								placeholder="Introduce el nuevo nombre de la categoria"
								value="<?=$categoria['nombre']; ?>">
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<button onclick="comprobarModCategoria()" class="btn btn-primary btn-sm m-t-10">Guardar</button>
			</div>
		</div>
<!-- </form> -->	

</div>

</div>
</section>
</section>


