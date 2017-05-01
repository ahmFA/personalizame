 <!-- Page Loader -->
        <div class="page-loader">
            <div class="preloader pls-blue">
                <svg class="pl-circular" viewBox="25 25 50 50">
                    <circle class="plc-path" cx="50" cy="50" r="20" />
                </svg>

                <p>Please wait...</p>
            </div>
        </div>
        
      <script src="<?=base_url()?>assets/vendors/bower_components/jquery/dist/jquery.min.js"></script>
     <script src="<?=base_url()?>assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="<?=base_url()?>assets/vendors/bower_components/flot/jquery.flot.js"></script>
        <script src="<?=base_url()?>assets/vendors/bower_components/flot/jquery.flot.resize.js"></script>
        <script src="<?=base_url()?>assets/vendors/bower_components/flot.curvedlines/curvedLines.js"></script>
        <script src="<?=base_url()?>assets/vendors/sparklines/jquery.sparkline.min.js"></script>
        <script src="<?=base_url()?>assets/vendors/bower_components/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>
        
        <script src="<?=base_url()?>assets/vendors/bower_components/moment/min/moment.min.js"></script>
        <script src="<?=base_url()?>assets/vendors/bower_components/fullcalendar/dist/fullcalendar.min.js "></script>
        <script src="<?=base_url()?>assets/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
        <script src="<?=base_url()?>assets/vendors/bower_components/Waves/dist/waves.min.js"></script>
        <script src="<?=base_url()?>assets/vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
        <script src="<?=base_url()?>assets/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
        <script src="<?=base_url()?>assets/vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
		 <script src="<?=base_url()?>assets/vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
        

        <script src="<?=base_url()?>assets/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
      
     
        <script src="<?=base_url()?>assets/vendors/bower_components/typeahead.js/dist/typeahead.bundle.min.js"></script>
        <script src="<?=base_url()?>assets/vendors/summernote/dist/summernote-updated.min.js"></script>
		 <script src="<?=base_url()?>assets/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
        <script src="<?=base_url()?>assets/vendors/bower_components/nouislider/distribute/jquery.nouislider.all.min.js"></script>        
        <script src="<?=base_url()?>assets/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
		
  
        <script src="<?=base_url()?>assets/vendors/bower_components/chosen/chosen.jquery.min.js"></script>
        <script src="<?=base_url()?>assets/vendors/fileinput/fileinput.min.js"></script>
        <script src="<?=base_url()?>assets/vendors/input-mask/input-mask.min.js"></script>
        <script src="<?=base_url()?>assets/vendors/farbtastic/farbtastic.min.js"></script>
        <script src="<?=base_url()?>assets/js/flot-charts/curved-line-chart.js"></script>
        <script src="<?=base_url()?>assets/js/flot-charts/line-chart.js"></script>
        
        <script src="<?=base_url()?>assets/js/charts.js"></script>
        <script src="<?=base_url()?>assets/js/functions.js"></script>
        <script src="<?=base_url()?>assets/js/demo.js"></script>     

        <script type="text/javascript">
     

			function comprobarTalla(){
				var texto = document.getElementById('nombre').value;
				if(isNaN(texto) && texto != ''){
					return true;
				}else{
					document.getElementById('nombre-form').classList.add('has-error');	
					document.getElementById('idBanner').innerHTML ='<div class="alert alert-danger" role="alert">ERROR: Recuerda rellenar todo los campos y que éstos no sean números</div>';	
					return false;
				}
			}
		</script>
		<script type="text/javascript">
     

			function comprobarCategoria(){
				var texto = document.getElementById('nombre').value;
				if(isNaN(texto) && texto != ''){
					return true;
				}else{
					document.getElementById('nombre-form').classList.add('has-error');
					document.getElementById('idBanner').innerHTML ='<div class="alert alert-danger" role="alert">ERROR: Recuerda rellenar todo los campos y que éstos no sean números</div>';
					return false;
				}
			}
		</script>
		<script type="text/javascript">
     

			function comprobarColor(){
				var texto = document.getElementById('nombre').value;
				if(isNaN(texto) && texto != ''){
					return true;
				}else{
					document.getElementById('nombre-form').classList.add('has-error');
					document.getElementById('idBanner').innerHTML ='<div class="alert alert-danger" role="alert">ERROR: Recuerda rellenar todo los campos y que éstos no sean números</div>';
					return false;
				}
			}
		</script>
		<script type="text/javascript">
     

			function comprobarImagen(){
				var nombre = document.getElementById('nombre').value;
				var imagen = document.getElementById('imagen').value;
				var descuento = document.getElementById('descuento').value;
				var seleccionados = document.getElementById('select-cat').value;
				if(nombre != '' && imagen != '' && !isNaN(descuento) && descuento != '' && seleccionados != ''){
					return true;;
				}
				else{
					
					if(nombre == ''){
						document.getElementById('nombre-form').classList.add('has-error');
					}else{
						document.getElementById('nombre-form').classList.remove('has-error');
					}
					
					if(imagen == ''){
						document.getElementById('imagen-form').classList.add('c-red');	
					}else{
						document.getElementById('imagen-form').classList.remove('c-red');
					}
					
					if(descuento == '' || isNaN(descuento)){
						document.getElementById('descuento-form').classList.add('has-error');
					}else{
						document.getElementById('descuento-form').classList.remove('has-error');
					}
					
					if(seleccionados == ''){
						document.getElementById('select-form').classList.add('c-red');
					}else{
						document.getElementById('select-form').classList.remove('c-red');
					}
					
					document.getElementById('idBanner').innerHTML ='<div class="alert alert-danger" role="alert">ERROR: Recuerda rellenar todo los campos obligatorios.</div>';
					return false;
				}
			}
		</script>	
		<script type="text/javascript">
			function mostrarAlert(){
				//return '<div><div class="sweet-overlay" tabindex="-1" style="opacity: 1.03; display: block;"></div><div class="sweet-alert showSweetAlert visible" tabindex="-1" data-has-cancel-button="false" data-has-confirm-button="true" data-allow-ouside-click="false" data-has-done-function="false" data-timer="null" style="display: block; margin-top: -145px;"><div class="icon error" style="display: none;"><span class="x-mark"><span class="line left"></span><span class="line right"></span></span></div><div class="icon warning" style="display: none;"> <span class="body"></span> <span class="dot"></span> </div> <div class="icon info" style="display: none;"></div> <div class="icon success" style="display: none;"> <span class="line tip"></span> <span class="line long"></span> <div class="placeholder"></div> <div class="fix"></div> </div> <div class="icon custom" style="display: block; background-image: url(&quot;img/thumbs-up.png&quot;); width: 80px; height: 80px;width:80px; height:80px"></div> <h2>Sweet!</h2><p class="lead text-muted" style="display: block;">Heres a custom image.</p><p><button class="cancel btn btn-lg btn-default" tabindex="2" style="display: none;">Cancel</button> <button class="confirm btn btn-lg btn-primary" tabindex="1" style="display: inline-block;">OK</button></p></div></div>';
				alert('He llegado');
			}	
		</script>
    </body>
    
    
    
    
    
  </html>