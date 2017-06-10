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

<!-- <div class="container-fluid" style="background-color: #E7E7E7;">  -->
<section class="box-content box-style">
			<div class="container-fluid">
				<div class="row heading">
					 <div class="col-lg-12">
	                    <h2>Perfil de Usuario</h2>
						<hr class="line01">
	                    <div class="intro">Algo sobre ti</div>
	                </div>
				</div>
	<div class="row m-t-25">
		
		<div
			class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad">

		<!-- 	<h2>Perfil de Usuario</h2>   -->
			<div class="panel panel-info">
				<div class="panel-heading">
					<h3 class="panel-title"><?= $_SESSION['nick'] ?></h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-12">
							<?php if(isset($banner)): ?>
							<?= $banner ?>
							<?php endif;?>
						</div>
						<div class="col-sm-3" align="center">
							<img alt="User Pic"
								src="../../../../img/usuarios/<?= $_SESSION['imagen'] ?>"
								class="img-circle img-responsive">
						</div>

						<div class=" col-md-9 col-lg-9 ">
							<table class="table table-user-information">
								<tbody>
									
									<tr>
										<td>Nombre:</td>
										<td><?= $usuario->nombre ?></td>
									</tr>
									<tr>
										<td>Apellido 1:</td>
										<td><?= $usuario->apellido1 ?></td>
									</tr>
									<tr>
										<td>Apellido2:</td>
										<td><?= $usuario->apellido2 ?></td>
									</tr>

									<tr>
										<td>Teléfonos:</td>
										<td><?= $usuario->telefono1 ?><br>
										<br><?= $usuario->telefono2 ?></td>
									</tr>
									<tr>
										<td>Emails:</td>
										<td><?= $usuario->mail1 ?><br>
										<br><?= $usuario->mail2 ?>
									</tr>
									<tr>
										<td>Comentario de contacto:</td>
										<td><?= $usuario->comentario_contacto ?></td>
									</tr>
									<tr>
										<td>Dirección:</td>
										<td><?= $usuario->direccion ?><br>
										<?= $usuario->cp ?><br>
										<?= $usuario->localidad ?><br>
										<?= $usuario->provincia ?><br>
										<?= $usuario->pais ?></td>
									</tr>
									<tr>
										<td>Comentario de dirección:</td>
										<td><?= $usuario->comentario_direccion ?></td>
									</tr>
									<!-- 
									<tr>
										<td>Código Postal:</td>
										<td><?= $usuario->cp ?></td>
									</tr>
									<tr>
										<td>Localidad:</td>
										<td><?= $usuario->localidad ?></td>
									</tr>
									<tr>
										<td>Provincia:</td>
										<td><?= $usuario->provincia ?></td>
									</tr>
									<tr>
										<td>País:</td>
										<td><?= $usuario->pais ?></td>
									</tr>
									 -->
								</tbody>
							</table>
							
						</div>
					</div>
				</div>
				<div class="panel-footer">
				
					<a href="<?=base_url() ?>usuario/misPedidos" class="btn btn-info">Ver mis pedidos</a>
					<a href="<?=base_url() ?>usuario/misProductos" class="btn btn-success">Ver mis productos</a>
					<a	href="<?=base_url() ?>usuario/editarPerfil" class="btn btn-warning">Editar <i class="glyphicon glyphicon-edit"></i></a>
				
				
				<!-- 
					<a data-original-title="Broadcast Message" data-toggle="tooltip"
						type="button" class="btn btn-sm btn-primary"><i
						class="glyphicon glyphicon-envelope"></i></a> <span
						class="pull-right"> <a href="<?=base_url() ?>usuario/editarPerfil"
						data-original-title="Edit this user" data-toggle="tooltip"
						type="button" class="btn btn-sm btn-warning"><i
							class="glyphicon glyphicon-edit"></i></a> <a
						data-original-title="Remove this user" data-toggle="tooltip"
						type="button" class="btn btn-sm btn-danger"><i
							class="glyphicon glyphicon-remove"></i></a>
					</span>
					
				 -->	
				</div>

			</div>
		</div>
	</div>
</div>
</section>
<script type="text/javascript">
<!--

//-->

$(document).ready(function() {
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            }
            else
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
        })
    });


    $('[data-toggle="tooltip"]').tooltip();

    $('button').click(function(e) {
        e.preventDefault();
        alert("This is a demo.\n :-)");
    });
});
</script>