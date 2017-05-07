<script type="text/javascript" src="<?=base_url()?>assets/js/serialize.js" ></script>
<script type="text/javascript">
var conexion;

	function accionAJAX() {
		document.getElementById("idBanner").innerHTML = conexion.responseText;

		//comprobacion para ver si borro o no los campos tras una insercion
		var str = conexion.responseText;
		var n = str.includes("ERROR"); //compruebo si la palabra error va en el mensaje
		if (!n){ //si el mensaje a mostrar lleva un error no reseteo los campos para poder modificarlos
			document.getElementById("idForm1").reset();
		}
		
	}

	function crear() {
		conexion = new XMLHttpRequest();

		//var datosSerializados = serialize(document.getElementById("idForm1"));
		var nombre = 'nombre='+document.getElementById('idNombre').value;
		conexion.open('POST', '<?=base_url() ?>fuente/crearPost', true);
		conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
		conexion.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		//conexion.send(datosSerializados);
		conexion.send(nombre);
		conexion.onreadystatechange = function() {
			if (conexion.readyState==4 && conexion.status==200) {
				accionAJAX();
			}
		}
	}
</script>

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
			//document.form1.submit();
			crear();
		}	
		else{
			document.getElementById("idBanner").innerHTML ="<div class=\"container alert alert-danger col-xs-5\"> <strong>ERROR</strong> Datos incorrectos</div>";
		}

	}

</script>
<!-- 
<div class="container">
	<div id="idBanner"></div>
	<div class="form-group col-xs-12">
		<h2>Añadir una fuente</h2>
	</div>
	
	<form name="form1" class="form" id="idForm1">
	
	<div class="form-group col-xs-4">	
		<label for="idNombre">Nombre </label>
		<input class="form-control" id="idNombre" type="text" name="nombre" maxlength="35" required="required" placeholder="completa este campo" title="El Nombre debe contener entre 2 y 35 letras"> <br/>
	</div>
	
	<div class="form-group col-xs-12">
		<br/>
	</div>
	
	<div class="form-group col-xs-4">	
		<input class="btn btn-primary" id="idBotonEnviar" type="button" value="Enviar" onclick="validarTodo()">
	</div>
	
	</form>
</div>

 -->


<div class="card">
	<div class="card-header">
		<h2>Crea una nueva fuente</h2>
	</div>
	<div class="row">
		<div class="col-sm-5">
			<div id="idBanner" class="p-l-10"></div>
		</div>
	</div>
	
		<div class="card-body card-padding">

			<div class="row">
				<div class="col-sm-4">
					<div class="cp-container">
						<div class="form-group fg-line" id="nombre-form">
							<label for="idNombre">Nombre</label> <input type="text"
								class="form-control input-sm" id="idNombre" name="nombre" maxlength="35" required="required"
								placeholder="Introduce el nombre de la fuente">
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="cp-container">
					<button class="btn btn-primary btn-sm m-t-10"
						onclick="validarTodo()" id="idBotonEnviar">Guardar</button>
				</div>
			</div>
		</div>

</div>

</div>
</section>
</section>