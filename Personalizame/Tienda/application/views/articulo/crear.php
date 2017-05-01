<!-- 
<div class="container">
	<form action="<?=base_url() ?>articulo/crearPost" enctype="multipart/form-data" method="post">
		<label>Nombre: </label>
		<input type="text" id="nombre" name="nombre"><br>
		<label>Precio: </label>
		<input type="text" id="precio" name="precio"><br>
		<input type="file" name="imagen"><br>
		<label>Disponible: </label>
		<input type="radio" name="disponible" value="si" checked="checked">Sí<br>
		<input type="radio" name="disponible" value="no">No<br>
		
		<div class="form-group">
			<fieldset>
			<legend>Colores disponibles</legend> 
				
				<?php foreach ($colores as $color):?>
				<input type="checkbox" name="idColores[]" value="<?=$color['id'] ?>"> <?=$color['nombre'] ?>
				<?php endforeach;?>
			</fieldset>
		</div>
		
		<div class="form-group">
			<fieldset>
			<legend>Tallas disponibles</legend> 
				
				<?php foreach ($tallas as $talla):?>
				<input type="checkbox" name="idTallas[]" value="<?=$talla['id'] ?>"> <?=$talla['nombre'] ?>
				<?php endforeach;?>
			</fieldset>
		</div>
		
		<input type="submit"><br>
	</form>
</div>

-->



<div class="card">
	<div class="card-header">
		<h2>Añade un nuevo artículo</h2>
	</div>
	<form role="form" method="post" action="<?= base_url() ?>articulo/crearPost" enctype="multipart/form-data">
		<div class="card-body card-padding">
			<input type="hidden" id="id_usuario" name="id_usuario" value="1">
			<div class="row">
				<div class="col-sm-4">
					<div class="cp-container">
					
					 <p class="f-500 c-black m-b-20">Previsualización de la imagen</p>
                            
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
                        
						<div class="form-group fg-line">
							<label for="nombre">Nombre</label> <input type="text"
								class="form-control input-sm" id="nombre" name="nombre"
								placeholder="Introduce el nombre del articulo">
						</div>
						<div class="form-group fg-line">
							<label for="comentario">Precio</label> <input type="text"
								class="form-control input-sm" id="precio" name="precio"
								placeholder="Introduce un precio">
						</div>
						<div class="form-group fg-line">
							<label for="comentario">Coste</label> <input type="text"
								class="form-control input-sm" id="coste" name="coste"
								placeholder="Introduce el coste">
						</div>
						<div class="form-group fg-line">
							<label for="descuento">Descuento</label> <input type="text"
								class="form-control input-sm" id="descuento" name="descuento"
								placeholder="Indica el descuento que tiene la articulo">
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
                                    <label>Tallas</label><br/>
                                       
										<?php foreach ($tallas as $talla):?>
											 <label class="checkbox checkbox-inline m-r-20">
				                                <input type="checkbox" name="idTallas[]" value="<?= $talla->id?>">
				                                <i class="input-helper"></i>    
				                                <?= $talla->nombre ?>
				                            </label>		
										<?php endforeach;?>
                                  
                  	</div>
					<div class=" m-b-25">
                                    <label>Colores</label><br/>
                                       
										<?php foreach ($colores as $color):?>
											 <label class="checkbox checkbox-inline m-r-20">
				                                <input type="checkbox" name="idColores[]" value="<?= $color->id?>">
				                                <i class="input-helper"></i>    
				                                <?= $color->nombre ?>
				                            </label>		
										<?php endforeach;?>
                                  
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
