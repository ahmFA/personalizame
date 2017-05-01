<!-- 
<div class="container">
	<form action="<?=base_url() ?>imagen/crearPost" enctype="multipart/form-data" method="post">
	<input type="hidden" id="id_usuario" name="id_usuario" value="1"><br>
		<label>Foto: </label>
		<input type="file" name="imagen"><br>
		<label>Nombre: </label>
		<input type="text" id="nombre" name="nombre"><br>
		<label>Comentario: </label>
		<input type="text" id="comentario" name="comentario"><br>
		<label>Descuento: </label>
		<input type="text" id="descuento" name="descuento"><br>
		<label>Disponible: </label>
		<input type="radio" name="disponible" value="si" checked="checked">Sí<br>
		<input type="radio" name="disponible" value="no">No<br>
		
		<div class="form-group">
			<fieldset>
			<legend>Categorías disponibles</legend> 
				<?php $contador = 0;?>
				<?php foreach ($categorias as $categoria):?>
					<?php if($contador == 0):?>
						<input type="checkbox" name="id_categorias[]" checked="checked" value="<?=$categoria['id'] ?>"> <?=$categoria['nombre'] ?>
					<?php else:?>
						<input type="checkbox" name="id_categorias[]" value="<?=$categoria['id'] ?>"> <?=$categoria['nombre'] ?>
					<?php endif;?>	
					<?php $contador++;?>
				<?php endforeach;?>
			</fieldset>
		</div>
		
		<input type="submit"><br>
	</form>
</div>

-->




<div class="card">
	<div class="card-header">
		<h2>Añade una nueva imagen</h2>
	</div>
	<div class="row">
	<div class="col-sm-5">
	<div id="idBanner" class="p-l-10"></div>
	</div>
	</div>
	<form role="form" method="post" action="<?= base_url() ?>imagen/crearPost" enctype="multipart/form-data" onsubmit="return comprobarImagen()">
		<div class="card-body card-padding">
			<input type="hidden" id="id_usuario" name="id_usuario" value="1">
			<div class="row">
				<div class="col-sm-4">
					<div class="cp-container">
					 <p class="f-500 c-black m-b-20" id="imagen-form">Previsualización de la imagen</p>
                            
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-preview thumbnail" data-trigger="fileinput"></div>
                                <div>
                                    <span class="btn btn-info btn-file">
                                        <span class="fileinput-new">Seleccionar imagen</span>
                                        <span class="fileinput-exists">Cambiar</span>
                                        <input type="file" name="imagen" id="imagen">
                                    </span>
                                    <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Quitar</a>
                                </div>
                            </div>
                            <br/>
						<div class="form-group fg-line" id="nombre-form">
							<label for="nombre">Nombre</label> <input type="text"
								class="form-control input-sm" id="nombre" name="nombre"
								placeholder="Introduce el nombre de la imagen">
						</div>
						<div class="form-group fg-line">
							<label for="comentario">Comentario</label> <input type="text"
								class="form-control input-sm" id="comentario" name="comentario"
								placeholder="Introduce un comentario">
						</div>
						<div class="form-group fg-line" id="descuento-form">
							<label for="descuento">Descuento</label> <input type="text"
								class="form-control input-sm" id="descuento" name="descuento"
								placeholder="Indica el descuento que tiene la imagen">
						</div>
						<label>Disponible</label>
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
					</div>
					<div class=" m-b-25">
                                    <p class="f-500 c-black m-b-15" id="select-form">Elige hasta 3 categorías</p>
                                    
                                    <select class="selectpicker" name="id_categorias[]" id="select-cat" multiple data-max-options="3" title='Elige hasta 3 categorías para la imagen'>
                                     <?php $contador = 0;?>
										<?php foreach ($categorias as $categoria):?>
											<?php if($contador == 0):?>
												<option value="<?=$categoria['id'] ?>" selected="selected"> <?=$categoria['nombre'] ?></option>
											<?php else:?>
												<option value="<?=$categoria['id'] ?>"> <?=$categoria['nombre'] ?></option>
											<?php endif;?>
											<?php $contador++?>
										<?php endforeach;?>
                                    </select>
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
