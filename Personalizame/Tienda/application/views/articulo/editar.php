<!-- 
<div class="container">
<div class="row">
<div class="col-xs-6">
	<h2>Datos del artículo</h2>
	<form class="form" action="<?= base_url() ?>articulo/editarPost" enctype="multipart/form-data" method="post">
		<div class="form-group">
			<input  class="form-control" type="hidden" name="id" value="<?=$articulo['id'];?>" >
		</div>
		<div class="form-group">
			<label for="idNombre">Nombre</label> <input  class="form-control" type="text" name="nombre"
			value="<?=$articulo['nombre']; ?>" >
		</div>
		
		<div class="form-group">
			<label for="idPrecio">Precio</label> <input  class="form-control" type="text" id="idPrecio"
				name="precio" value="<?=$articulo['precio'];?>" >
		</div>

		<img src="../../../../img/articulos/<?=$articulo['imagen'] ?>" width="100" height="100">
		
		<div class="form-group">
			<input type="file" name="nueva">
		</div>
		
		<div class="form-group">
			<label>Disponible</label>
			<?php if($articulo['disponible'] == 'si'):?>
			 <input type="radio" name="disponible" checked="checked" value="si">Sí
			 <input type="radio" name="disponible" value="no" >No
			<?php else :?> 
			<input type="radio" name="disponible" value="si" >Sí
			 <input type="radio" name="disponible" checked="checked" value="no" >No
			<?php endif;?> 
		</div>

		<div class="form-group">
			<fieldset>
			<legend>Colores del artículo</legend> 
				
				<?php foreach ($colores as $color):?>
					<?php $mismo=false; ?>
					<?php foreach ($articulo->sharedColorList as $micolor):?>
						<?php if($micolor['id'] == $color['id']):?>
							<?php $mismo=true; ?>
							<input type="checkbox" name="idColores[]" value="<?=$color['id']; ?>" checked="checked"> <?=$color['nombre']; ?>
						<?php endif;?>
					<?php endforeach;?>
					<?php if(!$mismo):?>
						<input type="checkbox" name="idColores[]" value="<?=$color['id']; ?>"> <?=$color['nombre']; ?>
					<?php endif;?>
				<?php endforeach;?>
			</fieldset>
		</div>
		
		<div class="form-group">
			<fieldset>
			<legend>Tallas del artículoe</legend> 
				
				<?php foreach ($tallas as $talla):?>
					<?php $mismot=false; ?>
					<?php foreach ($articulo->sharedTallaList as $mitalla):?>
						<?php if($mitalla['id'] == $talla['id']):?>
							<?php $mismot=true; ?>
							<input type="checkbox" name="idTallas[]" value="<?=$talla['id']; ?>" checked="checked"> <?=$talla['nombre']; ?>
						<?php endif;?>
					<?php endforeach;?>
					<?php if(!$mismot):?>
						<input type="checkbox" name="idTallas[]" value="<?=$talla['id']; ?>"> <?=$talla['nombre']; ?>
					<?php endif;?>
				<?php endforeach;?>
			</fieldset>
		</div>	

		<div class="form-group">
			<input  class="form-control" type="submit">
		</div>
		
		
	</form>
	</div>
	</div>
</div>

-->





