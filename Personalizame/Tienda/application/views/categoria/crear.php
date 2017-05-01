<div class="card">
	<div class="card-header">
		<h2>Crea una nueva categoría</h2>
	</div>
	<div class="row">
	<div class="col-sm-5">
	<div id="idBanner" class="p-l-10"></div>
	</div>
	</div>
	<form role="form" method="post"
		action="<?= base_url() ?>categoria/crearPost" onsubmit="return comprobarCategoria()">
		<div class="card-body card-padding">

			<div class="row">
				<div class="col-sm-4">
					<div class="cp-container">
						<div class="form-group fg-line" id="nombre-form">
							<label for="nombre">Nombre</label> <input type="text"
								class="form-control input-sm" id="nombre" name="nombre"
								placeholder="Introduce el nombre de la categoria">
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
