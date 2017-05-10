<div class="card">
	<div class="card-header">
		<h2>Edita la categoria</h2>
	</div>
	<div class="row">
	<div class="col-sm-5">
	<div id="idBanner" class="p-l-10"></div>
	</div>
	</div>
	<form role="form" method="post"
		action="<?= base_url() ?>categoria/editarPost" onsubmit="return comprobarTalla()">
		<div class="card-body card-padding">
			<input type="hidden" name="id" value="<?=$categoria['id'];?>">
			<input type="hidden" name="filtroNombre" value="<?= $body['filtroNombre'] ?>">
			<input type="hidden" name="mensajeBanner" value="<?= $body['mensajeBanner'] ?>">
			<div class="row">
				<div class="col-sm-4">
					<div class="cp-container">
						<div class="form-group fg-line" id="nombre-form">
							<label for="nombre">Nombre</label> <input type="text"
								class="form-control input-sm" id="nombre" name="nombre"
								placeholder="Introduce el nuevo nombre de la categoria"
								value="<?=$categoria['nombre']; ?>">
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


