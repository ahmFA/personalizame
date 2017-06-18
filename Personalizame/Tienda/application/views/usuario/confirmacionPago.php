
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
 
 <section class="box-content box-style" style="background-color: #fff;">
			<div class="container">
	                    <h4> Pago</h4>
	<div class="row m-t-25">


<fieldset>

<!-- Form Name -->
<legend></legend>
<!-- Text input-->

<div class="row">
<div class="col-md-4 col-md-offset-1">
<label class="control-label" >Nº de tarjeta: <?=$comprador['tarjeta'] ?> </label>
</div>
</div>

<div class="row">
<div class="col-md-4 col-md-offset-1">
<label class="control-label">Fecha de expiración: <?=$comprador['fechaExp']?></label>
</div>
</div>

<!-- Text input-->
<div class="row">
<div class="col-md-4 col-md-offset-1">
<label class="control-label">Titular: <?=$comprador['titular']?></label>
</div>
</div>
<br>
 <h4> Entrega</h4>
<hr>
<div class="row">
<div class="col-md-4 col-md-offset-1">
<label class="control-label">Dirección: <?=$comprador['direccion'] ?></label>
</div>
</div>

<div class="row">
<div class="col-md-4 col-md-offset-1">
<label class=" control-label">C.P.: <?=$comprador['cp'] ?></label>
</div>
</div>

<div class="row">
<div class="col-md-4 col-md-offset-1">
<label class="control-label">Localidad: <?=$comprador['localidad'] ?></label>
</div>
</div>

<div class="row">
<div class="col-md-4 col-md-offset-1">
<label class="control-label">Provincia: <?=$comprador['provincia'] ?></label>
</div>
</div>

<div class="row">
<div class="col-md-4 col-md-offset-1">
<label class="control-label">País: <?=$comprador['pais'] ?></label>
</div>
</div>

<div class="row">
<div class="col-md-4 col-md-offset-1">
<label class="control-label">Email de contacto: <?=$comprador['mail'] ?></label>
</div>
</div>
<br>

<h4>Pedido</h4>
<hr>
<table class="table table-bordered table-responsive">
<thead>
	<tr><td>Artículo</td><td>Precio unidad</td><td>Unidades</td><td>Precio total</td></tr>
</thead>
<tbody>
 <?php foreach ($productosCompra as $producto):?>
	 <tr>
	 	<td><?= $producto['articulo']['nombre'] ?> - <?= $producto['color'] ?> - <?= $producto['talla'] ?></td>
	 	<td><?=$producto['articulo']['precio'] ?></td>
	 	<td><?=$producto['cantidad'] ?></td>
	 	<td><?=$producto['precio'] ?></td>
	 </tr>
                  <!-- <div class="form-group">
							<label class="col-md-4 control-label"><?= $producto['articulo']['nombre'] ?> - <?= $producto['color'] ?> - <?= $producto['talla'] ?></label>
							
                            <label class="col-md-2 control-label"><?=$producto['articulo']['precio'] ?>€</label>
                          
                           	<label class="col-md-2 control-label"><?=$producto['cantidad'] ?> unidad/es</label>
                             
                           	<label class="col-md-2 control-label"><strong>Total: <?=$producto['precio'] ?>€</strong></label>
                        
                        </div>
                        --> 		
  <?php endforeach;?>
  </tbody>
  </table>
  <br>
  <hr>
					<div class="form-group" >
						<h5 class="col-md-3 control-label col-md-offset-7">Subtotal: <?=$_SESSION['precioTotalPedido'] ?>€</h5>
						
						<label class="col-md-3 control-label col-md-offset-7">Precio de envío: 4.95€</label>
					
						<h4 class="col-md-3 control-label col-md-offset-7" style="color:green;">Total: <?=$_SESSION['precioTotalPedido']+4.95 ?>€</h4>
							
					</div>
					<br><hr>
							 <div class="col-md-4 col-md-offset-4">
							 	<form action="<?= base_url() ?>usuario/pagoRealizado" method="post">
							 		<input type="hidden" name="importe_total_pedido" value="<?=$_SESSION['precioTotalPedido']+4.95 ?>">
							 		<input type="hidden" name="persona_entrega_pedido" value="<?=$comprador['titular']?>">
							 		<input type="hidden" name="direccion_entrega_pedido" value="<?=$comprador['direccion'].", ".$comprador['cp'].", ".$comprador['localidad'].", ".$comprador['provincia'].", ".$comprador['pais']?>">
								   	<input type="hidden" name="contacto_entrega_pedido" value="<?=$comprador['mail'] ?>">
								   	<input type="button" class="btn btn-info" value="Volver" onclick="javascript:window.history.back();">
								   	<input type="submit" class="btn btn-success" id="continue" name="continue" value="Pagar">
								</form>   
							</div>
							<br>

</fieldset>

</div>
</div>
</section>