<div class="card">
	<div class="card-header">
		<h2>Edita el artículo</h2>
	</div>
	<form role="form" method="post"
		action="<?= base_url() ?>articulo/editarPost" enctype="multipart/form-data">
		<div class="card-body card-padding">
			<input type="hidden" name="id" value="<?=$articulo['id'];?>">
			<input type="hidden" name="filtroNombre" value="<?= $body['filtroNombre'] ?>">
			<input type="hidden" name="filtroImagen" value="<?= $body['filtroImagen'] ?>">
			<input type="hidden" name="mensajeBanner" value="<?= $body['mensajeBanner'] ?>">
			<div class="row">
				<div class="col-sm-4">
					<div class="cp-container">
					 <p class="f-500 c-black m-b-20">Imagen</p>
                            
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput">
                                	<img src="../../../../img/articulos/<?=$articulo['nombreImagen'] ?>">
                                </div>
                                <div>
                                    <span class="btn btn-info btn-file">
                                        <span class="fileinput-new">Seleccionar imagen</span>
                                        <span class="fileinput-exists">Cambiar</span>
                                        <input type="file" name="nueva" id="nueva">
                                    </span>
                                    <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Quitar</a>
                                </div>
                            </div>
                           </div>
                          </div>
                       </div>
            
			<div class="row">
				<div class="col-sm-4">
					<div class="cp-container">
						<div class="form-group fg-line">
							<label for="nombre">Nombre</label> <input type="text"
								class="form-control input-sm" id="nombre" name="nombre"
								value="<?=$articulo['nombre']; ?>">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="cp-container">
						<div class="form-group fg-line">
							<label for="nombre">Descuento</label> <input type="text"
								class="form-control input-sm" id="descuento" name="descuento"
								value="<?=$articulo['descuento']; ?>">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="cp-container">
						<div class="form-group fg-line">
							<label for="nombre">Precio</label> <input type="text"
								class="form-control input-sm" id="precio" name="precio"
								value="<?=$articulo['precio']; ?>">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="cp-container">
						<div class="form-group fg-line">
							<label for="nombre">Coste</label> <input type="text"
								class="form-control input-sm" id="coste" name="coste"
								value="<?=$articulo['coste']; ?>">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="cp-container">
						<div class="form-group fg-line">
							<label>Disponible</label>
										<?php if($articulo['disponible'] == 1):?>
											<div class="radio m-b-15">
				                                <label>
				                                    <input type="radio" name="disponible" value="1" checked="checked">
				                                    <i class="input-helper"></i>
				                                   Sí
				                                </label>
				                            </div>
				                            <div class="radio m-b-15">
				                                <label>
				                                    <input type="radio" name="disponible" value="0">
				                                    <i class="input-helper"></i>
				                                    No
				                                </label>
				                            </div>
				                        <?php else:?>
				                        	<div class="radio m-b-15">
				                        	 <label>
				                                    <input type="radio" name="disponible" value="1">
				                                    <i class="input-helper"></i>
				                                   Sí
				                                </label>
				                            </div>    
				                            <div class="radio m-b-15">
				                                <label>
				                                    <input type="radio" name="disponible" value="0" checked="checked">
				                                    <i class="input-helper"></i>
				                                    No
				                                </label>
				                            </div>
				                       <?php endif;?>     
									</div>
								</div>
							</div>
						</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="cp-container">
						<div class="form-group fg-line">
						
                                    <label>Tallas</label><br/>
                                       
										<?php foreach ($tallas as $talla):?>
											<?php $mismo=false;?>
											<?php foreach($articulo->sharedTallaList as $mitalla):?>
												<?php if($talla->id == $mitalla->id):?>
													<?php $mismo = true;?>
													 <label class="checkbox checkbox-inline m-r-20">
						                                <input type="checkbox" name="idTallas[]" value="<?= $talla->id?>" checked="checked">
						                                <i class="input-helper"></i>    
						                                <?= $talla->nombre ?>
						                            </label>		
						                        <?php endif;?>
						                    <?php endforeach;?>
						                    <?php if(!$mismo):?>
						                    	<label class="checkbox checkbox-inline m-r-20">
						                                <input type="checkbox" name="idTallas[]" value="<?= $talla->id?>">
						                                <i class="input-helper"></i>    
						                                <?= $talla->nombre ?>
						                            </label>
						                    <?php endif; ?>        
										<?php endforeach;?>
                                  
               						<br/><br/>
                                    <label>Colores</label><br/>
                                       
										<?php foreach ($colores as $color):?>
											<?php $mismo=false;?>
											<?php foreach($articulo->sharedColorList as $micolor):?>
												<?php if($color->id == $micolor->id):?>
													<?php $mismo = true;?>
													 <label class="checkbox checkbox-inline m-r-20">
						                                <input type="checkbox" name="idColores[]" value="<?= $color->id?>" checked="checked">
						                                <i class="input-helper"></i>    
						                                <?= $color->nombre ?>
						                            </label>		
						                        <?php endif;?>
						                    <?php endforeach;?>
						                    <?php if(!$mismo):?>
						                    	<label class="checkbox checkbox-inline m-r-20">
						                                <input type="checkbox" name="idColores[]" value="<?= $color->id?>">
						                                <i class="input-helper"></i>    
						                                <?= $color->nombre ?>
						                            </label>
						                    <?php endif; ?>        
										<?php endforeach;?>                        
					
						</div>
					</div>
				</div>
			</div>		
						

			<div class="row">
				<button type="submit" class="btn btn-primary btn-sm m-t-10">Guardar</button>
			</div>
		</div>
	</form>

</div>

</div>
</section>
</section>


