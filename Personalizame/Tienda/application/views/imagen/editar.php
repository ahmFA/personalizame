<!-- 
<div class="container">
<div class="row">
<div class="col-xs-6">
	<h2>Datos del artículo</h2>
	<form class="form" action="<?= base_url() ?>imagen/editarPost" enctype="multipart/form-data" method="post">
		<div class="form-group">
			<input  class="form-control" type="hidden" name="id" value="<?=$imagen['id'];?>" >
		</div>
		
		<div class="form-group">
			<label for="idPrecio">Precio</label> <input  class="form-control" type="number" id="idPrecio"
				name="precio" value="<?=$imagen['precio'];?>" >
		</div>
		
		<div class="form-group">
			<label for="comentario">Comentario</label> <input  class="form-control" type="text" id="comentario"
				name="comentario" value="<?=$imagen['comentario'];?>" >
		</div>
		
		<div class="form-group">
			<label for="descuento">Descuento</label> <input  class="form-control" type="number" id="descuento"
				name="descuento" value="<?=$imagen['descuento'];?>" >
		</div>

		<img src="../../../../img/imagenes/<?=$imagen['nombre'] ?>" width="100" height="100">
		
		<div class="form-group">
			<input type="file" name="nueva">
		</div>
		
		<div class="form-group">
			<label>Disponible</label>
			<?php if($imagen['disponible'] == 'si'):?>
			 <input type="radio" name="disponible" checked="checked" value="si">Sí
			 <input type="radio" name="disponible" value="no" >No
			<?php else :?> 
			<input type="radio" name="disponible" value="si" >Sí
			 <input type="radio" name="disponible" checked="checked" value="no" >No
			<?php endif;?> 
		</div>

		<div class="form-group">
			<fieldset>
			<legend>Categoría</legend> 
				<select name="id_categoria">
					<?php foreach ($categorias as $categoria):?>
							<?php if($categoria['id'] == $imagen['categoria_id']):?>
								<option value="<?=$categoria['id']; ?>" selected="selected"> <?=$categoria['nombre']; ?></option>
							<?php else :?>
								<option value="<?=$categoria['id']; ?>"> <?=$categoria['nombre']; ?></option>
						<?php endif;?>
					<?php endforeach;?>
				</select>
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
		<h2>Edita la imagen</h2>
	</div>
	<div class="row">
	<div class="col-sm-5">
	<div id="idBanner" class="p-l-10"></div>
	</div>
	</div>
	<form role="form" method="post"
		action="<?= base_url() ?>imagen/editarPost" enctype="multipart/form-data" onsubmit="return comprobarImagen()">
		<div class="card-body card-padding">
			<input type="hidden" name="id_imagen" value="<?=$imagen['id'];?>">
			<input type="hidden" name="filtroNombre" value="<?= $body['filtroNombre'] ?>">
			<input type="hidden" name="filtroImagen" value="<?= $body['filtroImagen'] ?>">
			<input type="hidden" name="mensajeBanner" value="<?= $body['mensajeBanner'] ?>">
			
			<div class="row">
				<div class="col-sm-4">
					<div class="cp-container">
					 <p class="f-500 c-black m-b-20" id="imagen-form">Imagen</p>
                            
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput">
                                	<img src="../../../../img/imagenes/<?=$imagen['nombreImagen'] ?>">
                                </div>
                                <div>
                                    <span class="btn btn-info btn-file">
                                        <span class="fileinput-new">Seleccionar imagen</span>
                                        <span class="fileinput-exists">Cambiar</span>
                                        <input type="file" name="nueva" id="imagen">
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
						<div class="form-group fg-line" id="nombre-form">
							<label for="nombre">Nombre</label> <input type="text"
								class="form-control input-sm" id="nombre" name="nombre"
								value="<?=$imagen['nombre']; ?>">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="cp-container">
						<div class="form-group fg-line">
							<label for="nombre">Comentario</label> <input type="text"
								class="form-control input-sm" id="comentario" name="comentario"
								value="<?=$imagen['comentario']; ?>">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="cp-container">
						<div class="form-group fg-line" id="descuento-form">
							<label for="nombre">Descuento</label> <input type="text"
								class="form-control input-sm" id="descuento" name="descuento"
								value="<?=$imagen['descuento']; ?>">
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
								value="<?=$imagen['precio']; ?>">
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
								value="<?=$imagen['coste']; ?>">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<div class="cp-container">
						<div class="form-group fg-line">
							<label>Disponible</label>
										<?php if($imagen['disponible'] == 1):?>
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
							<label>Categorías asociadas</label>
								 <p class="f-500 c-black m-b-15" id="select-form">Elige un máximo de 3 categorías</p>
                                    
                                    <select class="selectpicker" name="id_categorias[]" id="select-cat" multiple data-max-options="3" title='Elige hasta 3 categorías para la imagen'>

										<?php foreach ($categorias as $categoria):?>
											<?php $mismo=false;?>
											<?php foreach ($imagen->sharedCategoriaList as $mi_cat):?>
												
												<?php if($categoria['id'] == $mi_cat['id']):?>
													<option value="<?=$categoria['id'] ?>" selected="selected"> <?=$categoria['nombre'] ?></option>
													<?php $mismo=true;?>
												<?php endif;?>
											
											<?php endforeach;?>
											<?php if(!$mismo):?>
												<option value="<?=$categoria['id'] ?>"> <?=$categoria['nombre'] ?></option>
											<?php endif;?>
										<?php endforeach;?>
                                    </select>
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


