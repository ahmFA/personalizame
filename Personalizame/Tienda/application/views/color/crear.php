			<div class="card">
				<div class="card-header">
					<h2>Crea un nuevo color</h2>
				</div>
				<div class="row">
					<div class="col-sm-5">
						<div id="idBanner" class="p-l-10"></div>
					</div>
				</div>
				<form role="form" method="post"
					action="<?= base_url() ?>color/crearPost" onsubmit="return comprobarColor()">
					<div class="card-body card-padding">
			
						<div class="row">
							<div class="col-sm-4">
								<div class="cp-container">
									<div class="form-group fg-line" id="nombre-form">
										<label for="nombre">Nombre</label> <input type="text"
											class="form-control input-sm" id="nombre" name="nombre"
											placeholder="Introduce el nombre del color">
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
											<input type="text" class="form-control cp-value" value="#000000"
												data-toggle="dropdown" id="valor" name="valor">
											<div class="dropdown-menu">
												<div class="color-picker" data-cp-default="#000000"></div>
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








