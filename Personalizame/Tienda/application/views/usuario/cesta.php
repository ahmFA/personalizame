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
	<div class="row m-t-25">

	 <?php if(isset($productosCompra)):?>
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th class="text-center">Precio</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
               
                <?php foreach ($productosCompra as $producto):?>
                    <tr>
                        <td class="col-sm-8 col-md-6">
                        <div class="media">
                            <a class="thumbnail pull-left" href="#"> <img class="media-object" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-2/72/product-icon.png" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#"><?= $producto['id'] ?> - <?= $producto['articulo']['nombre'] ?> - <?= $producto['color'] ?> - <?= $producto['talla'] ?></a></h4>
                             <!--    <h5 class="media-heading"> by <a href="#">Brand name</a></h5>  -->
                                <span>Status: </span><span class="text-success"><strong>En Stock</strong></span>
                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="text" class="form-control" id="exampleInputEmail1" value="<?= $producto['cantidad'] ?>">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?=$producto['precio'] ?>€</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong><?=$producto['precio']*$producto['cantidad'] ?>€</strong></td>
                        <td class="col-sm-1 col-md-1">
                        <form id="idFormdelete" action="<?= base_url() ?>usuario/quitarCarrito" method="post">
                        	<input type="hidden" name="num_producto" value="<?=$producto['id'] ?>">
	                        <button class="btn btn-danger" onclick="function f() {document.getElementById('idFormdelete').submit();}">
	                            <span class="glyphicon glyphicon-remove"></span> Quitar
	                        </button>
                        </form>
                        </td>
                    </tr>
                <?php endforeach;?>    
                   
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong><?=$_SESSION['precioTotalPedido'] ?>€</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Precio de envío</h5></td>
                        <td class="text-right"><h5><strong>4.95€</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong><?=$_SESSION['precioTotalPedido']+4.95 ?>€</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <a href="<?=base_url() ?>usuario/misProductos" type="button" class="btn btn-default">
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continuar Comprando
                        </a></td>
                        <td>
                        <a href="<?=base_url() ?>usuario/pago" type="button" class="btn btn-success">
                            Pagar <span class="glyphicon glyphicon-play"></span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php else:?>
No has añadido aún ningún producto.

<?php endif;?>

</div>
</section>