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

	}

</script>

<div class="container">
	<div class="form-group col-xs-12">
		<h2>Modificar datos de tamaño</h2>
	</div>
	
	<form name="form1" class="form" action="<?=base_url() ?>tamano/modificarPost2" method="post">
	
	<!-- campos ocultos para volver al filtro en la misma posicion y ver los resultados del cambio -->
	<input type="hidden" name="filtroNombre" value="<?= $body['filtroNombre'] ?>">
	<input type="hidden" name="idTamano" value="<?= $body['tamano']->id ?>">

	<div class="form-group col-xs-4">	
		<label for="idNombre">Nombre </label>
		<input class="form-control" id="idNombre" type="text" name="nombre" maxlength="35" required="required" placeholder="completa este campo" title="El Nombre debe contener entre 2 y 35 letras" value="<?= $body['tamano']->nombre ?>"> <br/>
	</div>
	
	<div class="form-group col-xs-12">
		<br/>
	</div>
	
	<div class="form-group col-xs-4">	
		<input class="btn btn-primary" id="idBotonEnviar" type="button" value="Guardar" onclick="validarTodo()">
	</div>
	
	</form>
</div>