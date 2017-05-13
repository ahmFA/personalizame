<script type="text/javascript">
     

			function comprobarCategoria(){
				var texto = document.getElementById('nombre').value;
				if(isNaN(texto) && texto != ''){
					
					crearCategoria();
				}else{
					document.getElementById('nombre-form').classList.add('has-error');
					document.getElementById('idBanner').innerHTML ='<div class="alert alert-danger" role="alert">ERROR: Recuerda rellenar todo los campos y que éstos no sean números</div>';
					
				}
			}

			function crearCategoria(){
				
				conexion = new XMLHttpRequest();
				
				var nombre = 'nombre='+document.getElementById('nombre').value;
				conexion.open('POST', '<?=base_url() ?>categoria/crearPost', true);
				//conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
				conexion.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				//conexion.send(datosSerializados);
				conexion.send(nombre);
				conexion.onreadystatechange = function() {
					if (conexion.readyState==4 && conexion.status==200) {
						XCategoriaCrearPost();
					}
				}
			}	

			function XCategoriaCrearPost() {
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
		<h2>Crea una nueva categoría</h2>
	</div>
	<div class="row">
	<div class="col-sm-5">
	<div id="idBanner" class="p-l-10">
	
	</div>
	</div>
	</div>
	<form role="form" method="post" id="idForm1"
		action="<?= base_url() ?>categoria/crearPost">
		<div class="card-body card-padding">

			<div class="row">
				<div class="col-sm-4">
					<div class="cp-container">
						<div class="form-group fg-line" id="nombre-form">
							<label for="nombre">Nombre</label> <input type="text"
								class="form-control input-sm" id="nombre" name="nombre"
								placeholder="Introduce el nombre de la categoria">
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<button class="btn btn-primary btn-sm m-t-10" onclick="comprobarCategoria()" id="idBotonEnviar">Guardar</button>
			</div>
		</div>
	</form>

</div>

</div>
</section>
</section>
