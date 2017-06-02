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
			<div class="container">
				<div class="row heading">
					 <div class="col-lg-12">
	                    <h2>Cesta de la compra</h2>
	                </div>
				</div>

<form name="form1">
<select name="id_articulo">
	<?php foreach($articulos as $art):?>
		<option value="<?=$art->id ?>"><?= $art->nombre ?>
	<?php endforeach;?>
</select>
<select name="id_talla">
	<?php foreach($tallas as $talla):?>
		<option value="<?=$talla->id ?>"><?= $talla->nombre ?>
	<?php endforeach;?>
</select>
<select name="id_color">
	<?php foreach($colores as $color):?>
		<option value="<?=$color->id ?>"><?= $color->nombre ?>
	<?php endforeach;?>
</select>
<input type="number" name="cantidad" value="1" min="1">
<input type="button" value="Añadir al carrito" onclick="anadirProducto()">
</form>
</div>
</section>
<script type="text/javascript">
var conexion;
function anadirProducto() {
	conexion = new XMLHttpRequest();
	var id_articulo = document.form1.id_articulo.options[document.form1.id_articulo.selectedIndex].value;
	var id_talla = document.form1.id_talla.options[document.form1.id_talla.selectedIndex].value;
	var id_color = document.form1.id_color.options[document.form1.id_color.selectedIndex].value;
	
	var datos = 'id_articulo='+id_articulo+'&id_talla='+id_talla+'&id_color='+id_color+'&cantidad='+document.form1.cantidad.value;
	conexion.open('POST', '<?=base_url() ?>usuario/anadirCarrito', true);
	conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	conexion.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	conexion.send(datos);
	conexion.onreadystatechange = function() {
		if (conexion.readyState==4 && conexion.status==200) {
			document.getElementById('carrito').innerHTML = conexion.responseText;
		}
	}
}
</script>