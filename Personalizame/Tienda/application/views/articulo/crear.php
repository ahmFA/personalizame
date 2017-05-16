<div class="card">
	<div class="card-header">
		<h2>Añade un nuevo artículo</h2>
	</div>
	<div class="row">
		<div class="col-sm-5">
		<div id="idBanner" class="p-l-10">
			<?php if (isset($body['status'] ) && $body['status']):?>
				<div class="container alert alert-success col-xs-5">
				  Artículo con nombre <strong><?=$body['nombre']?></strong> creado con éxito
				</div>
			<?php elseif (isset($body['status'] ) && !$body['status']):?>
				<div class="container alert alert-danger col-xs-5">
				  <strong>ERROR</strong> Artículo con nombre <strong><?=$body['nombre']?></strong> ya existe
				</div>
			<?php endif;?>
		</div>
	</div>
	</div>
	<form role="form" method="post" action="<?= base_url() ?>articulo/crearPost" enctype="multipart/form-data" onsubmit="return comprobarArticulo()">
		<div class="card-body card-padding">
			<input type="hidden" id="id_usuario" name="id_usuario" value="1">
			<div class="row">
				<div class="col-sm-10">
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
								placeholder="Introduce el nombre del articulo">
						</div>
						<div class="form-group fg-line" id="precio-form">
							<label for="comentario">Precio</label> <input type="text"
								class="form-control input-sm" id="precio" name="precio"
								placeholder="Introduce un precio">
						</div>
						<div class="form-group fg-line" id="coste-form">
							<label for="comentario">Coste</label> <input type="text"
								class="form-control input-sm" id="coste" name="coste"
								placeholder="Introduce el coste">
						</div>
						<div class="form-group fg-line" id="descuento-form">
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
						<div class="row">
                                    <label>Tallas</label><br/>
                                       
										<?php foreach ($tallas as $talla):?>
										<div class="col-sm-2">
											 <label class="checkbox checkbox-inline m-r-20">
				                                <input type="checkbox" name="idTallas[]" value="<?= $talla->id?>">
				                                <i class="input-helper"></i>    
				                                <?= $talla->nombre ?>
				                            </label>		
				                         </div>   
										<?php endforeach;?>
                         </div>         
                  	</div>
                  	
					<div class=" m-b-25">
						<div class="row">
                                    <label>Colores</label><br/>
                                       
										<?php foreach ($colores as $color):?>
										<div class="col-sm-2">
											 <label class="checkbox checkbox-inline m-r-20">
				                                <input type="checkbox" name="idColores[]" value="<?= $color->id?>">
				                                <i class="input-helper"></i>    
				                                <?= $color->nombre ?>
				                            </label>	
				                         </div>   	
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
