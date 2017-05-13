<script type="text/javascript">
	
	function validarNombre(){
		var valido = false;
		var miNombre = document.getElementById("idNombre").value;
		//longitud entre 2 y 35  permitiendo solo ciertos caracteres
		if(/^[A-Za-z0-9Ññ áéíóúÁÉÍÓÚ]{2,35}$/.test(miNombre)){
			valido = true;
		}
		return valido;
	}
	
	function validarTodo(){
		var foco = true;
				
		//NOMBRE
		var valNombre = validarNombre();
		if (valNombre == false){
			document.getElementById("idNombre").style.color = "red";
			if (foco == true){
				document.getElementById("idNombre").focus();
				foco = false;
			}
		}
		else{
			document.getElementById("idNombre").style.color = "black";
		}
		
		//Si todo esta a TRUE hace el submit
		if(valNombre){
			document.form1.submit();
		}	
		else{
			document.getElementById("idBanner").innerHTML ="<div class=\"container alert alert-danger col-xs-5\"> <strong>ERROR</strong> Datos incorrectos</div>";
		}
	}

</script>

<div class="card">
	<div class="card-header">
		<h2>Modificar datos de tamaño</h2>
	</div>
	<div class="row">
	<div class="col-sm-5">
	<div id="idBanner" class="p-l-10"></div>
	</div>
	</div>
	<form role="form" name="form1" method="post" action="<?= base_url() ?>fuente/modificarPost2">
		<input type="hidden" name="filtroNombre" value="<?= $body['filtroNombre'] ?>">
		<input type="hidden" name="idFuente" value="<?= $body['fuente']->id ?>">
		<input type="hidden" name="mensajeBanner" value="<?= $body['mensajeBanner'] ?>">
		
		<div class="card-body card-padding">
			
			<div class="row">
				<div class="col-sm-4">
					<div class="cp-container">
						<div class="form-group fg-line" id="nombre-form">
							<label for="nombre">Nombre</label> <input type="text"
								class="form-control input-sm" id="idNombre" name="nombre"
								maxlength="35" required="required" placeholder="completa este campo" title="El Nombre debe contener entre 2 y 35 letras"
								value="<?=$body['fuente']->nombre; ?>">
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<button class="btn btn-primary btn-sm m-t-10"
						onclick="validarTodo()" id="idBotonEnviar">Guardar</button>
			</div>
		</div>
	</form>

</div>

</div>
</section>
</section>

<!-- 
<div class="container">
	<div id="idBanner"></div>
	<div class="form-group col-xs-12">
		<h2>Modificar datos de fuente</h2>
	</div>
	
	<form name="form1" class="form" action="<?=base_url() ?>fuente/modificarPost2" method="post">
	 -->
	<!-- campos ocultos para volver al filtro en la misma posicion y ver los resultados del cambio -->
	<!-- 
	<input type="hidden" name="filtroNombre" value="<?= $body['filtroNombre'] ?>">
	<input type="hidden" name="idFuente" value="<?= $body['fuente']->id ?>">
	<input type="hidden" name="mensajeBanner" value="<?= $body['mensajeBanner'] ?>">
	
	<div class="form-group col-xs-4">	
		<label for="idNombre">Nombre </label>
		<input class="form-control" id="idNombre" type="text" name="nombre" maxlength="35" required="required" placeholder="completa este campo" title="El Nombre debe contener entre 2 y 35 letras" value="<?= $body['fuente']->nombre ?>"> <br/>
	</div>
	
	<div class="form-group col-xs-12">
		<br/>
	</div>
	
	<div class="form-group col-xs-4">	
		<input class="btn btn-primary" id="idBotonEnviar" type="button" value="Guardar" onclick="validarTodo()">
	</div>
	
	</form>
</div>
 -->