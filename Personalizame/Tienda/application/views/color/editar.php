<div class="card">
	<div class="card-header">
		<h2>Edita el color</h2>
	</div>
	<div class="row">
	<div class="col-sm-5">
	<div id="idBanner" class="p-l-10"></div>
	</div>
	</div>
	<form role="form" method="post"
		action="<?= base_url() ?>color/editarPost" onsubmit="return comprobarTalla()">
		<div class="card-body card-padding">
			<input type="hidden" name="id" value="<?=$color['id'];?>">
			<div class="row">
				<div class="col-sm-4">
					<div class="cp-container">
						<div class="form-group fg-line" id="nombre-form">
							<label for="nombre">Nombre</label> <input type="text"
								class="form-control input-sm" id="nombre" name="nombre"
								placeholder="Introduce el nombre del color"
								value="<?=$color['nombre']; ?>">
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-4">
					<div class="cp-container">
						<div class="input-group form-group fg-line">
							<span class="input-group-addon"><i
								class="zmdi zmdi-invert-colors"></i></span>
							<div class="fg-line dropdown">
								<input type="text" class="form-control cp-value"
									value="<?=$color['valor'];?>" data-toggle="dropdown" id="valor"
									name="valor">
								<div class="dropdown-menu">
									<div class="color-picker"
										data-cp-default="<?=$color['valor'];?>"></div>
								</div>
								<i class="cp-value"></i>

							</div>
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


